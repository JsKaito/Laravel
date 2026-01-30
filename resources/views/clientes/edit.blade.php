@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-user-edit"></i> Editar Cliente</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card border-cyan">
            <div class="card-header">
                <h3 class="card-title text-cyan">Formulario de Edición</h3>
            </div>
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                            id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
                        @error('nombre')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" 
                            id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" required>
                        @error('apellido')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
                        @error('email')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                            id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}">
                        @error('telefono')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea class="form-control @error('direccion') is-invalid @enderror" 
                            id="direccion" name="direccion" rows="3">{{ old('direccion', $cliente->direccion) }}</textarea>
                        @error('direccion')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop