<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Ventas - Sistema de Inventarios</title>
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #27ae60;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --warning-color: #f39c12;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
        }
        
        .main-menu {
            display: flex;
            list-style: none;
        }
        
        .main-menu li {
            margin-left: 1.5rem;
        }
        
        .main-menu a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .main-menu a:hover, .main-menu a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        main {
            padding: 2rem 0;
            min-height: calc(100vh - 140px);
        }
        
        .section-title {
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
            color: var(--dark-color);
        }
        
        .card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }
        
        .card h3 {
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: var(--secondary-color);
        }
        
        .btn-success {
            background-color: var(--primary-color);
        }
        
        .btn-warning {
            background-color: var(--warning-color);
        }
        
        .btn-warning:hover {
            background-color: #e67e22;
        }
        
        .btn-danger {
            background-color: var(--accent-color);
        }
        
        .btn-danger:hover {
            background-color: #c0392b;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }
        
        .data-table th, .data-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .data-table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        
        .data-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            .main-menu {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .main-menu li {
                margin: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">💰 SistemaInventarios</div>
                <ul class="main-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/bienvenidos">Bienvenidos</a></li>
                    <li><a href="/productos">Productos</a></li>
                    <li><a href="/ventas" class="active">Ventas</a></li>
                    <li><a href="/cliente">Cliente</a></li>
                    <li><a href="/proveedor">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2 class="section-title">Control de Ventas</h2>
            
            <div class="card">
                <h3>Registrar Nueva Venta</h3>
                <form id="venta-form">
                    <div class="form-group">
                        <label for="cliente-venta">Cliente</label>
                        <select id="cliente-venta" required>
                            <option value="">Seleccione cliente</option>
                            <!-- Clientes se cargarán dinámicamente -->
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="producto-venta">Producto</label>
                        <select id="producto-venta" required>
                            <option value="">Seleccione producto</option>
                            <!-- Productos se cargarán dinámicamente -->
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="cantidad-venta">Cantidad</label>
                        <input type="number" id="cantidad-venta" required min="1" placeholder="Cantidad vendida">
                    </div>
                    
                    <div class="form-group">
                        <label for="precio-venta">Precio Unitario</label>
                        <input type="number" id="precio-venta" required min="0" step="0.01" placeholder="Precio unitario">
                    </div>
                    
                    <div class="form-group">
                        <label for="total-venta">Total</label>
                        <input type="number" id="total-venta" readonly placeholder="Se calculará automáticamente">
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha-venta">Fecha de Venta</label>
                        <input type="date" id="fecha-venta" required>
                    </div>
                    
                    <button type="submit" class="btn-success">Registrar Venta</button>
                </form>
            </div>
            
            <div class="card">
                <h3>Ventas Registradas</h3>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="ventas-list">
                        <!-- Los datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Inventarios &copy; 2023 - Control de Ventas</p>
        </div>
    </footer>

    <script>
        // Datos de ventas
        let ventas = JSON.parse(localStorage.getItem('ventas')) || [];

        // Función para mostrar alertas
        function showAlert(message, type) {
            const alert = document.createElement('div');
            alert.className = `alert alert-${type}`;
            alert.textContent = message;
            
            document.querySelector('main .container').insertBefore(alert, document.querySelector('.card'));
            
            setTimeout(() => {
                alert.remove();
            }, 5000);
        }

        // Cargar clientes y productos en los select
        function cargarSelects() {
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            const productos = JSON.parse(localStorage.getItem('productos')) || [];
            
            const selectCliente = document.getElementById('cliente-venta');
            const selectProducto = document.getElementById('producto-venta');
            
            // Limpiar selects
            selectCliente.innerHTML = '<option value="">Seleccione cliente</option>';
            selectProducto.innerHTML = '<option value="">Seleccione producto</option>';
            
            // Cargar clientes
            clientes.forEach(cliente => {
                const option = document.createElement('option');
                option.value = cliente.id;
                option.textContent = cliente.nombre;
                selectCliente.appendChild(option);
            });
            
            // Cargar productos
            productos.forEach(producto => {
                const option = document.createElement('option');
                option.value = producto.id;
                option.textContent = `${producto.nombre} - $${producto.precio}`;
                option.setAttribute('data-precio', producto.precio);
                selectProducto.appendChild(option);
            });
        }

        // Calcular total automáticamente
        document.getElementById('cantidad-venta').addEventListener('input', calcularTotal);
        document.getElementById('precio-venta').addEventListener('input', calcularTotal);
        document.getElementById('producto-venta').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                document.getElementById('precio-venta').value = selectedOption.getAttribute('data-precio');
                calcularTotal();
            }
        });

        function calcularTotal() {
            const cantidad = parseInt(document.getElementById('cantidad-venta').value) || 0;
            const precio = parseFloat(document.getElementById('precio-venta').value) || 0;
            const total = cantidad * precio;
            document.getElementById('total-venta').value = total.toFixed(2);
        }

        // Funcionalidad para Ventas
        document.getElementById('venta-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const clienteId = document.getElementById('cliente-venta').value;
            const productoId = document.getElementById('producto-venta').value;
            const cantidad = parseInt(document.getElementById('cantidad-venta').value);
            const precio = parseFloat(document.getElementById('precio-venta').value);
            const total = parseFloat(document.getElementById('total-venta').value);
            const fecha = document.getElementById('fecha-venta').value;
            
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            const productos = JSON.parse(localStorage.getItem('productos')) || [];
            
            const cliente = clientes.find(c => c.id == clienteId);
            const producto = productos.find(p => p.id == productoId);
            
            const nuevaVenta = {
                id: Date.now(),
                clienteId: clienteId,
                clienteNombre: cliente ? cliente.nombre : 'Cliente no encontrado',
                productoId: productoId,
                productoNombre: producto ? producto.nombre : 'Producto no encontrado',
                cantidad: cantidad,
                precioUnitario: precio,
                total: total,
                fecha: fecha,
                fechaRegistro: new Date().toLocaleDateString()
            };
            
            ventas.push(nuevaVenta);
            localStorage.setItem('ventas', JSON.stringify(ventas));
            
            document.getElementById('venta-form').reset();
            showAlert('Venta registrada correctamente', 'success');
            renderVentas();
        });

        function renderVentas() {
            const tbody = document.getElementById('ventas-list');
            tbody.innerHTML = '';
            
            if (ventas.length === 0) {
                tbody.innerHTML = '<tr><td colspan="7" style="text-align: center;">No hay ventas registradas</td></tr>';
                return;
            }
            
            ventas.forEach(venta => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${venta.id}</td>
                    <td>${venta.clienteNombre}</td>
                    <td>${venta.productoNombre}</td>
                    <td>${venta.cantidad}</td>
                    <td>$${venta.total.toFixed(2)}</td>
                    <td>${venta.fecha}</td>
                    <td>
                        <button class="btn-danger btn-eliminar" data-id="${venta.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
            
            // Agregar event listeners para los botones de eliminar
            document.querySelectorAll('.btn-eliminar').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    ventas = ventas.filter(venta => venta.id !== id);
                    localStorage.setItem('ventas', JSON.stringify(ventas));
                    renderVentas();
                    showAlert('Venta eliminada correctamente', 'success');
                });
            });
        }

        // Inicializar la aplicación
        document.addEventListener('DOMContentLoaded', function() {
            cargarSelects();
            renderVentas();
            // Establecer fecha actual por defecto
            document.getElementById('fecha-venta').valueAsDate = new Date();
        });
    </script>
</body>
</html>