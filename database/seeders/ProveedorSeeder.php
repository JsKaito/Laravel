<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'nombre' => 'Tech Supplies S.A.',
            'contacto' => 'Juan Pérez',
            'email' => 'contacto@techsupplies.com',
            'telefono' => '555-1001',
            'ciudad' => 'Madrid',
            'pais' => 'España'
        ]);

        Proveedor::create([
            'nombre' => 'Global Imports Ltd.',
            'contacto' => 'Maria Chen',
            'email' => 'info@globalimports.com',
            'telefono' => '555-1002',
            'ciudad' => 'Barcelona',
            'pais' => 'España'
        ]);

        Proveedor::create([
            'nombre' => 'Premium Quality Distribution',
            'contacto' => 'Robert Miller',
            'email' => 'sales@premiumquality.com',
            'telefono' => '555-1003',
            'ciudad' => 'Valencia',
            'pais' => 'España'
        ]);

        Proveedor::create([
            'nombre' => 'Euro Logistics Partners',
            'contacto' => 'Sofia García',
            'email' => 'logistics@europartners.eu',
            'telefono' => '555-1004',
            'ciudad' => 'Sevilla',
            'pais' => 'España'
        ]);

        Proveedor::create([
            'nombre' => 'Innovation Factory Co.',
            'contacto' => 'David Zhang',
            'email' => 'business@innovationfactory.cn',
            'telefono' => '555-1005',
            'ciudad' => 'Bilbao',
            'pais' => 'España'
        ]);
    }
}
