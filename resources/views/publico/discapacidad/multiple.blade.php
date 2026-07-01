@extends('layouts.publica')

@section('titulo', 'Discapacidad Múltiple')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <img src="{{ asset('images/discapacidad-multiple.png') }}" alt="Discapacidad Múltiple" style="width: 60px; height: 60px; object-fit: contain;">
                    <h1 class="pagina-titulo mb-0" style="border: none; padding: 0;">Discapacidad Múltiple</h1>
                </div>
                
                <div class="contenido-institucional">
                    <h3 style="color: #1a3b5d; font-weight: 700;">Definición y Enfoque Clínico</h3>
                    <p class="texto-institucional">
                        La discapacidad múltiple se presenta cuando un mismo individuo manifiesta dos o más condiciones de forma simultánea, ya sean físicas, sensoriales, intelectuales o psicosociales. Un ejemplo característico es la sordoceguera. Esta combinación no debe entenderse como la simple suma de diagnósticos aislados, sino como una condición única y compleja que genera una situación cualitativamente distinta. El nivel de interdependencia entre las limitaciones multiplica de manera exponencial las dificultades para la comunicación, la orientación, la movilidad y el aprendizaje.
                    </p>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Barreras Comunes y Desafíos</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras de Entorno:</strong> Inexistencia de sistemas de apoyo multidimensionales en espacios urbanos y arquitectónicos.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras Educativas:</strong> Escasez de personal docente altamente especializado en metodologías de mediación y guía-interpretación.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Desafíos de Dependencia:</strong> Alta vulnerabilidad y necesidad de asistencia tecnológica o humana constante para realizar actividades básicas.</span></li>
                    </ul>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Inclusión y Marco Legal</h3>
                    <p class="texto-institucional">
                        La atención integral de la discapacidad múltiple requiere un abordaje transdisciplinario y planes de apoyo individualizados. El marco normativo nacional prioriza la asignación de ayudas técnicas complejas, la formación de guías-intérpretes y el fortalecimiento de las capacidades del núcleo familiar a través de subsidios y programas de asistencia social especializada.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection