@extends('layouts.admin')

@section('titulo', 'Usuarios')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Usuarios del Sistema</h2>
        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary rounded-pill">+ Nuevo Usuario</a>
    </div>

    @include('partials.admin.filtros')

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
                            <th>Cédula</th>
                            <th>Cargo</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $usuario)
                        <tr>
                            <td class="ps-4">{{ $usuario->nombre_completo }}</td>
                            <td>{{ $usuario->cedula }}</td>
                            <td>{{ $usuario->cargo ?? '—' }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                @if($usuario->rol)
                                    @if($usuario->rol->es_admin)
                                    <span class="badge bg-danger">{{ $usuario->rol->nombre }}</span>
                                    @else
                                    <span class="badge bg-info">{{ $usuario->rol->nombre }}</span>
                                    @endif
                                @else
                                <span class="badge bg-secondary">Sin rol</span>
                                @endif
                            </td>
                            <td>
                                @if($usuario->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="btn btn-sm btn-outline-primary rounded-pill">Editar</a>
                                @if($usuario->id !== auth()->id())
                                <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center py-4 text-muted">No hay usuarios registrados</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $usuarios->links() }}</div>
</div>
@endsection