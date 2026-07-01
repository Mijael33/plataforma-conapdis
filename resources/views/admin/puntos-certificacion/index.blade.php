@extends('layouts.admin')

@section('titulo', 'Puntos de Certificación')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Puntos de Certificación</h2>
        <a href="{{ route('admin.puntos-certificacion.create') }}" class="btn btn-success rounded-pill">+ Nuevo Punto</a>
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
                            <th class="ps-4">Estado</th>
                            <th>Ubicación</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($puntos as $p)
                        <tr>
                            <td class="ps-4"><strong>{{ $p->estado }}</strong></td>
                            <td>{{ Str::limit($p->ubicacion, 60) }}</td>
                            <td>{{ $p->fecha->format('d-m-Y') }}</td>
                            <td>{{ $p->hora ?? '-' }}</td>
                            <td>
                                @if($p->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.puntos-certificacion.edit', $p) }}" class="btn btn-sm btn-outline-success rounded-pill">Editar</a>
                                <form action="{{ route('admin.puntos-certificacion.destroy', $p) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay puntos de certificación registrados</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $puntos->links() }}</div>
</div>
@endsection