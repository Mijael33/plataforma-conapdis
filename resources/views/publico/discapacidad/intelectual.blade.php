@extends('layouts.publica')

@section('titulo', 'Discapacidad Intelectual y Psicosocial')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <img src="{{ asset('images/discapacidad-intelectual.png') }}" alt="Discapacidad Intelectual" style="width: 60px; height: 60px; object-fit: contain;">
                    <h1 class="pagina-titulo mb-0" style="border: none; padding: 0;">Discapacidad Intelectual y Psicosocial</h1>
                </div>
                
                <div class="contenido-institucional">
                    <h3 style="color: #1a3b5d; font-weight: 700;">Definición y Enfoque Clínico</h3>
                    <p class="texto-institucional">
                        La discapacidad intelectual y psicosocial comprende una serie de condiciones caracterizadas por limitaciones significativas tanto en el funcionamiento cognitivo general como en la conducta adaptativa. Esto afecta las habilidades conceptuales, sociales y prácticas cotidianas. Desde la perspectiva biopsicosocial, no se considera una enfermedad intrínseca, sino el resultado de la interacción entre las barreras del entorno y las capacidades funcionales del individuo. Clínicamente, abarca desde condiciones del neurodesarrollo hasta trastornos del espectro afectivo o de la personalidad que impactan el procesamiento de información y la autorregulación.
                    </p>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Barreras Comunes y Desafíos</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras Actitudinales:</strong> Estigmatización, infantilización y prejuicios sobre su capacidad de toma de decisiones.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras de Comunicación:</strong> Falta de metodologías de aprendizaje adaptadas y escasez de documentos en formatos de lectura fácil.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Desafíos de Autonomía:</strong> Dificultades para el acceso al empleo competitivo debido a procesos de selección rígidos.</span></li>
                    </ul>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Inclusión y Marco Legal</h3>
                    <p class="texto-institucional">
                        La legislación venezolana promueve la autodeterminación y prohíbe la sustitución total de la voluntad legal. Se fomenta el uso de sistemas de apoyo para la toma de decisiones. Esto garantiza que las personas con discapacidad intelectual puedan ejercer sus derechos civiles, acceder a la educación regular con adaptaciones curriculares y participar en el mercado laboral mediante programas de empleo protegido o adaptado.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection