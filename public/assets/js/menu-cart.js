/**
 * Lógica del Carrito de Compras (Cliente)
 * Archivo: assets/js/menu-cart.js
 */

let cart = [];

// 1. Agregar producto al carrito
function addToCart(id, name, price, image) {
    // Buscar si ya existe para solo sumar cantidad
    let existingItem = cart.find(item => item.id === id);
    
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ id: id, name: name, price: price, image: image, quantity: 1 });
    }
    
    updateCartUI();
}

// 2. Eliminar o restar producto
function removeFromCart(name) {
    let itemIndex = cart.findIndex(item => item.name === name);
    if (itemIndex > -1) {
        cart[itemIndex].quantity--;
        if (cart[itemIndex].quantity === 0) {
            cart.splice(itemIndex, 1); // Borrar si llega a 0
        }
    }
    updateCartUI();
}

// 3. Renderizar el HTML del carrito y actualizar totales
function updateCartUI() {
    const container = document.getElementById('cart-items-wrapper');
    const emptyMsg = document.getElementById('empty-cart-msg');
    const totalElement = document.getElementById('cart-total');
    const floatingTotal = document.getElementById('floating-total');

    // Limpiar lista visual
    container.innerHTML = '';

    let total = 0;
    let count = 0;

    if (cart.length === 0) {
        if(emptyMsg) container.appendChild(emptyMsg);
        container.innerHTML = `
            <div class="text-center text-muted mt-5" id="empty-cart-msg">
                <i class="bi bi-basket2 display-1 opacity-25"></i>
                <p class="mt-3">Tu canasta está vacía</p>
            </div>`;
    } else {
        cart.forEach(item => {
            total += item.price * item.quantity;
            count += item.quantity;

            // Plantilla del Item en el Carrito
            let itemHTML = `
            <div class="d-flex align-items-center mb-3 bg-white p-2 rounded border shadow-sm">
                <img src="${item.image}" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="ms-3 flex-grow-1">
                    <h6 class="mb-0 fw-bold text-dark">${item.name}</h6>
                    <small class="text-muted">$${item.price} c/u</small>
                </div>
                <div class="d-flex align-items-center bg-light rounded-pill border px-1">
                    <button class="btn btn-sm text-danger p-1" onclick="removeFromCart('${item.name}')"><i class="bi bi-dash-lg"></i></button>
                    <span class="mx-2 fw-bold small">${item.quantity}</span>
                    <button class="btn btn-sm text-success p-1" onclick="addToCart(${item.id}, '${item.name}', ${item.price}, '${item.image}')"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>`;
            container.innerHTML += itemHTML;
        });
    }

    // Formatear dinero
    totalElement.innerText = `$${total.toFixed(2)}`;
    
    // Actualizar botón flotante
    if(floatingTotal) floatingTotal.innerText = `${count} ítems • $${total.toFixed(2)}`;
}

/// 4. Enviar Orden Real a Laravel
function sendOrder() {
    if(cart.length === 0) {
        alert("¡Tu carrito está vacío!");
        return;
    }
    
    const note = document.getElementById('kitchenNotes').value;
    const mesaSelect = document.querySelector('select.form-select');
    const mesa = mesaSelect ? mesaSelect.value : "1";
    
    // Limpiar el precio (quitar el signo $)
    const totalText = document.getElementById('cart-total').innerText.replace('$', '');
    const total = parseFloat(totalText);

    // --- AQUÍ ESTÁ LA MAGIA (TRADUCCIÓN) ---
    // Convertimos el carrito de JS (inglés) al formato de BD (español)
    const detallesFormateados = cart.map(item => {
        return {
            id: item.id,          // Laravel espera 'platillo_id', pero en el controller lo mapeamos como 'id'
            cantidad: item.quantity, // Traducimos quantity -> cantidad
            precio: item.price,      // Traducimos price -> precio
            notas: ""                // Notas individuales (vacío por ahora)
        };
    });

    const orderData = {
        mesa: "Mesa " + mesa,
        total: total,
        nota_general: note,
        detalles: detallesFormateados // Enviamos la lista traducida
    };

    if(!confirm(`¿Confirmar pedido para Mesa ${mesa} por $${total}?`)) return;

    fetch('http://laravel.test/q-menu/public/api/ordenar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(orderData)
    })
    .then(response => {
        // Si la respuesta no es OK (ej. error 500), lanzamos error manual para ver el mensaje
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        if(data.success) {
            alert("✅ ¡Orden Recibida en Cocina! ID: #" + data.orden_id);
            cart = [];
            document.getElementById('kitchenNotes').value = "";
            updateCartUI();
            var bsOffcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('cartSidebar'));
            bsOffcanvas.hide();
        } else {
            alert("⚠️ El servidor respondió: " + (data.message || "Error desconocido"));
        }
    })
    .catch(error => {
        console.error('Detalles del error:', error);
        // Mostramos el mensaje real del servidor si existe (útil para depurar)
        let mensaje = error.message || "Error de conexión con el servidor";
        alert("❌ Ocurrió un error: " + mensaje);
    });
}