/**
 * GUARDIÁN DE RUTAS (Frontend Security)
 * Versión Robusta: Usa configuración inyectada desde Blade.
 */
(function() {
    // 1. Recuperar credenciales
    const token = localStorage.getItem('auth_token');
    const role = localStorage.getItem('user_role');
    const path = window.location.pathname;

    // 2. Recuperar rutas correctas (o usar fallback si falla)
    const config = window.GuardConfig || { loginUrl: '/login', staffUrl: '/staff', adminUrl: '/admin' };

    console.log("🛡️ Verificando acceso...");

    // 3. Validación: SIN TOKEN -> FUERA
    if (!token) {
        console.warn("⛔ No hay token. Redirigiendo...");
        window.location.href = config.loginUrl;
        return; // Detener ejecución
    }

    // 4. Validación: ROL INCORRECTO (Protección de Admin)
    // Si la URL actual coincide con la URL de admin, pero el rol NO es admin...
    if (path.includes('/admin') && role !== 'admin') {
        alert("⛔ Acceso denegado: Área restringida para Gerentes.");
        window.location.href = config.staffUrl;
        return;
    }

    // 5. Validación: ROL INCORRECTO (Protección General)
    // Si el rol no es ni admin ni staff (algo raro pasó)
    if (role !== 'admin' && role !== 'staff') {
        localStorage.clear(); // Borrar datos corruptos
        window.location.href = config.loginUrl;
        return;
    }

    // ✅ ÉXITO: El usuario tiene permiso.
    // Quitamos el "velo" blanco para mostrar la página.
    console.log("✅ Acceso autorizado.");
    document.documentElement.style.display = 'block';

})();