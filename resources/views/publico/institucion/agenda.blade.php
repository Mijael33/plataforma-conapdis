@extends('layouts.publica')
@section('titulo', 'Agenda Institucional')
@section('contenido')

<section class="pagina-noticias py-5">
    <div class="container">
        <h1 class="pagina-titulo mb-2">Agenda Institucional</h1>
        <p class="pagina-subtitulo mb-5">Calendario de eventos, jornadas y actividades de CONAPDIS</p>
        
        {{-- Barra de filtros --}}
        <div class="filtros-bar mb-5 p-4">
            <form action="{{ url()->current() }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar eventos..." value="{{ request('buscar') }}">
                </div>
                <div class="col-md-2">
                    <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn-conapdis btn-azul w-100">Aplicar filtros</button>
                </div>
            </form>
        </div>
        
        @if($eventos->count() > 0)
        <div class="row g-4">
            @foreach($eventos as $evento)
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('publico.institucion.agenda.show', $evento->slug) }}" class="text-decoration-none">
                    <div class="noticia-card">
                        @if($evento->imagen)
                        <img src="{{ asset('storage/' . $evento->imagen) }}" alt="{{ $evento->titulo }}" class="noticia-img">
                        @else
                        <div class="noticia-img-placeholder">
                            <span>CONAPDIS</span>
                        </div>
                        @endif
                        <div class="noticia-info p-3">
                            <div class="mb-2">
                                <span class="noticia-categoria">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -1px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    {{ $evento->fecha->format('d/m/Y') }}
                                </span>
                                @if($evento->hora)
                                <span class="noticia-fecha ms-2">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -1px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    {{ $evento->hora }}
                                </span>
                                @endif
                            </div>
                            <h5>{{ $evento->titulo }}</h5>
                            <p>{{ Str::limit($evento->extracto ?? $evento->lugar ?? '', 100) }}</p>
                            <span class="leer-mas-link">Ver más →</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $eventos->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <p class="text-muted fs-5">No hay eventos programados en este momento.</p>
        </div>
        @endif
    </div>
</section>

@endsection