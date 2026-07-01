@extends('layouts.publica')

@section('titulo', 'Discapacidad Física o Motora')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <img src="{{ asset('images/discapacidad-motora.png') }}" alt="Discapacidad Motora" style="width: 60px; height: 60px; object-fit: contain;">
                    <h1 class="pagina-titulo mb-0" style="border: none; padding: 0;">Discapacidad Física o Motora</h1>
                </div>
                
                <div class="contenido-institucional">
                    <h3 style="color: #1a3b5d; font-weight: 700;">Definición y Enfoque Clínico</h3>
                    <p class="texto-institucional">
                        La discapacidad física o motora constituye una alteración temporal o permanente del sistema osteoarticular, muscular o nervioso central. Esta condición limita de forma significativa la movilidad, la coordinación, la locomoción o el uso de las extremidades. Sus etiologías son diversas y abarcan causas congénitas (como la parálisis cerebral o la espina bífida) o adquiridas (como amputaciones, lesiones medulares causadas por traumatismos o patologías degenerativas). El grado de limitación funcional varía según la ubicación y la gravedad de la lesión fisiológica.
                    </p>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Barreras Comunes y Desafíos</h3>
                    <ul class="servicio-lista-flecha">
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras Arquitectónicas:</strong> Presencia de escalones, aceras deterioradas, puertas angostas y baños no adaptados.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Barreras de Transporte:</strong> Unidades de movilización pública colectiva que carecen de rampas de acceso o plataformas hidráulicas.</span></li>
                        <li><span class="flecha-icono">&#9654;</span> <span><strong>Desafíos Urbanos:</strong> Incumplimiento de las normativas técnicas sobre el diseño universal en la planificación de ciudades.</span></li>
                    </ul>

                    <h3 style="color: #1a3b5d; font-weight: 700; margin-top: 2rem;">Inclusión y Marco Legal</h3>
                    <p class="texto-institucional">
                        La inclusión se fundamenta en el principio de accesibilidad universal. La normativa exige la eliminación obligatoria de barreras arquitectónicas en edificaciones de uso público y privado, la reserva de puestos de estacionamiento preferenciales y la adaptación de los puestos de trabajo mediante mobiliario ergonómico para garantizar el desempeño laboral autónomo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection