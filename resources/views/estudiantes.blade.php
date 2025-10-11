<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes - Sistema de Gestión</title>
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
                    <li><a href="/estudiantes" class="active">Estudiantes</a></li>
                    <li><a href="/proveedor">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2 class="section-title">Gestión de Estudiantes</h2>
            
            <div class="card">
                <h3>Registrar Estudiante</h3>
                <form id="estudiante-form">
                    <div class="form-group">
                        <label for="nombre-estudiante">Nombre Completo</label>
                        <input type="text" id="nombre-estudiante" required placeholder="Nombre del estudiante">
                    </div>
                    
                    <div class="form-group">
                        <label for="edad-estudiante">Edad</label>
                        <input type="number" id="edad-estudiante" required min="5" max="100" placeholder="Edad">
                    </div>
                    
                    <div class="form-group">
                        <label for="carrera-estudiante">Carrera</label>
                        <input type="text" id="carrera-estudiante" required placeholder="Carrera que estudia">
                    </div>
                    
                    <div class="form-group">
                        <label for="email-estudiante">Email</label>
                        <input type="email" id="email-estudiante" required placeholder="Correo electrónico">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono-estudiante">Teléfono</label>
                        <input type="tel" id="telefono-estudiante" placeholder="Número de teléfono">
                    </div>
                    
                    <button type="submit" class="btn-success">Registrar Estudiante</button>
                </form>
            </div>
            
            <div class="card">
                <h3>Estudiantes Registrados</h3>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Carrera</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="estudiantes-list">
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
        // Datos de estudiantes
        let estudiantes = JSON.parse(localStorage.getItem('estudiantes')) || [];

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

        // Funcionalidad para Estudiantes
        document.getElementById('estudiante-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre-estudiante').value;
            const edad = document.getElementById('edad-estudiante').value;
            const carrera = document.getElementById('carrera-estudiante').value;
            const email = document.getElementById('email-estudiante').value;
            const telefono = document.getElementById('telefono-estudiante').value;
            
            const nuevoEstudiante = {
                id: Date.now(),
                nombre: nombre,
                edad: edad,
                carrera: carrera,
                email: email,
                telefono: telefono,
                fechaRegistro: new Date().toLocaleDateString()
            };
            
            estudiantes.push(nuevoEstudiante);
            localStorage.setItem('estudiantes', JSON.stringify(estudiantes));
            
            document.getElementById('estudiante-form').reset();
            showAlert('Estudiante registrado correctamente', 'success');
            renderEstudiantes();
        });

        function renderEstudiantes() {
            const tbody = document.getElementById('estudiantes-list');
            tbody.innerHTML = '';
            
            if (estudiantes.length === 0) {
                tbody.innerHTML = '<tr><td colspan="7" style="text-align: center;">No hay estudiantes registrados</td></tr>';
                return;
            }
            
            estudiantes.forEach(estudiante => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${estudiante.id}</td>
                    <td>${estudiante.nombre}</td>
                    <td>${estudiante.edad}</td>
                    <td>${estudiante.carrera}</td>
                    <td>${estudiante.email}</td>
                    <td>${estudiante.telefono || 'N/A'}</td>
                    <td>
                        <button class="btn-danger btn-eliminar" data-id="${estudiante.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
            
            // Agregar event listeners para los botones de eliminar
            document.querySelectorAll('.btn-eliminar').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    estudiantes = estudiantes.filter(estudiante => estudiante.id !== id);
                    localStorage.setItem('estudiantes', JSON.stringify(estudiantes));
                    renderEstudiantes();
                    showAlert('Estudiante eliminado correctamente', 'success');
                });
            });
        }

        // Inicializar la aplicación
        document.addEventListener('DOMContentLoaded', function() {
            renderEstudiantes();
        });
    </script>
</body>
</html>