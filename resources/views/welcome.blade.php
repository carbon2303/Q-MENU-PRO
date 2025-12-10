<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Página Principal - Q-Menu</title>
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

  <!-- CSS Files -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('assets/img/logo-qmenu.png') }}" alt="">
        <h1 class="sitename">Q-Menu</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/#hero') }}" class="active">Inicio</a></li>
          <li><a href="{{ url('/#about') }}">Sobre nosotros</a></li>
          <li><a href="{{ url('/#services') }}">Funcionalidades</a></li>
          <li><a href="{{ url('/#team') }}">Equipo</a></li>
          <li><a href="{{ url('/#contact') }}">Contacto</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ url('/login') }}">Iniciar sesión</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="section hero light-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
            <h1>Tecnología Inclusiva para Cocinas Modernas</h1>
            <p>El primer KDS diseñado para personas con discapacidad auditiva y visual. Gestión eficiente, sin barreras.</p>
            <div class="d-flex">
              <a href="{{ url('menu') }}" target="_blank" class="btn-get-started">Ver Demo</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="section about">

      <div class="container">

        <div class="row gy-3">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('assets/img/about-img.png') }}" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-0 ps-lg-3">
              <h3>¿Por qué un KDS Inclusivo?</h3>
              <p class="fst-italic">
                Las cocinas tradicionales dependen de gritos y tickets impresos pequeños, excluyendo a gran talento.
                Nuestro sistema digitaliza el flujo con alertas sensoriales adaptativas.
              </p>
              <ul>
                <li>
                  <i class="bi bi-person-lines-fill" style="color: var(--contrast-color);"></i>
                  <div>
                    <h4>Diseño de Alto Contraste (WCAG AA/AAA)</h4>
                    <p>Nuestra interfaz garantiza lectura clara y reduce la fatiga visual.</p>
                  </div>
                </li>
                <li>
                  <i class="bi bi-bell" style="color: var(--contrast-color);"></i>
                  <div>
                    <h4>Alertas Sensoriales Adaptativas</h4>
                    <p>Las comandas nuevas se notifican con alertas visuales y vibración opcional.</p>
                  </div>
                </li>
              </ul>
            </div>

          </div>
        </div>

      </div>

    </section>
    <!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>Funcionalidades</h2>
        <p>Nuestro KDS cuenta con funcionalidades únicas en su especie</p>
      </div>

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-tablet-landscape icon"></i></div>
              <h4><a href="#" class="stretched-link">Pantalla KDS</a></h4>
              <p>Visualización de comandas en tiempo real.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-eye-fill icon"></i></div>
              <h4><a href="#" class="stretched-link">Modo Inclusivo</a></h4>
              <p>Ajustes para debilidad visual.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-hdd-network icon"></i></div>
              <h4><a href="#" class="stretched-link">API Rest</a></h4>
              <p>Sincronización instantánea con Laravel.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-graph-up-arrow icon"></i></div>
              <h4><a href="#" class="stretched-link">Métricas</a></h4>
              <p>Análisis para optimizar procesos.</p>
            </div>
          </div>

        </div>

      </div>

    </section>
    <!-- /Services Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Equipo Q-Menu</h2>
      </div>

      <div class="container">

        <div class="row gy-4 justify-content-center">

          <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="{{ asset('assets/img/team/team-1.png') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Brandon Medina</h4>
                  <span>Chief Executive Officer</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="{{ asset('assets/img/team/team-2.png') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Valentina Arroyo</h4>
                  <span>Product Manager</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="{{ asset('assets/img/team/team-3.png') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Eliam García</h4>
                  <span>CTO</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>
    <!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Contacto</h2>
        <p>Contáctanos para más información</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Dirección</h3>
                  <p>Av. Ing. Carlos Rojas Gutierrez 2120, Fracc. Valle De La Herradura, 61100 Cdad. Hidalgo, Mich.</p>
                </div>
              </div>

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Contáctanos</h3>
                  <p>+52 786 121 8294</p>
                </div>
              </div>

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Correo Electrónico</h3>
                  <p>s22030154@itsch.edu.mx</p>
                </div>
              </div>

              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.084253129486!2d-100.51748429999999!3d19.709036800000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d2c96863056895%3A0xca9e49c6afaff57b!2sInstituto%20Tecnol%C3%B3gico%20Superior%20De%20Ciudad%20Hidalgo!5e0!3m2!1ses-419!2smx!4v1763455101935!5m2!1ses-419!2smx"
                frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
              data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Nombre(s)</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Correo Electrónico</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Mensaje</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Cargando</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Tu mensaje ha sido enviado. Gracias!</div>

                  <button type="submit">Enviar mensaje</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>
    <!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">Q-Menu</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Av. Ing. Carlos Rojas Gutierrez 2120, Fracc. Valle De La Herradura</p>
            <p>61100 Cdad. Hidalgo, Mich.</p>
            <p class="mt-3"><strong>Teléfono:</strong> <span>+52 786 121 8294</span></p>
            <p><strong>Correo Electrónico:</strong> <span>s22030154@itsch.edu.mx</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Página principal</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Sobre nosotros</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Servicio al cliente</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Términos de servicio</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Diseño Web</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Desarrollo Web</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Síguenos</h4>
          <p>Síguenos en nuestras redes sociales</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span>
        <strong class="px-1 sitename">Q-Menu</strong> <span>All Rights Reserved</span>
      </p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

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

</body>

</html>
