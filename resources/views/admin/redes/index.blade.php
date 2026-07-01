@extends('layouts.admin')

@section('titulo', 'Redes Sociales')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Redes Sociales</h2>
        <a href="{{ route('admin.redes.create') }}" class="btn btn-warning rounded-pill">+ Nueva Cuenta</a>
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
                            <th class="ps-4">Red</th>
                            <th>Cuenta</th>
                            <th>Enlace</th>
                            <th>Destacado</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($redes as $rede)
                        <tr>
                            <td class="ps-4"><span class="badge bg-dark">{{ ucfirst($rede->red) }}</span></td>
                            <td>{{ $rede->nombre_cuenta }}</td>
                            <td><a href="{{ $rede->vinculo }}" target="_blank" class="text-truncate d-inline-block" style="max-width: 200px;">{{ $rede->vinculo }}</a></td>
                            <td>{{ $rede->destacado ? '⭐ Sí' : '—' }}</td>
                            <td>
                                @if($rede->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.redes.edit', $rede) }}" class="btn btn-sm btn-outline-warning rounded-pill">Editar</a>
                                <form action="{{ route('admin.redes.destroy', $rede) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay cuentas registradas</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $redes->links() }}</div>
</div>
@endsection