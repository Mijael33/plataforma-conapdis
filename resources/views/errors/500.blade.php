@extends('layouts.publica')

@section('titulo', 'Error del servidor')

@section('contenido')
<section class="pagina-institucional py-5">
    <div class="container text-center">
        <div style="font-size: 8rem; font-weight: 900; color: #ef172f; line-height: 1;">500</div>
        <h1 class="pagina-titulo mb-3" style="border: none; text-align: center;">Error del servidor</h1>
        <p class="pagina-subtitulo mb-4">Ha ocurrido un error inesperado. Por favor, intente de nuevo más tarde.</p>
        <a href="{{ route('publico.home') }}" class="btn-conapdis btn-azul">Volver al inicio</a>
    </div>
</section>
@endsection