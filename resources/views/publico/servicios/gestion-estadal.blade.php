@extends('layouts.publica')

@section('titulo', 'Gestión Estadal y Municipal')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="pagina-titulo mb-4">Gerencia de Gestión Estadal y Municipal</h1>
                <div class="contenido-institucional">
                    
                    <div class="servicio-detalle-header">
                        <div class="servicio-detalle-icono">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </div>
                        <div>
                            <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 0.5rem;">Objetivo</h3>
                            <p class="texto-institucional" style="margin-bottom: 0;">
                                Planificar y hacer seguimiento a las acciones que desarrollan los estados y municipios en materia de participación ciudadana y protagónica, mediante los abordajes sociales, en función de sus condiciones geográficas y culturales, con el fin de organizar a las personas con discapacidad que hacen vida dentro de las comunidades y su núcleo familiar, en articulación con los órganos y entes de la Administración Pública Nacional, Estadal y Municipal y las personas naturales y jurídicas de derecho privado.
                            </p>
                        </div>
                    </div>
                    
                    <hr class="servicio-separador">
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 1rem;">Funciones</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> Promover la Organización Comunitaria a través de los Consejos Comunales y Comités de Personas con Discapacidad y demás organizaciones estatales en acompañamiento social.</li>
                        <li><span class="flecha-icono">&#9654;</span> Ejecutar directrices en materia de atención integral a las personas con discapacidad y sus familiares, señaladas por el CONAPDIS.</li>
                        <li><span class="flecha-icono">&#9654;</span> Redactar los proyectos e instrumentos así como planificar la gestión vinculada a la atención de las Personas con Discapacidad a nivel nacional, fomentando y construyendo lineamientos, a fin de materializar los planes, proyectos y estrategias de las políticas que promuevan el desarrollo humano de las Personas con Discapacidad, convenios, contratos, resoluciones, órdenes, actos administrativos y otros instrumentos jurídicos relacionados con la actividad de la institución, en articulación con las unidades adscritas.</li>
                        <li><span class="flecha-icono">&#9654;</span> Establecer alianzas interinstitucionales a fin de dar respuesta oportuna a las distintas solicitudes de la población con discapacidad.</li>
                    </ul>
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin: 2rem 0 1rem;">¿Cuáles son los pasos para la conformación de un comité comunitario de Personas con Discapacidad?</h3>
                    
                    <div class="servicio-pasos">
                        <div class="servicio-paso">
                            <div class="servicio-paso-header">
                                <span class="servicio-paso-numero">1</span>
                                <span class="servicio-paso-titulo">Asamblea general</span>
                            </div>
                            <div class="servicio-paso-contenido">
                                <p>Asamblea general con la comunidad y miembros del consejo comunal.</p>
                            </div>
                        </div>
                        <div class="servicio-paso">
                            <div class="servicio-paso-header">
                                <span class="servicio-paso-numero">2</span>
                                <span class="servicio-paso-titulo">Registro preliminar</span>
                            </div>
                            <div class="servicio-paso-contenido">
                                <p>Levantamiento del Registro preliminar de Personas con Discapacidad que habitan en el marco geográfico del consejo comunal.</p>
                            </div>
                        </div>
                        <div class="servicio-paso">
                            <div class="servicio-paso-header">
                                <span class="servicio-paso-numero">3</span>
                                <span class="servicio-paso-titulo">Asamblea popular</span>
                            </div>
                            <div class="servicio-paso-contenido">
                                <p>Asamblea popular de Personas con Discapacidad para la elección de los voceros y voceras del Comité Comunitario de Personas con Discapacidad.</p>
                            </div>
                        </div>
                        <div class="servicio-paso">
                            <div class="servicio-paso-header">
                                <span class="servicio-paso-numero">4</span>
                                <span class="servicio-paso-titulo">Acta de constitución</span>
                            </div>
                            <div class="servicio-paso-contenido">
                                <p>Suscripción del acta de constitución del Comité Comunitario de Personas con Discapacidad por parte de los voceros electos y las personas con discapacidad asistentes.</p>
                            </div>
                        </div>
                        <div class="servicio-paso">
                            <div class="servicio-paso-header">
                                <span class="servicio-paso-numero">5</span>
                                <span class="servicio-paso-titulo">Certificado de Registro</span>
                            </div>
                            <div class="servicio-paso-contenido">
                                <p>Obtención del Certificado de Registro emitido por CONAPDIS.</p>
                            </div>
                        </div>
                    </div>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin: 1.5rem 0 1rem;">¿Cuál es la importancia de los comités comunitarios de Personas con Discapacidad?</h3>
                    
                    <p class="texto-institucional" style="margin-top: 2rem;">
                        Es una de las formas de reconocer el carácter protagónico de dichos comités, los cuales son expresiones legítimas de la organización comunitaria. Dicha forma organizativa, busca impulsar la inclusión social, columna vertebral de la Revolución Bolivariana, proceso en el cual se han reivindicado los derechos fundamentales de una población excluida como lo son las personas con discapacidad, que durante años han vivido bajo situaciones de discriminación y segregación, y como resultado creando una gran deuda social con la población con discapacidad.
                    </p>
                    <p class="texto-institucional">
                        En tal sentido, es la oportunidad de las personas con discapacidad de continuar recuperando y dando apertura a espacios de participación, en los cuales se evidencien valores de respeto, conciencia, tolerancia y sensibilidad hacia el tema de discapacidad.
                    </p>
                    
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
                        <li><a href="{{ route('publico.servicios.gestion-estadal') }}" class="activo">Gestión Estadal y Municipal</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection