<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventarios</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            display: flex;
            flex: 1;
            max-width: 1400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin: 20px;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(to bottom, #2c3e50, #34495e);
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #7f8c8d;
            font-size: 1.2rem;
        }

        .modules {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .module-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border-left: 4px solid #3498db;
        }

        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .module-card h3 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .module-card p {
            color: #7f8c8d;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #2980b9;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-top: 4px solid #2ecc71;
        }

        .stat-card h3 {
            color: #2c3e50;
            font-size: 1.8rem;
            margin: 10px 0;
        }

        .stat-card p {
            color: #7f8c8d;
        }

        footer {
            text-align: center;
            margin-top: auto;
            padding-top: 20px;
            color: #7f8c8d;
            border-top: 1px solid #eee;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            color: #3498db;
        }

        .nav-item {
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            align-items: center;
        }

        .nav-item.active, .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-item i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .fullscreen-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #2c3e50;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: background 0.3s;
        }

        .fullscreen-btn:hover {
            background: #34495e;
        }

        .data-form {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2c3e50;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .data-table th, .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .data-table th {
            background: #f8f9fa;
            color: #2c3e50;
            font-weight: bold;
        }

        .data-table tr:hover {
            background: #f5f5f5;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                margin: 10px;
            }
            
            .sidebar {
                width: 100%;
                padding: 15px;
            }
            
            .modules {
                grid-template-columns: 1fr;
            }
            
            .stats {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">Sistema de Inventarios</div>
            <div class="nav-item active" data-section="dashboard">
                <i>📊</i> Dashboard
            </div>
            <div class="nav-item" data-section="products">
                <i>📦</i> Productos
            </div>
            <div class="nav-item" data-section="sales">
                <i>💰</i> Ventas
            </div>
            <div class="nav-item" data-section="clients">
                <i>👥</i> Clientes
            </div>
            <div class="nav-item" data-section="suppliers">
                <i>🏭</i> Proveedores
            </div>
        </div>

        <div class="main-content">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">
                <header>
                    <h1>Elemento al Sistema de Inventarios</h1>
                    <p class="subtitle">Gestiona productos, ventas, clientes y proveedores de manera eficiente con nuestra plataforma integral.</p>
                </header>

                <div class="modules">
                    <div class="module-card">
                        <h3>Gestión de Productos</h3>
                        <p>Administra la información de productos, categorías y criterios.</p>
                        <a href="#" class="btn" data-section="products">Acceder</a>
                    </div>
                    <div class="module-card">
                        <h3>Control de Ventas</h3>
                        <p>Registrar y perfilar todas las ventas y transacciones.</p>
                        <a href="#" class="btn" data-section="sales">Acceder</a>
                    </div>
                    <div class="module-card">
                        <h3>Administración de Clientes</h3>
                        <p>Mantén un registro completo de la información de clientes.</p>
                        <a href="#" class="btn" data-section="clients">Acceder</a>
                    </div>
                    <div class="module-card">
                        <h3>Gestión de Proveedores</h3>
                        <p>Administra la información de los proveedores y compras.</p>
                        <a href="#" class="btn" data-section="suppliers">Acceder</a>
                    </div>
                </div>

                <div class="stats">
                    <div class="stat-card">
                        <p>Productos</p>
                        <h3 id="products-count">0</h3>
                    </div>
                    <div class="stat-card">
                        <p>Ventas Hoy</p>
                        <h3 id="sales-today">0</h3>
                    </div>
                    <div class="stat-card">
                        <p>Clientes</p>
                        <h3 id="clients-count">0</h3>
                    </div>
                    <div class="stat-card">
                        <p>Proveedores</p>
                        <h3 id="suppliers-count">0</h3>
                    </div>
                </div>

                <footer>
                    Sistema de Inventario © 2025 - Desarrollado por Venezia Saledo
                </footer>
            </section>

            <!-- Products Section -->
            <section id="products" class="content-section hidden">
                <header>
                    <h1>Gestión de Productos</h1>
                    <p class="subtitle">Administra tu inventario de productos</p>
                </header>

                <div class="data-form">
                    <h3>Agregar/Editar Producto</h3>
                    <form id="product-form">
                        <input type="hidden" id="product-id">
                        <div class="form-group">
                            <label for="product-name">Nombre del Producto</label>
                            <input type="text" id="product-name" required>
                        </div>
                        <div class="form-group">
                            <label for="product-category">Categoría</label>
                            <input type="text" id="product-category" required>
                        </div>
                        <div class="form-group">
                            <label for="product-price">Precio</label>
                            <input type="number" id="product-price" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="product-stock">Stock</label>
                            <input type="number" id="product-stock" required>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn" id="cancel-product">Cancelar</button>
                            <button type="submit" class="btn">Guardar Producto</button>
                        </div>
                    </form>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="products-table-body">
                        <!-- Los productos se cargarán aquí dinámicamente -->
                    </tbody>
                </table>
            </section>

            <!-- Sales Section -->
            <section id="sales" class="content-section hidden">
                <header>
                    <h1>Control de Ventas</h1>
                    <p class="subtitle">Registra y gestiona todas tus ventas</p>
                </header>

                <div class="data-form">
                    <h3>Registrar Venta</h3>
                    <form id="sale-form">
                        <input type="hidden" id="sale-id">
                        <div class="form-group">
                            <label for="sale-product">Producto</label>
                            <select id="sale-product" required>
                                <!-- Las opciones se cargarán dinámicamente -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sale-quantity">Cantidad</label>
                            <input type="number" id="sale-quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="sale-client">Cliente</label>
                            <select id="sale-client" required>
                                <!-- Las opciones se cargarán dinámicamente -->
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn" id="cancel-sale">Cancelar</button>
                            <button type="submit" class="btn">Registrar Venta</button>
                        </div>
                    </form>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="sales-table-body">
                        <!-- Las ventas se cargarán aquí dinámicamente -->
                    </tbody>
                </table>
            </section>

            <!-- Clients Section -->
            <section id="clients" class="content-section hidden">
                <header>
                    <h1>Administración de Clientes</h1>
                    <p class="subtitle">Gestiona la información de tus clientes</p>
                </header>

                <div class="data-form">
                    <h3>Agregar/Editar Cliente</h3>
                    <form id="client-form">
                        <input type="hidden" id="client-id">
                        <div class="form-group">
                            <label for="client-name">Nombre</label>
                            <input type="text" id="client-name" required>
                        </div>
                        <div class="form-group">
                            <label for="client-email">Email</label>
                            <input type="email" id="client-email" required>
                        </div>
                        <div class="form-group">
                            <label for="client-phone">Teléfono</label>
                            <input type="text" id="client-phone" required>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn" id="cancel-client">Cancelar</button>
                            <button type="submit" class="btn">Guardar Cliente</button>
                        </div>
                    </form>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="clients-table-body">
                        <!-- Los clientes se cargarán aquí dinámicamente -->
                    </tbody>
                </table>
            </section>

            <!-- Suppliers Section -->
            <section id="suppliers" class="content-section hidden">
                <header>
                    <h1>Gestión de Proveedores</h1>
                    <p class="subtitle">Administra la información de tus proveedores</p>
                </header>

                <div class="data-form">
                    <h3>Agregar/Editar Proveedor</h3>
                    <form id="supplier-form">
                        <input type="hidden" id="supplier-id">
                        <div class="form-group">
                            <label for="supplier-name">Nombre</label>
                            <input type="text" id="supplier-name" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier-contact">Contacto</label>
                            <input type="text" id="supplier-contact" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier-phone">Teléfono</label>
                            <input type="text" id="supplier-phone" required>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn" id="cancel-supplier">Cancelar</button>
                            <button type="submit" class="btn">Guardar Proveedor</button>
                        </div>
                    </form>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="suppliers-table-body">
                        <!-- Los proveedores se cargarán aquí dinámicamente -->
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <button class="fullscreen-btn" id="fullscreen-btn">⛶</button>

    <script>
        // Sistema de persistencia de datos
        class DataManager {
            constructor() {
                this.products = this.loadData('products') || [];
                this.sales = this.loadData('sales') || [];
                this.clients = this.loadData('clients') || [];
                this.suppliers = this.loadData('suppliers') || [];
            }

            loadData(key) {
                const data = localStorage.getItem(key);
                return data ? JSON.parse(data) : null;
            }

            saveData(key, data) {
                localStorage.setItem(key, JSON.stringify(data));
            }

            addProduct(product) {
                if (product.id) {
                    // Actualizar producto existente
                    const index = this.products.findIndex(p => p.id === product.id);
                    if (index !== -1) {
                        this.products[index] = product;
                    }
                } else {
                    // Agregar nuevo producto
                    product.id = Date.now().toString();
                    this.products.push(product);
                }
                this.saveData('products', this.products);
            }

            deleteProduct(id) {
                this.products = this.products.filter(p => p.id !== id);
                this.saveData('products', this.products);
            }

            addSale(sale) {
                if (sale.id) {
                    // Actualizar venta existente
                    const index = this.sales.findIndex(s => s.id === sale.id);
                    if (index !== -1) {
                        this.sales[index] = sale;
                    }
                } else {
                    // Agregar nueva venta
                    sale.id = Date.now().toString();
                    sale.date = new Date().toLocaleDateString();
                    this.sales.push(sale);
                }
                this.saveData('sales', this.sales);
            }

            deleteSale(id) {
                this.sales = this.sales.filter(s => s.id !== id);
                this.saveData('sales', this.sales);
            }

            addClient(client) {
                if (client.id) {
                    // Actualizar cliente existente
                    const index = this.clients.findIndex(c => c.id === client.id);
                    if (index !== -1) {
                        this.clients[index] = client;
                    }
                } else {
                    // Agregar nuevo cliente
                    client.id = Date.now().toString();
                    this.clients.push(client);
                }
                this.saveData('clients', this.clients);
            }

            deleteClient(id) {
                this.clients = this.clients.filter(c => c.id !== id);
                this.saveData('clients', this.clients);
            }

            addSupplier(supplier) {
                if (supplier.id) {
                    // Actualizar proveedor existente
                    const index = this.suppliers.findIndex(s => s.id === supplier.id);
                    if (index !== -1) {
                        this.suppliers[index] = supplier;
                    }
                } else {
                    // Agregar nuevo proveedor
                    supplier.id = Date.now().toString();
                    this.suppliers.push(supplier);
                }
                this.saveData('suppliers', this.suppliers);
            }

            deleteSupplier(id) {
                this.suppliers = this.suppliers.filter(s => s.id !== id);
                this.saveData('suppliers', this.suppliers);
            }

            getSalesToday() {
                const today = new Date().toLocaleDateString();
                return this.sales.filter(sale => sale.date === today).length;
            }
        }

        // Inicializar el gestor de datos
        const dataManager = new DataManager();

        // Navegación entre secciones
        document.querySelectorAll('.nav-item, .btn[data-section]').forEach(item => {
            item.addEventListener('click', function() {
                const targetSection = this.getAttribute('data-section');
                showSection(targetSection);
                
                // Actualizar navegación activa
                document.querySelectorAll('.nav-item').forEach(navItem => {
                    navItem.classList.remove('active');
                });
                document.querySelector(`.nav-item[data-section="${targetSection}"]`).classList.add('active');
            });
        });

        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
        }

        // Funcionalidad de pantalla completa
        document.getElementById('fullscreen-btn').addEventListener('click', toggleFullscreen);

        function toggleFullscreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch(err => {
                    console.error(`Error al intentar entrar en modo pantalla completa: ${err.message}`);
                });
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        }

        // Actualizar estadísticas
        function updateStats() {
            document.getElementById('products-count').textContent = dataManager.products.length;
            document.getElementById('sales-today').textContent = dataManager.getSalesToday();
            document.getElementById('clients-count').textContent = dataManager.clients.length;
            document.getElementById('suppliers-count').textContent = dataManager.suppliers.length;
        }

        // Gestión de productos
        document.getElementById('product-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const product = {
                id: document.getElementById('product-id').value,
                name: document.getElementById('product-name').value,
                category: document.getElementById('product-category').value,
                price: parseFloat(document.getElementById('product-price').value),
                stock: parseInt(document.getElementById('product-stock').value)
            };
            
            dataManager.addProduct(product);
            this.reset();
            document.getElementById('product-id').value = '';
            renderProducts();
            updateStats();
        });

        document.getElementById('cancel-product').addEventListener('click', function() {
            document.getElementById('product-form').reset();
            document.getElementById('product-id').value = '';
        });

        function renderProducts() {
            const tbody = document.getElementById('products-table-body');
            tbody.innerHTML = '';
            
            dataManager.products.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.name}</td>
                    <td>${product.category}</td>
                    <td>$${product.price.toFixed(2)}</td>
                    <td>${product.stock}</td>
                    <td>
                        <button class="btn edit-product" data-id="${product.id}">Editar</button>
                        <button class="btn delete-product" data-id="${product.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
            
            // Agregar event listeners para los botones de editar y eliminar
            document.querySelectorAll('.edit-product').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    const product = dataManager.products.find(p => p.id === productId);
                    
                    if (product) {
                        document.getElementById('product-id').value = product.id;
                        document.getElementById('product-name').value = product.name;
                        document.getElementById('product-category').value = product.category;
                        document.getElementById('product-price').value = product.price;
                        document.getElementById('product-stock').value = product.stock;
                    }
                });
            });
            
            document.querySelectorAll('.delete-product').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
                        dataManager.deleteProduct(productId);
                        renderProducts();
                        updateStats();
                    }
                });
            });
        }

        // Gestión de ventas
        document.getElementById('sale-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const sale = {
                id: document.getElementById('sale-id').value,
                productId: document.getElementById('sale-product').value,
                quantity: parseInt(document.getElementById('sale-quantity').value),
                clientId: document.getElementById('sale-client').value
            };
            
            dataManager.addSale(sale);
            this.reset();
            document.getElementById('sale-id').value = '';
            renderSales();
            updateStats();
        });

        document.getElementById('cancel-sale').addEventListener('click', function() {
            document.getElementById('sale-form').reset();
            document.getElementById('sale-id').value = '';
        });

        function renderSales() {
            const tbody = document.getElementById('sales-table-body');
            tbody.innerHTML = '';
            
            dataManager.sales.forEach(sale => {
                const product = dataManager.products.find(p => p.id === sale.productId) || { name: 'Producto no encontrado', price: 0 };
                const client = dataManager.clients.find(c => c.id === sale.clientId) || { name: 'Cliente no encontrado' };
                const total = product.price * sale.quantity;
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${sale.date}</td>
                    <td>${product.name}</td>
                    <td>${sale.quantity}</td>
                    <td>${client.name}</td>
                    <td>$${total.toFixed(2)}</td>
                    <td>
                        <button class="btn edit-sale" data-id="${sale.id}">Editar</button>
                        <button class="btn delete-sale" data-id="${sale.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
            
            // Agregar event listeners para los botones de editar y eliminar
            document.querySelectorAll('.edit-sale').forEach(btn => {
                btn.addEventListener('click', function() {
                    const saleId = this.getAttribute('data-id');
                    const sale = dataManager.sales.find(s => s.id === saleId);
                    
                    if (sale) {
                        document.getElementById('sale-id').value = sale.id;
                        document.getElementById('sale-product').value = sale.productId;
                        document.getElementById('sale-quantity').value = sale.quantity;
                        document.getElementById('sale-client').value = sale.clientId;
                    }
                });
            });
            
            document.querySelectorAll('.delete-sale').forEach(btn => {
                btn.addEventListener('click', function() {
                    const saleId = this.getAttribute('data-id');
                    if (confirm('¿Estás seguro de que quieres eliminar esta venta?')) {
                        dataManager.deleteSale(saleId);
                        renderSales();
                        updateStats();
                    }
                });
            });
        }

        // Gestión de clientes
        document.getElementById('client-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const client = {
                id: document.getElementById('client-id').value,
                name: document.getElementById('client-name').value,
                email: document.getElementById('client-email').value,
                phone: document.getElementById('client-phone').value
            };
            
            dataManager.addClient(client);
            this.reset();
            document.getElementById('client-id').value = '';
            renderClients();
            updateStats();
        });

        document.getElementById('cancel-client').addEventListener('click', function() {
            document.getElementById('client-form').reset();
            document.getElementById('client-id').value = '';
        });

        function renderClients() {
            const tbody = document.getElementById('clients-table-body');
            tbody.innerHTML = '';
            
            dataManager.clients.forEach(client => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${client.name}</td>
                    <td>${client.email}</td>
                    <td>${client.phone}</td>
                    <td>
                        <button class="btn edit-client" data-id="${client.id}">Editar</button>
                        <button class="btn delete-client" data-id="${client.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
            
            // Agregar event listeners para los botones de editar y eliminar
            document.querySelectorAll('.edit-client').forEach(btn => {
                btn.addEventListener('click', function() {
                    const clientId = this.getAttribute('data-id');
                    const client = dataManager.clients.find(c => c.id === clientId);
                    
                    if (client) {
                        document.getElementById('client-id').value = client.id;
                        document.getElementById('client-name').value = client.name;
                        document.getElementById('client-email').value = client.email;
                        document.getElementById('client-phone').value = client.phone;
                    }
                });
            });
            
            document.querySelectorAll('.delete-client').forEach(btn => {
                btn.addEventListener('click', function() {
                    const clientId = this.getAttribute('data-id');
                    if (confirm('¿Estás seguro de que quieres eliminar este cliente?')) {
                        dataManager.deleteClient(clientId);
                        renderClients();
                        updateStats();
                    }
                });
            });
        }

        // Gestión de proveedores
        document.getElementById('supplier-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const supplier = {
                id: document.getElementById('supplier-id').value,
                name: document.getElementById('supplier-name').value,
                contact: document.getElementById('supplier-contact').value,
                phone: document.getElementById('supplier-phone').value
            };
            
            dataManager.addSupplier(supplier);
            this.reset();
            document.getElementById('supplier-id').value = '';
            renderSuppliers();
            updateStats();
        });

        document.getElementById('cancel-supplier').addEventListener('click', function() {
            document.getElementById('supplier-form').reset();
            document.getElementById('supplier-id').value = '';
        });

        function renderSuppliers() {
            const tbody = document.getElementById('suppliers-table-body');
            tbody.innerHTML = '';
            
            dataManager.suppliers.forEach(supplier => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${supplier.name}</td>
                    <td>${supplier.contact}</td>
                    <td>${supplier.phone}</td>
                    <td>
                        <button class="btn edit-supplier" data-id="${supplier.id}">Editar</button>
                        <button class="btn delete-supplier" data-id="${supplier.id}">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
            
            // Agregar event listeners para los botones de editar y eliminar
            document.querySelectorAll('.edit-supplier').forEach(btn => {
                btn.addEventListener('click', function() {
                    const supplierId = this.getAttribute('data-id');
                    const supplier = dataManager.suppliers.find(s => s.id === supplierId);
                    
                    if (supplier) {
                        document.getElementById('supplier-id').value = supplier.id;
                        document.getElementById('supplier-name').value = supplier.name;
                        document.getElementById('supplier-contact').value = supplier.contact;
                        document.getElementById('supplier-phone').value = supplier.phone;
                    }
                });
            });
            
            document.querySelectorAll('.delete-supplier').forEach(btn => {
                btn.addEventListener('click', function() {
                    const supplierId = this.getAttribute('data-id');
                    if (confirm('¿Estás seguro de que quieres eliminar este proveedor?')) {
                        dataManager.deleteSupplier(supplierId);
                        renderSuppliers();
                        updateStats();
                    }
                });
            });
        }

        // Actualizar opciones de productos y clientes en el formulario de ventas
        function updateSaleOptions() {
            const productSelect = document.getElementById('sale-product');
            const clientSelect = document.getElementById('sale-client');
            
            // Limpiar opciones existentes
            productSelect.innerHTML = '';
            clientSelect.innerHTML = '';
            
            // Agregar opciones de productos
            dataManager.products.forEach(product => {
                const option = document.createElement('option');
                option.value = product.id;
                option.textContent = product.name;
                productSelect.appendChild(option);
            });
            
            // Agregar opciones de clientes
            dataManager.clients.forEach(client => {
                const option = document.createElement('option');
                option.value = client.id;
                option.textContent = client.name;
                clientSelect.appendChild(option);
            });
        }

        // Inicializar la aplicación
        function initApp() {
            updateStats();
            renderProducts();
            renderSales();
            renderClients();
            renderSuppliers();
            updateSaleOptions();
        }

        // Ejecutar la inicialización cuando se carga la página
        document.addEventListener('DOMContentLoaded', initApp);
    </script>
</body>
</html>