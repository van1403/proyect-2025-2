<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - Sistema de Inventarios</title>
    <style>
        /* Mismo estilo que las otras vistas pero actualizado para productos */
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #27ae60;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
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
                <div class="logo">📦 SistemaInventarios</div>
                <ul class="main-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/bienvenidos">Bienvenidos</a></li>
                    <li><a href="/productos" class="active">Productos</a></li>
                    <li><a href="/ventas">Ventas</a></li>
                    <li><a href="/cliente">Cliente</a></li>
                    <li><a href="/proveedor">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2 class="section-title">Gestión de Productos</h2>
            
            <div class="card">
                <h3>Agregar Nuevo Producto</h3>
                <form id="producto-form">
                    <div class="form-group">
                        <label for="nombre-producto">Nombre del Producto</label>
                        <input type="text" id="nombre-producto" required placeholder="Nombre del producto">
                    </div>
                    
                    <div class="form-group">
                        <label for="categoria-producto">Categoría</label>
                        <select id="categoria-producto" required>
                            <option value="">Seleccione categoría</option>
                            <option value="electronica">Electrónica</option>
                            <option value="ropa">Ropa</option>
                            <option value="hogar">Hogar</option>
                            <option value="deportes">Deportes</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="precio-producto">Precio</label>
                        <input type="number" id="precio-producto" required min="0" step="0.01" placeholder="Precio del producto">
                    </div>
                    
                    <div class="form-group">
                        <label for="stock-producto">Stock</label>
                        <input type="number" id="stock-producto" required min="0" placeholder="Cantidad en stock">
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion-producto">Descripción</label>
                        <textarea id="descripcion-producto" rows="3" placeholder="Descripción del producto"></textarea>
                    </div>
                    
                    <button type="submit" class="btn-success">Guardar Producto</button>
                </form>
            </div>
            
            <div class="card">
                <h3>Productos Registrados</h3>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="productos-list">
                        <!-- Los datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Inventarios &copy; 2023 - Gestión de Productos</p>
        </div>
    </footer>

    <script>
        // Datos de productos
        let productos = JSON.parse(localStorage.getItem('productos')) || [];

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

        // Funcionalidad para Productos
        document.getElementById('producto-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre-producto').value;
            const categoria = document.getElementById('categoria-producto').value;
            const precio = parseFloat(document.getElementById('precio-producto').value);
            const stock = parseInt(document.getElementById('stock-producto').value);
            const descripcion = document.getElementById('descripcion-producto').value;
            
            const nuevoProducto = {
                id: Date.now(),
                nombre: nombre,
                categoria: categoria,
                precio: precio,
                stock: stock,
                descripcion: descripcion,
                fechaRegistro: new Date().toLocaleDateString()
            };
            
            productos.push(nuevoProducto);
            localStorage.setItem('productos', JSON.stringify(productos));
            
            document.getElementById('producto-form').reset();
            showAlert('Producto guardado correctamente', 'success');
            renderProductos();
        });

        function renderProductos() {
            const tbody = document.getElementById('productos-list');
            tbody.innerHTML = '';
            
            if (productos.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" style="text-align: center;">No hay productos registrados</td></tr>';
                return;
            }
            
            productos.forEach(producto => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td>${producto.categoria}</td>
                    <td>$${producto.precio.toFixed(2)}</td>
                    <td>${producto.stock}</td>
                    <td>
                        <button class="btn-danger btn-eliminar" data-id="${producto.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
            
            // Agregar event listeners para los botones de eliminar
            document.querySelectorAll('.btn-eliminar').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    productos = productos.filter(producto => producto.id !== id);
                    localStorage.setItem('productos', JSON.stringify(productos));
                    renderProductos();
                    showAlert('Producto eliminado correctamente', 'success');
                });
            });
        }

        // Inicializar la aplicación
        document.addEventListener('DOMContentLoaded', function() {
            renderProductos();
        });
    </script>
</body>
</html>