@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h1 class="text-cyan"><i class="fas fa-users"></i> Clientes</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('clientes.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Nuevo Cliente
            </a>
        </div>
    </div>
@stop

@section('content')
<div class="card border-cyan">
    <div class="card-header">
        <h3 class="card-title text-cyan"><i class="fas fa-list"></i> Listado de Clientes</h3>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><i class="fas fa-check-circle"></i> Éxito:</strong> {{ $message }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 20%">Nombre</th>
                        <th style="width: 25%">Email</th>
                        <th style="width: 15%">Teléfono</th>
                        <th style="width: 10%">Dirección</th>
                        <th style="width: 10%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td><span class="badge badge-info">{{ $cliente->id }}</span></td>
                            <td><strong>{{ $cliente->nombre }} {{ $cliente->apellido }}</strong></td>
                            <td>{{ $cliente->email }}</td>
                            <td><i class="fas fa-phone text-cyan"></i> {{ $cliente->telefono ?? 'N/A' }}</td>
                            <td>{{ Str::limit($cliente->direccion, 15) ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-xs btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-xs btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
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
                                <i class="fas fa-inbox"></i> No hay clientes registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop