@extends('layouts.admin')

@section('titulo', 'Noticias')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Noticias</h2>
        <a href="{{ route('admin.noticias.create') }}" class="btn btn-primary rounded-pill">+ Nueva Noticia</a>
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
                            <th>Categoría</th>
                            <th>Banner</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($noticias as $noticia)
                        <tr>
                            <td class="ps-4">{{ $noticia->titulo }}</td>
                            <td><span class="badge bg-primary">{{ $noticia->categoria }}</span></td>
                            <td>
                                @if($noticia->destacado_banner)
                                <span class="badge" style="background: #ffda00; color: #003097;">🌟 Destacada</span>
                                @else
                                <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>{{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->format('d-m-Y') : 'Sin fecha' }}</td>
                            <td>
                                @if($noticia->publicado)
                                <span class="badge bg-success">Publicado</span>
                                @else
                                <span class="badge bg-secondary">Borrador</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.noticias.edit', $noticia) }}" class="btn btn-sm btn-outline-primary rounded-pill">Editar</a>
                                <form action="{{ route('admin.noticias.destroy', $noticia) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta noticia?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay noticias creadas</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $noticias->links() }}</div>
</div>
@endsection