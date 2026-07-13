<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destination;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservaConfirmadaMail;

class AdminController extends Controller
{

    //public function confirmarReserva($id)
    //{
      /*  $reserva = Reserva::findOrFail($id);
        $reserva->estado = 'confirmada';
        $reserva->save();

        // Enviar correo de confirmación al usuario
        Mail::to($reserva->user->email)->send(new ReservaConfirmadaMail($reserva));

        //enviar por watsapp (opcional)
        $telefono = $reserva->user->telefono;
        $mensaje = "Hola {$reserva->user->name}, tu reserva ha sido confirmada. Detalles: Destino: {$reserva->destino->name}, 
        Fecha: {$reserva->fecha_reserva}, Personas: {$reserva->numero_personas},
        Total: \${$reserva->precio_total}. Gracias por elegirnos!";
        $urlWhatsApp = "https://wa.me/51{$telefono}?text=" . urlencode($mensaje);

        return redirect()->back()->with('success', ' Reserva confirmada y correo enviado.')
                            ->with('whatsapp_url', $urlWhatsApp);
    }*/

    public function dashboard()
{
    //totales
    $totalUsers = User::count();
    $totalDestinations = Destination::count();
    $totalReservas = Reserva::count();

    //ingresos: reservas confirmadas
    $totalIncome=(float) Reserva::where('estado', 'confirmada')->sum('precio_total');

    //reservas por mes (año actual)
    $year = now()->year;
    $raw = Reserva::whereYear('created_at', $year)
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('count', 'month')
        ->toArray();

    //normalizamos a 12 meses m=i
    $monthsData = [];
    for ($i = 1; $i <= 12; $i++) {
        $monthsData[] = isset($raw[$i]) ? (int)$raw[$i] : 0;
    }

    //top destinos mas reservados
    //ajustar nombre de tabla/columnas segun BD
    $top = Reserva::join('destinations', 'reservas.destino_id', '=', 'destinations.id')
        ->select('destinations.name', DB::raw('COUNT(reservas.id) as total'))
        ->groupBy('destinations.name')
        ->orderByDesc('total')
        ->limit(6)
        ->get();

    $topLabels = $top->pluck('name')->toArray();
    $topValues = $top->pluck('total')->toArray();

    return view('admin.dashboard', compact(
        'totalUsers',
        'totalDestinations',
        'totalReservas',
        'totalIncome',
        'monthsData',
        'topLabels',
        'topValues',
        'year'
    ));
}
}