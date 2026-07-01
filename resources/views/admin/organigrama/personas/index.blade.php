@extends('layouts.admin')
@section('titulo', 'Personas')
@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Personas del Organigrama</h2>
        <a href="{{ route('admin.organigrama.personas.create') }}" class="btn btn-primary rounded-pill">+ Nueva Persona</a>
    </div>

    @include('partials.admin.filtros')

    @if(session('success'))<div class="alert alert-success rounded-3">{{ session('success') }}</div>@endif
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0"><div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #f8fafc;"><tr><th class="ps-4">Foto</th><th>Nombre</th><th>Departamento</th><th>Cargo</th><th>Orden</th><th>Estado</th><th class="text-end pe-4">Acciones</th></tr></thead>
                <tbody>
                    @forelse($personas as $p)
                    <tr>
                        <td class="ps-4">@if($p->imagen)<img src="{{ asset('storage/'.$p->imagen) }}" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">@else<div style="width:40px;height:40px;border-radius:50%;background:#003097;color:#ffda00;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.8rem;">{{ strtoupper(substr($p->nombre,0,1)) }}</div>@endif</td>
                        <td>{{ $p->nombre }} {{ $p->apellido }}</td>
                        <td>{{ $p->departamento->nombre ?? 'Sin depto' }}</td>
                        <td>{{ $p->cargo }}</td><td>{{ $p->orden }}</td>
                        <td>@if($p->activo)<span class="badge bg-success">Activo</span>@else<span class="badge bg-secondary">Inactivo</span>@endif</td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.organigrama.personas.edit', $p) }}" class="btn btn-sm btn-outline-primary rounded-pill">Editar</a>
                            <form action="{{ route('admin.organigrama.personas.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger rounded-pill">Eliminar</button></form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-4 text-muted">No hay personas registradas</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div></div>
    </div>
    <div class="mt-3">{{ $personas->links() }}</div>
</div>
@endsection