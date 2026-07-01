@extends('layouts.admin')

@section('titulo', 'Línea de Tiempo')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Línea de Tiempo Histórica</h2>
        <a href="{{ route('admin.linea-tiempo.create') }}" class="btn btn-warning rounded-pill">+ Nuevo Evento</a>
    </div>

    @include('partials.admin.filtros')

    @if(session('success'))
    <div class="alert alert-success rounded-3">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #f8fafc;">
                        <tr>
                            <th class="ps-4">Año</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Orden</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($eventos as $e)
                        <tr>
                            <td class="ps-4"><strong>{{ $e->anio }}</strong></td>
                            <td>{{ $e->titulo }}</td>
                            <td>{{ Str::limit($e->descripcion, 80) }}</td>
                            <td>{{ $e->orden }}</td>
                            <td>
                                @if($e->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.linea-tiempo.edit', $e) }}" class="btn btn-sm btn-outline-warning rounded-pill">Editar</a>
                                <form action="{{ route('admin.linea-tiempo.destroy', $e) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay eventos en la línea de tiempo</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $eventos->links() }}</div>
</div>
@endsection