@extends('layouts.publica')

@section('titulo', $redes[$red] . ' - CONAPDIS')

@php
$colores = [
    'instagram' => 'linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888)',
    'facebook' => '#1877f2',
    'tiktok' => '#000000',
    'youtube' => '#ff0000',
    'telegram' => '#0088cc',
];
@endphp

@section('estilos')
<style>
.red-cuenta-circulo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 0.5rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.red-cuenta-destacada {
    width: 90px;
    height: 90px;
}
.red-cuenta-circulo:hover {
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}
</style>
@endsection

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <div style="width: 55px; height: 55px; background: {{ $colores[$red] ?? '#003097' }}; border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        @if($red == 'instagram')
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        @elseif($red == 'facebook')
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        @elseif($red == 'tiktok')
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>
                        @elseif($red == 'youtube')
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                        @elseif($red == 'telegram')
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2.5L2.5 10.5l5 2.5 3-3 5 5 3-10.5z"></path><path d="M7.5 13l2 5 3-3"></path></svg>
                        @endif
                    </div>
                    <div>
                        <h1 class="pagina-titulo mb-0" style="border: none; padding: 0;">{{ $redes[$red] }}</h1>
                        <p class="pagina-subtitulo mb-0">Cuentas oficiales de CONAPDIS en {{ $redes[$red] }}</p>
                    </div>
                </div>

                @if($cuentas->count() > 0)
                    @php $destacadas = $cuentas->where('destacado', true); $normales = $cuentas->where('destacado', false); @endphp

                    @if($destacadas->count() > 0)
                    <div class="row justify-content-center mb-4">
                        @foreach($destacadas as $cuenta)
                        <div class="col-6 col-md-4 col-lg-3 text-center">
                            <a href="{{ $cuenta->vinculo }}" target="_blank" class="text-decoration-none d-inline-block">
                                <div class="red-cuenta-circulo red-cuenta-destacada" style="background: {{ $colores[$red] }};">
                                    @if($red == 'instagram')
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                                    @elseif($red == 'facebook')
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                    @elseif($red == 'tiktok')
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>
                                    @elseif($red == 'youtube')
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                                    @elseif($red == 'telegram')
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2.5L2.5 10.5l5 2.5 3-3 5 5 3-10.5z"></path><path d="M7.5 13l2 5 3-3"></path></svg>
                                    @endif
                                </div>
                                <span style="font-size: 0.85rem; color: #1f2937; font-weight: 600;">{{ $cuenta->nombre_cuenta }}</span>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <hr style="margin: 1.5rem 0;">
                    @endif

                    <div class="row g-4">
                        @foreach($normales as $cuenta)
                        <div class="col-6 col-md-4 col-lg-2 text-center">
                            <a href="{{ $cuenta->vinculo }}" target="_blank" class="text-decoration-none d-inline-block">
                                <div class="red-cuenta-circulo" style="background: {{ $colores[$red] }};">
                                    @if($red == 'instagram')
                                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                                    @elseif($red == 'facebook')
                                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                    @elseif($red == 'tiktok')
                                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>
                                    @elseif($red == 'youtube')
                                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                                    @elseif($red == 'telegram')
                                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2.5L2.5 10.5l5 2.5 3-3 5 5 3-10.5z"></path><path d="M7.5 13l2 5 3-3"></path></svg>
                                    @endif
                                </div>
                                <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">{{ $cuenta->nombre_cuenta }}</span>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @else
                <div class="text-center py-5">
                    <p class="text-muted fs-5">No hay cuentas registradas para {{ $redes[$red] }}.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection