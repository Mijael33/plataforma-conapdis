@extends('layouts.publica')

@section('titulo', 'Gestión Social')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="pagina-titulo mb-4">Gerencia de Gestión Social</h1>
                <div class="contenido-institucional">
                    
                    <div class="servicio-detalle-header">
                        <div class="servicio-detalle-icono">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </div>
                        <div>
                            <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 0.5rem;">Objetivo</h3>
                            <p class="texto-institucional" style="margin-bottom: 0;">
                                Planificar, dirigir y coordinar los planes, programas y proyectos que permitan desarrollar la investigación, innovación, formación para el oficio, actividades básicas de la vida diaria y atención integral inclusiva y activa de las personas con discapacidad y su familia, asegurando el ejercicio de los derechos, su participación protagónica en pro de la mejora continua de su calidad de vida en el territorio nacional.
                            </p>
                        </div>
                    </div>
                    
                    <hr class="servicio-separador">
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin-bottom: 1rem;">Funciones</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> Dirigir y coordinar la creación de estrategias metodológicas para la ejecución efectiva de planes, programas y proyectos en las áreas académica, laboral, institucional, comunitaria y familiar.</li>
                        <li><span class="flecha-icono">&#9654;</span> Promover la actualización de contenidos e insumos para la aplicación de programas o actividades en la formación integral.</li>
                        <li><span class="flecha-icono">&#9654;</span> Dirigir y coordinar procesos de control y seguimiento de los planes y programas en ejecución para medir los niveles de efectividad y eficacia, así como la evaluación y replanificación de los mismos.</li>
                        <li><span class="flecha-icono">&#9654;</span> Establecer los lineamientos generales que permitan la promoción y generación de espacios para la difusión de investigaciones en materia de discapacidad, bien sea que se encuentren en desarrollo o que ya hayan sido culminadas con éxito, tales como publicaciones a través de medios de difusión, entre otros.</li>
                    </ul>
                    
                    <div class="datos-institucionales p-4 mt-4" style="border-left: 4px solid #003097;">
                        <p><strong>¿A quién atendemos?</strong></p>
                        <ul class="servicio-lista-check">
                            <li><span class="check-icono">&#10003;</span> Personas Con Discapacidad</li>
                            <li><span class="check-icono">&#10003;</span> Familias de Personas con Discapacidad</li>
                            <li><span class="check-icono">&#10003;</span> Entidades de Trabajo Públicas, Privadas y Mixtas</li>
                            <li><span class="check-icono">&#10003;</span> Público en general</li>
                        </ul>
                    </div>
                    
                    <h3 style="color: #1a3b5d; font-weight: 700; margin: 2rem 0 1.5rem;">Programas y Servicios</h3>
                    
                    <div class="servicio-programa-card">
                        <h4>Programa Familia</h4>
                        <p><strong>¿Qué ofrece el Programa Familia?</strong></p>
                        <p>Es un programa adscrito a la Gerencia de Gestión Social del CONAPDIS, ejecutado por la Coordinación de Orientación Familiar, su objetivo es diseñar, planificar y ejecutar las actividades que faciliten el desarrollo de la familia de las personas con discapacidad, como factor determinante de protección social, contribuyendo así a la formación de una cultura incluyente y participativa.</p>
                        <ul class="servicio-lista-flecha">
                            <li><span class="flecha-icono">&#9654;</span> Atención multidisciplinaria e interdisciplinaria a las personas con discapacidad.</li>
                            <li><span class="flecha-icono">&#9654;</span> Brindar atención y orientación biopsicosocial a las familias de las Personas con Discapacidad.</li>
                            <li><span class="flecha-icono">&#9654;</span> Promover el fortalecimiento de lazos familiares a través de dinámicas grupales.</li>
                            <li><span class="flecha-icono">&#9654;</span> Formar en materia de discapacidad y familia, prevención a las familias de Personas con discapacidad, ciudadanía y público en general a través de talleres, conversatorios, foros entre otros.</li>
                            <li><span class="flecha-icono">&#9654;</span> Conformar grupos de apoyos orientados a fortalecer a las familias de las Personas con Discapacidad.</li>
                            <li><span class="flecha-icono">&#9654;</span> Brindar herramientas a las familias para promover el desarrollo de habilidades en la persona con discapacidad que contribuyan a lograr autonomía e inclusión social.</li>
                        </ul>
                    </div>
                    
                    <div class="servicio-programa-card">
                        <h4>Formación Social, Laboral e Investigaciones</h4>
                        <p><strong>¿Qué ofrecen estas formaciones?</strong></p>
                        <p>Objetivo: Diseñar, planificar y ejecutar los planes, programas y proyectos enmarcados en los elementos teóricos y prácticos referidos a la discapacidad, orientados a la aplicación de formación de facilitadores y facilitadoras de los procesos de enseñanza – aprendizaje en materia de discapacidad.</p>
                        <ul class="servicio-lista-flecha">
                            <li><span class="flecha-icono">&#9654;</span> Promover la actualización de contenidos e insumos para la aplicación de programas o actividades de formación integral.</li>
                            <li><span class="flecha-icono">&#9654;</span> Formar y orientar a facilitadoras y facilitadores responsables de la ejecución y articulación nacional a través de planes de formación, herramientas y dinámicas de trabajo que permitan promover el buen desempeño de las actividades diarias de y para las personas con discapacidad en los espacios comunitarios, académicos, laborales e institucionales.</li>
                            <li><span class="flecha-icono">&#9654;</span> Impulsar y asesorar los proyectos y trabajos de investigación en materia de discapacidad.</li>
                            <li><span class="flecha-icono">&#9654;</span> Desarrollar actividades de formación y orientación de los procesos de inserción laboral y trato adecuado a las personas con discapacidad, dentro del ámbito laboral, prevención y accesibilidad de las mismas.</li>
                        </ul>
                    </div>
                    
                    <div class="servicio-programa-card">
                        <h4>Servicio Nacional para la Comunicación Accesible - SENACOA</h4>
                        <p><strong>¿Qué ofrece este servicio?</strong></p>
                        <p>Objetivo: Planificar, diseñar y ejecutar las actividades y acciones que permitan la comunicación accesible a las personas con discapacidad auditiva en los entornos de su desempeño diario, a través de labores interpretativas de la lengua de señas venezolana.</p>
                        <ul class="servicio-lista-flecha">
                            <li><span class="flecha-icono">&#9654;</span> Desarrolla estrategias y acciones que permitan la masificación de la lengua de señas venezolanas en todo el territorio nacional.</li>
                            <li><span class="flecha-icono">&#9654;</span> Dicta cursos y talleres de formación continua en interpretación y traducción en Lengua de Señas Venezolana.</li>
                            <li><span class="flecha-icono">&#9654;</span> Brinda atención a las familias de personas con discapacidad auditiva, entre otras.</li>
                        </ul>
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
                        <li><a href="{{ route('publico.servicios.gestion-social') }}" class="activo">Gestión Social</a></li>
                        <li><a href="{{ route('publico.servicios.atencion-ciudadano') }}">Atención al Ciudadano</a></li>
                        <li><a href="{{ route('publico.servicios.gestion-estadal') }}">Seguimiento y Control Territorial</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection