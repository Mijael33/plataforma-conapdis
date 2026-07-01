@extends('layouts.publica')

@php
$codigo = $exception->getStatusCode() ?? 500;
$mensajes = [
    400 => ['Bad Request', 'Solicitud incorrecta', '#ffda00'],
    401 => ['No autorizado', 'Debes iniciar sesión para acceder', '#ffda00'],
    403 => ['Prohibido', 'No tienes permiso para acceder', '#ef172f'],
    404 => ['Página no encontrada', 'Lo sentimos, la página que buscas no existe', '#003097'],
    419 => ['Sesión expirada', 'Tu sesión ha expirado, vuelve a intentarlo', '#ffda00'],
    429 => ['Demasiadas solicitudes', 'Espera un momento e inténtalo de nuevo', '#ffda00'],
    500 => ['Error del servidor', 'Ha ocurrido un error inesperado', '#ef172f'],
    503 => ['Servicio no disponible', 'Estamos en mantenimiento, vuelve pronto', '#003097'],
];
$error = $mensajes[$codigo] ?? ['Error ' . $codigo, 'Ha ocurrido un error inesperado', '#003097'];
@endphp

@section('titulo', $error[0])

@section('contenido')
<section class="pagina-institucional py-5">
    <div class="container text-center">
        <div style="font-size: 8rem; font-weight: 900; color: {{ $error[2] }}; line-height: 1; opacity: 0.8;">{{ $codigo }}</div>
        <h1 class="pagina-titulo mb-3" style="border: none; text-align: center;">{{ $error[0] }}</h1>
        <p class="pagina-subtitulo mb-4">{{ $error[1] }}</p>
        <a href="{{ route('publico.home') }}" class="btn-conapdis btn-azul">Volver al inicio</a>
    </div>
</section>
@endsection