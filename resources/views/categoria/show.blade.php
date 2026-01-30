@extends('adminlte::page')

@section('title', 'Ver Categoría')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-tag"></i> Datos de la Categoría</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card border-cyan">
                <div class="card-header">
                    <h3 class="card-title text-cyan">Información de la Categoría</h3>
                    <div class="card-tools">
                        <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('categoria.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9"><span class="badge badge-warning">{{ $categoria->id }}</span></dd>

                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9"><strong>{{ $categoria->nombre }}</strong></dd>

                        <dt class="col-sm-3">Descripción:</dt>
                        <dd class="col-sm-9">{{ $categoria->descripcion ?? 'Sin descripción' }}</dd>

                        <dt class="col-sm-3">Fecha Registro:</dt>
                        <dd class="col-sm-9">{{ $categoria->created_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop
