<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Electrónica',
            'descripcion' => 'Productos electrónicos y gadgets de última tecnología'
        ]);

        Categoria::create([
            'nombre' => 'Ropa y Accesorios',
            'descripcion' => 'Prendas de vestir y accesorios de moda'
        ]);

        Categoria::create([
            'nombre' => 'Hogar y Decoración',
            'descripcion' => 'Productos para el hogar y artículos de decoración'
        ]);

        Categoria::create([
            'nombre' => 'Deporte y Fitness',
            'descripcion' => 'Equipamiento deportivo y artículos de fitness'
        ]);

        Categoria::create([
            'nombre' => 'Libros y Media',
            'descripcion' => 'Libros, películas y contenido multimedia'
        ]);
    }
}
