@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h1 class="text-cyan"><i class="fas fa-users"></i> Clientes</h1>
        </div>
        <div class="col-sm-6 text-right">
            @can('crear-clientes')
            <a href="{{ route('clientes.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> Nuevo Cliente
            </a>
            @endcan
        </div>
    </div>
@stop

@section('content')
<div class="card border-cyan">
    <div class="card-header">
        <h3 class="card-title text-cyan"><i class="fas fa-list"></i> Listado de Clientes</h3>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="fas fa-check-circle"></i> Éxito:</strong> {{ $message }}
            </div>
        @endif

        <div class="table-responsive">
            <table id="tablaClientes" class="table table-striped table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 10%">Foto</th>
                        <th style="width: 20%">Nombre</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 15%">Teléfono</th>
                        <th style="width: 15%">Dirección</th>
                        <th style="width: 15%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td><span class="badge badge-info">{{ $cliente->id }}</span></td>
                            <td>
                                @if($cliente->foto)
                                    <img src="{{ asset('storage/' . $cliente->foto) }}" alt="Foto" class="img-circle" width="40" height="40">
                                @else
                                    <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" alt="Sin foto" class="img-circle" width="40" height="40">
                                @endif
                            </td>
                            <td><strong>{{ $cliente->nombre }} {{ $cliente->apellido }}</strong></td>
                            <td>{{ $cliente->email }}</td>
                            <td><i class="fas fa-phone text-cyan"></i> {{ $cliente->telefono ?? 'N/A' }}</td>
                            <td>{{ Str::limit($cliente->direccion, 15) ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-xs btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('editar-clientes')
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-xs btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                @can('eliminar-clientes')
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('¿Está seguro?')" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="fas fa-inbox"></i> No hay clientes registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $clientes->links() }}
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#tablaClientes').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "search": "Buscar:",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "No hay datos disponibles",
            }
        });
    });
</script>
@stop