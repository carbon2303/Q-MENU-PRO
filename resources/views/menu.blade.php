<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Menú Digital - Q-Menu</title>
  
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
  
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>

<body class="dashboard-body">

  <header id="header" class="header-dashboard sticky-top">
    <div class="container d-flex align-items-center justify-content-between px-3">
      <a href="#" class="logo d-flex align-items-center text-decoration-none">
        <img src="{{ asset('assets/img/logo-qmenu.png') }}" alt="">
        <h1 class="sitename">Q-Menu <span class="text-muted fs-6 ms-2">Cliente</span></h1>
      </a>
      <div class="d-flex align-items-center">
        <div class="bg-light px-3 py-2 rounded-pill border d-flex align-items-center">
            <i class="bi bi-geo-alt-fill text-danger me-2"></i>
            <span class="fw-bold me-2">Mesa:</span>
            <select class="form-select form-select-sm border-0 bg-transparent py-0 fw-bold text-primary" style="width: auto; cursor: pointer;">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
            </select>
        </div>
      </div>
    </div>
  </header>

  <main class="main container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-lg-8">
            <h2 class="fw-bold" style="font-family: 'Comfortaa';">¿Qué se te antoja hoy? 😋</h2>
            <p class="text-muted">Selecciona tus platillos favoritos</p>
        </div>
        <div class="col-lg-4">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-start-0 rounded-end-pill" placeholder="Buscar...">
            </div>
        </div>
    </div>

    <div class="d-flex gap-2 category-scroll mb-4">
        <button class="category-pill active">🍔 Todo</button>
        <button class="category-pill">🍽️ Platos Fuertes</button>
        <button class="category-pill">🥤 Bebidas</button>
        <button class="category-pill">🍰 Postres</button>
    </div>

    <div id="menu-container" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 mb-5">
        <div class="text-center w-100 py-5" id="loading-spinner">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-2 text-muted">Cargando menú...</p>
        </div>
    </div>
  </main>

  <a href="#" class="floating-cart text-decoration-none shadow-lg" data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" aria-controls="cartSidebar">
    <i class="bi bi-basket2-fill fs-4"></i>
    <div class="d-flex flex-column align-items-start lh-1">
        <span class="small opacity-75 text-white">Ver carrito</span>
        <span id="floating-total" class="fw-bold">0 ítems</span>
    </div>
  </a>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel" style="background-color: #f8f9fa;">
    <div class="offcanvas-header border-bottom bg-white shadow-sm">
      <h5 class="offcanvas-title fw-bold text-dark" id="cartSidebarLabel" style="font-family: 'Comfortaa';">
        <i class="bi bi-cart3 me-2 text-primary"></i>Tu Orden
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column p-0">
      <div id="cart-items-wrapper" class="flex-grow-1 overflow-auto p-3">
        <div class="text-center text-muted mt-5" id="empty-cart-msg">
            <i class="bi bi-basket2 display-1 opacity-25"></i>
            <p class="mt-3">Tu canasta está vacía</p>
        </div>
      </div>
      <div class="p-3 bg-white border-top">
        <label for="kitchenNotes" class="form-label fw-bold small text-muted mb-1">
            <i class="bi bi-pencil-fill me-1"></i> Notas para Cocina
        </label>
        <textarea class="form-control bg-light border-0 small" id="kitchenNotes" rows="2" placeholder="Ej: Sin cebolla..."></textarea>
      </div>
    </div>
    <div class="offcanvas-footer p-3 bg-white border-top shadow-lg">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted small fw-bold">TOTAL</span>
        <span class="fs-3 fw-bold text-dark" id="cart-total">$0.00</span>
      </div>
      <button class="btn btn-success w-100 py-3 fw-bold rounded-3 shadow-sm" onclick="sendOrder()" style="background-color: var(--accent-color); border:none;">
        <i class="bi bi-check-circle-fill me-2"></i> ENVIAR
      </button>
    </div>
  </div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  
  <script>
      const apiUrl = "{{ url('/api/menu') }}";       // Para ver las hamburguesas
      // const apiOrderUrl = "{{ url('/api/ordenar') }}"; // <--- NUEVA: Para enviar el pedido
  </script>
  <script src="{{ asset('assets/js/menu-cart.js') }}"></script>
  <script src="{{ asset('assets/js/menu-logic.js') }}"></script>
</body>
</html>