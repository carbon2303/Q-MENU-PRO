<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Iniciar sesión - Q-Menu</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="starter-page-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('assets/img/logo-qmenu.png') }}" alt="">
        <h1 class="sitename">Q-Menu</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <section class="d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 150px); background-color: var(--background-color);">
      
      <div class="container">
        <div class="row justify-content-center">
          
          <div class="col-xl-5 col-lg-6 col-md-8">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
              
              <div class="card-header text-center py-4 border-0" style="background-color: var(--accent-color);">
                <h3 class="mb-0 text-white fw-bold" style="font-family: 'Comfortaa', sans-serif;">Iniciar Sesión</h3>
              </div>

              <div class="card-body p-4 p-md-5">
                
                <form action="{{ url('login') }}" method="POST" class="needs-validation" novalidate>
                  @csrf
                  
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com" required>
                    <label for="email" class="text-muted">Correo Electrónico</label>
                    <div class="invalid-feedback">Ingresa un correo válido.</div>
                  </div>

                  <div class="form-floating mb-4">
                    <input type="password" class="form-control" name="password" id="pass" placeholder="Contraseña" required>
                    <label for="pass" class="text-muted">Contraseña</label>
                    <div class="invalid-feedback">Ingresa tu contraseña.</div>
                  </div>

                  <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-3 shadow-sm" 
                          style="background-color: var(--accent-color); border:none; font-size: 1.1rem;">
                    INICIAR SESIÓN
                  </button>

                </form>

                <div class="text-center mt-4 pt-2 border-top">
                  <p class="small text-muted mb-2">¿Aún no tienes cuenta?</p>
                  <a href="{{ url('register') }}" class="fw-bold text-decoration-none" style="color: var(--heading-color);">
                    Crear una cuenta nueva
                  </a>
                </div>
                
              </div>
            </div>
            
            <div class="text-center mt-4">
               <a href="{{ url('/') }}" class="small text-muted text-decoration-none">
                 <i class="bi bi-arrow-left me-1"></i> Volver al Inicio
               </a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Q-Menu</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
      window.AuthConfig = {
          apiLogin: "{{ url('/api/login') }}",    // Ruta de la API
          urlAdmin: "{{ url('/admin') }}",        // Redirección para Gerente
          urlStaff: "{{ url('/staff') }}"         // Redirección para Cocina
      };
  </script>

  <!-- Validación de formularios -->
  <script src="{{ asset('assets/js/auth.js') }}"></script>

</body>

</html>
