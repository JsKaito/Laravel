<?php

namespace Database\Seeders;

use App\Models\Orden;
use App\Models\Clientes;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = Clientes::all();

        Orden::create([
            'cliente_id' => $clientes[0]->id,
            'numero_orden' => 'ORD-001-2026',
            'total' => 2499.97,
            'estado' => 'completada',
            'fecha_entrega' => now()->addDays(3)
        ]);

        Orden::create([
            'cliente_id' => $clientes[1]->id,
            'numero_orden' => 'ORD-002-2026',
            'total' => 1299.99,
            'estado' => 'procesando',
            'fecha_entrega' => now()->addDays(5)
        ]);

        Orden::create([
            'cliente_id' => $clientes[2]->id,
            'numero_orden' => 'ORD-003-2026',
            'total' => 849.97,
            'estado' => 'pendiente',
            'fecha_entrega' => now()->addDays(7)
        ]);

        Orden::create([
            'cliente_id' => $clientes[3]->id,
            'numero_orden' => 'ORD-004-2026',
            'total' => 679.96,
            'estado' => 'completada',
            'fecha_entrega' => now()->addDays(2)
        ]);

        Orden::create([
            'cliente_id' => $clientes[4]->id,
            'numero_orden' => 'ORD-005-2026',
            'total' => 3249.95,
            'estado' => 'procesando',
            'fecha_entrega' => now()->addDays(6)
        ]);

        Orden::create([
            'cliente_id' => $clientes[0]->id,
            'numero_orden' => 'ORD-006-2026',
            'total' => 399.98,
            'estado' => 'cancelada',
            'fecha_entrega' => now()->addDays(4)
        ]);

        Orden::create([
            'cliente_id' => $clientes[1]->id,
            'numero_orden' => 'ORD-007-2026',
            'total' => 1579.94,
            'estado' => 'pendiente',
            'fecha_entrega' => now()->addDays(8)
        ]);
    }
}
