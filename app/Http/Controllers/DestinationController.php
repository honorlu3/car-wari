<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // vista publica: lista para usuarios normales(paginada)
    public function publicIndex()
    {
        $destinations = Destination::latest()->paginate(10); // Paginación de 10 por página
        return view('destinations.index', compact('destinations'));
    }

    public function indexUser()
    {
        $destinations = Destination::latest()->paginate(10); // Paginación de 10 por página
        return view('user.welcome', compact('destinations'));
    }

    //admin lista todos los destinos
    public function index()
    {
        $destinations = Destination::latest()->paginate(10); // Paginación de 10 por página
        return view('admin.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //admin crear destino
    public function create()
    {
        return view('admin.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //guardar destino
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
        ]);
        
        

         // Manejo de la imagen si se proporciona
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $validatedData['image'] = $imagePath;
        }

        Destination::create($validatedData);//guardar en la base de datos
        
        return redirect()->route('admin.destinations.index')->with('success', 'Destino creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    // vista detalle destino
    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    //editar destino
    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    //actualizar destino
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $destination->update($request->all()); //actualizar en la base de datos

        return redirect()->route('admin.destinations.index')->with('success', 'Destino actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    //eliminar destino
    public function destroy(Destination $destination)
    {
        $destination->delete(); //eliminar de la base de datos
        return redirect()->route('admin.destinations.index')->with('success', 'Destino eliminado exitosamente.');
    }

    public function home()
{
    if (auth()->check()) {

        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if (auth()->user()->role == 'user') {
            return redirect()->route('user.welcome');
        }
    }

    $destinations = Destination::all();

    return view('welcome', compact('destinations'));
}


}
