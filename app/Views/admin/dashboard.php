<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Admin Dashboard | DTI–CARP Connect Aurora</title>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Admin CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        .image-preview { max-width: 60px; max-height: 60px; border-radius: 8px; object-fit: cover; }
    </style>
</head>
<body>
<div class="admin-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-leaf"></i> CARP Admin</h2>
            <p>DTI Aurora Hub</p>
        </div>
        <div class="nav-menu">
            <div class="nav-item active" data-tab="dashboard"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></div>
            <div class="nav-item" data-tab="shops"><i class="fas fa-store"></i><span> Manage Shops</span></div>
            <div class="nav-item" data-tab="products"><i class="fas fa-boxes"></i><span> Products</span></div>
            <div class="nav-item" data-tab="registrations"><i class="fas fa-user-plus"></i><span> Registrations</span></div>
            <div class="nav-item" data-tab="analytics"><i class="fas fa-chart-line"></i><span> Analytics</span></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <div class="page-title">Admin Control Panel</div>
            <div class="admin-badge"><i class="fas fa-user-shield"></i> CARP Program Manager <i class="fas fa-chevron-down"></i></div>
        </div>

        <!-- Dashboard Tab -->
        <div id="dashboardTab" class="tab-content">
            <div class="stats-grid">
                <div class="stat-card"><div class="stat-info"><h4>Total Shops</h4><div class="stat-number" id="totalShopsStat">0</div></div><i class="fas fa-store stat-icon"></i></div>
                <div class="stat-card"><div class="stat-info"><h4>Active Products</h4><div class="stat-number" id="totalProductsStat">0</div></div><i class="fas fa-tag stat-icon"></i></div>
                <div class="stat-card"><div class="stat-info"><h4>Pending Approvals</h4><div class="stat-number" id="pendingRegsStat">0</div></div><i class="fas fa-clock stat-icon"></i></div>
                <div class="stat-card"><div class="stat-info"><h4>ARB Cooperatives</h4><div class="stat-number" id="coopStat">0</div></div><i class="fas fa-handshake stat-icon"></i></div>
            </div>
            <div class="admin-card">
                <div class="card-header"><h3><i class="fas fa-bell"></i> Recent Activities</h3><button class="btn-outline">View all</button></div>
                <ul id="recentActivitiesList" style="list-style: none;">
                    <li>• New shop registration: "Aurora Honey Bee Coop" awaiting review</li>
                    <li>• Product added: Organic Coconut Oil (Island Essentials)</li>
                    <li>• Shop approved: Lilha Studio</li>
                </ul>
            </div>
            <div class="admin-card"><h3><i class="fas fa-chart-pie"></i> Quick Overview</h3><canvas id="dashboardChart" width="400" height="200" style="max-height: 250px;"></canvas></div>
        </div>

        <!-- Manage Shops Tab -->
        <div id="shopsTab" class="tab-content" style="display: none;">
            <div class="admin-card">
                <div class="card-header"><h3><i class="fas fa-store"></i> All Registered Shops (CARPreneurs)</h3><button class="btn-primary" id="addShopBtn"><i class="fas fa-plus"></i> Add Shop</button></div>
                <div style="overflow-x: auto;">
                    <table id="shopsTable">
                        <thead><tr><th>Image</th><th>Shop Name</th><th>Type</th><th>Location</th><th>Products</th><th>Status</th><th>Actions</th></tr></thead>
                        <tbody id="shopsTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Products Tab -->
        <div id="productsTab" class="tab-content" style="display: none;">
            <div class="admin-card">
                <div class="card-header"><h3><i class="fas fa-box"></i> Product Inventory</h3><button class="btn-primary" id="addProductBtn"><i class="fas fa-plus"></i> Add Product</button></div>
                <div style="overflow-x: auto;">
                    <table>
                        <thead><tr><th>Image</th><th>Product Name</th><th>Shop</th><th>Price</th><th>Category</th><th>Actions</th></tr></thead>
                        <tbody id="productsTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Registrations Tab -->
        <div id="registrationsTab" class="tab-content" style="display: none;">
            <div class="admin-card"><h3><i class="fas fa-user-check"></i> Pending & Approved Registrations</h3>
                <table><thead><tr><th>Applicant / Coop</th><th>Type</th><th>Location</th><th>Status</th><th>Actions</th></tr></thead><tbody id="registrationsTableBody"></tbody></table>
            </div>
        </div>

        <!-- Analytics Tab -->
        <div id="analyticsTab" class="tab-content" style="display: none;">
            <div class="admin-card"><h3><i class="fas fa-chart-simple"></i> Platform Insights</h3><canvas id="growthChart" width="400" height="200" style="max-height: 250px;"></canvas></div>
            <div class="admin-card"><h3>Top Product Categories</h3><canvas id="categoryChart" width="400" height="200" style="max-height: 250px;"></canvas></div>
        </div>
    </div>
</div>

<!-- ========== SHOP MODAL (file upload) ========== -->
<div id="shopModal" class="modal">
    <div class="modal-content">
        <h3 id="modalTitle">Add New Shop</h3>
        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>" id="csrfToken">

        <input type="text" id="shopName" placeholder="Shop / Cooperative / ARB Group Name">
        <select id="shopType">
            <option value="cooperative">Cooperative</option>
            <option value="arb">ARB Group</option>
            <option value="individual">Individual</option>
        </select>
        <input type="text" id="shopLocation" placeholder="Barangay, Municipality, Aurora">
        <input type="text" id="shopContact" placeholder="Phone or Mobile Number">
        <textarea id="shopDescription" placeholder="Shop Description" rows="4"></textarea>
        <label style="display:block; margin-top:0.5rem; font-weight:600; color:#0B3D2E;">Shop Image</label>
        <input type="file" id="shopImage" accept="image/*">
        <small style="color:#667085;">Leave empty to keep current image when editing.</small>
        <input type="text" id="shopTags" placeholder="Comma-separated keywords (e.g. Coconut, Organic)">
        
        <div style="display:flex; gap:10px; margin-top:15px;">
            <button class="btn-primary" id="saveShopBtn">Save Shop</button>
            <button class="btn-outline" id="closeModalBtn">Cancel</button>
        </div>
    </div>
</div>

<!-- ========== PRODUCT MODAL (no slug/stock; brochure fields) ========== -->
<div id="productModal" class="modal">
    <div class="modal-content" style="max-width:600px;">
        <h3 id="productModalTitle">Add Product</h3>
        <input type="text" id="productName" placeholder="Product Name">
        <select id="productShopSelect"></select>
        <input type="number" id="productPrice" placeholder="Price (₱)" step="0.01">
        <select id="productCategory">
            <option value="agri">Agricultural</option>
            <option value="handicraft">Handicraft</option>
            <option value="food">Food & Beverages</option>
        </select>
        <textarea id="productDescription" placeholder="Detailed product description..." rows="3"></textarea>
        <label style="display:block; margin-top:0.5rem; font-weight:600; color:#0B3D2E;">Product Image</label>
        <input type="file" id="productImage" accept="image/*">
        <small style="color:#667085;">Leave empty to keep current image when editing.</small>
        <input type="text" id="productTags" placeholder="Comma-separated tags">
        <div style="display:flex; gap:10px; margin-top:15px;">
            <button class="btn-primary" id="saveProductBtn">Save Product</button>
            <button class="btn-outline" id="closeProductModalBtn">Cancel</button>
        </div>
    </div>
</div>

