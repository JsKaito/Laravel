@extends('adminlte::page')

@section('title', 'Crear Proveedor')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-plus-circle"></i> Crear Nuevo Proveedor</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card border-cyan">
                <div class="card-header">
                    <h3 class="card-title text-cyan"><i class="fas fa-truck"></i> Datos del Proveedor</h3>
                </div>
                <form action="{{ route('proveedor.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Distribuidora XYZ" required>
                            @error('nombre')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contacto">Contacto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('contacto') is-invalid @enderror" 
                                   id="contacto" name="contacto" value="{{ old('contacto') }}" placeholder="Nombre del contacto" required>
                            @error('contacto')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" placeholder="proveedor@ejemplo.com" required>
                            @error('email')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                                   id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="+1 234 567 8900" required>
                            @error('telefono')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control @error('ciudad') is-invalid @enderror" 
                                   id="ciudad" name="ciudad" value="{{ old('ciudad') }}" placeholder="Ej: Madrid">
                            @error('ciudad')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pais">País</label>
                            <input type="text" class="form-control @error('pais') is-invalid @enderror" 
                                   id="pais" name="pais" value="{{ old('pais') }}" placeholder="Ej: España">
                            @error('pais')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                        <a href="{{ route('proveedor.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
