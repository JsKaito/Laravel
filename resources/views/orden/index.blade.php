@extends('adminlte::page')

@section('title', 'Órdenes')

@section('content_header')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h1 class="text-cyan"><i class="fas fa-shopping-cart"></i> Órdenes</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('orden.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Nueva Orden
            </a>
        </div>
    </div>
@stop

@section('content')
<div class="card border-cyan">
    <div class="card-header">
        <h3 class="card-title text-cyan">Listado de Órdenes</h3>
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
                        <th style="width: 8%">ID</th>
                        <th style="width: 15%">Número Orden</th>
                        <th style="width: 20%">Cliente</th>
                        <th style="width: 12%">Total</th>
                        <th style="width: 15%">Estado</th>
                        <th style="width: 15%">Entrega</th>
                        <th style="width: 10%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ordenes as $orden)
                        <tr>
                            <td><span class="badge badge-info">{{ $orden->id }}</span></td>
                            <td><strong>{{ $orden->numero_orden }}</strong></td>
                            <td>{{ $orden->cliente->nombre ?? 'N/A' }}</td>
                            <td><span class="badge badge-success">${{ number_format($orden->total, 2) }}</span></td>
                            <td>
                                @if($orden->estado == 'pendiente')
                                    <span class="badge badge-warning">Pendiente</span>
                                @elseif($orden->estado == 'procesando')
                                    <span class="badge badge-info">Procesando</span>
                                @elseif($orden->estado == 'completada')
                                    <span class="badge badge-success">Completada</span>
                                @else
                                    <span class="badge badge-danger">Cancelada</span>
                                @endif
                            </td>
                            <td>{{ $orden->fecha_entrega ? $orden->fecha_entrega->format('d/m/Y') : 'Pendiente' }}</td>
                            <td>
                                <a href="{{ route('orden.show', $orden->id) }}" class="btn btn-xs btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('orden.edit', $orden->id) }}" class="btn btn-xs btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('orden.destroy', $orden->id) }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="fas fa-inbox"></i> No hay órdenes registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
