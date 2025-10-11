<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión</title>
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
        
        .content-section {
            display: none;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .content-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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
        
        .welcome-message {
            text-align: center;
            padding: 2rem;
        }
        
        .welcome-message h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .welcome-message p {
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 1.5rem;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .feature {
            text-align: center;
            padding: 1.5rem;
        }
        
        .feature i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .feature h3 {
            margin-bottom: 0.5rem;
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
                <div class="logo">Sistema de Gestión</div>
                <ul class="main-menu">
                    <li><a href="#" class="menu-link active" data-section="welcome">Inicio</a></li>
                    <li><a href="#" class="menu-link" data-section="saludos">Saludos</a></li>
                    <li><a href="#" class="menu-link" data-section="bienvenidos">Bienvenidos</a></li>
                    <li><a href="#" class="menu-link" data-section="estudiantes">Estudiantes</a></li>
                    <li><a href="#" class="menu-link" data-section="proveedor">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <!-- Sección de Bienvenida -->
            <section id="welcome" class="content-section active">
                <div class="welcome-message">
                    <h2>Bienvenido al Sistema de Gestión</h2>
                    <p>Este sistema le permite gestionar saludos, mensajes de bienvenida, información de estudiantes y datos de proveedores de manera eficiente.</p>
                    <p>Utilice el menú superior para navegar entre las diferentes secciones.</p>
                    
                    <div class="features">
                        <div class="feature">
                            <i>👋</i>
                            <h3>Saludos</h3>
                            <p>Gestiona diferentes tipos de saludos personalizados</p>
                        </div>
                        <div class="feature">
                            <i>🚪</i>
                            <h3>Bienvenidos</h3>
                            <p>Crea y almacena mensajes de bienvenida</p>
                        </div>
                        <div class="feature">
                            <i>👨‍🎓</i>
                            <h3>Estudiantes</h3>
                            <p>Administra la información de los estudiantes</p>
                        </div>
                        <div class="feature">
                            <i>🏢</i>
                            <h3>Proveedor</h3>
                            <p>Gestiona los datos de los proveedores</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección de Saludos -->
            <section id="saludos" class="content-section">
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
            </section>
            
            <!-- Sección de Bienvenidos -->
            <section id="bienvenidos" class="content-section">
                <h2 class="section-title">Mensajes de Bienvenida</h2>
                
                <div class="card">
                    <h3>Crear Mensaje de Bienvenida</h3>
                    <form id="bienvenido-form">
                        <div class="form-group">
                            <label for="titulo-bienvenida">Título</label>
                            <input type="text" id="titulo-bienvenida" required placeholder="Título del mensaje">
                        </div>
                        
                        <div class="form-group">
                            <label for="mensaje-bienvenida">Mensaje</label>
                            <textarea id="mensaje-bienvenida" rows="5" required placeholder="Escriba el mensaje de bienvenida aquí"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="destinatario-bienvenida">Destinatario</label>
                            <input type="text" id="destinatario-bienvenida" required placeholder="A quién va dirigido">
                        </div>
                        
                        <button type="submit" class="btn-success">Guardar Bienvenida</button>
                    </form>
                </div>
                
                <div class="card">
                    <h3>Mensajes de Bienvenida Guardados</h3>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Mensaje</th>
                                <th>Destinatario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="bienvenidos-list">
                            <!-- Los datos se cargarán dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </section>
            
            <!-- Sección de Estudiantes -->
            <section id="estudiantes" class="content-section">
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="estudiantes-list">
                            <!-- Los datos se cargarán dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </section>
            
            <!-- Sección de Proveedor -->
            <section id="proveedor" class="content-section">
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
            </section>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Gestión &copy; 2023 - Desarrollado con Laragon y Visual Studio Code</p>
        </div>
    </footer>

    <script>
        // Navegación entre secciones
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remover clase activa de todos los enlaces
                document.querySelectorAll('.menu-link').forEach(item => {
                    item.classList.remove('active');
                });
                
                // Agregar clase activa al enlace clickeado
                this.classList.add('active');
                
                // Ocultar todas las secciones
                document.querySelectorAll('.content-section').forEach(section => {
                    section.classList.remove('active');
                });
                
                // Mostrar la sección correspondiente
                const sectionId = this.getAttribute('data-section');
                document.getElementById(sectionId).classList.add('active');
            });
        });

        // Simulación de base de datos (en un caso real, esto se conectaría a un backend)
        let saludos = JSON.parse(localStorage.getItem('saludos')) || [];
        let bienvenidos = JSON.parse(localStorage.getItem('bienvenidos')) || [];
        let estudiantes = JSON.parse(localStorage.getItem('estudiantes')) || [];
        let proveedores = JSON.parse(localStorage.getItem('proveedores')) || [];

        // Función para mostrar alertas
        function showAlert(message, type) {
            const alert = document.createElement('div');
            alert.className = `alert alert-${type}`;
            alert.textContent = message;
            
            document.querySelector('main .container').insertBefore(alert, document.querySelector('.content-section.active'));
            
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
                idioma: idioma
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
            
            saludos.forEach(saludo => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${saludo.id}</td>
                    <td>${saludo.tipo}</td>
                    <td>${saludo.mensaje}</td>
                    <td>${saludo.idioma}</td>
                    <td>
                        <button class="btn-editar" data-id="${saludo.id}">Editar</button>
                        <button class="btn-eliminar" data-id="${saludo.id}">Eliminar</button>
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

        // Funcionalidad para Bienvenidos
        document.getElementById('bienvenido-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const titulo = document.getElementById('titulo-bienvenida').value;
            const mensaje = document.getElementById('mensaje-bienvenida').value;
            const destinatario = document.getElementById('destinatario-bienvenida').value;
            
            const nuevoBienvenido = {
                id: Date.now(),
                titulo: titulo,
                mensaje: mensaje,
                destinatario: destinatario
            };
            
            bienvenidos.push(nuevoBienvenido);
            localStorage.setItem('bienvenidos', JSON.stringify(bienvenidos));
            
            document.getElementById('bienvenido-form').reset();
            showAlert('Mensaje de bienvenida guardado correctamente', 'success');
            renderBienvenidos();
        });

        function renderBienvenidos() {
            const tbody = document.getElementById('bienvenidos-list');
            tbody.innerHTML = '';
            
            bienvenidos.forEach(bienvenido => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${bienvenido.id}</td>
                    <td>${bienvenido.titulo}</td>
                    <td>${bienvenido.mensaje}</td>
                    <td>${bienvenido.destinatario}</td>
                    <td>
                        <button class="btn-editar" data-id="${bienvenido.id}">Editar</button>
                        <button class="btn-eliminar" data-id="${bienvenido.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
            
            // Agregar event listeners para los botones de eliminar
            document.querySelectorAll('.btn-eliminar').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    bienvenidos = bienvenidos.filter(bienvenido => bienvenido.id !== id);
                    localStorage.setItem('bienvenidos', JSON.stringify(bienvenidos));
                    renderBienvenidos();
                    showAlert('Mensaje de bienvenida eliminado correctamente', 'success');
                });
            });
        }

        // Funcionalidad para Estudiantes
        document.getElementById('estudiante-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre-estudiante').value;
            const edad = document.getElementById('edad-estudiante').value;
            const carrera = document.getElementById('carrera-estudiante').value;
            const email = document.getElementById('email-estudiante').value;
            
            const nuevoEstudiante = {
                id: Date.now(),
                nombre: nombre,
                edad: edad,
                carrera: carrera,
                email: email
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
            
            estudiantes.forEach(estudiante => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${estudiante.id}</td>
                    <td>${estudiante.nombre}</td>
                    <td>${estudiante.edad}</td>
                    <td>${estudiante.carrera}</td>
                    <td>${estudiante.email}</td>
                    <td>
                        <button class="btn-editar" data-id="${estudiante.id}">Editar</button>
                        <button class="btn-eliminar" data-id="${estudiante.id}">Eliminar</button>
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

        // Funcionalidad para Proveedores
        document.getElementById('proveedor-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre-proveedor').value;
            const contacto = document.getElementById('contacto-proveedor').value;
            const telefono = document.getElementById('telefono-proveedor').value;
            const email = document.getElementById('email-proveedor').value;
            const producto = document.getElementById('producto-proveedor').value;
            
            const nuevoProveedor = {
                id: Date.now(),
                nombre: nombre,
                contacto: contacto,
                telefono: telefono,
                email: email,
                producto: producto
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
                        <button class="btn-editar" data-id="${proveedor.id}">Editar</button>
                        <button class="btn-eliminar" data-id="${proveedor.id}">Eliminar</button>
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
            renderSaludos();
            renderBienvenidos();
            renderEstudiantes();
            renderProveedores();
        });
    </script>
</body>
</html>