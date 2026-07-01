@extends('layouts.publica')

@section('titulo', $curso->titulo)

@section('contenido')

<section class="pagina-curso-detalle py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($curso->imagen)
                <img src="{{ asset('storage/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="curso-detalle-img mb-4">
                @endif
                
                <h1 class="curso-detalle-titulo mb-3">{{ $curso->titulo }}</h1>
                
                <div class="curso-fechas-detalle mb-4">
                    <span class="badge bg-primary me-2">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -2px; margin-right: 0.2rem;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg>
                        Inicio: {{ $curso->fecha_inicio->format('d-m-Y') }}
                    </span>
                    <span class="badge bg-secondary">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -2px; margin-right: 0.2rem;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg>
                        Final: {{ $curso->fecha_final->format('d-m-Y') }}
                    </span>
                </div>
                
                @if($curso->link_curso)
                <div class="text-center mb-4">
                    <a href="{{ $curso->link_curso }}" target="_blank" class="btn-conapdis btn-azul" style="font-size: 1.1rem; padding: 0.8rem 2.5rem;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.5rem;">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                        </svg>
                        Acceder al Curso
                    </a>
                </div>
                @endif
                
                @if($curso->video_url)
                <div class="curso-video mb-4">
                    <h5 class="mb-3">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                        Video del Curso
                    </h5>
                    @php
                        function getYouTubeId($url) {
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);
                            return $matches[1] ?? null;
                        }
                        $videoId = getYouTubeId($curso->video_url);
                    @endphp
                    @if($videoId)
                    <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}" title="Video del curso" allowfullscreen></iframe>
                    </div>
                    @else
                    <a href="{{ $curso->video_url }}" target="_blank" class="btn btn-outline-primary rounded-pill">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                        Ver Video
                    </a>
                    @endif
                </div>
                @endif
                
                <div class="curso-detalle-descripcion mb-4">
                    <p>{{ $curso->descripcion }}</p>
                </div>
                
                @if($curso->contenido)
                <div class="curso-detalle-contenido">
                    {!! $curso->contenido !!}
                </div>
                @endif
                
                <a href="{{ route('publico.cursos') }}" class="btn-fames btn-outline-azul mt-4">← Volver a cursos</a>
            </div>
            
            <div class="col-lg-4">
                <div class="sidebar-card">
                    <h4 class="sidebar-titulo">Información del Curso</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <strong>Inicio:</strong> {{ $curso->fecha_inicio->format('d-m-Y') }}
                        </li>
                        <li class="mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <strong>Final:</strong> {{ $curso->fecha_final->format('d-m-Y') }}
                        </li>
                        @if($curso->video_url)
                        <li class="mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.4rem;"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                            <strong>Video:</strong>
                            <a href="{{ $curso->video_url }}" target="_blank" class="d-block mt-1 text-break">Ver en YouTube</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection