<?php

namespace App\Models;

use App\Models\Destination;
use App\Models\User;


use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'user_id',
        'destino_id',
        'fecha_reserva',
        'numero_personas',
        'precio_total',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function destino()
    {
        return $this->belongsTo(Destination::class, 'destino_id');
    }
}
