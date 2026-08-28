@extends('layouts.admin')

@section('titulo', 'Roles')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Roles del Sistema</h2>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary rounded-pill">+ Nuevo Rol</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success rounded-3">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger rounded-3">{{ session('error') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #f8fafc;">
                        <tr>
                            <th class="ps-4">Nombre</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Usuarios</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $rol)
                        <tr>
                            <td class="ps-4 fw-bold">{{ $rol->nombre }}</td>
                            <td>{{ $rol->descripcion ?? 'Sin descripción' }}</td>
                            <td>
                                @if($rol->es_admin)
                                <span class="badge bg-danger">Admin Total</span>
                                @else
                                <span class="badge bg-info">Personalizado</span>
                                @endif
                            </td>
                            <td>{{ $rol->usuarios()->count() }}</td>
                            <td>
                                @if($rol->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.roles.edit', $rol) }}" class="btn btn-sm btn-outline-primary rounded-pill">Editar</a>
                                <form action="{{ route('admin.roles.destroy', $rol) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar este rol?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay roles creados</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $roles->links() }}</div>
</div>
@endsection