@extends('layouts.publica')

@section('titulo', 'Contáctanos')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <h1 class="pagina-titulo mb-4">Contáctanos</h1>
        
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="sede-card h-100">
                    <h4>Dirección</h4>
                    <div class="sede-icono-texto">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <p>AV. CASANOVA CON CALLE VILLAFLOR EDIF. CENTRO PROFESIONAL DEL ESTE. NIVEL MEZZANINA PARROQUIA, Caracas 1050, Distrito Capital</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sede-card h-100">
                    <h4>Contacto Directo</h4>
                    <div class="sede-icono-texto">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <p><strong>0212-7620039</strong></p>
                    </div>
                    <div class="sede-icono-texto">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <p><strong>0212-7627959</strong></p>
                    </div>
                    <div class="sede-icono-texto mt-3">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <p><strong>conapdis@gmail.com</strong></p>
                    </div>
                    <div class="sede-icono-texto mt-3">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        <p><strong>RIF:</strong> G-200006838</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="seccion-titulo mb-4">Nuestras Redes Sociales</h2>
        <p class="pagina-subtitulo mb-4">Síguenos en todas nuestras plataformas</p>

        <div class="redes-bar" style="background: transparent; border: none;">
            <div class="container">
                @php $redesBarra = ['instagram', 'facebook', 'tiktok', 'youtube', 'telegram']; @endphp
                @foreach($redesBarra as $r)
                <a href="{{ route('publico.redes.show', $r) }}" class="red-social-icono {{ $r }}">
                    <div class="icono-circulo">
                        @if($r == 'instagram')
                        <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        @elseif($r == 'facebook')
                        <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        @elseif($r == 'tiktok')
                        <svg viewBox="0 0 24 24"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>
                        @elseif($r == 'youtube')
                        <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                        @elseif($r == 'telegram')
                        <svg viewBox="0 0 24 24"><path d="M21.5 2.5L2.5 10.5l5 2.5 3-3 5 5 3-10.5z"></path><path d="M7.5 13l2 5 3-3"></path></svg>
                        @endif
                    </div>
                    <span>{{ ucfirst($r) }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection