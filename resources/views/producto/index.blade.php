@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h1 class="text-cyan"><i class="fas fa-box"></i> Productos</h1>
        </div>
        <div class="col-sm-6 text-right">
            @can('crear-productos')
            <a href="{{ route('producto.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Nuevo Producto
            </a>
            @endcan
        </div>
    </div>
@stop

@section('content')
<div class="card border-cyan">
    <div class="card-header">
        <h3 class="card-title text-cyan"><i class="fas fa-list"></i> Listado de Productos</h3>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="fas fa-check-circle"></i> Éxito:</strong> {{ $message }}
            </div>
        @endif

        <div class="table-responsive">
            <table id="tablaProductos" class="table table-striped table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 8%">Imagen</th>
                        <th style="width: 20%">Nombre</th>
                        <th style="width: 25%">Descripción</th>
                        <th style="width: 10%">Precio</th>
                        <th style="width: 8%">Stock</th>
                        <th style="width: 8%">PDF</th>
                        <th style="width: 16%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($producto as $prod)
                        <tr>
                            <td><span class="badge badge-success">{{ $prod->id }}</span></td>
                            <td>
                                @if($prod->imagen)
                                    <img src="{{ asset('storage/' . $prod->imagen) }}" alt="Imagen" width="40" height="40" class="img-thumbnail">
                                @else
                                    <span class="text-muted"><i class="fas fa-image"></i></span>
                                @endif
                            </td>
                            <td><strong>{{ $prod->nombre }}</strong></td>
                            <td>{{ Str::limit($prod->descripcion, 40) }}</td>
                            <td><span class="badge badge-success">${{ number_format($prod->precio, 2) }}</span></td>
                            <td>
                                @if($prod->stock > 10)
                                    <span class="badge badge-success">{{ $prod->stock }}</span>
                                @elseif($prod->stock > 0)
                                    <span class="badge badge-warning">{{ $prod->stock }}</span>
                                @else
                                    <span class="badge badge-danger">Agotado</span>
                                @endif
                            </td>
                            <td>
                                @if($prod->archivo_pdf)
                                    <a href="{{ asset('storage/' . $prod->archivo_pdf) }}" target="_blank" class="btn btn-xs btn-outline-danger" title="Ver PDF">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('producto.show', $prod->id) }}" class="btn btn-xs btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('editar-productos')
                                <a href="{{ route('producto.edit', $prod->id) }}" class="btn btn-xs btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                @can('eliminar-productos')
                                <form action="{{ route('producto.destroy', $prod->id) }}" method="POST" class="d-inline">
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
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="fas fa-inbox"></i> No hay productos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $producto->links() }}
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#tablaProductos').DataTable({
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
