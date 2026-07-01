@extends('layouts.publica')

@section('titulo', $titulo ?? 'Noticias')

@section('contenido')

<section class="pagina-noticias py-5">
    <div class="container">
        <h1 class="pagina-titulo mb-2">{{ $titulo ?? 'Últimas Noticias y Archivos' }}</h1>
        <p class="pagina-subtitulo mb-4">Mantente informado sobre las actividades y programas de CONAPDIS</p>
        
        {{-- Barra de filtros --}}
        <div class="filtros-bar mb-5 p-4">
            <form action="{{ url()->current() }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar noticias..." value="{{ request('buscar') }}">
                </div>
                <div class="col-md-3">
                    <select name="categoria" class="form-select">
                        <option value="">Todas las categorías</option>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat }}" {{ request('categoria') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn-conapdis btn-azul w-100">Aplicar filtros</button>
                </div>
            </form>
        </div>
        
        {{-- Grid de noticias --}}
        <div class="row g-4">
            @forelse($noticias as $noticia)
            <div class="col-lg-4 col-md-6">
                <div class="noticia-card">
                    @if($noticia->imagen)
                    <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}" class="noticia-img">
                    @else
                    <div class="noticia-img-placeholder">
                        <span>CONAPDIS</span>
                    </div>
                    @endif
                    <div class="noticia-info p-3">
                        <div class="mb-2">
                            <span class="noticia-categoria">{{ $noticia->categoria }}</span>
                            <span class="noticia-fecha">{{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->format('d-m-Y') : '' }}</span>
                        </div>
                        <h5>{{ $noticia->titulo }}</h5>
                        <p>{{ Str::limit($noticia->extracto, 100) }}</p>
                        <a href="{{ route('publico.noticia.show', $noticia->slug) }}" class="leer-mas-link">Leer más →</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <p class="text-muted fs-5">No se encontraron noticias</p>
                </div>
            </div>
            @endforelse
        </div>
        
        {{-- Paginación --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $noticias->links() }}
        </div>
    </div>
</section>

@endsection