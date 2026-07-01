<header class="conapdis-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-4 header-logo-left">
                <a href="{{ route('publico.home') }}" tabindex="-1">
                    <img src="{{ asset('images/logos/presidencia.png') }}" alt="Presidencia de Venezuela">
                </a>
            </div>
            <div class="col-4 header-logo-center">
                <a href="{{ route('publico.home') }}" tabindex="-1">
                    <img src="{{ asset('images/logos/logo-conapdis.png') }}" alt="Logo CONAPDIS">
                </a>
            </div>
            <div class="col-4 header-logo-right">
                <a href="{{ route('publico.home') }}" tabindex="-1">
                    <img src="{{ asset('images/logos/bicentenario.png') }}" alt="Bicentenario">
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Menú de navegación -->
<nav class="conapdis-navbar navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConapdis" aria-controls="navbarConapdis" aria-expanded="false" aria-label="Menú">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarConapdis">
            <ul class="conapdis-menu me-auto">
                <li><a href="{{ route('publico.home') }}" class="{{ request()->routeIs('publico.home') ? 'active' : '' }}">Inicio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle {{ request()->routeIs('publico.institucion.*') ? 'active' : '' }}" role="button" data-bs-toggle="dropdown">Institución</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('publico.institucion.mision') }}">Misión</a></li>
                        <li><a href="{{ route('publico.institucion.vision') }}">Visión</a></li>
                        <li><a href="{{ route('publico.institucion.resena') }}">Reseña histórica</a></li>
                        <li><a href="{{ route('publico.institucion.principios') }}">Principios y Valores</a></li>
                        <li><a href="{{ route('publico.institucion.marco-juridico') }}">Marco Jurídico</a></li>
                        <li><a href="{{ route('publico.institucion.organigrama') }}">Organigrama</a></li>
                        <li><a href="{{ route('publico.institucion.agenda') }}">Agenda Institucional</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle {{ request()->routeIs('publico.servicios.*') ? 'active' : '' }}" role="button" data-bs-toggle="dropdown">Servicios</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('publico.servicios.index') }}" style="color: var(--amarillo) !important; font-weight: 600;">Ver todos los servicios</a></li>
                        <li class="border-top mt-1 pt-1"><a href="{{ route('publico.servicios.registro') }}">Registro y Certificación</a></li>
                        <li><a href="{{ route('publico.servicios.fiscalizacion') }}">Fiscalización</a></li>
                        <li><a href="{{ route('publico.servicios.gestion-social') }}">Gestión Social</a></li>
                        <li><a href="{{ route('publico.servicios.atencion-ciudadano') }}">Atención al Ciudadano</a></li>
                        <li><a href="{{ route('publico.servicios.gestion-estadal') }}">Gestión Estadal y Municipal</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown">CONAPDIS en Línea</a>
                    <ul class="dropdown-menu">
                        @php $enlacesMenu = App\Models\EnlaceMenu::where('activo', true)->orderBy('orden', 'asc')->get(); @endphp
                        @forelse($enlacesMenu as $enlace)
                        <li><a href="{{ $enlace->vinculo }}" target="_blank">{{ $enlace->titulo }}</a></li>
                        @empty
                        <li><a href="#">No hay enlaces disponibles</a></li>
                        @endforelse
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle {{ request()->routeIs('publico.noticias*') ? 'active' : '' }}" role="button" data-bs-toggle="dropdown">Noticias</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('publico.noticias.informa') }}">CONAPDIS Informa</a></li>
                        <li><a href="{{ route('publico.noticias.informa-lsv') }}">CONAPDIS Informa LSV</a></li>
                        <li><a href="{{ route('publico.noticias.conapdito') }}">Conapdito y Conapdita</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('publico.cursos') }}" class="{{ request()->routeIs('publico.cursos*') ? 'active' : '' }}">Formaciones</a></li>
                <li><a href="{{ route('publico.sedes') }}" class="{{ request()->routeIs('publico.sedes') ? 'active' : '' }}">Sedes</a></li>
                <li><a href="{{ route('publico.instituciones') }}" class="{{ request()->routeIs('publico.instituciones') ? 'active' : '' }}">Instituciones Aliadas</a></li>
                <li><a href="{{ route('publico.contactanos') }}" class="{{ request()->routeIs('publico.contactanos') ? 'active' : '' }}">Contáctanos</a></li>
            </ul>
            @php
                $rutaBusqueda = route('publico.noticias');
                $placeholder = 'Buscar noticias...';
                if(request()->routeIs('publico.cursos*')) {
                    $rutaBusqueda = route('publico.cursos');
                    $placeholder = 'Buscar cursos...';
                } elseif(request()->routeIs('publico.noticias*')) {
                    $rutaBusqueda = route('publico.noticias');
                    $placeholder = 'Buscar noticias...';
                }
            @endphp
            <form action="{{ $rutaBusqueda }}" method="GET" class="conapdis-busqueda-form ms-auto">
                <input type="text" name="buscar" placeholder="{{ $placeholder }}" class="conapdis-busqueda-input" value="{{ request('buscar') }}">
                <button type="submit" class="conapdis-busqueda-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Franja Tricolor Venezolana -->
<div class="franja-tricolor">
    <div class="franja-amarilla"></div>
    <div class="franja-azul">
        <div class="estrellas-container">
            <span class="estrella">★</span>
            <span class="estrella">★</span>
            <span class="estrella">★</span>
            <span class="estrella">★</span>
            <span class="estrella">★</span>
            <span class="estrella">★</span>
            <span class="estrella">★</span>
            <span class="estrella">★</span>
        </div>
    </div>
    <div class="franja-roja"></div>
</div>