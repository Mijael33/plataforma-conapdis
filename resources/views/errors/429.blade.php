@extends('layouts.publica')

@section('titulo', 'Demasiadas solicitudes')

@section('contenido')
<section class="pagina-institucional py-5">
    <div class="container text-center">
        <div style="font-size: 8rem; font-weight: 900; color: #ffda00; line-height: 1; opacity: 0.9;">429</div>
        <h1 class="pagina-titulo mb-3" style="border: none; text-align: center;">Demasiados intentos</h1>
        <p class="pagina-subtitulo mb-2">Has realizado demasiadas solicitudes en poco tiempo.</p>
        <p class="text-muted mb-4">Por seguridad, espera un momento y vuelve a intentarlo.</p>
        <a href="{{ route('publico.home') }}" class="btn-conapdis btn-azul">Volver al inicio</a>
    </div>
</section>
@endsection