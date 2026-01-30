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
            'nombre' => 'Juan García López',
            'email' => 'juan.garcia@example.com',
            'telefono' => '555-0001',
            'ciudad' => 'Madrid',
            'pais' => 'España'
        ]);

        Clientes::create([
            'nombre' => 'María Rodríguez Martínez',
            'email' => 'maria.rodriguez@example.com',
            'telefono' => '555-0002',
            'ciudad' => 'Barcelona',
            'pais' => 'España'
        ]);

        Clientes::create([
            'nombre' => 'Carlos Fernández González',
            'email' => 'carlos.fernandez@example.com',
            'telefono' => '555-0003',
            'ciudad' => 'Valencia',
            'pais' => 'España'
        ]);

        Clientes::create([
            'nombre' => 'Ana López Sánchez',
            'email' => 'ana.lopez@example.com',
            'telefono' => '555-0004',
            'ciudad' => 'Sevilla',
            'pais' => 'España'
        ]);

        Clientes::create([
            'nombre' => 'Luis Martínez Pérez',
            'email' => 'luis.martinez@example.com',
            'telefono' => '555-0005',
            'ciudad' => 'Bilbao',
            'pais' => 'España'
        ]);
    }
}
