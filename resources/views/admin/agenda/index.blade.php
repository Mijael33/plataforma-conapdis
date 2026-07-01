@extends('layouts.admin')

@section('titulo', 'Agenda Institucional')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Agenda Institucional</h2>
        <a href="{{ route('admin.agenda.create') }}" class="btn btn-success rounded-pill">+ Nuevo Evento</a>
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
                            <th class="ps-4">Fecha</th>
                            <th>Título</th>
                            <th>Hora</th>
                            <th>Lugar</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($agendas as $evento)
                        <tr>
                            <td class="ps-4">{{ $evento->fecha->format('d-m-Y') }}</td>
                            <td>{{ $evento->titulo }}</td>
                            <td>{{ $evento->hora ?? '-' }}</td>
                            <td>{{ $evento->lugar ?? '-' }}</td>
                            <td>
                                @if($evento->publicado)
                                <span class="badge bg-success">Publicado</span>
                                @else
                                <span class="badge bg-secondary">Oculto</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.agenda.edit', $evento) }}" class="btn btn-sm btn-outline-success rounded-pill">Editar</a>
                                <form action="{{ route('admin.agenda.destroy', $evento) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este evento?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay eventos en la agenda</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $agendas->links() }}</div>
</div>
@endsection