@extends('adminlte::page')

@section('title', 'Ver Producto')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-box"></i> Datos del Producto</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card border-cyan">
                <div class="card-header">
                    <h3 class="card-title text-cyan">Información del Producto</h3>
                    <div class="card-tools">
                        <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('producto.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9"><span class="badge badge-success">{{ $producto->id }}</span></dd>

                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9"><strong>{{ $producto->nombre }}</strong></dd>

                        <dt class="col-sm-3">Descripción:</dt>
                        <dd class="col-sm-9">{{ $producto->descripcion }}</dd>

                        <dt class="col-sm-3">Precio:</dt>
                        <dd class="col-sm-9"><span class="badge badge-success">${{ number_format($producto->precio, 2) }}</span></dd>

                        <dt class="col-sm-3">Stock:</dt>
                        <dd class="col-sm-9">
                            @if($producto->stock > 10)
                                <span class="badge badge-success">{{ $producto->stock }} unidades</span>
                            @elseif($producto->stock > 0)
                                <span class="badge badge-warning">{{ $producto->stock }} unidades</span>
                            @else
                                <span class="badge badge-danger">Agotado</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3">Fecha Registro:</dt>
                        <dd class="col-sm-9">{{ $producto->created_at->format('d/m/Y H:i') }}</dd>

                        <dt class="col-sm-3">Última Actualización:</dt>
                        <dd class="col-sm-9">{{ $producto->updated_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop
