@extends('adminlte::page')

@section('title', 'Ver Orden')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-receipt"></i> Datos de la Orden</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card border-cyan">
                <div class="card-header">
                    <h3 class="card-title text-cyan">Información de la Orden</h3>
                    <div class="card-tools">
                        <a href="{{ route('orden.edit', $orden->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('orden.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9"><span class="badge badge-info">{{ $orden->id }}</span></dd>

                        <dt class="col-sm-3">Número Orden:</dt>
                        <dd class="col-sm-9"><strong>{{ $orden->numero_orden }}</strong></dd>

                        <dt class="col-sm-3">Cliente:</dt>
                        <dd class="col-sm-9">{{ $orden->cliente->nombre }} {{ $orden->cliente->apellido }}</dd>

                        <dt class="col-sm-3">Total:</dt>
                        <dd class="col-sm-9"><span class="badge badge-success">${{ number_format($orden->total, 2) }}</span></dd>

                        <dt class="col-sm-3">Estado:</dt>
                        <dd class="col-sm-9">
                            @if($orden->estado == 'pendiente')
                                <span class="badge badge-warning">Pendiente</span>
                            @elseif($orden->estado == 'procesando')
                                <span class="badge badge-info">Procesando</span>
                            @elseif($orden->estado == 'completada')
                                <span class="badge badge-success">Completada</span>
                            @else
                                <span class="badge badge-danger">Cancelada</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3">Fecha Entrega:</dt>
                        <dd class="col-sm-9">{{ $orden->fecha_entrega ? $orden->fecha_entrega->format('d/m/Y') : 'Pendiente' }}</dd>

                        <dt class="col-sm-3">Fecha Registro:</dt>
                        <dd class="col-sm-9">{{ $orden->created_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop
