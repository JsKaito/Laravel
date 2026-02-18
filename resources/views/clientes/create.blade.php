@extends('adminlte::page')

@section('title', 'Crear Cliente')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-user-plus"></i> Crear Nuevo Cliente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card border-cyan">
                <div class="card-header">
                    <h3 class="card-title text-cyan"><i class="fas fa-user-plus"></i> Datos del Cliente</h3>
                </div>
                <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Juan" required>
                            @error('nombre')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellido <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" 
                                   id="apellido" name="apellido" value="{{ old('apellido') }}" placeholder="Ej: Pérez" required>
                            @error('apellido')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required>
                            @error('email')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                                   id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="+1 234 567 8900">
                            @error('telefono')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea class="form-control @error('direccion') is-invalid @enderror" 
                                      id="direccion" name="direccion" rows="3" placeholder="Calle, número, ciudad">{{ old('direccion') }}</textarea>
                            @error('direccion')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto"><i class="fas fa-camera"></i> Foto del Cliente</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" 
                                           id="foto" name="foto" accept="image/*">
                                    <label class="custom-file-label" for="foto">Seleccionar imagen...</label>
                                </div>
                            </div>
                            <small class="form-text text-muted">Formatos: JPEG, PNG, JPG, GIF. Máximo: 2MB</small>
                            @error('foto')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-save"></i> Guardar
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