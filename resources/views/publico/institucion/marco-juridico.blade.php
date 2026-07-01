@extends('layouts.publica')

@section('titulo', 'Marco Jurídico')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <h1 class="pagina-titulo mb-4">Marco Jurídico</h1>
        <p class="pagina-subtitulo mb-5">Leyes, decretos y documentos legales que rigen al CONAPDIS</p>

        @if($leyes->count() > 0)
        <div class="row g-4">
            @foreach($leyes as $ley)
            <div class="col-lg-4 col-md-6">
                <div class="noticia-card h-100">
                    @if($ley->imagen)
                    <img src="{{ asset('storage/' . $ley->imagen) }}" alt="{{ $ley->titulo }}" class="noticia-img">
                    @else
                    <div class="noticia-img-placeholder">
                        <span>📜</span>
                    </div>
                    @endif
                    <div class="noticia-info p-3">
                        <h5>{{ $ley->titulo }}</h5>
                        @if($ley->descripcion)
                        <p>{{ Str::limit($ley->descripcion, 100) }}</p>
                        @endif
                        @if($ley->documento)
                        <a href="{{ asset('storage/' . $ley->documento) }}" target="_blank" class="btn-conapdis btn-outline-azul btn-sm w-100 text-center">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px; margin-right: 0.3rem;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                            Ver documento PDF
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <p class="text-muted fs-5">No hay documentos jurídicos disponibles.</p>
        </div>
        @endif
    </div>
</section>

@endsection