<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proveedores = Proveedor::paginate(10);
        return view('proveedor.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:proveedores',
            'contacto' => 'required|string|max:255',
            'email' => 'required|email|unique:proveedores',
            'telefono' => 'required|string|max:20',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedor.index')
                         ->with('success', 'Proveedor creado exitosamente.');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedor.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedor.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:proveedores,nombre,' . $proveedor->id,
            'contacto' => 'required|string|max:255',
            'email' => 'required|email|unique:proveedores,email,' . $proveedor->id,
            'telefono' => 'required|string|max:20',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedor.index')
                         ->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedor.index')
                         ->with('success', 'Proveedor eliminado exitosamente.');
    }
}
