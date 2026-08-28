<aside class="admin-sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('images/logos/logo-conapdis.png') }}" alt="CONAPDIS" class="sidebar-logo">
        <h5>Panel Admin</h5>
    </div>
    
    <nav class="sidebar-nav">
        <ul>
            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('dashboard', 'ver_metricas') || auth()->user()->tienePermiso('dashboard', 'gestionar_mantenimiento'))
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg> Panel de Control
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('programas_noticias', 'ver'))
            <li>
                <a href="{{ route('admin.programas-noticias.index') }}" class="{{ request()->routeIs('admin.programas-noticias.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg> Programas de Noticias
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('noticias', 'ver'))
            <li>
                <a href="{{ route('admin.noticias.index') }}" class="{{ request()->routeIs('admin.noticias.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1"></path><path d="M19 22a2 2 0 0 0 2-2V8l-6-6H5"></path><line x1="16" y1="2" x2="16" y2="8"></line><line x1="8" y1="13" x2="16" y2="13"></line></svg> Noticias
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('cursos', 'ver'))
            <li>
                <a href="{{ route('admin.cursos.index') }}" class="{{ request()->routeIs('admin.cursos.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path><line x1="8" y1="7" x2="16" y2="7"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg> Cursos
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('testimonios', 'ver'))
            <li>
                <a href="{{ route('admin.testimonios.index') }}" class="{{ request()->routeIs('admin.testimonios.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Testimonios
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('agenda', 'ver'))
            <li>
                <a href="{{ route('admin.agenda.index') }}" class="{{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Agenda
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('marco_juridico', 'ver'))
            <li>
                <a href="{{ route('admin.marco-juridico.index') }}" class="{{ request()->routeIs('admin.marco-juridico.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg> Marco Jurídico
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('linea_tiempo', 'ver'))
            <li>
                <a href="{{ route('admin.linea-tiempo.index') }}" class="{{ request()->routeIs('admin.linea-tiempo.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> Línea de Tiempo
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('departamentos', 'ver'))
            <li>
                <a href="{{ route('admin.organigrama.departamentos.index') }}" class="{{ request()->routeIs('admin.organigrama.departamentos.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg> Departamentos
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('personas', 'ver'))
            <li>
                <a href="{{ route('admin.organigrama.personas.index') }}" class="{{ request()->routeIs('admin.organigrama.personas.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg> Personas
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('redes', 'ver'))
            <li>
                <a href="{{ route('admin.redes.index') }}" class="{{ request()->routeIs('admin.redes.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Redes Sociales
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('enlaces', 'ver'))
            <li>
                <a href="{{ route('admin.enlaces.index') }}" class="{{ request()->routeIs('admin.enlaces.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg> CONAPDIS en Línea
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('instituciones', 'ver'))
            <li>
                <a href="{{ route('admin.instituciones.index') }}" class="{{ request()->routeIs('admin.instituciones.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Instituciones Aliadas
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('coordinaciones', 'ver'))
            <li>
                <a href="{{ route('admin.coordinaciones.index') }}" class="{{ request()->routeIs('admin.coordinaciones.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> Coordinaciones
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->tienePermiso('puntos_certificacion', 'ver'))
            <li>
                <a href="{{ route('admin.puntos-certificacion.index') }}" class="{{ request()->routeIs('admin.puntos-certificacion.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg> Puntos de Certificación
                </a>
            </li>
            @endif

            @if(auth()->user()->isAdmin())
            <li class="sidebar-divider"></li>
            <li>
                <a href="{{ route('admin.usuarios.index') }}" class="{{ request()->routeIs('admin.usuarios.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Usuarios
                </a>
            </li>
            <li>
                <a href="{{ route('admin.roles.index') }}" class="{{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path></svg> Roles
                </a>
            </li>
            @endif
        </ul>
    </nav>
    
    <div class="sidebar-footer">
        <a href="{{ route('publico.home') }}" target="_blank" class="btn-visitar-sitio">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> Ver Sitio Web
        </a>
    </div>
</aside>