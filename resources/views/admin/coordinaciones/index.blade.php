@extends('layouts.admin')

@section('titulo', 'Coordinaciones Estadales')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Coordinaciones Estadales</h2>
        <a href="{{ route('admin.coordinaciones.create') }}" class="btn btn-warning rounded-pill">+ Nueva Coordinación</a>
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
                            <th>Dirección</th>
                            <th>Coordinador</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($coordinaciones as $c)
                        <tr>
                            <td class="ps-4"><strong>{{ $c->estado }}</strong></td>
                            <td>{{ Str::limit($c->direccion, 60) }}</td>
                            <td>{{ $c->coordinador }}</td>
                            <td>
                                @if($c->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.coordinaciones.edit', $c) }}" class="btn btn-sm btn-outline-warning rounded-pill">Editar</a>
                                <form action="{{ route('admin.coordinaciones.destroy', $c) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-4 text-muted">No hay coordinaciones registradas</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $coordinaciones->links() }}</div>
</div>
@endsection