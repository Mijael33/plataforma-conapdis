@extends('layouts.publica')

@section('titulo', 'Principios y Valores')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="pagina-titulo mb-4">Principios y Valores de CONAPDIS</h1>
                <p class="pagina-subtitulo mb-4">Haga clic en cada principio para conocer más información</p>
                
                <div class="vertices-acordeon">
                    <!-- Principio 1 -->
                    <div class="vertice-acordeon-item">
                        <button class="vertice-acordeon-btn" type="button">
                            <span class="vertice-icono">🔹</span>
                            <span class="vertice-texto">Compromiso Social</span>
                            <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="vertice-acordeon-contenido">
                            <p>El desarrollo y el bienestar de las personas con discapacidad es nuestra esencia, y por ello trabajamos, promoviendo su inclusión y el reconocimiento como sujeto de pleno derecho en la sociedad.</p>
                        </div>
                    </div>

                    <!-- Principio 2 -->
                    <div class="vertice-acordeon-item">
                        <button class="vertice-acordeon-btn" type="button">
                            <span class="vertice-icono">🔹</span>
                            <span class="vertice-texto">Confidencialidad</span>
                            <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="vertice-acordeon-contenido">
                            <p>Para nosotros la información suministrada por nuestros usuarios es tratada con absoluta reserva y profesionalismo.</p>
                        </div>
                    </div>

                    <!-- Principio 3 -->
                    <div class="vertice-acordeon-item">
                        <button class="vertice-acordeon-btn" type="button">
                            <span class="vertice-icono">🔹</span>
                            <span class="vertice-texto">Corresponsabilidad</span>
                            <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="vertice-acordeon-contenido">
                            <p>Entre el Estado, las organizaciones públicas, privadas y las comunidades; en el ámbito económico y social a fin de satisfacer necesidades puntuales de las personas con discapacidad y su núcleo familiar.</p>
                        </div>
                    </div>

                    <!-- Principio 4 -->
                    <div class="vertice-acordeon-item">
                        <button class="vertice-acordeon-btn" type="button">
                            <span class="vertice-icono">🔹</span>
                            <span class="vertice-texto">Honestidad</span>
                            <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="vertice-acordeon-contenido">
                            <p>El trabajador y la trabajadora asumen desde su incorporación al CONAPDIS, conductas congruentes con el marco ético-normativo de la República Bolivariana de Venezuela.</p>
                        </div>
                    </div>

                    <!-- Principio 5 -->
                    <div class="vertice-acordeon-item">
                        <button class="vertice-acordeon-btn" type="button">
                            <span class="vertice-icono">🔹</span>
                            <span class="vertice-texto">Igualdad</span>
                            <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="vertice-acordeon-contenido">
                            <p>Para las trabajadoras y trabajadores del CONAPDIS, todos somos iguales ante Dios y ante los hombres, independientemente de sus características físicas e intelectuales.</p>
                        </div>
                    </div>

                    <!-- Principio 6 -->
                    <div class="vertice-acordeon-item">
                        <button class="vertice-acordeon-btn" type="button">
                            <span class="vertice-icono">🔹</span>
                            <span class="vertice-texto">Respeto</span>
                            <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="vertice-acordeon-contenido">
                            <p>En el CONAPDIS valoramos a todas las personas, teniendo en cuenta sus valores, creencias y posiciones.</p>
                        </div>
                    </div>

                    <!-- Principio 7 -->
                    <div class="vertice-acordeon-item">
                        <button class="vertice-acordeon-btn" type="button">
                            <span class="vertice-icono">🔹</span>
                            <span class="vertice-texto">Inclusión</span>
                            <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="vertice-acordeon-contenido">
                            <p>Concebida como la igualdad de oportunidades y posibilidades para el desarrollo pleno de sus habilidades y destrezas.</p>
                        </div>
                    </div>

                    <!-- Principio 8 -->
                    <div class="vertice-acordeon-item">
                        <button class="vertice-acordeon-btn" type="button">
                            <span class="vertice-icono">🔹</span>
                            <span class="vertice-texto">Transparencia</span>
                            <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="vertice-acordeon-contenido">
                            <p>En el CONAPDIS, la información de nuestras actividades y gestión, es proporcionada con veracidad, claridad y de fácil acceso a quienes la requieran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.querySelectorAll('.vertice-acordeon-btn').forEach(button => {
        button.addEventListener('click', () => {
            const item = button.parentElement;
            const isActive = item.classList.contains('activo');
            
            // Cerrar todos
            document.querySelectorAll('.vertice-acordeon-item').forEach(i => i.classList.remove('activo'));
            
            // Abrir el clickeado si no estaba activo
            if (!isActive) {
                item.classList.add('activo');
            }
        });
    });
</script>
@endsection