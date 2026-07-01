@extends('layouts.publica')

@section('titulo', 'Sesión expirada')

@section('contenido')
<section class="pagina-institucional py-5">
    <div class="container text-center">
        <div style="font-size: 8rem; font-weight: 900; color: #ffda00; line-height: 1;">419</div>
        <h1 class="pagina-titulo mb-3" style="border: none; text-align: center;">Sesión expirada</h1>
        <p class="pagina-subtitulo mb-4">Tu sesión ha expirado. Por favor, regresa e intenta de nuevo.</p>
        <a href="{{ route('publico.home') }}" class="btn-conapdis btn-azul">Volver al inicio</a>
    </div>
</section>
@endsection