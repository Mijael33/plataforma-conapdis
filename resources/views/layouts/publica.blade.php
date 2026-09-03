<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- Política de permisos para evitar advertencias --}}
    <meta http-equiv="Permissions-Policy" content="clipboard-write=(self)">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    
    <title>@yield('titulo', 'CONAPDIS') - Consejo Nacional para las Personas con Discapacidad</title>

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:title" content="@yield('titulo', 'CONAPDIS') - Consejo Nacional para las Personas con Discapacidad">
    <meta property="og:description" content="Consejo Nacional para las Personas con Discapacidad, ente rector en políticas de inclusión y garantía de derechos.">
    <meta property="og:image" content="{{ asset('images/logos/logo-conapdis.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados CONAPDIS -->
    <link href="{{ asset('css/conapdis.css') }}?v={{ filemtime(public_path('css/conapdis.css')) }}" rel="stylesheet">
    
    <style>
        .rv-resaltado-claro {
            background-color: #fff3cd !important;
            border-radius: 4px;
            transition: background-color 0.3s;
            padding: 2px 6px;
            box-shadow: 0 0 0 3px #ffda00;
            color: #000 !important;
        }
        .rv-resaltado-oscuro {
            background-color: #003097 !important;
            border-radius: 4px;
            transition: background-color 0.3s;
            padding: 2px 6px;
            box-shadow: 0 0 0 3px #ffda00;
            color: #ffda00 !important;
        }
        
        .uwy-install-banner,
        .userway-settings-panel-banner,
        [class*="userway-install"],
        [id*="userway-install"] {
            display: none !important;
        }

        .btn-lector-flotante { position: relative; }
        .btn-lector-flotante .tooltip-atajo {
            display: none;
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            background: #003097;
            color: #ffda00;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            pointer-events: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }
        .btn-lector-flotante:hover .tooltip-atajo,
        .btn-lector-flotante:focus-visible .tooltip-atajo { display: block; }

        body[class*="userway-s"] *,
        body[class*="userway-s"] *::before,
        body[class*="userway-s"] *::after {
            animation-play-state: paused !important;
            animation-duration: 0s !important;
            transition-duration: 0s !important;
            opacity: 1 !important;
            visibility: visible !important;
        }

        body[class*="userway-s"] [inert],
        body[class*="userway-s"] [data-uw-inert] {
            pointer-events: auto !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
        
        *:focus-visible {
            outline: 3px solid #ffda00 !important;
            outline-offset: 3px !important;
            border-radius: 4px !important;
        }
    </style>
    
    @yield('estilos')
</head>
<body>
    <!-- Header institucional -->
    @include('partials.publico.header')

    <!-- Contenido principal -->
    <main>
        @yield('contenido')
    </main>

    <!-- Footer institucional -->
    @include('partials.publico.footer')

    {{-- Banner de Cookies --}}
    @include('partials.publico.cookies-banner')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    function pausarCarruseles() {
        document.querySelectorAll('.carousel').forEach(function(carousel) {
            var bsCarousel = bootstrap.Carousel.getInstance(carousel);
            if (bsCarousel) { bsCarousel.pause(); }
        });
    }
    
    function reanudarCarruseles() {
        document.querySelectorAll('.carousel').forEach(function(carousel) {
            var bsCarousel = bootstrap.Carousel.getInstance(carousel);
            if (bsCarousel) { bsCarousel.cycle(); }
        });
    }
    </script>
    
    <script>
        window.onload = function() {
            if (performance.navigation.type === 1) { window.scrollTo(0, 0); }
        };
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('img[loading="lazy"]').forEach(img => {
            img.addEventListener('load', () => img.classList.add('loaded'));
            if (img.complete) img.classList.add('loaded');
        });
    });
    </script>

    <script>
        const observerAnimaciones = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) { entry.target.classList.add('se-ve-en-pantalla'); }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.animar-entrada, .animar-entrada-izquierda, .animar-entrada-derecha, .animar-escala, .animar-bounce, .animar-fundido').forEach(el => {
            observerAnimaciones.observe(el);
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function getElementosNavegables() {
            return document.querySelectorAll('a[href]:not([tabindex="-1"]), button:not([disabled]):not([tabindex="-1"]), .vertice-acordeon-btn, .btn-lector-flotante, [role="button"]:not([tabindex="-1"])');
        }
        
        const focoGuardado = sessionStorage.getItem('focoNavegacion');
        if (focoGuardado) {
            sessionStorage.removeItem('focoNavegacion');
            setTimeout(function() {
                var arr = Array.from(getElementosNavegables()).filter(function(el) { var r = el.getBoundingClientRect(); return r.width > 0 && r.height > 0; });
                if (arr.length > 0 && focoGuardado < arr.length) {
                    arr[focoGuardado].focus({ preventScroll: false });
                    arr[focoGuardado].scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }, 200);
        }
        
        document.addEventListener('keydown', function(e) {
            var tag = document.activeElement.tagName;
            var esCampo = ['INPUT', 'TEXTAREA', 'SELECT'].includes(tag) || document.activeElement.isContentEditable;
            if (esCampo) return;
            var arr = Array.from(getElementosNavegables()).filter(function(el) { var r = el.getBoundingClientRect(); return r.width > 0 && r.height > 0; });
            if (!arr.length) return;
            var actual = document.activeElement;
            var idx = arr.indexOf(actual);
            if (idx === -1) idx = 0;
            if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                e.preventDefault();
                var n = idx + 1; if (n >= arr.length) n = 0;
                arr[n].focus(); arr[n].scrollIntoView({ behavior: 'smooth', block: 'center' });
                sessionStorage.setItem('focoNavegacion', n.toString());
            }
            if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                e.preventDefault();
                var n = idx - 1; if (n < 0) n = arr.length - 1;
                arr[n].focus(); arr[n].scrollIntoView({ behavior: 'smooth', block: 'center' });
                sessionStorage.setItem('focoNavegacion', n.toString());
            }
            if (e.key === 'Enter') {
                setTimeout(function() {
                    var arr2 = Array.from(getElementosNavegables()).filter(function(el) { var r = el.getBoundingClientRect(); return r.width > 0 && r.height > 0; });
                    var idx2 = arr2.indexOf(document.activeElement);
                    if (idx2 >= 0) {
                        sessionStorage.setItem('focoNavegacion', idx2.toString());
                    }
                }, 50);
            }
        });
    });
    </script>

    {{-- ResponsiveVoice --}}
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=wM114ORM"></script>
    <script>
    let rvPaused = false;
    let rvSpeaking = false;
    let elementosTexto = [];
    let indiceActual = 0;
    let modalAbiertoPorLector = null;
    let elementosRespaldo = null;
    let indiceRespaldo = 0;

    function limpiarTexto(texto) {
        texto = texto.replace(/\¿/g, ' ');
        texto = texto.replace(/\¡/g, ' ');
        texto = texto.replace(/\"/g, ' ');
        texto = texto.replace(/\→/g, ' ');
        texto = texto.replace(/\▶/g, ' ');
        texto = texto.replace(/\–/g, ', ');

        texto = texto.replace(/CONAPDIS/gi, 'Conapdis');
        texto = texto.replace(/CONAPI/gi, 'Conapi');
        texto = texto.replace(/INASS/gi, 'Inass');
        texto = texto.replace(/SENCAMER/gi, 'Sencamer');

        texto = texto.replace(/\bFMJGH\b/gi, 'Fundación Misión José Gregorio Hernández');
        texto = texto.replace(/\bLSV\b/gi, 'Lengua de Señas Venezolana');
        texto = texto.replace(/\bLPD\b/gi, 'Ley para las Personas con Discapacidad');
        texto = texto.replace(/\bLIPI\b/gi, 'Ley para la Integración de las Personas Incapacitadas');
        texto = texto.replace(/\bSIGCAS\b/gi, 'Sistema Integrado de Gestión de Casos Sociales');
        texto = texto.replace(/\bPCD\b/gi, 'Personas con Discapacidad');
        texto = texto.replace(/\bABI\b/gi, 'A B I');

        texto = texto.replace(/\bcalle\b/gi, 'caye');
        texto = texto.replace(/\bellos\b/gi, 'eyos');
        texto = texto.replace(/\bella\b/gi, 'eya');
        texto = texto.replace(/\bellas\b/gi, 'eyas');
        texto = texto.replace(/\bpollo\b/gi, 'poyo');
        texto = texto.replace(/\bllave\b/gi, 'yave');
        texto = texto.replace(/\bllamar\b/gi, 'yamar');
        texto = texto.replace(/\bllevar\b/gi, 'yevar');
        texto = texto.replace(/\blleno\b/gi, 'yeno');
        texto = texto.replace(/\bcaballo\b/gi, 'cabayo');
        texto = texto.replace(/\bsello\b/gi, 'seyo');
        texto = texto.replace(/\btortilla\b/gi, 'tortiya');
        texto = texto.replace(/\bsilla\b/gi, 'siya');
        texto = texto.replace(/\bgallo\b/gi, 'gayo');
        texto = texto.replace(/\bfalla\b/gi, 'faya');
        texto = texto.replace(/\bmalla\b/gi, 'maya');
        texto = texto.replace(/\btalla\b/gi, 'taya');
        texto = texto.replace(/\bvalle\b/gi, 'vaye');
        texto = texto.replace(/\bdetalle\b/gi, 'detaye');
        texto = texto.replace(/\EDIF\b/gi, '. Edificio');
        texto = texto.replace(/\Edif\b/gi, '. Edificio');
        texto = texto.replace(/\MEZZANINA\b/gi, 'Mesanina');
        texto = texto.replace(/\Mezzanina\b/gi, 'Mesanina');
        texto = texto.replace(/\bconapdis.gob.ve\b/gi, 'Conapdis Punto G O B Punto B E');
        texto = texto.replace(/\bConapdisVzla\b/gi, 'Conapdis B Z L A');

        texto = texto.replace(/\s+/g, ' ');
        texto = texto.trim();
        return texto;
    }

    function esFondoOscuro(elemento) {
        const bgColor = window.getComputedStyle(elemento).backgroundColor;
        const rgb = bgColor.match(/\d+/g);
        if (!rgb) return false;
        const brillo = (parseInt(rgb[0]) * 299 + parseInt(rgb[1]) * 587 + parseInt(rgb[2]) * 114) / 1000;
        return brillo < 128;
    }

    function resaltarElemento(elemento) {
        document.querySelectorAll('.rv-resaltado-claro, .rv-resaltado-oscuro').forEach(el => {
            el.classList.remove('rv-resaltado-claro', 'rv-resaltado-oscuro');
        });
        if (elemento) {
            if (esFondoOscuro(elemento)) {
                elemento.classList.add('rv-resaltado-oscuro');
            } else {
                elemento.classList.add('rv-resaltado-claro');
            }
            elemento.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    const ETIQUETAS_BLOQUE = new Set([
        'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'P', 'LI', 'TD', 'TH', 
        'BLOCKQUOTE', 'FIGCAPTION', 'DT', 'DD', 'LEGEND', 'SUMMARY',
        'BUTTON', 'A', 'SPAN', 'STRONG', 'B', 'I', 'EM', 'LABEL'
    ]);

    const ETIQUETAS_PADRE = new Set([
        'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'P', 'LI', 'TD', 'TH', 
        'BLOCKQUOTE', 'FIGCAPTION', 'DT', 'DD', 'LEGEND', 'SUMMARY'
    ]);

    function obtenerAncestroBloque(elemento) {
        let actual = elemento;
        while (actual) {
            if (ETIQUETAS_BLOQUE.has(actual.tagName)) {
                let padre = actual.parentElement;
                while (padre) {
                    if (ETIQUETAS_PADRE.has(padre.tagName)) {
                        return padre;
                    }
                    if (ETIQUETAS_BLOQUE.has(padre.tagName)) {
                        padre = padre.parentElement;
                    } else {
                        break;
                    }
                }
                return actual;
            }
            actual = actual.parentElement;
        }
        return elemento;
    }

    function obtenerElementosTexto(contenedor) {
        const raiz = contenedor || document.querySelector('main');
        if (!raiz) return [];
        
        const walker = document.createTreeWalker(
            raiz,
            NodeFilter.SHOW_TEXT,
            {
                acceptNode: function(node) {
                    if (!node.textContent.trim()) return NodeFilter.FILTER_REJECT;
                    
                    let el = node.parentElement;
                    while (el && el !== raiz) {
                        if (el.offsetParent === null && el.tagName !== 'BODY') return NodeFilter.FILTER_REJECT;
                        const style = window.getComputedStyle(el);
                        if (style.display === 'none' || style.visibility === 'hidden') return NodeFilter.FILTER_REJECT;
                        el = el.parentElement;
                    }
                    
                    if (['SVG', 'PATH', 'STYLE', 'SCRIPT', 'NOSCRIPT'].includes(node.parentElement.tagName)) {
                        return NodeFilter.FILTER_REJECT;
                    }
                    
                    return NodeFilter.FILTER_ACCEPT;
                }
            }
        );
        
        const grupos = new Map();
        const ordenAncestros = [];
        
        let node;
        while (node = walker.nextNode()) {
            const ancestro = obtenerAncestroBloque(node.parentElement);
            const texto = node.textContent.trim();
            
            if (!grupos.has(ancestro)) {
                grupos.set(ancestro, []);
                ordenAncestros.push(ancestro);
            }
            grupos.get(ancestro).push(texto);
        }
        
        const elementosValidos = [];
        
        for (const ancestro of ordenAncestros) {
            const textos = grupos.get(ancestro);
            const textoCompleto = textos.join(' ').replace(/\s+/g, ' ').trim();
            
            if (textoCompleto.length > 0) {
                elementosValidos.push({ elemento: ancestro, texto: textoCompleto });
            }
        }
        
        return elementosValidos;
    }

    function hayModalAbierto() {
        const modales = document.querySelectorAll('.modal.show');
        return modales.length > 0 ? modales[0] : null;
    }

    function leerPagina() {
        const seleccion = window.getSelection().toString().trim();
        if (seleccion) {
            if (rvPaused) { responsiveVoice.resume(); rvPaused = false; return; }
            pausarCarruseles();
            const textoLimpio = limpiarTexto(seleccion);
            responsiveVoice.speak(textoLimpio, "Spanish Latin American Male", {
                rate: 0.95, pitch: 1, volume: 1,
                onstart: () => { rvSpeaking = true; rvPaused = false; },
                onend: () => { rvSpeaking = false; rvPaused = false; reanudarCarruseles(); },
                onerror: () => { rvSpeaking = false; rvPaused = false; reanudarCarruseles(); }
            });
            return;
        }

        if (rvPaused) { responsiveVoice.resume(); rvPaused = false; return; }

        if (rvSpeaking) {
            responsiveVoice.cancel();
            document.querySelectorAll('.rv-resaltado-claro, .rv-resaltado-oscuro').forEach(el => {
                el.classList.remove('rv-resaltado-claro', 'rv-resaltado-oscuro');
            });
            if (modalAbiertoPorLector) {
                const instance = bootstrap.Modal.getInstance(modalAbiertoPorLector);
                if (instance) instance.hide();
                modalAbiertoPorLector = null;
            }
            elementosRespaldo = null;
            reanudarCarruseles();
        }

        const modalUsuario = hayModalAbierto();
        if (modalUsuario && !modalAbiertoPorLector) {
            pausarCarruseles();
            modalAbiertoPorLector = modalUsuario;
            elementosRespaldo = null;
            
            const modalBody = modalUsuario.querySelector('.modal-body');
            if (modalBody) {
                elementosTexto = obtenerElementosTexto(modalBody);
                indiceActual = 0;
                rvSpeaking = false;
                rvPaused = false;
                
                if (elementosTexto.length > 0) {
                    leerSiguienteElemento();
                    return;
                }
            }
            const instance = bootstrap.Modal.getInstance(modalUsuario);
            if (instance) instance.hide();
            modalAbiertoPorLector = null;
        }

        pausarCarruseles();
        elementosTexto = obtenerElementosTexto();
        indiceActual = 0;
        rvSpeaking = false;
        rvPaused = false;
        elementosRespaldo = null;
        
        if (elementosTexto.length === 0) { reanudarCarruseles(); return; }
        
        leerSiguienteElemento();
    }

    function leerSiguienteElemento() {
        if (indiceActual >= elementosTexto.length) {
            document.querySelectorAll('.rv-resaltado-claro, .rv-resaltado-oscuro').forEach(el => {
                el.classList.remove('rv-resaltado-claro', 'rv-resaltado-oscuro');
            });
            
            if (modalAbiertoPorLector) {
                const instance = bootstrap.Modal.getInstance(modalAbiertoPorLector);
                if (instance) instance.hide();
                modalAbiertoPorLector = null;
                
                if (elementosRespaldo) {
                    elementosTexto = elementosRespaldo;
                    indiceActual = indiceRespaldo + 1;
                    elementosRespaldo = null;
                    rvSpeaking = false;
                    rvPaused = false;
                    leerSiguienteElemento();
                    return;
                }
                
                setTimeout(function() {
                    elementosTexto = obtenerElementosTexto();
                    indiceActual = 0;
                    rvSpeaking = false;
                    rvPaused = false;
                    
                    while (indiceActual < elementosTexto.length) {
                        const el = elementosTexto[indiceActual].elemento;
                        if ((el.tagName === 'BUTTON' && el.hasAttribute('data-bs-target')) || el.closest('.modal')) {
                            indiceActual++;
                        } else {
                            break;
                        }
                    }
                    
                    if (indiceActual < elementosTexto.length) {
                        leerSiguienteElemento();
                    } else {
                        reanudarCarruseles();
                    }
                }, 300);
                return;
            }
            
            rvSpeaking = false; rvPaused = false; reanudarCarruseles(); return;
        }

        const item = elementosTexto[indiceActual];
        const elemento = item.elemento;
        resaltarElemento(elemento);
        let texto = limpiarTexto(item.texto);
        
        if (!modalAbiertoPorLector && elemento.tagName === 'BUTTON' && elemento.hasAttribute('data-bs-target')) {
            const modalId = elemento.getAttribute('data-bs-target');
            const modalElement = document.querySelector(modalId);
            
            if (modalElement && modalElement.classList.contains('modal')) {
                const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
                modalInstance.show();
                modalAbiertoPorLector = modalElement;
                
                modalElement.addEventListener('shown.bs.modal', function alAbrir() {
                    modalElement.removeEventListener('shown.bs.modal', alAbrir);
                    
                    elementosRespaldo = elementosTexto;
                    indiceRespaldo = indiceActual;
                    
                    const modalBody = modalElement.querySelector('.modal-body');
                    if (modalBody) {
                        elementosTexto = obtenerElementosTexto(modalBody);
                        indiceActual = 0;
                        leerSiguienteElemento();
                    } else {
                        const inst = bootstrap.Modal.getInstance(modalElement);
                        if (inst) inst.hide();
                        modalAbiertoPorLector = null;
                        indiceActual++;
                        leerSiguienteElemento();
                    }
                }, { once: true });
                
                return;
            }
        }
        
        if (!texto) { indiceActual++; leerSiguienteElemento(); return; }
        
        responsiveVoice.speak(texto, "Spanish Latin American Male", {
            rate: 0.95, pitch: 1, volume: 1,
            onstart: () => { rvSpeaking = true; rvPaused = false; },
            onend: () => { indiceActual++; leerSiguienteElemento(); },
            onerror: () => { indiceActual++; leerSiguienteElemento(); }
        });
    }

    function pausarLectura() {
        if (responsiveVoice.isPlaying()) { responsiveVoice.pause(); }
        rvPaused = true;
        rvSpeaking = false;
        reanudarCarruseles();
    }

    function reanudarLectura() {
        if (rvPaused) { responsiveVoice.resume(); }
        rvPaused = false;
        rvSpeaking = true;
        pausarCarruseles();
    }

    function detenerLectura() {
        responsiveVoice.cancel();
        document.querySelectorAll('.rv-resaltado-claro, .rv-resaltado-oscuro').forEach(el => {
            el.classList.remove('rv-resaltado-claro', 'rv-resaltado-oscuro');
        });
        if (modalAbiertoPorLector) {
            const instance = bootstrap.Modal.getInstance(modalAbiertoPorLector);
            if (instance) instance.hide();
            modalAbiertoPorLector = null;
        }
        elementosRespaldo = null;
        rvSpeaking = false; rvPaused = false; indiceActual = 0; reanudarCarruseles();
    }

    document.addEventListener('keydown', function(e) {
        var tag = document.activeElement.tagName;
        var esCampo = ['INPUT', 'TEXTAREA', 'SELECT'].includes(tag) || document.activeElement.isContentEditable;
        
        if (e.key === ' ' && e.ctrlKey && !esCampo) {
            e.preventDefault();
            detenerLectura();
            return;
        }

        if (e.key === ' ' && !esCampo && !e.ctrlKey) {
            e.preventDefault();
            if (!rvSpeaking && !rvPaused) { leerPagina(); }
            else if (rvPaused) { reanudarLectura(); }
            else if (rvSpeaking) { pausarLectura(); }
        }
    });
    </script>

    {{-- UserWay --}}
    <script>
    (function(d) {
        var s = d.createElement("script");
        s.setAttribute("data-account", "G7rljmsW7j");
        s.setAttribute("src", "https://cdn.userway.org/widget.js");
        s.setAttribute("defer", "true");
        s.setAttribute("data-size", "small");
        (d.body || d.head).appendChild(s);
    })(document);
    </script>
    <noscript>Habilite JavaScript para usar <a href="https://userway.org">herramientas de accesibilidad</a></noscript>

    {{-- Botón Escuchar --}}
    <button onclick="leerPagina()" title="Escuchar página" aria-label="Escuchar página (Espacio)" tabindex="0" class="btn-lector-flotante" style="position:fixed;bottom:100px;right:20px;z-index:9999;width:55px;height:55px;border-radius:50%;background:#003097;border:3px solid #ffda00;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 15px rgba(0,0,0,0.3);transition:transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" onfocus="this.style.transform='scale(1.1)'" onblur="this.style.transform='scale(1)'">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#ffda00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>
        <span class="tooltip-atajo">Espacio: iniciar/pausar</span>
    </button>

    {{-- Botón Pausar/Reanudar --}}
    <button onclick="rvPaused?reanudarLectura():pausarLectura()" title="Pausar/Reanudar" aria-label="Pausar o reanudar (Espacio)" tabindex="0" class="btn-lector-flotante" style="position:fixed;bottom:165px;right:20px;z-index:9999;width:40px;height:40px;border-radius:50%;background:#ffda00;border:2px solid #003097;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 10px rgba(0,0,0,0.3);" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" onfocus="this.style.transform='scale(1.1)'" onblur="this.style.transform='scale(1)'">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="#003097" stroke="#003097" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        <span class="tooltip-atajo">Espacio: pausar/reanudar</span>
    </button>

    {{-- Botón Detener --}}
    <button onclick="detenerLectura()" title="Detener" aria-label="Detener (Ctrl+Espacio)" tabindex="0" class="btn-lector-flotante" style="position:fixed;bottom:213px;right:20px;z-index:9999;width:40px;height:40px;border-radius:50%;background:#ef172f;border:2px solid #fff;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 10px rgba(0,0,0,0.3);" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" onfocus="this.style.transform='scale(1.1)'" onblur="this.style.transform='scale(1)'">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"/></svg>
        <span class="tooltip-atajo">Ctrl+Espacio: detener</span>
    </button>
    
    @yield('scripts')
</body>
</html>