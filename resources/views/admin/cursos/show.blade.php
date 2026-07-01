@extends('layouts.admin')

@section('titulo', $curso->titulo)

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">{{ $curso->titulo }}</h2>
        <div>
            <a href="{{ route('admin.cursos.edit', $curso) }}" class="btn btn-success rounded-pill me-2">Editar</a>
            <a href="{{ route('admin.cursos.index') }}" class="btn btn-outline-secondary rounded-pill">← Volver</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                @if($curso->imagen)
                <img src="{{ asset('storage/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 12px;" class="mb-4">
                @endif
                
                <div class="mb-3">
                    <span class="badge bg-primary me-2">Inicio: {{ $curso->fecha_inicio->format('d-m-Y') }}</span>
                    <span class="badge bg-secondary">Final: {{ $curso->fecha_final->format('d-m-Y') }}</span>
                </div>

                <h5 style="color: #1a3b5d; font-weight: 700;">Descripción</h5>
                <p>{{ $curso->descripcion }}</p>

                @if($curso->contenido)
                <h5 style="color: #1a3b5d; font-weight: 700;" class="mt-4">Contenido</h5>
                <div>{!! $curso->contenido !!}</div>
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <h5 style="color: #1a3b5d; font-weight: 700;">Información</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <strong>Inicio:</strong> {{ $curso->fecha_inicio->format('d-m-Y') }}
                    </li>
                    <li class="mb-2">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <strong>Final:</strong> {{ $curso->fecha_final->format('d-m-Y') }}
                    </li>
                    <li class="mb-2">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="6" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <strong>Estado:</strong>
                        @if($curso->publicado)
                        <span class="badge bg-success">Publicado</span>
                        @else
                        <span class="badge bg-secondary">Borrador</span>
                        @endif
                    </li>
                    @if($curso->video_url)
                    <li class="mb-2">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                        <strong>Video:</strong> Sí
                    </li>
                    @endif
                    @if($curso->link_curso)
                    <li class="mb-2">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                        <strong>Link del Curso:</strong> Sí
                    </li>
                    @endif
                </ul>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 style="color: #1a3b5d; font-weight: 700;">Acciones</h5>
                <a href="{{ route('admin.cursos.edit', $curso) }}" class="btn btn-success w-100 mb-2">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    Editar Curso
                </a>
                <form action="{{ route('admin.cursos.destroy', $curso) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('¿Eliminar este curso?')">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        Eliminar Curso
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection