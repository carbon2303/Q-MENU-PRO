/**
 * Lógica del Panel Administrativo (CRUD Completo)
 * Archivo: public/assets/js/admin-logic.js
 */

document.addEventListener('DOMContentLoaded', function() {
    const tabla = document.getElementById('tabla-platillos');
    const config = window.AdminConfig;
    
    // Variable para guardar la referencia al modal
    let modalEl = document.getElementById('modalPlatillo');
    let modalInstance = null; 

    // 1. Cargar datos al iniciar
    cargarPlatillos();
    
    // 2. Configurar botón "Nuevo Platillo"
    const btnNew = document.querySelector('button i.bi-plus-lg');
    if(btnNew) {
        btnNew.closest('button').addEventListener('click', abrirModalCrear);
    }

    // --- FUNCIÓN: LEER ---
    function cargarPlatillos() {
        fetch(config.apiMenu)
            .then(res => res.json())
            .then(res => renderTabla(res.data))
            .catch(err => console.error('Error:', err));
    }

    function renderTabla(platillos) {
        tabla.innerHTML = '';
        if(platillos.length === 0) {
            tabla.innerHTML = `<tr><td colspan="6" class="text-center py-3">No hay platillos registrados</td></tr>`;
            return;
        }
        platillos.forEach(item => {
            const estado = item.activo ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>';
            const row = `
            <tr>
                <td><img src="${item.imagen}" class="rounded" width="40" height="40" style="object-fit: cover;"></td>
                <td class="fw-bold">${item.nombre}</td>
                <td>${item.categoria}</td>
                <td>$${item.precio.toFixed(2)}</td>
                <td>${estado}</td>
                <td class="text-end">
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editarPlatillo(${item.id})">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" onclick="eliminarPlatillo(${item.id})">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>`;
            tabla.innerHTML += row;
        });
    }

    // --- FUNCIÓN: ABRIR MODAL (CREAR) ---
    function abrirModalCrear() {
        document.getElementById('formPlatillo').reset();
        document.getElementById('platilloId').value = '';
        document.getElementById('modalTitle').innerText = "Nuevo Platillo";
        document.getElementById('inputImagen').value = "assets/img/portfolio/product-1.jpg";
        
        // CORRECCIÓN: Usar getOrCreateInstance para evitar duplicados
        modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
        modalInstance.show();
    }

    // --- FUNCIÓN: ABRIR MODAL (EDITAR) ---
    window.editarPlatillo = function(id) {
        fetch(`${config.apiPlatillos}/${id}`, {
            headers: { 
                'Authorization': `Bearer ${config.token}`,
                'Accept': 'application/json' 
            }
        })
        .then(res => res.json())
        .then(response => {
            const p = response.data;
            document.getElementById('platilloId').value = p.id;
            document.getElementById('inputNombre').value = p.nombre;
            document.getElementById('inputPrecio').value = p.precio;
            document.getElementById('inputDescripcion').value = p.descripcion;
            
            let rutaImagen = p.imagen;
            if(rutaImagen.includes('assets/')) {
                rutaImagen = rutaImagen.substring(rutaImagen.indexOf('assets/'));
            }
            document.getElementById('inputImagen').value = rutaImagen;

            document.getElementById('modalTitle').innerText = "Editar Platillo";
            
            // CORRECCIÓN: Usar getOrCreateInstance
            modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
            modalInstance.show();
        })
        .catch(err => alert("Error al cargar datos."));
    };

    // --- FUNCIÓN: CERRAR MODAL Y GUARDAR ---
    window.guardarCambios = function() {
        const id = document.getElementById('platilloId').value;
        const esEdicion = !!id;

        const datos = {
            nombre: document.getElementById('inputNombre').value,
            precio: parseFloat(document.getElementById('inputPrecio').value),
            categoria_id: document.getElementById('inputCategoria').value,
            descripcion: document.getElementById('inputDescripcion').value,
            imagen: document.getElementById('inputImagen').value
        };

        const url = esEdicion ? `${config.apiPlatillos}/${id}` : config.apiPlatillos;
        const metodo = esEdicion ? 'PUT' : 'POST';

        fetch(url, {
            method: metodo,
            headers: {
                'Authorization': `Bearer ${config.token}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(datos)
        })
        .then(res => res.json())
        .then(data => {
            if(data.data) {
                alert(esEdicion ? "✅ Actualizado" : "✅ Creado");
                
                // CORRECCIÓN: Cerrar la instancia correcta
                const currentModal = bootstrap.Modal.getInstance(modalEl);
                if (currentModal) currentModal.hide();

                cargarPlatillos();
            } else {
                alert("❌ Error: " + (data.message || "Revisa los datos"));
            }
        })
        .catch(err => alert("Error de conexión"));
    };

    // --- ELIMINAR ---
    window.eliminarPlatillo = function(id) {
        if(!confirm("¿Eliminar este platillo?")) return;

        fetch(`${config.apiPlatillos}/${id}`, {
            method: 'DELETE',
            headers: { 
                'Authorization': `Bearer ${config.token}`,
                'Accept': 'application/json' 
            }
        })
        .then(res => {
            if(res.ok) cargarPlatillos();
            else alert("Error al eliminar");
        });
    };
});