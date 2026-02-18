@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-edit"></i> Editar Producto</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card border-cyan">
            <div class="card-header">
                <h3 class="card-title text-cyan">Formulario de Edición</h3>
            </div>
            <form action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                            id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                        @error('nombre')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                            id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" 
                                id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
                        </div>
                        @error('precio')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                            id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
                        @error('stock')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="imagen"><i class="fas fa-image"></i> Imagen del Producto</label>
                        @if($producto->imagen)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen actual" class="img-thumbnail" width="100">
                                <small class="d-block text-muted">Imagen actual</small>
                            </div>
                        @endif
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('imagen') is-invalid @enderror" 
                                       id="imagen" name="imagen" accept="image/*">
                                <label class="custom-file-label" for="imagen">Seleccionar nueva imagen...</label>
                            </div>
                        </div>
                        <small class="form-text text-muted">Formatos: JPEG, PNG, JPG, GIF. Máximo: 2MB</small>
                        @error('imagen')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="archivo_pdf"><i class="fas fa-file-pdf"></i> Archivo PDF del Producto</label>
                        @if($producto->archivo_pdf)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $producto->archivo_pdf) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-file-pdf"></i> Ver PDF actual
                                </a>
                            </div>
                        @endif
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('archivo_pdf') is-invalid @enderror" 
                                       id="archivo_pdf" name="archivo_pdf" accept=".pdf">
                                <label class="custom-file-label" for="archivo_pdf">Seleccionar nuevo PDF...</label>
                            </div>
                        </div>
                        <small class="form-text text-muted">Formato: PDF. Máximo: 5MB</small>
                        @error('archivo_pdf')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                    <a href="{{ route('producto.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