<script>
    const BASE_URL = "<?= base_url() ?>";
    window.dashChart = null;
    window.growthChart = null;

    // ---------- DATA ----------
    let shops = [];
    let products = [];
    let registrations = [];

    // ---------- LOAD FROM SERVER (aligned with controller that returns [] on error) ----------
    async function loadShops() {
        try {
            const res = await fetch(`${BASE_URL}admin/get-shops`);
            const data = await res.json();
            // data is an array (empty on error)
            shops = (Array.isArray(data) ? data : []).map(shop => ({
                id: shop.id,
                name: shop.name,
                type: shop.type,
                location: shop.location,
                contact_number: shop.contact_number || '',
                description: shop.description || '',
                image: shop.image || '',
                tags: shop.tags || '',
                status: shop.status || 'pending',
                productsCount: shop.products_count || 0
            }));
        } catch (e) {
            console.error('Load shops failed', e);
            shops = [];
        }
    }

    async function loadProducts() {
        try {
            const res = await fetch(`${BASE_URL}admin/get-products`);
            const data = await res.json();
            // data is an array (empty on error)
            products = (Array.isArray(data) ? data : []).map(p => ({
                id: p.id,
                name: p.name,
                shopId: p.carp_shop_id,
                shopName: p.shop_name || 'Unknown',
                price: p.price,
                category: p.category,
                description: p.description || '',
                image: p.image || '',
                tags: p.tags || '',
                status: p.status || 'active'
            }));
        } catch (e) {
            console.error('Load products failed', e);
            products = [];
        }
    }

    async function loadRegistrations() {
        try {
            const res = await fetch(`${BASE_URL}admin/get-registrations`);
            const data = await res.json();
            // data is an array (empty on error)
            registrations = Array.isArray(data) ? data : [];
        } catch (e) {
            console.error('Load registrations failed', e);
            registrations = [];
        }
    }

    // ---------- STATS (safe against non‑arrays) ----------
    function updateStats() {
        const s = Array.isArray(shops) ? shops : [];
        const p = Array.isArray(products) ? products : [];
        const r = Array.isArray(registrations) ? registrations : [];

        document.getElementById("totalShopsStat").innerText = s.length;
        document.getElementById("totalProductsStat").innerText = p.length;
        document.getElementById("pendingRegsStat").innerText = r.filter(reg => reg.status === "pending").length;
        document.getElementById("coopStat").innerText = s.filter(shop => shop.type === "cooperative").length;
    }

    // ---------- RENDER TABLES ----------
    function renderShopsTable() {
        const tbody = document.getElementById("shopsTableBody");
        const s = Array.isArray(shops) ? shops : [];
        tbody.innerHTML = s.map(shop => {
            const statusDisplay = shop.status === 'active' ? 'Active' : shop.status === 'pending' ? 'Pending' : 'Inactive';
            const imgHtml = shop.image ? `<img src="${BASE_URL}${shop.image}" class="image-preview" onerror="this.style.display='none'">` : '<i class="fas fa-image"></i>';
            const typeLabel = shop.type === 'cooperative' ? 'Cooperative' : shop.type === 'arb' ? 'ARB Group' : 'Individual';
            return `
                <tr>
                    <td>${imgHtml}</td>
                    <td>${shop.name}</td>
                    <td>${typeLabel}</td>
                    <td>${shop.location}</td>
                    <td>${shop.productsCount || 0}</td>
                    <td><span class="status-badge">${statusDisplay}</span></td>
                    <td class="action-icons">
                        <i class="fas fa-edit" onclick="editShop(${shop.id})"></i>
                        <i class="fas fa-trash-alt" onclick="deleteShop(${shop.id})"></i>
                    </td>
                </tr>
            `;
        }).join("");
    }

    function renderProductsTable() {
        const tbody = document.getElementById("productsTableBody");
        const p = Array.isArray(products) ? products : [];
        tbody.innerHTML = p.map(prod => {
            const imgHtml = prod.image ? `<img src="${BASE_URL}${prod.image}" class="image-preview" onerror="this.style.display='none'">` : '<i class="fas fa-image"></i>';
            return `
                <tr>
                    <td>${imgHtml}</td>
                    <td>${prod.name}</td>
                    <td>${prod.shopName}</td>
                    <td>₱${parseFloat(prod.price).toFixed(2)}</td>
                    <td>${prod.category}</td>
                    <td class="action-icons">
                        <i class="fas fa-edit" onclick="editProduct(${prod.id})"></i>
                        <i class="fas fa-trash-alt" onclick="deleteProduct(${prod.id})"></i>
                    </td>
                </tr>
            `;
        }).join("");
    }

    function renderRegistrations() {
        const tbody = document.getElementById("registrationsTableBody");
        const r = Array.isArray(registrations) ? registrations : [];
        tbody.innerHTML = r.map(reg => `
            <tr>
                <td>${reg.name}</td>
                <td>${reg.type}</td>
                <td>${reg.location}</td>
                <td><span class="status-badge">${reg.status}</span></td>
                <td class="action-icons">
                    ${reg.status === "pending" ? `
                        <i class="fas fa-check-circle" onclick="approveReg(${reg.id})" style="color:green;"></i>
                        <i class="fas fa-times-circle" onclick="rejectReg(${reg.id})" style="color:red;"></i>
                    ` : '-'}
                </td>
            </tr>
        `).join("");
    }

    // ---------- SHOP CRUD (with file upload) ----------
    window.editShop = (id) => {
        const shop = shops.find(s => s.id == id);
        if (!shop) return alert("Shop not found.");
        document.getElementById("modalTitle").innerText = "Edit Shop";
        document.getElementById("shopName").value = shop.name || "";
        document.getElementById("shopType").value = shop.type || "cooperative";
        document.getElementById("shopLocation").value = shop.location || "";
        document.getElementById("shopContact").value = shop.contact_number || "";
        document.getElementById("shopDescription").value = shop.description || "";
        document.getElementById("shopImage").value = ''; // reset file input
        document.getElementById("shopTags").value = shop.tags || "";
        window.currentEditShopId = id;
        document.getElementById("shopModal").style.display = "flex";
    };

    window.deleteShop = async (id) => {
        if (!confirm("Delete this shop?")) return;
        const res = await fetch(`${BASE_URL}admin/delete-shop`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
            body: new URLSearchParams({ id, csrf_token: document.getElementById("csrfToken").value })
        });
        const result = await res.json();
        if (result.success) {
            shops = shops.filter(s => s.id != id);
            products = products.filter(p => p.shopId != id);
            updateStats(); renderShopsTable(); renderProductsTable(); renderDashboardChart();
            alert("Shop deleted.");
        } else alert("Failed: " + (result.message || ''));
    };

    document.getElementById("saveShopBtn").onclick = async () => {
        const name = document.getElementById("shopName").value.trim();
        const type = document.getElementById("shopType").value;
        const location = document.getElementById("shopLocation").value.trim();
        const contact_number = document.getElementById("shopContact").value.trim();
        const description = document.getElementById("shopDescription").value.trim();
        const tags = document.getElementById("shopTags").value.trim();
        const imageFile = document.getElementById("shopImage").files[0];

        if (!name || !location) return alert("Name and location required.");

        const editId = window.currentEditShopId;
        const url = editId ? `${BASE_URL}admin/edit-shop` : `${BASE_URL}admin/add-shop`;

        const formData = new FormData();
        formData.append('id', editId || '');
        formData.append('name', name);
        formData.append('type', type);
        formData.append('location', location);
        formData.append('contact_number', contact_number);
        formData.append('description', description);
        formData.append('tags', tags);
        formData.append('csrf_token', document.getElementById("csrfToken").value);
        if (imageFile) formData.append('image', imageFile);

        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: formData
            });
            const result = await res.json();
            if (result.success) {
                await loadShops(); // refresh shops with new image path
                updateStats(); renderShopsTable(); renderDashboardChart();
                closeModals();
                document.getElementById("shopName").value = '';
                document.getElementById("shopImage").value = ''; // clear file input
            } else alert("Failed: " + (result.message || ''));
        } catch (e) { console.error(e); alert("Error saving shop."); }
    };

    // ---------- PRODUCT CRUD (with file upload) ----------
    window.editProduct = (id) => {
        const prod = products.find(p => p.id == id);
        if (!prod) return alert("Product not found.");

        // 1. Populate the shop dropdown with all shops
        const shopSelect = document.getElementById("productShopSelect");
        shopSelect.innerHTML = shops.map(s => `<option value="${s.id}">${s.name}</option>`).join("");

        // 2. Set form fields (no slug/stock)
        document.getElementById("productModalTitle").innerText = "Edit Product";
        document.getElementById("productName").value = prod.name;
        document.getElementById("productPrice").value = prod.price;
        document.getElementById("productCategory").value = prod.category;
        shopSelect.value = prod.shopId;
        document.getElementById("productDescription").value = prod.description || '';
        document.getElementById("productImage").value = '';   // reset file input
        document.getElementById("productTags").value = prod.tags || '';
        window.currentEditProductId = id;
        document.getElementById("productModal").style.display = "flex";
    };

    window.deleteProduct = async (id) => {
        if (!confirm("Delete product?")) return;
        const res = await fetch(`${BASE_URL}admin/delete-product`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
            body: new URLSearchParams({ id, csrf_token: document.getElementById("csrfToken").value })
        });
        const result = await res.json();
        if (result.success) {
            products = products.filter(p => p.id != id);
            updateStats(); renderProductsTable(); renderDashboardChart();
            alert("Product deleted.");
        } else alert("Failed: " + (result.message || ''));
    };

    document.getElementById("saveProductBtn").onclick = async () => {
        const name = document.getElementById("productName").value.trim();
        const price = parseFloat(document.getElementById("productPrice").value);
        const category = document.getElementById("productCategory").value;
        const shopId = parseInt(document.getElementById("productShopSelect").value);
        const description = document.getElementById("productDescription").value.trim();
        const tags = document.getElementById("productTags").value.trim();
        const imageFile = document.getElementById("productImage").files[0];

        if (!name || isNaN(price) || !shopId) return alert("Name, price, and shop required.");

        const editId = window.currentEditProductId;
        const url = editId ? `${BASE_URL}admin/edit-product` : `${BASE_URL}admin/add-product`;

        const formData = new FormData();
        formData.append('id', editId || '');
        formData.append('carp_shop_id', shopId);
        formData.append('name', name);
        formData.append('price', price);
        formData.append('category', category);
        formData.append('description', description);
        formData.append('tags', tags);
        formData.append('csrf_token', document.getElementById("csrfToken").value);
        if (imageFile) formData.append('image', imageFile);

        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: formData
            });
            const result = await res.json();
            if (result.success) {
                await loadProducts();
                updateStats(); renderProductsTable(); renderDashboardChart();
                document.getElementById("productModal").style.display = "none";
                document.getElementById("productImage").value = ''; // clear file
            } else alert("Failed: " + (result.message || ''));
        } catch (e) { console.error(e); alert("Error saving product."); }
    };

    // ---------- REGISTRATIONS ----------
    window.approveReg = async (id) => {
        const res = await fetch(`${BASE_URL}admin/approve-registration`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
            body: new URLSearchParams({ id, csrf_token: document.getElementById("csrfToken").value })
        });
        const result = await res.json();
        if (result.success) {
            alert("Registration approved! Shop created.");
            await loadShops();
            await loadRegistrations();
            updateStats(); renderShopsTable(); renderRegistrations(); renderDashboardChart();
        } else alert("Failed.");
    };

    window.rejectReg = async (id) => {
        const res = await fetch(`${BASE_URL}admin/reject-registration`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
            body: new URLSearchParams({ id, csrf_token: document.getElementById("csrfToken").value })
        });
        const result = await res.json();
        if (result.success) {
            registrations = registrations.filter(r => r.id != id);
            renderRegistrations(); updateStats();
        } else alert("Failed.");
    };

    // ---------- MODALS ----------
    function closeModals() {
        document.getElementById("shopModal").style.display = "none";
        document.getElementById("productModal").style.display = "none";
    }
    document.getElementById("closeModalBtn").onclick = closeModals;
    document.getElementById("closeProductModalBtn").onclick = closeModals;

    document.getElementById("addShopBtn").onclick = () => {
        window.currentEditShopId = null;
        document.getElementById("modalTitle").innerText = "Add New Shop";
        document.getElementById("shopName").value = '';
        document.getElementById("shopImage").value = ''; // clear file
        document.getElementById("shopModal").style.display = "flex";
    };

    document.getElementById("addProductBtn").onclick = () => {
        window.currentEditProductId = null;
        document.getElementById("productModalTitle").innerText = "Add Product";
        document.getElementById("productName").value = '';
        document.getElementById("productPrice").value = '';
        document.getElementById("productDescription").value = '';
        document.getElementById("productImage").value = ''; // clear file
        document.getElementById("productTags").value = '';
        const shopSelect = document.getElementById("productShopSelect");
        shopSelect.innerHTML = shops.map(s => `<option value="${s.id}">${s.name}</option>`).join("");
        document.getElementById("productModal").style.display = "flex";
    };

    // ---------- CHARTS ----------
    function renderDashboardChart() {
        const ctx = document.getElementById("dashboardChart")?.getContext("2d");
        if (ctx && window.dashChart) window.dashChart.destroy();
        if (ctx) {
            window.dashChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Shops', 'Products', 'Pending'],
                    datasets: [{
                        label: 'Count',
                        data: [
                            shops.length,
                            products.length,
                            registrations.filter(r => r.status === 'pending').length
                        ],
                        backgroundColor: '#C9A03D'
                    }]
                }
            });
        }
    }

    function renderGrowthAnalytics() {
        const ctx = document.getElementById("growthChart")?.getContext("2d");
        if (ctx && window.growthChart) window.growthChart.destroy();
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Shops Growth',
                        data: [4, 7, 9, 12, shops.length],
                        borderColor: '#2C5E3F',
                        tension: 0.3
                    }]
                }
            });
        }
        const catCtx = document.getElementById("categoryChart")?.getContext("2d");
        if (catCtx) {
            new Chart(catCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Agri', 'Handicraft', 'Food'],
                    datasets: [{
                        data: [
                            products.filter(p => p.category === 'agri').length,
                            products.filter(p => p.category === 'handicraft').length,
                            products.filter(p => p.category === 'food').length
                        ],
                        backgroundColor: ['#C9A03D', '#2C5E3F', '#146B4D']
                    }]
                }
            });
        }
    }

    // ---------- TABS ----------
    document.querySelectorAll(".nav-item").forEach(item => {
        item.addEventListener("click", () => {
            document.querySelectorAll(".nav-item").forEach(nav => nav.classList.remove("active"));
            item.classList.add("active");
            const tabId = item.getAttribute("data-tab");
            document.querySelectorAll(".tab-content").forEach(tab => tab.style.display = "none");
            document.getElementById(`${tabId}Tab`).style.display = "block";
            if (tabId === "shops") renderShopsTable();
            if (tabId === "products") renderProductsTable();
            if (tabId === "registrations") renderRegistrations();
            if (tabId === "analytics") renderGrowthAnalytics();
            if (tabId === "dashboard") { renderDashboardChart(); updateStats(); }
        });
    });

    // ---------- INITIAL LOAD ----------
    (async () => {
        await loadShops();
        await loadProducts();
        await loadRegistrations();
        updateStats();
        renderShopsTable();
        renderProductsTable();
        renderRegistrations();
        renderDashboardChart();
        renderGrowthAnalytics();
    })();
</script>
</body>
</html>