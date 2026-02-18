@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h1 class="text-cyan"><i class="fas fa-tags"></i> Categorías</h1>
        </div>
        <div class="col-sm-6 text-right">
            @can('crear-categorias')
            <a href="{{ route('categoria.create') }}" class="btn btn-warning">
                <i class="fas fa-plus"></i> Nueva Categoría
            </a>
            @endcan
        </div>
    </div>
@stop

@section('content')
<div class="card border-cyan">
    <div class="card-header">
        <h3 class="card-title text-cyan">Listado de Categorías</h3>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Éxito:</strong> {{ $message }}
            </div>
        @endif

        <div class="table-responsive">
            <table id="tablaCategorias" class="table table-striped table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 25%">Nombre</th>
                        <th style="width: 55%">Descripción</th>
                        <th style="width: 15%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categorias as $cat)
                        <tr>
                            <td><span class="badge badge-warning">{{ $cat->id }}</span></td>
                            <td><strong>{{ $cat->nombre }}</strong></td>
                            <td>{{ Str::limit($cat->descripcion, 50) ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('categoria.show', $cat->id) }}" class="btn btn-xs btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('editar-categorias')
                                <a href="{{ route('categoria.edit', $cat->id) }}" class="btn btn-xs btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                @can('eliminar-categorias')
                                <form action="{{ route('categoria.destroy', $cat->id) }}" method="POST" class="d-inline">
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
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="fas fa-inbox"></i> No hay categorías registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $categorias->links() }}
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#tablaCategorias').DataTable({
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
