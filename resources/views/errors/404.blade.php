@extends('layouts.publica')

@section('titulo', 'Página no encontrada')

@section('contenido')
<section class="pagina-institucional py-5">
    <div class="container text-center">
        <div style="font-size: 8rem; font-weight: 900; color: #003097; line-height: 1;">404</div>
        <h1 class="pagina-titulo mb-3" style="border: none; text-align: center;">Página no encontrada</h1>
        <p class="pagina-subtitulo mb-4">Lo sentimos, la página que buscas no existe o ha sido movida.</p>
        <a href="{{ route('publico.home') }}" class="btn-conapdis btn-azul">Volver al inicio</a>
    </div>
</section>
@endsection