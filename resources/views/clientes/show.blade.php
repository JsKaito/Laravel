@extends('adminlte::page')

@section('title', 'Ver Cliente')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-user"></i> Datos del Cliente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card border-cyan">
                <div class="card-header">
                    <h3 class="card-title text-cyan">Información del Cliente</h3>
                    <div class="card-tools">
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9"><span class="badge badge-info">{{ $cliente->id }}</span></dd>

                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9"><strong>{{ $cliente->nombre }} {{ $cliente->apellido }}</strong></dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9"><i class="fas fa-envelope text-cyan"></i> {{ $cliente->email }}</dd>

                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9"><i class="fas fa-phone text-cyan"></i> {{ $cliente->telefono ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Dirección:</dt>
                        <dd class="col-sm-9">{{ $cliente->direccion ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Fecha Registro:</dt>
                        <dd class="col-sm-9">{{ $cliente->created_at->format('d/m/Y H:i') }}</dd>

                        <dt class="col-sm-3">Última Actualización:</dt>
                        <dd class="col-sm-9">{{ $cliente->updated_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop