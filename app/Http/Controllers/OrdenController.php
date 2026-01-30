<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Clientes;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {
        $ordenes = Orden::with('cliente')->get();
        return view('orden.index', compact('ordenes'));
    }

    public function create()
    {
        $clientes = Clientes::all();
        return view('orden.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'numero_orden' => 'required|string|max:255|unique:ordenes',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,procesando,completada,cancelada',
            'fecha_entrega' => 'nullable|date',
        ]);

        Orden::create($request->all());

        return redirect()->route('orden.index')
                         ->with('success', 'Orden creada exitosamente.');
    }

    public function show(Orden $orden)
    {
        return view('orden.show', compact('orden'));
    }

    public function edit(Orden $orden)
    {
        $clientes = Clientes::all();
        return view('orden.edit', compact('orden', 'clientes'));
    }

    public function update(Request $request, Orden $orden)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'numero_orden' => 'required|string|max:255|unique:ordenes,numero_orden,' . $orden->id,
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,procesando,completada,cancelada',
            'fecha_entrega' => 'nullable|date',
        ]);

        $orden->update($request->all());

        return redirect()->route('orden.index')
                         ->with('success', 'Orden actualizada exitosamente.');
    }

    public function destroy(Orden $orden)
    {
        $orden->delete();

        return redirect()->route('orden.index')
                         ->with('success', 'Orden eliminada exitosamente.');
    }
}
