@extends('adminlte::page')

@section('title', 'Editar Orden')

@section('content_header')
    <h1 class="text-cyan"><i class="fas fa-edit"></i> Editar Orden</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card border-cyan">
            <div class="card-header">
                <h3 class="card-title text-cyan">Formulario de Edición</h3>
            </div>
            <form action="{{ route('orden.update', $orden->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="form-group">
                        <label for="cliente_id">Cliente <span class="text-danger">*</span></label>
                        <select class="form-control @error('cliente_id') is-invalid @enderror" 
                                id="cliente_id" name="cliente_id" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id', $orden->cliente_id) == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="numero_orden">Número de Orden <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('numero_orden') is-invalid @enderror" 
                            id="numero_orden" name="numero_orden" value="{{ old('numero_orden', $orden->numero_orden) }}" required>
                        @error('numero_orden')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="total">Total <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control @error('total') is-invalid @enderror" 
                            id="total" name="total" value="{{ old('total', $orden->total) }}" required>
                        @error('total')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado <span class="text-danger">*</span></label>
                        <select class="form-control @error('estado') is-invalid @enderror" 
                                id="estado" name="estado" required>
                            <option value="pendiente" {{ old('estado', $orden->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="procesando" {{ old('estado', $orden->estado) == 'procesando' ? 'selected' : '' }}>Procesando</option>
                            <option value="completada" {{ old('estado', $orden->estado) == 'completada' ? 'selected' : '' }}>Completada</option>
                            <option value="cancelada" {{ old('estado', $orden->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                        @error('estado')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_entrega">Fecha de Entrega</label>
                        <input type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" 
                            id="fecha_entrega" name="fecha_entrega" value="{{ old('fecha_entrega', $orden->fecha_entrega) }}">
                        @error('fecha_entrega')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                    <a href="{{ route('orden.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
