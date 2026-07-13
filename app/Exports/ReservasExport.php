<?php

namespace App\Exports;

use App\Models\Reserva;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    return Reserva::with('user', 'destino')
        ->get()
        ->map(function ($reserva) {
            return [
                'ID' => $reserva->id,
                'Usuario' => $reserva->user ? $reserva->user->name : 'Sin usuario',
                'Destino' => $reserva->destino ? $reserva->destino->name : 'Sin destino',
                'Fecha Reserva' => $reserva->fecha_reserva,
                'N° Personas' => $reserva->numero_personas,
                'Estado' => $reserva->estado,
                'Precio Total' => 'S/ ' . number_format($reserva->precio_total, 2),
                'Fecha Creación' => $reserva->created_at->format('Y-m-d H:i'),
            ];
        });       
    }
    public function headings(): array
    {
    return [
        'ID',
        'Usuario',
        'Destino',
        'Fecha Reserva',
        'N° Personas',
        'Estado',
        'Precio Total',
        'Fecha Creación',
    ];       
    }   
}
