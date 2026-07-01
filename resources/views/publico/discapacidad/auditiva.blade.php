@extends('layouts.publica')

@section('titulo', 'Discapacidad Auditiva')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <img src="{{ asset('images/discapacidad-auditiva.png') }}" alt="Discapacidad Auditiva" style="width: 60px; height: 60px; object-fit: contain;">
                    <h1 class="pagina-titulo mb-0" style="border: none; padding: 0;">Discapacidad Auditiva</h1>
                </div>
                
                <div class="contenido-institucional">
                    <h3 style="color: #1a3b5d; font-weight: 700;">Definición y Enfoque Clínico</h3>
                    <p class="texto-institucional">
                        La discapacidad auditiva se define como la pérdida total o parcial de la capacidad de percibir los sonidos a través del sistema auditivo. Técnicamente, se clasifica según la intensidad de la pérdida en decibelios (leve, moderada, severa o profunda) y el momento de su aparición (prelocutiva o postlocutiva). Desde un enfoque sociocultural, la población con sordera profunda no se autodefine únicamente por una limitación médica, sino como una minoría lingüística que posee una identidad cultural propia y una lengua viso-gestual estructurada.
                    </p>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Barreras Comunes y Desafíos</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras Comunicacionales:</strong> Ausencia de intérpretes en servicios públicos, salud, educación y canales de televisión abierta.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras de Infraestructura:</strong> Falta de sistemas de alerta visuales (luces estroboscópicas) en situaciones de emergencia.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Desafíos Laborales:</strong> Limitaciones en los procesos de capacitación técnica que no contemplan la accesibilidad lingüística.</span></li>
                    </ul>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Inclusión y Marco Legal</h3>
                    <p class="texto-institucional">
                        El Estado reconoce legalmente la Lengua de Señas Venezolana (LSV) como su idioma oficial y medio de comunicación. La inclusión efectiva exige la presencia obligatoria de intérpretes en las instituciones públicas y educativas, la subtitulación de contenidos audiovisuales y la promoción de la cultura sorda para eliminar el aislamiento social.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection