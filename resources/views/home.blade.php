@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Bienvenido, {{ Auth::user()->name }}!</h4>
                    <p>
                        <strong>Rol:</strong> 
                        @foreach(Auth::user()->roles as $role)
                            <span class="badge badge-primary">{{ $role->name }}</span>
                        @endforeach
                    </p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Clientes</span>
                                    <span class="info-box-number">{{ \App\Models\Clientes::count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-box"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Productos</span>
                                    <span class="info-box-number">{{ \App\Models\producto::count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="fas fa-tags"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Categorías</span>
                                    <span class="info-box-number">{{ \App\Models\Categoria::count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Órdenes</span>
                                    <span class="info-box-number">{{ \App\Models\Orden::count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->hasRole('Admin'))
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-shield-alt"></i> <strong>Admin:</strong> Tienes permisos completos (Crear, Editar, Eliminar).
                        </div>
                    @else
                        <div class="alert alert-warning mt-3">
                            <i class="fas fa-user"></i> <strong>Usuario:</strong> Puedes Crear y Editar registros. No tienes permiso para Eliminar.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
