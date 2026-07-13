<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    //usar factory
    use HasFactory;
    //nombre real de la tabla en la base de datos
    //protected $table = 'destinations';
    protected $fillable = [
        'name',
        'description', 
        'location', 
        'price',
        'image'
    ];

    // Relación con reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'destino_id');
    }    

    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }
}
