<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinos = [
            [
                'name' => 'Aguas Turquesas',
                'description' => 'Hermoso atractivo natural con aguas cristalinas.',
                'location' => 'Ayacucho',
                'price' => 50.00,
            ],
            [
                'name' => 'Pampa de Quinua',
                'description' => 'Lugar histórico de la Batalla de Ayacucho.',
                'location' => 'Quinua - Ayacucho',
                'price' => 30.00,
            ],
            [
                'name' => 'Vilcashuamán',
                'description' => 'Ciudad arqueológica con gran historia inca.',
                'location' => 'Vilcashuamán - Ayacucho',
                'price' => 80.00,
            ],
            [
                'name' => 'Bosque de Puyas Raymondi',
                'description' => 'Zona natural con flora única.',
                'location' => 'Ayacucho',
                'price' => 60.00,
            ],
        ];

        foreach ($destinos as $destino) {
            Destination::create($destino);
        }
    }
}
