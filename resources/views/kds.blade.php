<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>KDS Cocina - Q-Menu</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/dashboard.css" rel="stylesheet">
</head>

<body class="kds-body">

  <nav class="navbar navbar-dark bg-dark border-bottom border-secondary px-3">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="assets/img/logo-qmenu.png" alt="" width="30" class="d-inline-block align-text-top me-2">
        <span class="fw-bold">Pantalla de Cocina</span>
      </a>
      
      <div class="d-flex gap-2">
        <span class="badge bg-success d-flex align-items-center"><i class="bi bi-wifi me-1"></i> Conectado</span>
        <button class="btn btn-outline-light btn-sm" onclick="toggleFullScreen()">
            <i class="bi bi-arrows-fullscreen"></i>
        </button>
      </div>
    </div>
  </nav>

  <div class="container-fluid py-4">
    
    <div class="row" id="orders-container">
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <!-- Aqui aparecerán las ordenes -->
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
  <script>
      window.KdsConfig = {
          apiUrl: "{{ url('/api/kds/ordenes') }}"
      };
  </script>
  
  <script src="{{ asset('assets/js/kds.js') }}"></script>

</body>
</html>