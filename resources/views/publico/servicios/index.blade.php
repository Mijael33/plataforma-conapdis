@extends('layouts.publica')

@section('titulo', 'Servicios')

@section('contenido')

<section class="pagina-servicios py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="pagina-titulo mb-2">Servicios</h1>
                <p class="pagina-subtitulo mb-5">CONAPDIS ofrece los siguientes servicios para las personas con discapacidad y sus familiares</p>
                
                <div class="row g-4">
                    {{-- Registro, Certificación y Postulación Laboral --}}
                    <div class="col-lg-6">
                        <a href="{{ route('publico.servicios.registro') }}" class="text-decoration-none">
                            <div class="servicio-card-index">
                                <div class="servicio-card-icono" style="width: 70px; height: 70px; background: linear-gradient(135deg, #003097, #001e5c);">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffda00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                </div>
                                <h4>Registro, Certificación y Postulación Laboral</h4>
                                <p>Conoce los requisitos para obtener tu certificado de discapacidad, registrar tu empresa o ayudarte a obtener un empleo.</p>
                                <span class="ver-todas-link">Ver más →</span>
                            </div>
                        </a>
                    </div>
                    
                    {{-- Fiscalización --}}
                    <div class="col-lg-6">
                        <a href="{{ route('publico.servicios.fiscalizacion') }}" class="text-decoration-none">
                            <div class="servicio-card-index">
                                <div class="servicio-card-icono" style="width: 70px; height: 70px; background: linear-gradient(135deg, #003097, #001e5c);">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffda00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                </div>
                                <h4>Fiscalización</h4>
                                <p>Identifique los requisitos necesarios para que su organización obtenga el Certificado ABI y de esta manera evitar multas.</p>
                                <span class="ver-todas-link">Ver más →</span>
                            </div>
                        </a>
                    </div>
                    
                    {{-- Gestión Social --}}
                    <div class="col-lg-6">
                        <a href="{{ route('publico.servicios.gestion-social') }}" class="text-decoration-none">
                            <div class="servicio-card-index">
                                <div class="servicio-card-icono" style="width: 70px; height: 70px; background: linear-gradient(135deg, #003097, #001e5c);">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffda00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                </div>
                                <h4>Gestión Social</h4>
                                <p>Infórmese acerca de los planes, programas y proyectos que el CONAPDIS dirige para mejorar su calidad de vida.</p>
                                <span class="ver-todas-link">Ver más →</span>
                            </div>
                        </a>
                    </div>
                    
                    {{-- Oficina de Atención al Ciudadano --}}
                    <div class="col-lg-6">
                        <a href="{{ route('publico.servicios.atencion-ciudadano') }}" class="text-decoration-none">
                            <div class="servicio-card-index">
                                <div class="servicio-card-icono" style="width: 70px; height: 70px; background: linear-gradient(135deg, #003097, #001e5c);">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffda00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                </div>
                                <h4>Oficina de Atención al Ciudadano</h4>
                                <p>Asesoramiento a todas las personas con discapacidad y sus familiares.</p>
                                <span class="ver-todas-link">Ver más →</span>
                            </div>
                        </a>
                    </div>
                    
                    {{-- Consultoría Jurídica --}}
                    <div class="col-lg-6">
                        <a href="{{ route('publico.servicios.consultoria-juridica') }}" class="text-decoration-none">
                            <div class="servicio-card-index">
                                <div class="servicio-card-icono" style="width: 70px; height: 70px; background: linear-gradient(135deg, #003097, #001e5c);">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffda00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                                </div>
                                <h4>Consultoría Jurídica</h4>
                                <p>Orientación legal gratuita para personas con discapacidad, sus familias y el sector empleador.</p>
                                <span class="ver-todas-link">Ver más →</span>
                            </div>
                        </a>
                    </div>
                    
                    {{-- Seguimiento y Control Territorial --}}
                    <div class="col-lg-6">
                        <a href="{{ route('publico.servicios.gestion-estadal') }}" class="text-decoration-none">
                            <div class="servicio-card-index">
                                <div class="servicio-card-icono" style="width: 70px; height: 70px; background: linear-gradient(135deg, #003097, #001e5c);">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffda00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                </div>
                                <h4>Seguimiento y Control Territorial</h4>
                                <p>Seguimiento y planificación de las acciones inherentes a la atención integral de las personas con discapacidad en el territorio nacional.</p>
                                <span class="ver-todas-link">Ver más →</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection