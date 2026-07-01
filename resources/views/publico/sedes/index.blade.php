@extends('layouts.publica')

@section('titulo', 'Sedes')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <h1 class="pagina-titulo mb-4">Sedes</h1>
        
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="sede-card">
                    <h4>Dirección</h4>
                    <div class="sede-icono-texto">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <p>AV. CASANOVA CON CALLE VILLAFLOR EDIF. CENTRO PROFESIONAL DEL ESTE. NIVEL MEZZANINA PARROQUIA, Caracas 1050, Distrito Capital</p>
                    </div>
                    <div class="sede-icono-texto">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <p>0212-7620039</p>
                    </div>
                    <div class="sede-icono-texto">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <p>0212-7627959</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sede-card">
                    <h4>Estamos presentes en todo el territorio Nacional</h4>
                    <p>Nos puedes encontrar en cualquier estado de Venezuela, donde te podremos atender y gestionar tus solicitudes. No dudes en contactarnos.</p>
                </div>
            </div>
        </div>

        {{-- Mapa de Venezuela Interactivo --}}
        <h2 class="seccion-titulo mb-4">Encuéntranos en tu estado</h2>
        <p class="pagina-subtitulo mb-4">Haz clic en tu estado para ver la ubicación de nuestra coordinación</p>
        
        <div class="mapa-venezuela-container" id="mapaVenezuela">
            {!! file_get_contents(public_path('images/mapa-venezuela.svg')) !!}
            <div class="mapa-tooltip" id="mapaTooltip"></div>
        </div>

        <h2 class="seccion-titulo mb-4">Coordinaciones Estadales</h2>
        
        <div class="vertices-acordeon sedes-acordeon">
            @forelse($coordinaciones as $c)
            <div class="vertice-acordeon-item">
                <button class="vertice-acordeon-btn" type="button">
                    <span class="vertice-icono">
                        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </span>
                    <span class="vertice-texto">Estado {{ $c->estado }}</span>
                    <svg class="vertice-flecha" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div class="vertice-acordeon-contenido">
                    <p><strong>Dirección:</strong> {{ $c->direccion }}</p>
                    <p><strong>Coordinador(a):</strong> {{ $c->coordinador }}</p>
                    @if($c->enlace_mapa)
                    <a href="{{ $c->enlace_mapa }}" target="_blank" class="btn-conapdis btn-outline-azul btn-sm mt-2">Ver en Google Maps</a>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-center text-muted py-4">No hay coordinaciones registradas.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // Acordeón de sedes
    document.querySelectorAll('.vertice-acordeon-btn').forEach(button => {
        button.addEventListener('click', () => {
            const item = button.parentElement;
            const isActive = item.classList.contains('activo');
            
            document.querySelectorAll('.vertice-acordeon-item').forEach(i => i.classList.remove('activo'));
            
            if (!isActive) {
                item.classList.add('activo');
            }
        });
    });

    // Tooltip, animaciones y enlaces del mapa
    const mapaContainer = document.getElementById('mapaVenezuela');
    const tooltip = document.getElementById('mapaTooltip');
    
    const enlacesEstados = {
        'Amazonas': 'CONAPDIS+Amazonas',
        'Anzoátegui': 'CONAPDIS+Anzoategui',
        'Apure': 'CONAPDIS+Apure',
        'Aragua': 'CONAPDIS+Aragua',
        'Barinas': 'CONAPDIS+Barinas',
        'Bolívar': 'CONAPDIS+Bolivar',
        'Carabobo': 'CONAPDIS+Carabobo',
        'Cojedes': 'CONAPDIS+Cojedes',
        'Delta Amacuro': 'CONAPDIS+Delta+Amacuro',
        'Dto. Capital': 'CONAPDIS+Distrito+Capital',
        'Distrito Capital': 'CONAPDIS+Distrito+Capital',
        'Falcón': 'CONAPDIS+Falcon',
        'Guárico': 'CONAPDIS+Guarico',
        'Lara': 'CONAPDIS+Lara',
        'Mérida': 'CONAPDIS+Merida',
        'Miranda': 'CONAPDIS+Miranda',
        'Monagas': 'CONAPDIS+Monagas',
        'Nueva Esparta': 'CONAPDIS+Nueva+Esparta',
        'Portuguesa': 'CONAPDIS+Portuguesa',
        'Sucre': 'CONAPDIS+Sucre',
        'Táchira': 'CONAPDIS+Tachira',
        'Trujillo': 'CONAPDIS+Trujillo',
        'Vargas': 'CONAPDIS+La+Guaira',
        'La Guaira': 'CONAPDIS+La+Guaira',
        'Yaracuy': 'CONAPDIS+Yaracuy',
        'Zulia': 'CONAPDIS+Zulia',
        'Guayana Esequiba': 'CONAPDIS+Guayana+Esequiba'
    };

    function abrirMapa(nombre) {
        const query = enlacesEstados[nombre] || 'CONAPDIS+' + nombre.replace(/\s+/g, '+');
        if (query.startsWith('http')) {
            window.open(query, '_blank');
        } else {
            window.open('https://maps.google.com/?q=' + query, '_blank');
        }
    }
    
    if (mapaContainer) {
        setTimeout(() => {
            const paths = mapaContainer.querySelectorAll('path');
            const texts = mapaContainer.querySelectorAll('text');
            
            paths.forEach(path => {
                path.style.cursor = 'pointer';
                path.style.transition = 'all 0.3s ease';
                
                path.addEventListener('mouseenter', function() {
                    this.style.filter = 'brightness(1.3) drop-shadow(0 4px 8px rgba(0,48,151,0.6))';
                    this.style.stroke = '#003097';
                    this.style.strokeWidth = '3px';
                });
                
                path.addEventListener('mouseleave', function() {
                    this.style.filter = '';
                    this.style.stroke = '';
                    this.style.strokeWidth = '';
                });
                
                path.addEventListener('click', function() {
                    let nombre = '';
                    const pathRect = this.getBoundingClientRect();
                    let minDistancia = Infinity;
                    
                    texts.forEach(text => {
                        const textRect = text.getBoundingClientRect();
                        const centroX = (textRect.left + textRect.right) / 2;
                        const centroY = (textRect.top + textRect.bottom) / 2;
                        
                        if (centroX >= pathRect.left && centroX <= pathRect.right &&
                            centroY >= pathRect.top && centroY <= pathRect.bottom) {
                            const distancia = Math.abs(centroY - (pathRect.top + pathRect.height/2));
                            if (distancia < minDistancia) {
                                minDistancia = distancia;
                                nombre = text.textContent.trim().replace(/\s+/g, ' ');
                            }
                        }
                    });
                    
                    if (nombre) {
                        abrirMapa(nombre);
                    }
                });
            });
            
            texts.forEach(text => {
                text.style.cursor = 'pointer';
                text.style.transition = 'all 0.3s ease';
                
                text.addEventListener('mouseenter', function(e) {
                    const nombre = this.textContent.trim().replace(/\s+/g, ' ');
                    if (nombre.length > 2) {
                        tooltip.textContent = 'CONAPDIS ' + nombre;
                        tooltip.style.opacity = '1';
                        this.style.fill = '#003097';
                        this.style.fontWeight = 'bold';
                    }
                });
                
                text.addEventListener('mousemove', function(e) {
                    const rect = mapaContainer.getBoundingClientRect();
                    tooltip.style.left = (e.clientX - rect.left + 15) + 'px';
                    tooltip.style.top = (e.clientY - rect.top - 40) + 'px';
                });
                
                text.addEventListener('mouseleave', function() {
                    tooltip.style.opacity = '0';
                    this.style.fill = '';
                    this.style.fontWeight = '';
                });
                
                text.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const nombre = this.textContent.trim().replace(/\s+/g, ' ');
                    abrirMapa(nombre);
                });
            });
        }, 500);
    }
</script>
@endsection