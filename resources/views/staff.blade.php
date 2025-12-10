<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Panel de Personal - Q-Menu</title>

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet"> </head>

    <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<!-- CSS Files -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>

<body class="dashboard-body">

    <header id="header" class="header d-flex align-items-center sticky-top header-dashboard">
        <div class="container-fluid d-flex align-items-center justify-content-between px-4">

            <a href="#" class="logo d-flex align-items-center text-decoration-none">
                <img src="{{ asset('assets/img/logo-qmenu.') }}" alt="">
                <h1 class="sitename">Q-Menu <span class="badge bg-secondary fs-6 ms-2 align-middle">Staff</span></h1>
            </a>

            <div class="d-flex align-items-center">
                <span class="me-3 d-none d-md-block text-muted">Hola, <strong>Equipo</strong></span>
                <a class="btn btn-outline-danger btn-sm rounded-pill px-3" href="{{ url('/login') }}">Salir</a>
            </div>

        </div>
    </header>

    <main class="main container py-5">

        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold text-dark">Panel de Operaciones</h3>
                <p class="text-muted">Gestión de servicio para el restaurante <strong>Los Tacos de Brandon</strong></p>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8 mb-4">
                <div class="card card-dashboard border-top-accent h-100 p-4 text-center">
                    <div class="card-body">
                        <div class="mb-4">
                            <i class="bi bi-display icon-large"></i>
                        </div>
                        <h3 class="card-title mb-3">Iniciar Servicio de Cocina</h3>
                        <p class="card-text text-muted mb-4">
                            Abre la pantalla KDS en este dispositivo para comenzar a recibir comandas.
                            Recuerda poner el navegador en Pantalla Completa (F11).
                        </p>

                        <a href="{{ url('/kds') }}" target="_blank" class="btn btn-dashboard-primary w-100 btn-lg">
                            <i class="bi bi-rocket-takeoff me-2"></i> LANZAR PANTALLA KDS
                        </a>
                    </div>
                    <div class="card-footer bg-white border-0 text-muted small mt-2">
                        <i class="bi bi-circle-fill text-success me-1" style="font-size: 8px;"></i> En Línea
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card card-dashboard h-100 p-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-info-circle me-2"></i>Soporte Rápido</h5>
                        <p class="small text-muted">Si la pantalla no muestra las órdenes o se desconecta, intenta estos
                            pasos:</p>
                        <ul class="list-group list-group-flush small mb-3">
                            <li class="list-group-item"><i class="bi bi-1-circle me-2"></i>Recarga la página (F5)</li>
                            <li class="list-group-item"><i class="bi bi-2-circle me-2"></i>Verifica el Wi-Fi</li>
                            <li class="list-group-item"><i class="bi bi-3-circle me-2"></i>Contacta al Gerente</li>
                        </ul>
                        <button class="btn btn-outline-secondary w-100 btn-sm mt-auto">Ver Manual de Usuario</button>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <footer class="text-center py-4 text-muted small">
        <p>© 2025 Q-Menu KDS. Todos los derechos reservados.</p>
    </footer>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>