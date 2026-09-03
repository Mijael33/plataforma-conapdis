@extends('layouts.publica')

@section('titulo', 'Acerca de CONAPDIS')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="pagina-titulo text-center mb-3">Acerca de CONAPDIS</h1>
                <p class="pagina-subtitulo text-center mb-5">Conoce más sobre nuestra institución, misión y marco legal</p>

                {{-- Tarjetas de Términos y Privacidad --}}
                <div class="row g-4 mb-5">
                    <div class="col-lg-6">
                        <a href="{{ route('publico.privacidad') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm rounded-4 h-100" style="transition: all 0.3s; border-left: 5px solid #003097 !important;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="rounded-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #003097, #001e5c);">
                                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffda00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                        </div>
                                        <div>
                                            <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 0;">Política de Privacidad</h3>
                                        </div>
                                    </div>
                                    <p class="text-muted mb-3" style="font-size: 0.9rem;">Conoce cómo protegemos tus datos personales y el manejo que le damos a tu información.</p>
                                    <span class="btn-conapdis btn-outline-azul btn-sm">Leer más →</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ route('publico.terminos') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm rounded-4 h-100" style="transition: all 0.3s; border-left: 5px solid #d97706 !important;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="rounded-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #d97706, #b45309);">
                                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                                        </div>
                                        <div>
                                            <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 0;">Términos y Condiciones</h3>
                                        </div>
                                    </div>
                                    <p class="text-muted mb-3" style="font-size: 0.9rem;">Infórmate sobre las normas y condiciones de uso de nuestro portal web institucional.</p>
                                    <span class="btn-conapdis btn-outline-azul btn-sm">Leer más →</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Contenido adicional --}}
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                            <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 1rem;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -5px; margin-right: 0.5rem;"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                                Nuestra Misión
                            </h3>
                            <p class="texto-institucional">
                                El Consejo Nacional para las Personas con Discapacidad (CONAPDIS) es el ente rector en materia de políticas públicas para la inclusión y garantía de derechos de las personas con discapacidad en la República Bolivariana de Venezuela.
                            </p>
                            <p class="texto-institucional">
                                Trabajamos incansablemente para promover la igualdad de oportunidades, eliminar barreras y construir una sociedad verdaderamente inclusiva donde todas las personas, independientemente de su condición, puedan desarrollarse plenamente.
                            </p>
                        </div>

                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 1rem;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -5px; margin-right: 0.5rem;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                Nuestros Valores
                            </h3>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 rounded-3" style="background: #f0f4ff;">
                                        <strong style="color: #003097;">🤝 Inclusión</strong>
                                        <p class="mb-0 text-muted small mt-1">Todos tienen un lugar en nuestra sociedad.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 rounded-3" style="background: #fefce8;">
                                        <strong style="color: #d97706;">⚖️ Equidad</strong>
                                        <p class="mb-0 text-muted small mt-1">Igualdad de oportunidades para todos.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 rounded-3" style="background: #f0fdf4;">
                                        <strong style="color: #059669;">💪 Empoderamiento</strong>
                                        <p class="mb-0 text-muted small mt-1">Fomentamos la autonomía y participación.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 rounded-3" style="background: #fef2f2;">
                                        <strong style="color: #dc2626;">❤️ Solidaridad</strong>
                                        <p class="mb-0 text-muted small mt-1">Construimos comunidad con empatía.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                            <h4 style="color: #1a3b5d; font-weight: 700; margin-bottom: 1rem;">📞 Contacto Directo</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <strong>Correo:</strong><br>
                                    <a href="mailto:conapdisvenezuelagob@gmail.com" class="text-decoration-none" style="color: #003097;">conapdisvenezuelagob@gmail.com</a>
                                </li>
                                <li class="mb-3">
                                    <strong>Teléfonos:</strong><br>
                                    0212-7620039<br>
                                    0212-7627959
                                </li>
                                <li>
                                    <strong>Dirección:</strong><br>
                                    Sede Principal CONAPDIS, Caracas, Venezuela.
                                </li>
                            </ul>
                        </div>

                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h4 style="color: #1a3b5d; font-weight: 700; margin-bottom: 1rem;">🔒 Protección de Datos</h4>
                            <p class="texto-institucional small">
                                Tu privacidad es importante para nosotros. Consulta nuestra 
                                <a href="{{ route('publico.privacidad') }}" class="text-decoration-none" style="color: #003097; font-weight: 600;">Política de Privacidad</a> 
                                y nuestros 
                                <a href="{{ route('publico.terminos') }}" class="text-decoration-none" style="color: #003097; font-weight: 600;">Términos de Uso</a> 
                                para conocer cómo protegemos tu información.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection