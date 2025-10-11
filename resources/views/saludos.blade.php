<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludos - Sistema de Gestión</title>
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
                    <li><a href="/saludos" class="active">Saludos</a></li>
                    <li><a href="/estudiantes">Estudiantes</a></li>
                    <li><a href="/proveedor">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2 class="section-title">Gestión de Saludos</h2>
            
            <div class="card">
                <h3>Agregar Nuevo Saludo</h3>
                <form id="saludo-form">
                    <div class="form-group">
                        <label for="tipo-saludo">Tipo de Saludo</label>
                        <select id="tipo-saludo" required>
                            <option value="">Seleccione un tipo</option>
                            <option value="formal">Formal</option>
                            <option value="informal">Informal</option>
                            <option value="profesional">Profesional</option>
                            <option value="personalizado">Personalizado</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="mensaje-saludo">Mensaje de Saludo</label>
                        <textarea id="mensaje-saludo" rows="4" required placeholder="Escriba el mensaje de saludo aquí"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="idioma-saludo">Idioma</label>
                        <input type="text" id="idioma-saludo" required placeholder="Ej: Español, Inglés, etc.">
                    </div>
                    
                    <button type="submit" class="btn-success">Guardar Saludo</button>
                </form>
            </div>
            
            <div class="card">
                <h3>Saludos Guardados</h3>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Mensaje</th>
                            <th>Idioma</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="saludos-list">
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
        // Datos de saludos
        let saludos = JSON.parse(localStorage.getItem('saludos')) || [];

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

        // Funcionalidad para Saludos
        document.getElementById('saludo-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const tipo = document.getElementById('tipo-saludo').value;
            const mensaje = document.getElementById('mensaje-saludo').value;
            const idioma = document.getElementById('idioma-saludo').value;
            
            const nuevoSaludo = {
                id: Date.now(),
                tipo: tipo,
                mensaje: mensaje,
                idioma: idioma,
                fecha: new Date().toLocaleDateString()
            };
            
            saludos.push(nuevoSaludo);
            localStorage.setItem('saludos', JSON.stringify(saludos));
            
            document.getElementById('saludo-form').reset();
            showAlert('Saludo guardado correctamente', 'success');
            renderSaludos();
        });

        function renderSaludos() {
            const tbody = document.getElementById('saludos-list');
            tbody.innerHTML = '';
            
            if (saludos.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" style="text-align: center;">No hay saludos guardados</td></tr>';
                return;
            }
            
            saludos.forEach(saludo => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${saludo.id}</td>
                    <td>${saludo.tipo}</td>
                    <td>${saludo.mensaje}</td>
                    <td>${saludo.idioma}</td>
                    <td>
                        <button class="btn-danger btn-eliminar" data-id="${saludo.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
            
            // Agregar event listeners para los botones de eliminar
            document.querySelectorAll('.btn-eliminar').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    saludos = saludos.filter(saludo => saludo.id !== id);
                    localStorage.setItem('saludos', JSON.stringify(saludos));
                    renderSaludos();
                    showAlert('Saludo eliminado correctamente', 'success');
                });
            });
        }

        // Inicializar la aplicación
        document.addEventListener('DOMContentLoaded', function() {
            renderSaludos();
        });
    </script>
</body>
</html>