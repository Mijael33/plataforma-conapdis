@extends('layouts.publica')

@section('titulo', 'Consultoría Jurídica')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="pagina-titulo mb-4">Consultoría Jurídica</h1>
                <div class="contenido-institucional">
                    
                    <div class="servicio-detalle-header">
                        <div class="servicio-detalle-icono">
                            <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                        </div>
                        <div>
                            <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 0.5rem;">Objetivo</h3>
                            <p class="texto-institucional" style="margin-bottom: 0;">
                                Brindar orientación legal accesible, oportuna y gratuita a las personas con discapacidad, sus familias y al sector empleador, velando por la difusión, interpretación y correcto cumplimiento de las leyes que garantizan la inclusión integral y la igualdad de derechos.
                            </p>
                        </div>
                    </div>
                    
                    <hr class="servicio-separador">
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 1rem;">Funciones de Atención al Público</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> Orientar legalmente a los ciudadanos en el conocimiento y ejercicio de sus derechos consagrados en la ley.</li>
                        <li><span class="flecha-icono">&#9654;</span> Asesorar a personas naturales y jurídicas sobre la normativa jurídica vigente en materia de discapacidad.</li>
                        <li><span class="flecha-icono">&#9654;</span> Recibir, revisar y canalizar solicitudes ciudadanas sobre incumplimientos del trato preferencial o barreras de inclusión.</li>
                        <li><span class="flecha-icono">&#9654;</span> Brindar acompañamiento técnico a entidades de trabajo sobre el alcance legal del deber de inclusión laboral.</li>
                        <li><span class="flecha-icono">&#9654;</span> Informar a la colectividad sobre los mecanismos legales de protección y las instancias a las que pueden acudir.</li>
                    </ul>
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin: 2rem 0 1.5rem;">Servicios de Atención al Ciudadano y Sector Empleador</h3>
                    
                    <div class="servicio-programa-card">
                        <h4>Orientación Legal al Ciudadano</h4>
                        <p><strong>¿Qué ofrece este servicio?</strong></p>
                        <p>Guía jurídica personalizada para garantizar el pleno goce de los derechos de la población con discapacidad.</p>
                        <ul class="servicio-lista-flecha">
                            <li><span class="flecha-icono">&#9654;</span> Asesores disponibles para orientar en materia de derecho al trabajo, educación y accesibilidad.</li>
                            <li><span class="flecha-icono">&#9654;</span> Información sobre qué hacer ante situaciones de discriminación o denegación de servicios institucionales o comerciales.</li>
                            <li><span class="flecha-icono">&#9654;</span> Canalización de inquietudes legales hacia los entes u organismos competentes según el caso.</li>
                        </ul>
                    </div>
                    
                    <div class="datos-institucionales p-4 mt-4" style="border-left: 4px solid #059669;">
                        <p><strong>Información Importante:</strong></p>
                        <p style="margin-bottom: 0;">Todos los servicios de orientación, asesoría y acompañamiento ofrecidos por la Consultoría Jurídica son completamente gratuitos y están dirigidos a fortalecer la cultura de respeto e inclusión en el país.</p>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('publico.servicios.index') }}" class="btn-conapdis btn-azul">Volver a Servicios</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="sidebar-card mb-4">
                    <h4 class="sidebar-titulo">Servicios CONAPDIS</h4>
                    <ul class="servicio-sidebar-nav">
                        <li><a href="{{ route('publico.servicios.registro') }}">Registro y Certificación</a></li>
                        <li><a href="{{ route('publico.servicios.fiscalizacion') }}">Fiscalización</a></li>
                        <li><a href="{{ route('publico.servicios.gestion-social') }}">Gestión Social</a></li>
                        <li><a href="{{ route('publico.servicios.atencion-ciudadano') }}">Atención al Ciudadano</a></li>
                        <li><a href="{{ route('publico.servicios.consultoria-juridica') }}" class="activo">Consultoría Jurídica</a></li>
                        <li><a href="{{ route('publico.servicios.gestion-estadal') }}">Seguimiento y Control Territorial</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection