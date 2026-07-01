@extends('layouts.publica')

@section('titulo', 'Cursos')

@section('contenido')

<section class="pagina-cursos py-5">
    <div class="container">
        <h1 class="pagina-titulo mb-2">Formaciones Disponibles</h1>
        <p class="pagina-subtitulo mb-5">Explora nuestra oferta de Formaciones</p>
        
        <div class="filtros-bar mb-5 p-4">
            <form action="{{ url()->current() }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar cursos..." value="{{ request('buscar') }}">
                </div>
                <div class="col-md-2">
                    <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}" title="Filtrar por fecha de vigencia">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn-conapdis btn-azul w-100">Aplicar filtros</button>
                </div>
            </form>
        </div>
        
        <div class="row g-4">
            @forelse($cursos as $curso)
            <div class="col-lg-4 col-md-6">
                <div class="curso-card">
                    @if($curso->imagen)
                    <img src="{{ asset('storage/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="curso-img">
                    @else
                    <div class="curso-img-placeholder">
                        <span>📚</span>
                    </div>
                    @endif
                    <div class="curso-info p-3">
                        <h5>{{ $curso->titulo }}</h5>
                        <p class="text-muted small">{{ Str::limit($curso->descripcion, 100) }}</p>
                        <div class="curso-fechas mb-3">
                            <small class="d-block"><strong>Inicio:</strong> {{ $curso->fecha_inicio->format('d-m-Y') }}</small>
                            <small class="d-block"><strong>Final:</strong> {{ $curso->fecha_final->format('d-m-Y') }}</small>
                        </div>
                        <a href="{{ route('publico.cursos.show', $curso->slug) }}" class="btn-conapdis btn-outline-azul w-100 text-center">Ver curso</a>
                        @if($curso->link_curso)
                        <a href="{{ $curso->link_curso }}" target="_blank" class="btn-conapdis btn-azul w-100 text-center mt-2">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                            Acceder al Curso
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <p class="text-muted fs-5">No hay cursos disponibles en este momento</p>
                </div>
            </div>
            @endforelse
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $cursos->links() }}
        </div>
    </div>
</section>

@endsection