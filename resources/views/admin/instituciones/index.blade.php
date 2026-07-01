@extends('layouts.admin')

@section('titulo', 'Instituciones Aliadas')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Instituciones Aliadas</h2>
        <a href="{{ route('admin.instituciones.create') }}" class="btn btn-warning rounded-pill">+ Nueva Institución</a>
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
                            <th class="ps-4">Logo</th>
                            <th>Nombre</th>
                            <th>Enlace</th>
                            <th>Orden</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($instituciones as $institucione)
                        <tr>
                            <td class="ps-4">
                                @if($institucione->imagen)
                                <img src="{{ asset('storage/'.$institucione->imagen) }}" style="width:40px;height:40px;border-radius:8px;object-fit:cover;">
                                @else
                                <div style="width:40px;height:40px;border-radius:8px;background:#003097;color:#ffda00;display:flex;align-items:center;justify-content:center;font-weight:700;">{{ strtoupper(substr($institucione->nombre,0,1)) }}</div>
                                @endif
                            </td>
                            <td>{{ $institucione->nombre }}</td>
                            <td>{{ $institucione->vinculo ? 'Sí' : '—' }}</td>
                            <td>{{ $institucione->orden }}</td>
                            <td>
                                @if($institucione->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.instituciones.edit', $institucione) }}" class="btn btn-sm btn-outline-warning rounded-pill">Editar</a>
                                <form action="{{ route('admin.instituciones.destroy', $institucione) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay instituciones aliadas</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $instituciones->links() }}</div>
</div>
@endsection