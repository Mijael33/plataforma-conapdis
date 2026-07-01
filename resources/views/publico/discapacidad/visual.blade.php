@extends('layouts.publica')

@section('titulo', 'Discapacidad Visual')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <img src="{{ asset('images/discapacidad-visual.png') }}" alt="Discapacidad Visual" style="width: 60px; height: 60px; object-fit: contain;">
                    <h1 class="pagina-titulo mb-0" style="border: none; padding: 0;">Discapacidad Visual</h1>
                </div>
                
                <div class="contenido-institucional">
                    <h3 style="color: #1a3b5d; font-weight: 700;">Definición y Enfoque Clínico</h3>
                    <p class="texto-institucional">
                        La discapacidad visual engloba tanto la ausencia total de percepción lumínica (ceguera) como las disminuciones severas de la agudeza o el campo visual que no pueden corregirse mediante anteojos convencionales o cirugía (baja visión). Esta condición altera la orientación espacial, la movilidad independiente y el acceso directo a la información impresa. La evaluación clínica mide la capacidad del ojo para distinguir detalles y el ángulo total de visión que el individuo puede percibir sin mover la cabeza.
                    </p>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Barreras Comunes y Desafíos</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras de Información:</strong> Ausencia de señalización en sistema Braille, carencia de macrotipos y falta de audiodescripción en medios digitales.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras Urbanísticas:</strong> Falta de pisos podotáctiles en las aceras, semáforos sonoros y presencia de obstáculos fijos sin señalizar.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Desafíos Tecnológicos:</strong> Páginas web y aplicaciones móviles que no son compatibles con los software lectores de pantalla.</span></li>
                    </ul>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Inclusión y Marco Legal</h3>
                    <p class="texto-institucional">
                        El proceso de equiparación de oportunidades exige la digitalización accesible, la enseñanza del sistema Braille y el uso de técnicas de orientación y movilidad con bastón guía. Legalmente, se protege el derecho al uso de perros guía en espacios públicos y se fomenta la adaptación de los materiales educativos a formatos audibles o táctiles.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection