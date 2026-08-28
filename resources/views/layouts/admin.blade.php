<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>Panel Administrativo - CONAPDIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/conapdis.css') }}" rel="stylesheet">
    @yield('estilos')
</head>
<body class="admin-body">
    <script>
        history.pushState(null, '', location.href);
        window.addEventListener('popstate', function() {
            history.pushState(null, '', location.href);
        });
    </script>
    <div class="admin-wrapper">
        @include('partials.admin.sidebar')
        <div class="admin-content">
            @include('partials.admin.navbar')
            
            {{-- Menú móvil --}}
            <div class="admin-mobile-nav d-md-none" style="background: #003097; padding: 0.5rem 1rem;">
                <button class="btn btn-sm" style="color: #ffda00; border: 1px solid #ffda00;" type="button" data-bs-toggle="collapse" data-bs-target="#adminMobileMenu">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    Menú de navegación
                </button>
                <div class="collapse mt-2" id="adminMobileMenu">
                    <nav style="background: #001e5c; border-radius: 8px; padding: 0.5rem; max-height: 60vh; overflow-y: auto;">
                        
                        {{-- Dashboard - solo si tiene permiso --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('dashboard', 'ver_metricas') || auth()->user()->tienePermiso('dashboard', 'gestionar_mantenimiento'))
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.dashboard') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            Panel de Control
                        </a>
                        @endif

                        {{-- Programas de Noticias --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('programas_noticias', 'ver'))
                        <a href="{{ route('admin.programas-noticias.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.programas-noticias.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                            Programas de Noticias
                        </a>
                        @endif

                        {{-- Noticias --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('noticias', 'ver'))
                        <a href="{{ route('admin.noticias.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.noticias.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1"></path><path d="M19 22a2 2 0 0 0 2-2V8l-6-6H5"></path><line x1="16" y1="2" x2="16" y2="8"></line><line x1="8" y1="13" x2="16" y2="13"></line></svg>
                            Noticias
                        </a>
                        @endif

                        {{-- Cursos --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('cursos', 'ver'))
                        <a href="{{ route('admin.cursos.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.cursos.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path><line x1="8" y1="7" x2="16" y2="7"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                            Cursos
                        </a>
                        @endif

                        {{-- Testimonios --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('testimonios', 'ver'))
                        <a href="{{ route('admin.testimonios.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.testimonios.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            Testimonios
                        </a>
                        @endif

                        {{-- Agenda --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('agenda', 'ver'))
                        <a href="{{ route('admin.agenda.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.agenda.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            Agenda
                        </a>
                        @endif

                        {{-- Marco Jurídico --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('marco_juridico', 'ver'))
                        <a href="{{ route('admin.marco-juridico.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.marco-juridico.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                            Marco Jurídico
                        </a>
                        @endif

                        {{-- Línea de Tiempo --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('linea_tiempo', 'ver'))
                        <a href="{{ route('admin.linea-tiempo.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.linea-tiempo.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Línea de Tiempo
                        </a>
                        @endif

                        {{-- Departamentos --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('departamentos', 'ver'))
                        <a href="{{ route('admin.organigrama.departamentos.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.organigrama.departamentos.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            Departamentos
                        </a>
                        @endif

                        {{-- Personas --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('personas', 'ver'))
                        <a href="{{ route('admin.organigrama.personas.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.organigrama.personas.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            Personas
                        </a>
                        @endif

                        {{-- Redes Sociales --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('redes', 'ver'))
                        <a href="{{ route('admin.redes.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.redes.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                            Redes Sociales
                        </a>
                        @endif

                        {{-- Enlaces --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('enlaces', 'ver'))
                        <a href="{{ route('admin.enlaces.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.enlaces.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                            CONAPDIS en Línea
                        </a>
                        @endif

                        {{-- Instituciones --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('instituciones', 'ver'))
                        <a href="{{ route('admin.instituciones.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.instituciones.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            Instituciones Aliadas
                        </a>
                        @endif

                        {{-- Coordinaciones --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('coordinaciones', 'ver'))
                        <a href="{{ route('admin.coordinaciones.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.coordinaciones.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            Coordinaciones
                        </a>
                        @endif

                        {{-- Puntos de Certificación --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('puntos_certificacion', 'ver'))
                        <a href="{{ route('admin.puntos-certificacion.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.puntos-certificacion.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                            Puntos de Certificación
                        </a>
                        @endif

                        {{-- Usuarios y Roles - solo admin --}}
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.usuarios.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.usuarios.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            Usuarios
                        </a>
                        <a href="{{ route('admin.roles.index') }}" class="d-flex align-items-center gap-2 px-2 py-2 text-decoration-none {{ request()->routeIs('admin.roles.*') ? 'text-warning fw-bold' : 'text-white' }}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path></svg>
                            Roles
                        </a>
                        @endif
                    </nav>
                </div>
            </div>
            
            @if($errors->any())
            <div class="alert alert-danger rounded-3 m-4">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <div class="admin-main p-4">
                @yield('contenido')
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>