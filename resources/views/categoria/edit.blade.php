@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-edit"></i> Editar Categoría</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card border-cyan">
            <div class="card-header">
                <h3 class="card-title text-cyan">Formulario de Edición</h3>
            </div>
            <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                            id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
                        @error('nombre')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                            id="descripcion" name="descripcion" rows="4">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                    <a href="{{ route('categoria.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
