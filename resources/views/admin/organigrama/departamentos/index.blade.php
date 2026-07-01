@extends('layouts.admin')
@section('titulo', 'Departamentos')
@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Departamentos del Organigrama</h2>
        <a href="{{ route('admin.organigrama.departamentos.create') }}" class="btn btn-primary rounded-pill">+ Nuevo Departamento</a>
    </div>

    @include('partials.admin.filtros')

    @if(session('success'))<div class="alert alert-success rounded-3">{{ session('success') }}</div>@endif
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0"><div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #f8fafc;"><tr><th class="ps-4">Color</th><th>Nombre</th><th>Orden</th><th>Estado</th><th class="text-end pe-4">Acciones</th></tr></thead>
                <tbody>
                    @forelse($departamentos as $dep)
                    <tr>
                        <td class="ps-4"><div style="width:30px;height:30px;border-radius:6px;background:{{ $dep->color }};border:2px solid #ffda00;"></div></td>
                        <td>{{ $dep->nombre }}</td><td>{{ $dep->orden }}</td>
                        <td>@if($dep->activo)<span class="badge bg-success">Activo</span>@else<span class="badge bg-secondary">Inactivo</span>@endif</td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.organigrama.departamentos.edit', $dep) }}" class="btn btn-sm btn-outline-primary rounded-pill">Editar</a>
                            <form action="{{ route('admin.organigrama.departamentos.destroy', $dep) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger rounded-pill">Eliminar</button></form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No hay departamentos</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div></div>
    </div>
    <div class="mt-3">{{ $departamentos->links() }}</div>
</div>
@endsection