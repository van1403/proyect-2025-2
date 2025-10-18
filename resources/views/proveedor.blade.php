<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proveedores - Sistema de Inventarios</title>
    <style>
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
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container {
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 0 25px;
            flex: 1;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 2.2rem;
            font-weight: bold;
        }
        
        .main-menu {
            display: flex;
            list-style: none;
        }
        
        .main-menu li {
            margin-left: 2rem;
        }
        
        .main-menu a {
            color: white;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            transition: background-color 0.3s;
            font-size: 1.2rem;
        }
        
        .main-menu a:hover, .main-menu a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        main {
            padding: 2.5rem 0;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .section-title {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--primary-color);
            color: var(--dark-color);
            font-size: 2.5rem;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2.5rem;
            flex: 1;
        }
        
        .card h3 {
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-size: 1.8rem;
        }
        
        .form-group {
            margin-bottom: 2rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 600;
            font-size: 1.3rem;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1.2rem;
        }
        
        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.3rem;
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
            font-size: 1.2rem;
        }
        
        .data-table th, .data-table td {
            padding: 1.2rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .data-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            font-size: 1.3rem;
        }
        
        .data-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .alert {
            padding: 1.2rem 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid transparent;
            border-radius: 6px;
            font-size: 1.2rem;
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
            padding: 1.5rem 0;
            font-size: 1.2rem;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .contact-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 1rem;
            border-left: 4px solid var(--primary-color);
        }
        
        .contact-info h4 {
            margin-bottom: 1rem;
            color: var(--dark-color);
            font-size: 1.4rem;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            .main-menu {
                margin-top: 1.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .main-menu li {
                margin: 0.75rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .card {
                padding: 1.5rem;
            }
            
            .logo {
                font-size: 1.8rem;
            }
            
            .main-menu a {
                font-size: 1rem;
                padding: 0.5rem 1rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">🏢 SistemaInventarios</div>
                <ul class="main-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/bienvenidos">Bienvenidos</a></li>
                    <li><a href="/productos">Productos</a></li>
                    <li><a href="/ventas">Ventas</a></li>
                    <li><a href="/cliente">Cliente</a></li>
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
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre-proveedor">Nombre de la Empresa</label>
                            <input type="text" id="nombre-proveedor" required placeholder="Nombre de la empresa proveedora">
                        </div>
                        
                        <div class="form-group">
                            <label for="contacto-proveedor">Persona de Contacto</label>
                            <input type="text" id="contacto-proveedor" required placeholder="Nombre del contacto">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telefono-proveedor">Teléfono</label>
                            <input type="tel" id="telefono-proveedor" required placeholder="Número de teléfono">
                        </div>
                        
                        <div class="form-group">
                            <label for="email-proveedor">Email</label>
                            <input type="email" id="email-proveedor" required placeholder="Correo electrónico">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="producto-proveedor">Producto/Servicio</label>
                        <input type="text" id="producto-proveedor" required placeholder="Producto o servicio que ofrece">
                    </div>
                    
                    <div class="form-group">
                        <label for="direccion-proveedor">Dirección</label>
                        <textarea id="direccion-proveedor" rows="4" placeholder="Dirección de la empresa"></textarea>
                    </div>
                    
                    <div class="contact-info">
                        <h4>Información de Contacto</h4>
                        <p style="font-size: 1.2rem; color: #666;">
                            La información de contacto será utilizada para comunicaciones importantes con el proveedor.
                        </p>
                    </div>
                    
                    <button type="submit" class="btn-success">Registrar Proveedor</button>
                </form>
            </div>
            
            <div class="card">
                <h3>Proveedores Registrados</h3>
                <div class="table-container">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Inventarios &copy; 2025 - Gestión de Proveedores</p>
        </div>
    </footer>

    <script>
        let proveedores = JSON.parse(localStorage.getItem('proveedores')) || [];

        function showAlert(message, type) {
            const alert = document.createElement('div');
            alert.className = `alert alert-${type}`;
            alert.textContent = message;
            
            document.querySelector('main .container').insertBefore(alert, document.querySelector('.card'));
            
            setTimeout(() => {
                alert.remove();
            }, 5000);
        }

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
                tbody.innerHTML = '<tr><td colspan="7" style="text-align: center; font-size: 1.3rem;">No hay proveedores registrados</td></tr>';
                return;
            }
            
            proveedores.forEach(proveedor => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${proveedor.id}</td>
                    <td><strong>${proveedor.nombre}</strong></td>
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

        document.addEventListener('DOMContentLoaded', function() {
            renderProveedores();
        });
    </script>
</body>
</html>