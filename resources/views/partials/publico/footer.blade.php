<footer class="conapdis-footer">
    <div class="container">
        <div class="row">
            <!-- Columna CONAPDIS -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('images/logos/logo-conapdis.png') }}" alt="CONAPDIS" class="footer-logo mb-3">
                <p>Consejo Nacional para las Personas con Discapacidad, ente rector en políticas de inclusión y garantía de derechos.</p>
                <p><strong>RIF:</strong> G-200006838</p>
            </div>
            
            <!-- Columna Enlaces -->
            <div class="col-md-2 mb-4">
                <h5>Enlaces</h5>
                <ul>
                    <li><a href="{{ route('publico.institucion.mision') }}">Misión</a></li>
                    <li><a href="{{ route('publico.institucion.vision') }}">Visión</a></li>
                    <li><a href="{{ route('publico.institucion.resena') }}">Reseña Histórica</a></li>
                    <li><a href="{{ route('publico.institucion.principios') }}">Principios y Valores</a></li>
                    <li><a href="{{ route('publico.noticias') }}">Noticias</a></li>
                    <li><a href="{{ route('publico.cursos') }}">Formaciones</a></li>
                </ul>
            </div>
            
            <!-- Columna Contacto -->
            <div class="col-md-3 mb-4">
                <h5>Contacto</h5>
                <ul class="contacto-lista">
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        conapdis@gmail.com
                    </li>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        0212-7620039
                    </li>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        0212-7627959
                    </li>
                </ul>
            </div>
            
            <!-- Columna Redes Sociales -->
            <div class="col-md-3 mb-4">
                <h5>Redes Sociales</h5>
                <div class="redes-sociales">
                    <a href="{{ route('publico.redes.show', 'instagram') }}" class="red-social-link" title="Instagram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        Instagram
                    </a>
                    <a href="{{ route('publico.redes.show', 'facebook') }}" class="red-social-link" title="Facebook">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        Facebook
                    </a>
                    <a href="{{ route('publico.redes.show', 'tiktok') }}" class="red-social-link" title="TikTok">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>
                        TikTok
                    </a>
                    <a href="{{ route('publico.redes.show', 'youtube') }}" class="red-social-link" title="YouTube">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
                        YouTube
                    </a>
                    <a href="{{ route('publico.redes.show', 'telegram') }}" class="red-social-link" title="Telegram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2.5L2.5 10.5l5 2.5 3-3 5 5 3-10.5z"></path><path d="M7.5 13l2 5 3-3"></path></svg>
                        Telegram
                    </a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom text-center mt-4 pt-3">
            <p class="mb-0">
                &copy; {{ date('Y') }} CONAPDIS - Todos los derechos reservados. | 
                <a href="{{ route('publico.acerca-de') }}" class="text-decoration-none" style="color: #ffda00;">Acerca de</a> | 
                <a href="{{ route('publico.privacidad') }}" class="text-decoration-none" style="color: #ffda00;">Privacidad</a> | 
                <a href="{{ route('publico.terminos') }}" class="text-decoration-none" style="color: #ffda00;">Términos</a>
            </p>
        </div>
    </div>
</footer>