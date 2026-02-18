<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clientes::create([
            'nombre' => 'Sofía Ramírez Torres',
            'email' => 'sofia.ramirez2026@example.com',
            'telefono' => '555-0006',
            'ciudad' => 'Granada',
            'pais' => 'España'
        ]);

        Clientes::create([
            'nombre' => 'Miguel Ángel Ruiz',
            'email' => 'miguel.ruiz2026@example.com',
            'telefono' => '555-0007',
            'ciudad' => 'Zaragoza',
            'pais' => 'España'
        ]);

        Clientes::create([
            'nombre' => 'Lucía Morales Díaz',
            'email' => 'lucia.morales2026@example.com',
            'telefono' => '555-0008',
            'ciudad' => 'Málaga',
            'pais' => 'España'
        ]);

        Clientes::create([
            'nombre' => 'Javier Herrera Castro',
            'email' => 'javier.herrera2026@example.com',
            'telefono' => '555-0009',
            'ciudad' => 'Alicante',
            'pais' => 'España'
        ]);
    }
}
