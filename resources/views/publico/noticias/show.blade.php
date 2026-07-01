@extends('layouts.publica')

@section('titulo', $noticia->titulo)

@section('contenido')

<section class="pagina-noticia-detalle py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($noticia->imagen)
                <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}" class="noticia-detalle-img mb-4">
                @endif
                
                <div class="mb-3">
                    <span class="noticia-categoria">{{ $noticia->categoria }}</span>
                    <span class="noticia-fecha ms-2">{{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->format('d-m-Y') : '' }}</span>
                </div>
                
                <h1 class="noticia-detalle-titulo mb-4">{{ $noticia->titulo }}</h1>
                
                <div class="noticia-detalle-contenido">
                    {!! $noticia->contenido !!}
                </div>
                
                <a href="{{ route('publico.noticias') }}" class="btn-conapdis btn-outline-azul mt-4">← Volver a noticias</a>
            </div>
            
            <div class="col-lg-4">
                <div class="sidebar-card">
                    <h4 class="sidebar-titulo">Noticias Relacionadas</h4>
                    @forelse($relacionadas as $rel)
                    <div class="noticia-relacionada mb-3 pb-3 border-bottom">
                        <a href="{{ route('publico.noticia.show', $rel->slug) }}" class="text-decoration-none">
                            <h6 class="text-dark">{{ $rel->titulo }}</h6>
                            <small class="text-muted">{{ $rel->fecha_publicacion ? $rel->fecha_publicacion->format('d-m-Y') : '' }}</small>
                        </a>
                    </div>
                    @empty
                    <p class="text-muted small">No hay noticias relacionadas</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

@endsection