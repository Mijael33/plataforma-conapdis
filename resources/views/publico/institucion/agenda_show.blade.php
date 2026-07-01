@extends('layouts.publica')

@section('titulo', $evento->titulo)

@section('contenido')

<section class="pagina-noticia-detalle py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($evento->imagen)
                <img src="{{ asset('storage/' . $evento->imagen) }}" alt="{{ $evento->titulo }}" class="noticia-detalle-img mb-4">
                @endif

                <div class="mb-3">
                    <span class="noticia-categoria">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        {{ $evento->fecha->format('d/m/Y') }}
                    </span>
                    @if($evento->hora)
                    <span class="noticia-categoria ms-2">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        {{ $evento->hora }}
                    </span>
                    @endif
                    @if($evento->lugar)
                    <span class="noticia-categoria ms-2">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        {{ $evento->lugar }}
                    </span>
                    @endif
                </div>

                <h1 class="noticia-detalle-titulo mb-4">{{ $evento->titulo }}</h1>

                @if($evento->contenido)
                <div class="noticia-detalle-contenido">
                    {!! $evento->contenido !!}
                </div>
                @elseif($evento->extracto)
                <p class="texto-institucional">{{ $evento->extracto }}</p>
                @endif

                <a href="{{ route('publico.institucion.agenda') }}" class="btn-conapdis btn-outline-azul mt-4">← Volver a la agenda</a>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-card">
                    <h4 class="sidebar-titulo">Detalles del Evento</h4>
                    <ul class="agenda-lista">
                        <li>
                            <span class="agenda-fecha">{{ $evento->fecha->format('d M') }}</span>
                            <div>
                                <strong>Fecha</strong>
                                <small class="d-block text-muted">{{ $evento->fecha->format('d/m/Y') }}</small>
                            </div>
                        </li>
                        @if($evento->hora)
                        <li>
                            <span class="agenda-fecha">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            </span>
                            <div>
                                <strong>Hora</strong>
                                <small class="d-block text-muted">{{ $evento->hora }}</small>
                            </div>
                        </li>
                        @endif
                        @if($evento->lugar)
                        <li>
                            <span class="agenda-fecha">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </span>
                            <div>
                                <strong>Lugar</strong>
                                <small class="d-block text-muted">{{ $evento->lugar }}</small>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="sidebar-card mt-4">
                    <h4 class="sidebar-titulo">Próximos Eventos</h4>
                    @php $proximos = App\Models\Agenda::where('publicado', true)->where('id', '!=', $evento->id)->orderBy('fecha', 'asc')->take(3)->get(); @endphp
                    @forelse($proximos as $prox)
                    <div class="mb-3 pb-3 border-bottom">
                        <a href="{{ route('publico.institucion.agenda.show', $prox->slug) }}" class="text-decoration-none">
                            <h6 class="text-dark">{{ $prox->titulo }}</h6>
                            <small class="text-muted">{{ $prox->fecha->format('d/m/Y') }}</small>
                        </a>
                    </div>
                    @empty
                    <p class="text-muted small">No hay otros eventos</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

@endsection