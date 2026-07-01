@extends('layouts.publica')

@section('titulo', 'Acceso denegado')

@section('contenido')
<section class="pagina-institucional py-5">
    <div class="container text-center">
        {{-- Icono de candado --}}
        <div class="mb-4">
            <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="#ef172f" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.9;">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                <circle cx="12" cy="16" r="1"></circle>
                <line x1="12" y1="16" x2="12" y2="18"></line>
            </svg>
        </div>
        
        <div style="font-size: 8rem; font-weight: 900; color: #ef172f; line-height: 1; opacity: 0.15; margin-top: -100px; margin-bottom: -40px;">403</div>
        
        <h1 class="pagina-titulo mb-3" style="border: none; text-align: center; color: #ef172f;">Acceso denegado</h1>
        
        <p class="pagina-subtitulo mb-2" style="font-size: 1.2rem; color: #1f2937;">
            No tienes permiso para acceder a esta sección.
        </p>
        
        <p class="text-muted mb-4" style="font-size: 0.95rem;">
            Esta área es exclusiva para administradores. Si crees que deberías tener acceso, contacta al administrador del sistema.
        </p>
        
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('publico.home') }}" class="btn-conapdis btn-azul">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.4rem;">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Ir al inicio
            </a>
            
            @auth
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary" style="border-radius: 50px; padding: 0.65rem 2rem; font-weight: 600;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.4rem;">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                Ir al panel
            </a>
            @endauth
        </div>
    </div>
</section>
@endsection