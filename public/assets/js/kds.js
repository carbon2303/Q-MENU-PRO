/**
 * Lógica de Pantalla KDS (Cocina)
 * Polling cada 5 segundos.
 */

document.addEventListener('DOMContentLoaded', function() {
    const ordersContainer = document.getElementById('orders-container');
    
    // Configuración (Recuperada del HTML o valores default)
    const config = window.KdsConfig || { apiUrl: '/api/kds/ordenes' };
    const token = localStorage.getItem('auth_token'); // Necesitamos token para ver pedidos

    if(!token) {
        alert("⚠️ No hay sesión iniciada. Por favor inicia sesión como Staff.");
        window.location.href = '/login';
        return;
    }

    // 1. Iniciar el ciclo de actualización
    cargarOrdenes();
    setInterval(cargarOrdenes, 5000); // Cada 5 segundos

    // --- FUNCIONES ---

    function cargarOrdenes() {
        fetch(config.apiUrl, {
            headers: { 
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(response => renderKDS(response.data))
        .catch(err => console.error("Error KDS:", err));
    }

    function renderKDS(ordenes) {
        // Si no hay órdenes, mostrar mensaje
        if(ordenes.length === 0) {
            ordersContainer.innerHTML = `<div class="col-12 text-center text-white mt-5"><h2 class="text-white"> Todo tranquilo por ahora...</h2></div>`;
            return;
        }

        // Truco: No borramos todo el HTML para evitar parpadeo feo.
        // Solo actualizamos si hay cambios (Diffing simple) o reemplazamos todo por simplicidad.
        // Para este proyecto, reemplazamos todo es aceptable.
        
        let html = '';
        ordenes.forEach(orden => {
            
            // Calcular tiempo transcurrido (simple)
            const fechaOrden = new Date(orden.created_at);
            const ahora = new Date();
            const minutos = Math.floor((ahora - fechaOrden) / 60000);
            
            // Estilo según urgencia
            let bordeColor = 'ticket-new'; // Azul
            if(minutos > 15) bordeColor = 'ticket-urgent'; // Rojo

            // Construir lista de platillos
            let itemsHtml = '';
            orden.detalles.forEach(item => {
                itemsHtml += `
                <div class="ticket-item">
                    <span class="fw-bold">${item.cantidad}x ${item.platillo.nombre}</span>
                </div>
                ${item.notas ? `<div class="ticket-item text-danger small ms-3">⚠️ ${item.notas}</div>` : ''}
                `;
            });

            html += `
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="kds-ticket ${bordeColor} shadow h-100">
                    <div class="ticket-header d-flex justify-content-between align-items-center">
                        <div>
                            <span class="fs-5 fw-bold">${orden.mesa}</span>
                            <div class="small text-muted">#${orden.id}</div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-light text-dark border">${minutos} min</span>
                            <div class="badge bg-${orden.estatus === 'listo' ? 'success' : 'warning'} text-dark mt-1">
                                ${orden.estatus.toUpperCase()}
                            </div>
                        </div>
                    </div>
                    
                    <div class="ticket-body">
                        ${itemsHtml}
                        
                        ${orden.nota_general ? `
                        <div class="alert alert-warning py-1 px-2 mt-2 mb-0 small">
                            <i class="bi bi-exclamation-triangle"></i> ${orden.nota_general}
                        </div>` : ''}
                    </div>

                    <button class="btn btn-success btn-kds-action" onclick="marcarListo(${orden.id}, '${orden.estatus}')">
                        ${orden.estatus === 'listo' ? '<i class="bi bi-check-all"></i> ENTREGAR' : '<i class="bi bi-check-lg"></i> LISTO'}
                    </button>
                </div>
            </div>
            `;
        });

        ordersContainer.innerHTML = html;
    }

    // Exponer función globalmente
    window.marcarListo = function(id, estadoActual) {
        const nuevoEstado = estadoActual === 'pendiente' ? 'listo' : 'entregado';
        
        // Optimistic UI: Borrar visualmente antes de confirmar (opcional)
        // Aquí haremos la petición real
        fetch(`${config.apiUrl}/${id}`, {
            method: 'PATCH',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ estatus: nuevoEstado })
        })
        .then(res => {
            if(res.ok) cargarOrdenes(); // Recargar inmediato
        });
    };
    
    // Pantalla completa
    window.toggleFullScreen = function() {
      if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        }
      }
    };
});