@extends('adminlte::page')

@section('title', 'Ver Proveedor')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-building"></i> Datos del Proveedor</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card border-cyan">
                <div class="card-header">
                    <h3 class="card-title text-cyan">Información del Proveedor</h3>
                    <div class="card-tools">
                        @can('editar-proveedores')
                        <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        @endcan
                        <a href="{{ route('proveedor.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9"><span class="badge badge-danger">{{ $proveedor->id }}</span></dd>

                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9"><strong>{{ $proveedor->nombre }}</strong></dd>

                        <dt class="col-sm-3">Contacto:</dt>
                        <dd class="col-sm-9">{{ $proveedor->contacto }}</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9"><i class="fas fa-envelope"></i> {{ $proveedor->email }}</dd>

                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9"><i class="fas fa-phone"></i> {{ $proveedor->telefono }}</dd>

                        <dt class="col-sm-3">Ciudad:</dt>
                        <dd class="col-sm-9">{{ $proveedor->ciudad ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">País:</dt>
                        <dd class="col-sm-9">{{ $proveedor->pais ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Fecha Registro:</dt>
                        <dd class="col-sm-9">{{ $proveedor->created_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop
