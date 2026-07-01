@extends('layouts.publica')

@section('titulo', 'Inicio')

@section('contenido')
{{-- Banner Principal Slider --}}
<section class="conapdis-banner animar-fundido">
    <div id="bannerSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            @if($bannerNoticias->count() > 0)
                @foreach($bannerNoticias as $key => $bn)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-titulo="{{ $bn->titulo }}" data-categoria="{{ $bn->categoria }}" data-extracto="{{ $bn->extracto }}" data-slug="{{ $bn->slug }}">
                    <div class="slide-bg" style="background-image: url('{{ $bn->imagen ? asset('storage/'.$bn->imagen) : asset('images/banner/banner1.jpg') }}');">
                        <div class="banner-overlay">
                            <div class="container">
                                {{-- Escritorio: contenido normal --}}
                                <div class="banner-contenido d-none d-md-block">
                                    <span class="banner-etiqueta">{{ $bn->categoria }}</span>
                                    <h2>{{ $bn->titulo }}</h2>
                                    <p>{{ Str::limit($bn->extracto, 150) }}</p>
                                    <a href="{{ route('publico.noticia.show', $bn->slug) }}" class="btn-conapdis btn-azul">Ver más</a>
                                </div>
                            </div>
                            {{-- Móvil: botón centrado abajo, FUERA del container --}}
                            <div class="d-md-none" style="pointer-events: auto; position: absolute; bottom: 8px; left: 50%; transform: translateX(-50%); z-index: 20;">
                                <button type="button" class="btn-conapdis btn-azul btn-sm" data-bs-toggle="modal" data-bs-target="#bannerModalMovil" style="font-size: 0.8rem; padding: 0.4rem 1.5rem; white-space: nowrap;">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -2px; margin-right: 0.3rem;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                    Acerca de esta Noticia
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="carousel-item active" data-titulo="Bienvenidos a CONAPDIS" data-categoria="INCLUSIÓN" data-extracto="Consejo Nacional para las Personas con Discapacidad, ente rector en políticas de inclusión y garantía de derechos." data-slug="">
                    <div class="slide-bg" style="background-image: url('{{ asset('images/banner/banner1.jpg') }}');">
                        <div class="banner-overlay">
                            <div class="container">
                                <div class="banner-contenido d-none d-md-block">
                                    <span class="banner-etiqueta">INCLUSIÓN</span>
                                    <h2>Bienvenidos a CONAPDIS</h2>
                                    <p>Consejo Nacional para las Personas con Discapacidad, ente rector en políticas de inclusión y garantía de derechos.</p>
                                    <a href="{{ route('publico.noticias') }}" class="btn-conapdis btn-azul">Ver noticias</a>
                                </div>
                            </div>
                            <div class="d-md-none" style="pointer-events: auto; position: absolute; bottom: 8px; left: 50%; transform: translateX(-50%); z-index: 20;">
                                <button type="button" class="btn-conapdis btn-azul btn-sm" data-bs-toggle="modal" data-bs-target="#bannerModalMovil" style="font-size: 0.8rem; padding: 0.4rem 1.5rem; white-space: nowrap;">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -2px; margin-right: 0.3rem;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                    Acerca de esta noticia
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if($bannerNoticias->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        @endif
    </div>
</section>

{{-- Modal ÚNICO para móvil (se actualiza dinámicamente) --}}
<div class="modal fade banner-modal-mobile" id="bannerModalMovil" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: linear-gradient(135deg, #003097, #001e5c); color: #fff; border: 2px solid #ffda00; border-radius: 16px; margin: 1rem;">
            <div class="modal-header border-0 pb-0">
                <span id="bannerModalCategoria" style="background: #ef172f; color: #fff; padding: 4px 12px; border-radius: 4px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;"></span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body pt-2">
                <h5 id="bannerModalTitulo" style="font-weight: 700; font-size: 1.1rem; margin-bottom: 0.5rem;"></h5>
                <p id="bannerModalExtracto" style="font-size: 0.85rem; opacity: 0.9; margin-bottom: 1rem;"></p>
                <a id="bannerModalLink" href="#" class="btn btn-sm" style="background: #ffda00; color: #003097; font-weight: 700; border-radius: 50px; padding: 0.5rem 1.5rem; text-decoration: none;">Ver más</a>
            </div>
        </div>
    </div>
</div>

{{-- Barra de Redes Sociales --}}
<section class="redes-bar animar-entrada">
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
    <div class="text-center mt-3">
        <a href="{{ route('publico.contactanos') }}" class="btn-conapdis btn-azul" style="font-size: 1rem; padding: 0.8rem 2.5rem;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.5rem;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            Contáctanos
        </a>
    </div>
</section>

{{-- Tarjetas de Tipos de Discapacidad --}}
<section class="conapdis-servicios py-5">
    <div class="container">
        <div class="row g-4 justify-content-center discapacidad-grid">
            @php $tipos = [
                ['ruta' => 'publico.discapacidad.intelectual', 'img' => 'discapacidad-intelectual.png', 'titulo' => 'Discapacidad Intelectual y Psicosocial', 'desc' => 'Condiciones que afectan el funcionamiento cognitivo y la conducta adaptativa.'],
                ['ruta' => 'publico.discapacidad.visual', 'img' => 'discapacidad-visual.png', 'titulo' => 'Discapacidad Visual', 'desc' => 'Ausencia total o disminución severa de la percepción lumínica o campo visual.'],
                ['ruta' => 'publico.discapacidad.motora', 'img' => 'discapacidad-motora.png', 'titulo' => 'Discapacidad Física o Motora', 'desc' => 'Alteración del sistema osteoarticular, muscular o nervioso que limita la movilidad.'],
                ['ruta' => 'publico.discapacidad.multiple', 'img' => 'discapacidad-multiple.png', 'titulo' => 'Discapacidad Múltiple', 'desc' => 'Dos o más condiciones simultáneas que generan una situación única y compleja.'],
                ['ruta' => 'publico.discapacidad.auditiva', 'img' => 'discapacidad-auditiva.png', 'titulo' => 'Discapacidad Auditiva', 'desc' => 'Pérdida total o parcial de la capacidad auditiva y la identidad lingüística LSV.'],
            ]; @endphp
            @foreach($tipos as $i => $t)
            <div class="animar-bounce retraso-{{ $i + 1 }}">
                <a href="{{ route($t['ruta']) }}" class="text-decoration-none">
                    <div class="servicio-card">
                        <div class="servicio-icono"><img src="{{ asset('images/'.$t['img']) }}" alt="{{ $t['titulo'] }}" style="width: 80px; height: 80px; object-fit: contain;"></div>
                        <h3>{{ $t['titulo'] }}</h3>
                        <p>{{ $t['desc'] }}</p>
                        <span class="btn-conapdis btn-outline-azul">Ver más</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Sección Últimas Noticias + Sidebar --}}
<section class="conapdis-ultimas-noticias py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 animar-entrada">
            <h2 class="seccion-titulo">Últimas noticias</h2>
            <a href="{{ route('publico.noticias') }}" class="ver-todas-link">Ver todas las noticias →</a>
        </div>
        <div class="row">
            <div class="col-lg-8 animar-entrada-izquierda retraso-2">
                <div class="row g-4">
                    @forelse($noticias as $noticia)
                    <div class="col-md-6">
                        <div class="noticia-card">
                            @if($noticia->imagen)<img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}" class="noticia-img">
                            @else<div class="noticia-img-placeholder"><span>CONAPDIS</span></div>@endif
                            <div class="noticia-info p-3">
                                <div class="mb-2"><span class="noticia-categoria">{{ $noticia->categoria }}</span><span class="noticia-fecha">{{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->format('d-m-Y') : '' }}</span></div>
                                <h5>{{ $noticia->titulo }}</h5>
                                <p>{{ Str::limit($noticia->extracto, 100) }}</p>
                                <a href="{{ route('publico.noticia.show', $noticia->slug) }}" class="leer-mas-link">Leer más →</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12"><p class="text-center text-muted">No hay noticias publicadas aún.</p></div>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-4 animar-entrada-derecha retraso-2">
                <div class="sidebar-card mb-4">
                    <h4 class="sidebar-titulo"><a href="{{ route('publico.institucion.agenda') }}" class="text-decoration-none" style="color: #1a3b5d;">Agenda Institucional</a></h4>
                    <ul class="agenda-lista">
                        @forelse($agenda as $evento)
                        <li><span class="agenda-fecha">{{ $evento->fecha->format('d M') }}</span><div><a href="{{ route('publico.institucion.agenda.show', $evento->slug) }}" class="text-decoration-none" style="color: inherit;"><strong>{{ $evento->titulo }}</strong><small class="d-block text-muted">@if($evento->hora){{ $evento->hora }}@endif @if($evento->lugar) - {{ $evento->lugar }}@endif</small></a></div></li>
                        @empty
                        <li class="text-muted">No hay eventos programados</li>
                        @endforelse
                    </ul>
                    <a href="{{ route('publico.institucion.agenda') }}" class="ver-todas-link mt-2 d-inline-block">Ver agenda completa →</a>
                </div>
                <div class="sidebar-card">
                    <h4 class="sidebar-titulo">Pilares Estratégicos</h4>
                    <ul class="pilares-lista">
                        @foreach(['Inclusión social', 'Derechos PCD', 'Accesibilidad universal', 'Calidad de vida'] as $pilar)
                        <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="20 6 9 17 4 12"></polyline></svg> {{ $pilar }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Testimonios --}}
<section class="conapdis-testimonios py-5">
    <div class="container">
        <h2 class="seccion-titulo text-center mb-5 animar-entrada">Testimonios</h2>
        @if($testimonios->count() > 0)
        <div id="testimoniosCarrusel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner">
                @foreach($testimonios->chunk(3) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="row g-4 justify-content-center">
                        @foreach($chunk as $testimonio)
                        <div class="col-lg-4 col-md-6"><div class="testimonio-card"><p class="testimonio-texto">"{{ $testimonio->testimonio }}"</p><div class="testimonio-autor">@if($testimonio->foto_autor)<img src="{{ asset('storage/' . $testimonio->foto_autor) }}" alt="{{ $testimonio->nombre_autor }}">@else<div class="testimonio-avatar-placeholder">{{ strtoupper(substr($testimonio->nombre_autor, 0, 1)) }}</div>@endif<div><strong>{{ $testimonio->nombre_autor }}</strong><span>{{ $testimonio->cargo_autor }}</span></div></div></div></div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            @if($testimonios->count() > 3)
            <button class="carousel-control-prev testimonios-control-prev" type="button" data-bs-target="#testimoniosCarrusel" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Anterior</span></button>
            <button class="carousel-control-next testimonios-control-next" type="button" data-bs-target="#testimoniosCarrusel" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Siguiente</span></button>
            @endif
        </div>
        @else
        <div class="col-12"><p class="text-center text-muted">No hay testimonios publicados aún.</p></div>
        @endif
    </div>
</section>

{{-- JavaScript --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Animaciones
    const elementosAnimables = document.querySelectorAll('.animar-entrada, .animar-entrada-izquierda, .animar-entrada-derecha, .animar-escala, .animar-bounce, .animar-fundido');
    const configuracion = { root: null, rootMargin: '0px 0px -80px 0px', threshold: 0.1 };
    const observador = new IntersectionObserver((entradas, obs) => {
        entradas.forEach(entrada => { if (entrada.isIntersecting) { entrada.target.classList.add('se-ve-en-pantalla'); obs.unobserve(entrada.target); } });
    }, configuracion);
    elementosAnimables.forEach(elemento => { observador.observe(elemento); });

    // Actualizar modal del banner al cambiar de slide
    const bannerSlider = document.getElementById('bannerSlider');
    if (bannerSlider) {
        function actualizarModalBanner() {
            const activeSlide = bannerSlider.querySelector('.carousel-item.active');
            if (!activeSlide) return;
            
            const titulo = activeSlide.getAttribute('data-titulo');
            const categoria = activeSlide.getAttribute('data-categoria');
            const extracto = activeSlide.getAttribute('data-extracto');
            const slug = activeSlide.getAttribute('data-slug');
            
            document.getElementById('bannerModalTitulo').textContent = titulo;
            document.getElementById('bannerModalCategoria').textContent = categoria;
            document.getElementById('bannerModalExtracto').textContent = extracto;
            
            const link = document.getElementById('bannerModalLink');
            if (slug) {
                link.href = '/noticias/' + slug;
            } else {
                link.href = '/noticias';
            }
        }
        
        actualizarModalBanner();
        bannerSlider.addEventListener('slid.bs.carousel', actualizarModalBanner);
    }
});
</script>
@endsection