<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores - Sistema de Gestión</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            background-color: var(--success-color);
        }
        
        .btn-success:hover {
            background-color: #27ae60;
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
        
        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
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
            
            .data-table {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">Sistema de Gestión</div>
                <ul class="main-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/bienvenidos">Bienvenidos</a></li>
                    <li><a href="/saludos">Saludos</a></li>
                    <li><a href="/estudiantes">Estudiantes</a></li>
                    <li><a href="/proveedor" class="active">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2 class="section-title">Gestión de Proveedores</h2>
            
            <div class="card">
                <h3>Registrar Proveedor</h3>
                <form id="proveedor-form">
                    <div class="form-group">
                        <label for="nombre-proveedor">Nombre de la Empresa</label>
                        <input type="text" id="nombre-proveedor" required placeholder="Nombre de la empresa proveedora">
                    </div>
                    
                    <div class="form-group">
                        <label for="contacto-proveedor">Persona de Contacto</label>
                        <input type="text" id="contacto-proveedor" required placeholder="Nombre del contacto">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono-proveedor">Teléfono</label>
                        <input type="tel" id="telefono-proveedor" required placeholder="Número de teléfono">
                    </div>
                    
                    <div class="form-group">
                        <label for="email-proveedor">Email</label>
                        <input type="email" id="email-proveedor" required placeholder="Correo electrónico">
                    </div>
                    
                    <div class="form-group">
                        <label for="producto-proveedor">Producto/Servicio</label>
                        <input type="text" id="producto-proveedor" required placeholder="Producto o servicio que ofrece">
                    </div>
                    
                    <div class="form-group">
                        <label for="direccion-proveedor">Dirección</label>
                        <textarea id="direccion-proveedor" rows="3" placeholder="Dirección de la empresa"></textarea>
                    </div>
                    
                    <button type="submit" class="btn-success">Registrar Proveedor</button>
                </form>
            </div>
            
            <div class="card">
                <h3>Proveedores Registrados</h3>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Empresa</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Producto/Servicio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="proveedores-list">
                        <!-- Los datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Gestión &copy; 2023 - Desarrollado con Laravel y Laragon</p>
        </div>
    </footer>

    <script>
        // Datos de proveedores
        let proveedores = JSON.parse(localStorage.getItem('proveedores')) || [];

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

        // Funcionalidad para Proveedores
        document.getElementById('proveedor-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre-proveedor').value;
            const contacto = document.getElementById('contacto-proveedor').value;
            const telefono = document.getElementById('telefono-proveedor').value;
            const email = document.getElementById('email-proveedor').value;
            const producto = document.getElementById('producto-proveedor').value;
            const direccion = document.getElementById('direccion-proveedor').value;
            
            const nuevoProveedor = {
                id: Date.now(),
                nombre: nombre,
                contacto: contacto,
                telefono: telefono,
                email: email,
                producto: producto,
                direccion: direccion,
                fechaRegistro: new Date().toLocaleDateString()
            };
            
            proveedores.push(nuevoProveedor);
            localStorage.setItem('proveedores', JSON.stringify(proveedores));
            
            document.getElementById('proveedor-form').reset();
            showAlert('Proveedor registrado correctamente', 'success');
            renderProveedores();
        });

        function renderProveedores() {
            const tbody = document.getElementById('proveedores-list');
            tbody.innerHTML = '';
            
            if (proveedores.length === 0) {
                tbody.innerHTML = '<tr><td colspan="7" style="text-align: center;">No hay proveedores registrados</td></tr>';
                return;
            }
            
            proveedores.forEach(proveedor => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${proveedor.id}</td>
                    <td>${proveedor.nombre}</td>
                    <td>${proveedor.contacto}</td>
                    <td>${proveedor.telefono}</td>
                    <td>${proveedor.email}</td>
                    <td>${proveedor.producto}</td>
                    <td>
                        <button class="btn-danger btn-eliminar" data-id="${proveedor.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
            
            // Agregar event listeners para los botones de eliminar
            document.querySelectorAll('.btn-eliminar').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    proveedores = proveedores.filter(proveedor => proveedor.id !== id);
                    localStorage.setItem('proveedores', JSON.stringify(proveedores));
                    renderProveedores();
                    showAlert('Proveedor eliminado correctamente', 'success');
                });
            });
        }

        // Inicializar la aplicación
        document.addEventListener('DOMContentLoaded', function() {
            renderProveedores();
        });
    </script>
</body>
</html>