<?php

namespace App\Http\Controllers;

use App\Mail\ReservaConfirmadaMail;
use Illuminate\Support\Facades\Mail;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReservasExport;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Destination;;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ReservaController extends Controller
{
    /**
 * Confirmar una reserva.
 */
public function confirmar(Reserva $reserva)
{
    $reserva->estado = 'confirmada';
    $reserva->save();

    return redirect()
        ->back()
        ->with('success', 'La reserva fue confirmada correctamente.');
}

/**
 * Rechazar una reserva.
 */
public function rechazar(Reserva $reserva)
{
    $reserva->estado = 'cancelada'; // o 'rechazada', según tu base de datos
    $reserva->save();

    return redirect()
        ->back()
        ->with('success', 'La reserva fue rechazada correctamente.');
}

/**
 * Enviar correo de confirmación.
 */
public function enviarCorreoConfirmacion($id)
{
    $reserva = Reserva::with('user', 'destino')->findOrFail($id);

    Mail::to($reserva->user->email)
        ->send(new ReservaConfirmadaMail($reserva));

    return redirect()
        ->back()
        ->with('success', 'Correo enviado correctamente.');
}



    //exportar reservas a pdf
    public function exportPdf()
    {
        $reservas = Reserva::with('user', 'destino')->get();
        $pdf = PDF::loadView('admin.reservas.pdf', compact('reservas'));
        return $pdf->download('reservas.pdf');
    }
    //exportar reservas a excel
    public function exportExcel()
    {
        return Excel::download(new ReservasExport, 'reservas.xlsx');
    }

    // listar todas las reservas para el admin
    public function adminIndex()
    {
        $reservas = Reserva::with('user', 'destino')->get();
        return view('admin.reservas.index', compact('reservas'));
    }

    //crear reserva (admin)
    public function adminCreate()
    {
        $destinos = Destination::all();
        $usuarios = User::all();
        return view('admin.reservas.create', compact('destinos', 'usuarios'));
    }

    // guardar reserva (admin)
    public function adminStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'destino_id' => 'required|exists:destinations,id',
            'fecha_reserva' => 'required|date|after_or_equal:today',
            'numero_personas' => 'required|integer|min:1',
        ]);

        Reserva::create([
            'user_id' => $request->user_id,
            'destino_id' => $request->destino_id,
            'fecha_reserva' => $request->fecha_reserva,
            'numero_personas' => $request->numero_personas,
            'precio_total' => Destination::find($request->destino_id)->price * $request->numero_personas,
            'estado' => 'pendiente',
        ]);
        return redirect()->route('admin.reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    //editar reserva (admin)
    public function adminEdit(Reserva $reserva)
    {
        $destinos = Destination::all();
        $usuarios = User::all();
        return view('admin.reservas.edit', compact('reserva', 'destinos', 'usuarios'));
    }   

    public function adminShow($id)
    {
        $reserva = Reserva::with('user', 'destino')->findOrFail($id);
        return view('admin.reservas.show', compact('reserva'));
    }

   /* metodo repitido public function enviarCorreoConfirmacion($id)
    {
        $reserva = Reserva::with(['user', 'destino'])->findOrFail($id);
        //enviar correo
        Mail::to($reserva->user->email)->send(new ReservaConfirmadaMail($reserva));
        return redirect()->back()->with('success', 'Correo de confirmación enviado a ' . $reserva->user->email);
    }*/

    // actualizar reserva (admin)
    public function adminUpdate(Request $request, Reserva $reserva)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'destino_id' => 'required|exists:destinations,id',
            'fecha_reserva' => 'required|date|after_or_equal:today',
            'numero_personas' => 'required|integer|min:1',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
        ]);
        //recalcular precio total
        $destino = Destination::findOrFail($request->destino_id);
        $precio_total = $destino->price * $request->numero_personas;

        //actualizar datos de la reserva
        $reserva->update([
            'user_id' => $request->user_id,
            'destino_id' => $request->destino_id,
            'fecha_reserva' => $request->fecha_reserva,
            'numero_personas' => $request->numero_personas,
            'precio_total' => $precio_total,
            'estado' => $request->estado,
        ]);

        //si la reserva fue confirmada, genrerar el enlace  de wasap
        if ($request->estado === 'confirmada'){
            $user = $reserva->user;
            $telefono = $user->phone;

            if ($telefono){
                $mensaje = "Hola {$user->name}, tu reserva para *{$reserva->destination->name}*
                ha sido confirmada.\n
                Detalles de la reserva:\n
                Fecha: {$reserva->fecha_reserva}\n
                Número de personas: {$reserva->numero_personas}\n
                Precio total: \${$reserva->precio_total}\n
                ¡Gracias por elegirnos!";

                //genrerar enlace de wasap
                //asegurarse de que el numero tenga el codigo de pais
                $wasapurl = "https://wa.me/51{$telefono}?text=" . urlencode($mensaje);

                //guargar el enlace en la reserva para mostrarlo en la vista
                session()->flash('wasapurl', $wasapurl);
            }
        }

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    // eliminar reserva (admin)
    public function adminDestroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('admin.reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }


    // listar reservas del usuario autenticado
    public function index()
    {
        $user = Auth::user();
        $reservas = $user->reservas()->with('destino')->paginate(10);
        $destinos = Destination::all(); // Obtener todos los destinos agragado
        return view('reservas.index', compact('reservas', 'destinos')); //agragado destinos
    }
    // mostrar formulario para crear reserva
    public function create()
    {
       // $destinos = Destination::all();
        $destinoId = request()->query('destino_id');
        $destinoSeleccionado = null;
        $destinos= Destination::all(); 
        if ($destinoId) {
            $destinoSeleccionado = Destination::findOrFail($destinoId);
        }
        
        return view('reservas.create', compact('destinos', 'destinoSeleccionado'));

    }
    // guardar reserva en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'destino_id' => 'required|exists:destinations,id',
            'fecha_reserva' => 'required|date|after_or_equal:today',
            'numero_personas' => 'required|integer|min:1',
        ]);

        $destino = Destination::findOrFail($request->destino_id);
        $precio_total = $destino->price * $request->numero_personas;

        Reserva::create([
            'user_id' => Auth::id(),
            'destino_id' => $request->destino_id,
            'fecha_reserva' => $request->fecha_reserva,
            'numero_personas' => $request->numero_personas,
            'precio_total' => $precio_total,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    // cancelar reserva
    public function cancel($id)
    {
        $reserva = Reserva::findOrFail($id);
        if ($reserva->user_id !== Auth::id()) {
            return redirect()->route('reservas.index')->with('error', 'No tienes permiso para cancelar esta reserva.');
        }   
        $reserva->estado = 'cancelada';
        $reserva->save();
        return redirect()->route('reservas.index')->with('success', 'Reserva cancelada exitosamente.');
    }
    
    // validar los datos del formulario
    private function validateReserva(Request $request)
    {
        $request->validate([
            'destino_id' => 'required|exists:destinations,id',
            'fecha_reserva' => 'required|date|after_or_equal:today',
            'numero_personas' => 'required|integer|min:1',
        ]);
    }

    // crear nueva reserva
    private function createReserva(Request $request)
    {
        $destino = Destination::findOrFail($request->destino_id);  
        $precio_total = $destino->price * $request->numero_personas;
        return Reserva::create([
            'user_id' => Auth::id(),
            'destino_id' => $request->destino_id,
            'fecha_reserva' => $request->fecha_reserva,
            'numero_personas' => $request->numero_personas,
            'precio_total' => $precio_total,
            'estado' => 'pendiente',
            //$reserva -> save();
            
            //redirigir con mensaje de éxito
            
        ]);
        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
    }


    //editar reserva

    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $destinos = Destination::all();
        return view('reservas.edit', compact('reserva', 'destinos'));

    }
    // actualizar reserva
    public function update(Request $request, Reserva $reserva)
{
    $request->validate([
        'destino_id' => 'required|exists:destinations,id',
        'fecha_reserva' => 'required|date|after_or_equal:today',
        'numero_personas' => 'required|integer|min:1',
    ]);

    //recalcular precio total
    $destino = Destination::findOrFail($request->destino_id);
    $precio_total = $destino->price * $request->numero_personas;

    $reserva->update([
        'destino_id' => $request->destino_id,
        'fecha_reserva' => $request->fecha_reserva,
        'numero_personas' => $request->numero_personas,
        'precio_total' => $precio_total,
       
    ]);

    return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente ');
}

    // eliminar reserva

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        if ($reserva->user_id !== Auth::id()) {
            return redirect()->route('reservas.index')->with('error', 'No tienes permiso para eliminar esta reserva.');
        }
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }


}


