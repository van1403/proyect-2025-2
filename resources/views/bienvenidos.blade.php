<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Inventarios</title>
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #27ae60;
            --accent-color: #e74c3c;
            --warning-color: #f39c12;
            --info-color: #3498db;
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
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.5;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            margin: -20px -20px 20px -20px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .main-menu {
            display: flex;
            list-style: none;
            gap: 10px;
        }
        
        .main-menu a {
            color: white;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-size: 0.9rem;
        }
        
        .main-menu a:hover, .main-menu a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .dashboard-header {
            text-align: center;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        
        .dashboard-header h1 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 2rem;
        }
        
        .dashboard-header p {
            color: #666;
            font-size: 1.1rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid var(--primary-color);
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card.products {
            border-left-color: var(--primary-color);
        }
        
        .stat-card.sales {
            border-left-color: var(--warning-color);
        }
        
        .stat-card.clients {
            border-left-color: var(--info-color);
        }
        
        .stat-card.suppliers {
            border-left-color: var(--accent-color);
        }
        
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 1rem;
            font-weight: 600;
        }
        
        .quick-actions {
            margin-bottom: 30px;
        }
        
        .quick-actions h2 {
            color: var(--dark-color);
            margin-bottom: 20px;
            text-align: center;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .action-card {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        
        .action-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .action-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .action-card h3 {
            color: var(--dark-color);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        .recent-activity {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .recent-activity h2 {
            color: var(--dark-color);
            margin-bottom: 20px;
            text-align: center;
        }
        
        .activity-list {
            list-style: none;
        }
        
        .activity-item {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-text {
            color: #333;
            margin-bottom: 5px;
        }
        
        .activity-time {
            color: #666;
            font-size: 0.9rem;
        }
        
        .system-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .info-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .info-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            color: #666;
        }
        
        .info-value {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: #666;
            border-top: 1px solid #e9ecef;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .main-menu {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-content">
                <div class="logo">📊 SistemaInventarios</div>
                <ul class="main-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/bienvenidos" class="active">Dashboard</a></li>
                    <li><a href="/productos">Productos</a></li>
                    <li><a href="/ventas">Ventas</a></li>
                    <li><a href="/cliente">Cliente</a></li>
                    <li><a href="/proveedor">Proveedor</a></li>
                </ul>
            </div>
        </header>
        
        <main>
            <section class="dashboard-header">
                <h1>Dashboard del Sistema</h1>
                <p>Resumen general y estadísticas de tu inventario</p>
            </section>
            
            <div class="stats-grid">
                <div class="stat-card products">
                    <div class="stat-icon">📦</div>
                    <div class="stat-number" id="total-productos">0</div>
                    <div class="stat-label">Productos en Inventario</div>
                </div>
                
                <div class="stat-card sales">
                    <div class="stat-icon">💰</div>
                    <div class="stat-number" id="total-ventas">0</div>
                    <div class="stat-label">Ventas del Mes</div>
                </div>
                
                <div class="stat-card clients">
                    <div class="stat-icon">👥</div>
                    <div class="stat-number" id="total-clientes">0</div>
                    <div class="stat-label">Clientes Registrados</div>
                </div>
                
                <div class="stat-card suppliers">
                    <div class="stat-icon">🏢</div>
                    <div class="stat-number" id="total-proveedores">0</div>
                    <div class="stat-label">Proveedores Activos</div>
                </div>
            </div>
            
            <section class="quick-actions">
                <h2>Acciones Rápidas</h2>
                <div class="actions-grid">
                    <a href="/productos" class="action-card">
                        <div class="action-icon">➕</div>
                        <h3>Agregar Producto</h3>
                        <p>Registrar nuevo producto en inventario</p>
                    </a>
                    
                    <a href="/ventas" class="action-card">
                        <div class="action-icon">💸</div>
                        <h3>Nueva Venta</h3>
                        <p>Registrar una nueva venta</p>
                    </a>
                    
                    <a href="/cliente" class="action-card">
                        <div class="action-icon">👤</div>
                        <h3>Agregar Cliente</h3>
                        <p>Registrar nuevo cliente</p>
                    </a>
                    
                    <a href="/proveedor" class="action-card">
                        <div class="action-icon">🏭</div>
                        <h3>Agregar Proveedor</h3>
                        <p>Registrar nuevo proveedor</p>
                    </a>
                </div>
            </section>
            
            <section class="recent-activity">
                <h2>Actividad Reciente</h2>
                <ul class="activity-list" id="activity-list">
                    <!-- La actividad se cargará dinámicamente -->
                </ul>
            </section>
            
            <div class="system-info">
                <div class="info-card">
                    <h3>Estadísticas de Inventario</h3>
                    <div class="info-item">
                        <span class="info-label">Producto con más stock:</span>
                        <span class="info-value" id="producto-max-stock">-</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Producto con menos stock:</span>
                        <span class="info-value" id="producto-min-stock">-</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Valor total inventario:</span>
                        <span class="info-value" id="valor-total-inventario">$0</span>
                    </div>
                </div>
                
                <div class="info-card">
                    <h3>Información del Sistema</h3>
                    <div class="info-item">
                        <span class="info-label">Versión:</span>
                        <span class="info-value">1.0.0</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Última actualización:</span>
                        <span class="info-value" id="ultima-actualizacion">-</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Estado:</span>
                        <span class="info-value" style="color: var(--primary-color);">● Activo</span>
                    </div>
                </div>
            </div>
        </main>
        
        <footer>
            <p>Sistema de Inventarios &copy; 2023 - Panel de Control</p>
        </footer>
    </div>

    <script>
        // Función para actualizar estadísticas
        function updateDashboard() {
            // Obtener datos de localStorage
            const productos = JSON.parse(localStorage.getItem('productos')) || [];
            const ventas = JSON.parse(localStorage.getItem('ventas')) || [];
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            const proveedores = JSON.parse(localStorage.getItem('proveedores')) || [];
            
            // Actualizar contadores principales
            document.getElementById('total-productos').textContent = productos.length;
            document.getElementById('total-ventas').textContent = ventas.length;
            document.getElementById('total-clientes').textContent = clientes.length;
            document.getElementById('total-proveedores').textContent = proveedores.length;
            
            // Calcular estadísticas de inventario
            if (productos.length > 0) {
                const productoMaxStock = productos.reduce((max, producto) => 
                    producto.stock > max.stock ? producto : max
                );
                const productoMinStock = productos.reduce((min, producto) => 
                    producto.stock < min.stock ? producto : min
                );
                const valorTotal = productos.reduce((total, producto) => 
                    total + (producto.precio * producto.stock), 0
                );
                
                document.getElementById('producto-max-stock').textContent = `${productoMaxStock.nombre} (${productoMaxStock.stock})`;
                document.getElementById('producto-min-stock').textContent = `${productoMinStock.nombre} (${productoMinStock.stock})`;
                document.getElementById('valor-total-inventario').textContent = `$${valorTotal.toFixed(2)}`;
            }
            
            // Actualizar actividad reciente
            updateRecentActivity(productos, ventas, clientes);
            
            // Actualizar última actualización
            document.getElementById('ultima-actualizacion').textContent = new Date().toLocaleString();
        }
        
        // Función para actualizar actividad reciente
        function updateRecentActivity(productos, ventas, clientes) {
            const activityList = document.getElementById('activity-list');
            activityList.innerHTML = '';
            
            // Crear actividades basadas en los datos
            const activities = [];
            
            // Actividades de productos (últimos 3)
            productos.slice(-3).forEach(producto => {
                activities.push({
                    type: 'product',
                    text: `Producto agregado: ${producto.nombre}`,
                    time: producto.fechaRegistro,
                    icon: '📦'
                });
            });
            
            // Actividades de ventas (últimas 3)
            ventas.slice(-3).forEach(venta => {
                activities.push({
                    type: 'sale',
                    text: `Venta registrada: ${venta.productoNombre} - $${venta.total}`,
                    time: venta.fecha,
                    icon: '💰'
                });
            });
            
            // Actividades de clientes (últimos 3)
            clientes.slice(-3).forEach(cliente => {
                activities.push({
                    type: 'client',
                    text: `Cliente registrado: ${cliente.nombre}`,
                    time: cliente.fechaRegistro,
                    icon: '👤'
                });
            });
            
            // Ordenar actividades por tiempo (más recientes primero)
            activities.sort((a, b) => new Date(b.time) - new Date(a.time));
            
            // Mostrar máximo 6 actividades
            const recentActivities = activities.slice(0, 6);
            
            if (recentActivities.length === 0) {
                activityList.innerHTML = '<div class="activity-item"><div class="activity-content"><div class="activity-text">No hay actividad reciente</div></div></div>';
                return;
            }
            
            recentActivities.forEach(activity => {
                const activityItem = document.createElement('li');
                activityItem.className = 'activity-item';
                activityItem.innerHTML = `
                    <div class="activity-icon">${activity.icon}</div>
                    <div class="activity-content">
                        <div class="activity-text">${activity.text}</div>
                        <div class="activity-time">${activity.time}</div>
                    </div>
                `;
                activityList.appendChild(activityItem);
            });
        }
        
        // Actualizar dashboard cada 3 segundos
        document.addEventListener('DOMContentLoaded', function() {
            updateDashboard();
            setInterval(updateDashboard, 3000);
        });
    </script>
</body>
</html>