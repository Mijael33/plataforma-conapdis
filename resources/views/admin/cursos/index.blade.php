@extends('layouts.admin')

@section('titulo', 'Cursos')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Cursos</h2>
        <a href="{{ route('admin.cursos.create') }}" class="btn btn-success rounded-pill">+ Nuevo Curso</a>
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
                            <th class="ps-4">Título</th>
                            <th>Inicio</th>
                            <th>Final</th>
                            <th>Video</th>
                            <th>Link Curso</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cursos as $curso)
                        <tr>
                            <td class="ps-4">{{ $curso->titulo }}</td>
                            <td>{{ $curso->fecha_inicio->format('d-m-Y') }}</td>
                            <td>{{ $curso->fecha_final->format('d-m-Y') }}</td>
                            <td>
                                @if($curso->video_url)
                                <span class="badge bg-info">Sí</span>
                                @else
                                <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                @if($curso->link_curso)
                                <span class="badge bg-info">Sí</span>
                                @else
                                <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                @if($curso->publicado)
                                <span class="badge bg-success">Publicado</span>
                                @else
                                <span class="badge bg-secondary">Borrador</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.cursos.edit', $curso) }}" class="btn btn-sm btn-outline-success rounded-pill">Editar</a>
                                <form action="{{ route('admin.cursos.destroy', $curso) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar este curso?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center py-4 text-muted">No hay cursos creados</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $cursos->links() }}</div>
</div>
@endsection