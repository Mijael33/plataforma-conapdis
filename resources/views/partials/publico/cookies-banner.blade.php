@unless(request()->cookie('cookies_aceptadas'))
<div id="cookiesBanner" style="position: fixed; bottom: 0; left: 0; right: 0; background: #001e5c; color: #fff; padding: 1rem 2rem; z-index: 9999; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; box-shadow: 0 -4px 20px rgba(0,0,0,0.3);">
    <p style="margin: 0; font-size: 0.9rem; flex: 1; min-width: 250px;">
        Utilizamos cookies para mejorar su experiencia. Al continuar navegando, acepta nuestra 
        <a href="{{ route('publico.privacidad') }}" style="color: #ffda00; text-decoration: underline;">Política de Privacidad</a> y 
        <a href="{{ route('publico.terminos') }}" style="color: #ffda00; text-decoration: underline;">Términos de Uso</a>.
    </p>
    <button onclick="aceptarCookies()" style="background: #ffda00; color: #003097; border: none; padding: 0.5rem 1.5rem; border-radius: 50px; font-weight: 700; cursor: pointer; white-space: nowrap;">Aceptar</button>
</div>
<script>
// Verificar localStorage al cargar la página
if (localStorage.getItem('cookies_aceptadas') === '1') {
    var banner = document.getElementById('cookiesBanner');
    if (banner) banner.style.display = 'none';
}

function aceptarCookies() {
    var banner = document.getElementById('cookiesBanner');
    if (banner) banner.style.display = 'none';
    
    // Guardar en localStorage (más confiable en localhost)
    localStorage.setItem('cookies_aceptadas', '1');
    
    // Guardar cookie tradicional
    var fecha = new Date();
    fecha.setFullYear(fecha.getFullYear() + 1);
    document.cookie = "cookies_aceptadas=1; path=/; expires=" + fecha.toUTCString() + "; SameSite=Lax";
}
</script>
@endunless