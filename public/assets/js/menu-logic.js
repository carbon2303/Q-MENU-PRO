document.addEventListener('DOMContentLoaded', function() {
    
    const menuContainer = document.getElementById('menu-container');
    const loadingSpinner = document.getElementById('loading-spinner');

    // Usar la variable apiUrl definida en el Blade, o fallback
    const rutaApi = (typeof apiUrl !== 'undefined') ? apiUrl : '/api/menu';

    // 1. Cargar Datos
    fetch(rutaApi)
        .then(response => response.json())
        .then(response => {
            renderMenu(response.data);
        })
        .catch(error => {
            console.error('Error:', error);
            if(menuContainer) menuContainer.innerHTML = '<p class="text-center text-danger">Error al cargar menú.</p>';
        });

    // 2. FUNCIÓN PARA DIBUJAR EL HTML (Versión Curada: Idéntica a Q-Menu-v1)
    function renderMenu(platillos) {
        if(loadingSpinner) loadingSpinner.remove();
        if(menuContainer) menuContainer.innerHTML = '';

        platillos.forEach(item => {
            // HTML LIMPIO: Sin estilos en línea, confiando 100% en dashboard.css
            const cardHtml = `
            <div class="col platillo-item" data-category="${item.categoria}">
                <div class="card food-card">
                    <div class="food-img-wrap">
                        <img src="${item.imagen}" alt="${item.nombre}">
                        </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold mb-0">${item.nombre}</h5>
                            <h5 class="text-primary fw-bold mb-0">$${item.precio}</h5>
                        </div>
                        <p class="card-text small text-muted flex-grow-1">${item.descripcion || ''}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <button class="btn btn-sm btn-light text-muted rounded-circle btn-tts" title="Leer descripción">
                                <i class="bi bi-volume-up"></i>
                            </button>
                            <button class="btn btn-primary btn-add" style="background-color: var(--accent-color); border:none;"
                                onclick="addToCart(${item.id}, '${item.nombre}', ${item.precio}, '${item.imagen}')">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
            
            if(menuContainer) menuContainer.innerHTML += cardHtml;
        });
        
        // Activar filtros
        activateFilters();
    }

    function activateFilters() {
        const buttons = document.querySelectorAll('.category-pill');
        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                buttons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const category = btn.innerText.replace(/^[^\w\s]+ /, '').trim();
                const items = document.querySelectorAll('.platillo-item');
                items.forEach(item => {
                    const itemCat = item.getAttribute('data-category');
                    item.style.display = (category === 'Todo' || btn.innerText.includes('Todo') || itemCat === category) ? 'block' : 'none';
                });
            });
        });
    }
});