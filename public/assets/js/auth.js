/**
 * Lógica de Autenticación (Login)
 */
(function () {
  'use strict'

  const loginForm = document.querySelector('form'); // Asumiendo que es el único form
  
  if(loginForm) {
      loginForm.addEventListener('submit', function (event) {
          // 1. Detener el envío tradicional
          event.preventDefault();
          event.stopPropagation();

          // 2. Validar campos vacíos (Bootstrap)
          if (!loginForm.checkValidity()) {
              loginForm.classList.add('was-validated');
              return;
          }

          // 3. Preparar datos
          const formData = new FormData(loginForm);
          const data = Object.fromEntries(formData.entries());
          const btnSubmit = loginForm.querySelector('button[type="submit"]');

          // Efecto de carga
          const textoOriginal = btnSubmit.innerText;
          btnSubmit.disabled = true;
          btnSubmit.innerText = "Verificando...";

          // 4. Enviar a Laravel (Usando la config del Blade)
          fetch(window.AuthConfig.apiLogin, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json'
              },
              body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(response => {
              if (response.access_token) {
                  // ✅ ÉXITO: Guardar Token y Redirigir
                  localStorage.setItem('auth_token', response.access_token);
                  localStorage.setItem('user_role', response.role); // Guardamos el rol también

                  // Redirección inteligente
                  if(response.role === 'admin') {
                      window.location.href = window.AuthConfig.urlAdmin;
                  } else {
                      window.location.href = window.AuthConfig.urlStaff;
                  }
              } else {
                  // ❌ ERROR: Credenciales mal
                  alert(response.message || "Error al iniciar sesión");
                  btnSubmit.disabled = false;
                  btnSubmit.innerText = textoOriginal;
              }
          })
          .catch(error => {
              console.error('Error:', error);
              alert("Error de conexión con el servidor");
              btnSubmit.disabled = false;
              btnSubmit.innerText = textoOriginal;
          });
      }, false);
  }

})();