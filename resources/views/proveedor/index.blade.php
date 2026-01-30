@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h1 class="text-cyan"><i class="fas fa-truck"></i> Proveedores</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('proveedor.create') }}" class="btn btn-danger">
                <i class="fas fa-plus"></i> Nuevo Proveedor
            </a>
        </div>
    </div>
@stop

@section('content')
<div class="card border-cyan">
    <div class="card-header">
        <h3 class="card-title text-cyan">Listado de Proveedores</h3>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Éxito:</strong> {{ $message }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 20%">Nombre</th>
                        <th style="width: 20%">Contacto</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 15%">Teléfono</th>
                        <th style="width: 10%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $prov)
                        <tr>
                            <td><span class="badge badge-danger">{{ $prov->id }}</span></td>
                            <td><strong>{{ $prov->nombre }}</strong></td>
                            <td>{{ $prov->contacto }}</td>
                            <td><i class="fas fa-envelope"></i> {{ $prov->email }}</td>
                            <td><i class="fas fa-phone"></i> {{ $prov->telefono }}</td>
                            <td>
                                <a href="{{ route('proveedor.show', $prov->id) }}" class="btn btn-xs btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('proveedor.edit', $prov->id) }}" class="btn btn-xs btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('proveedor.destroy', $prov->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('¿Está seguro?')" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fas fa-inbox"></i> No hay proveedores registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
