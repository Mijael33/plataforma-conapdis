@extends('layouts.publica')

@section('titulo', 'Oficina de Atención al Ciudadano')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="pagina-titulo mb-4">Oficina de Atención al Ciudadano</h1>
                <div class="contenido-institucional">
                    
                    <div class="servicio-detalle-header">
                        <div class="servicio-detalle-icono">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </div>
                        <div>
                            <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 0.5rem;">Objetivo</h3>
                            <p class="texto-institucional" style="margin-bottom: 0;">
                                Promover la participación ciudadana; suministrar y ofrecer de forma oportuna, adecuada y efectiva, la información requerida; apoyar, orientar, recibir, y tramitar denuncias, quejas, reclamos, sugerencias y peticiones; en general, resolver las solicitudes formuladas por los ciudadanos. Art 12 Normas para Fomentar la Participación Ciudadana.
                            </p>
                        </div>
                    </div>
                    
                    <hr class="servicio-separador">
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 1rem;">Funciones</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> Atender y orientar mediante diferentes mecanismos a los ciudadanos con y sin discapacidad, a fin de procesar las solicitudes, denuncias, quejas y reclamos.</li>
                        <li><span class="flecha-icono">&#9654;</span> Efectuar el control y seguimiento de las diferentes solicitudes, denuncias, quejas y reclamos, hasta su última fase con la finalidad de dar una respuesta oportuna del estatus de las mismas.</li>
                        <li><span class="flecha-icono">&#9654;</span> Articular con diferentes organismos gubernamentales para el otorgamiento de ayudas que no puedan ser atendidas en la institución, con el fin de dar respuesta a su solicitud en concordancia con los objetivos institucionales.</li>
                        <li><span class="flecha-icono">&#9654;</span> Brindar información acerca de los requerimientos para la solicitud de Herramientas y dispositivos técnicos, así como lo concerniente para su procesamiento.</li>
                        <li><span class="flecha-icono">&#9654;</span> Ejecutar y controlar la planificación para la atención social de las personas con discapacidad y sin discapacidad que soliciten las Herramientas y dispositivos técnicos.</li>
                        <li><span class="flecha-icono">&#9654;</span> Canalizar y controlar las solicitudes, denuncias, quejas y reclamos atendidos por los Coordinadores Estadales, a fin de ser procesados.</li>
                        <li><span class="flecha-icono">&#9654;</span> Verificar a través del Sistema Integrado de la Gestión de Casos Sociales (SIGCAS), y Sistema de Misión José Gregorio Hernández que los ciudadanos que soliciten Herramientas y dispositivos técnicos, no hayan solicitado el mismo tipo de ayuda en otra institución.</li>
                        <li><span class="flecha-icono">&#9654;</span> Informar a los ciudadanos sobre el estatus de su requerimiento de manera oportuna, una vez que se haya procesado.</li>
                        <li><span class="flecha-icono">&#9654;</span> Preparar el expediente según sea la solicitud, y direccionar al área del comité evaluador, que tendrá la función de definir el otorgamiento.</li>
                        <li><span class="flecha-icono">&#9654;</span> Sensibilizar a la ciudadanía a través de charlas, talleres y cualquier medio de divulgación acerca del trato adecuado a personas con discapacidad.</li>
                        <li><span class="flecha-icono">&#9654;</span> Establecer mecanismos institucionales para fomentar la participación popular y la corresponsabilidad en la gestión pública, así como la formación de las comunidades mediante charlas, talleres informativos, seminarios, entre otros, en articulación con las demás unidades administrativas.</li>
                    </ul>
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin: 2rem 0 1rem;">¿Qué ofrecemos en la Oficina de Atención al Ciudadano?</h3>
                    <div class="servicio-grid-2">
                        <div class="servicio-dato-destacado">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                            <p>Otorgamiento de Ayudas Humanas (Herramientas y Dispositivos Técnicos)</p>
                        </div>
                        <div class="servicio-dato-destacado">
                            <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            <p>Atención a la Denuncia, Quejas y Reclamos</p>
                        </div>
                    </div>
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin: 2rem 0 1rem;">Recaudos a consignar</h3>
                    
                    <div class="servicio-programa-card">
                        <h4>Documentos a consignar si la Ayuda Humana es solicitada por el beneficiario:</h4>
                        <ul class="servicio-lista-check">
                            <li><span class="check-icono">&#10003;</span> Informe médico actualizado (que indique Herramientas y Dispositivos Técnicos a solicitar).</li>
                            <li><span class="check-icono">&#10003;</span> Copia de la Cédula de identidad del beneficiario.</li>
                            <li><span class="check-icono">&#10003;</span> Certificado de discapacidad.</li>
                            <li><span class="check-icono">&#10003;</span> Si es menor de 9 años debe tener copia del acta de nacimiento.</li>
                            <li><span class="check-icono">&#10003;</span> Carta de exposición de motivo, dirigida al Presidente de la República Nicolás Maduro Moros C/c: Atención a: Presidenta de la institución Soc. Soraida Ramírez Osorio.</li>
                        </ul>
                    </div>
                    
                    <div class="servicio-programa-card">
                        <h4>Si el planteamiento del ciudadano(a) es una denuncia, procede a levantar el expediente; el mismo debe contener lo siguiente:</h4>
                        <ul class="servicio-lista-check">
                            <li><span class="check-icono">&#10003;</span> Cédula del Ciudadano(a) denunciante, dirección de habitación, números de contactos.</li>
                            <li><span class="check-icono">&#10003;</span> Certificado de discapacidad.</li>
                            <li><span class="check-icono">&#10003;</span> Información posible del presunto infractor o infractora.</li>
                            <li><span class="check-icono">&#10003;</span> Información detallada de la denuncia.</li>
                            <li><span class="check-icono">&#10003;</span> Fecha, lugar y hora de los hechos.</li>
                            <li><span class="check-icono">&#10003;</span> La firma y las huellas dactilares del denunciante.</li>
                            <li><span class="check-icono">&#10003;</span> Fotos y otros soportes según aplique.</li>
                        </ul>
                        <p style="font-size: 0.95rem; color: #4b5563; margin-top: 1rem;">Si es competencia de la institución lo procesa mediante el expediente que consolidó, de no ser nuestra competencia será remitida a la instancia correspondiente.</p>
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
                        <li><a href="{{ route('publico.servicios.atencion-ciudadano') }}" class="activo">Atención al Ciudadano</a></li>
                        <li><a href="{{ route('publico.servicios.consultoria-juridica') }}">Consultoría Jurídica</a></li>
                        <li><a href="{{ route('publico.servicios.gestion-estadal') }}">Seguimiento y Control Territorial</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection