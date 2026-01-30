<?php

namespace Database\Seeders;

use App\Models\producto;
use Illuminate\Database\Seeder;

class ProductoSeederActualizado extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        producto::create([
            'nombre' => 'Laptop Dell XPS 13',
            'descripcion' => 'Laptop ultradelgada de 13 pulgadas con procesador Intel i7',
            'precio' => 999.99,
            'stock' => 15
        ]);

        producto::create([
            'nombre' => 'iPhone 15 Pro',
            'descripcion' => 'Smartphone premium con cámara de 48MP y chip A17 Pro',
            'precio' => 1199.99,
            'stock' => 25
        ]);

        producto::create([
            'nombre' => 'Samsung 65" 4K TV',
            'descripcion' => 'Televisor 4K con tecnología QLED y HDR',
            'precio' => 799.99,
            'stock' => 8
        ]);

        producto::create([
            'nombre' => 'AirPods Pro',
            'descripcion' => 'Auriculares inalámbricos con cancelación de ruido',
            'precio' => 249.99,
            'stock' => 50
        ]);

        producto::create([
            'nombre' => 'Reloj inteligente Apple Watch Series 9',
            'descripcion' => 'Smartwatch con pantalla Always-On Retina y monitoreo de salud',
            'precio' => 429.99,
            'stock' => 20
        ]);

        producto::create([
            'nombre' => 'Mochila de Viaje',
            'descripcion' => 'Mochila resistente de 40L para viajes y aventuras',
            'precio' => 79.99,
            'stock' => 35
        ]);

        producto::create([
            'nombre' => 'Zapatillas Running Nike',
            'descripcion' => 'Zapatillas deportivas con tecnología amortiguación',
            'precio' => 129.99,
            'stock' => 45
        ]);

        producto::create([
            'nombre' => 'Botella Térmica Hydro Flask',
            'descripcion' => 'Botella aislada para mantener bebidas frías o calientes',
            'precio' => 39.99,
            'stock' => 60
        ]);

        producto::create([
            'nombre' => 'Lámpara LED Inteligente',
            'descripcion' => 'Lámpara LED RGB controlable por app móvil',
            'precio' => 49.99,
            'stock' => 30
        ]);

        producto::create([
            'nombre' => 'Kit de Herramientas Profesional',
            'descripcion' => 'Set completo de 50 herramientas para reparaciones',
            'precio' => 89.99,
            'stock' => 18
        ]);
    }
}
