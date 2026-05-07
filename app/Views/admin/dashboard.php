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
    <!-- Chart.js CDN for simple analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #F8F7F2;
            color: #0B3D2E;
            line-height: 1.5;
        }

        :root {
            --green-deep: #06281C;
            --green-primary: #0B3D2E;
            --green-soft: #146B4D;
            --green-light: #EAF4EE;
            --gold-main: #D4AF37;
            --gold-dark: #9C7412;
            --gold-soft: #F8E7A8;
            --gold-pale: #FFF7D6;
            --white: #FFFFFF;
            --cream-bg: #F8F7F2;
            --neutral-gray: #667085;
            --admin-bg: #F8F7F2;
            --card-white: #FFFFFF;
            --shadow-sm: 0 10px 30px rgba(0,0,0,0.06), 0 0 0 1px rgba(0,0,0,0.03);
            --shadow-md: 0 25px 45px rgba(0,0,0,0.12);
            --border-radius-card: 1.6rem;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #06281C 0%, #0B3D2E 100%);
            color: #e2dccd;
            flex-shrink: 0;
            transition: all 0.3s;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 1.8rem 1.5rem;
            border-bottom: 1px solid rgba(212,175,55,0.3);
        }

        .sidebar-header h2 {
            font-size: 1.4rem;
            font-weight: 700;
            background: linear-gradient(135deg, #FFF7D6, var(--gold-main));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .sidebar-header p {
            font-size: 0.7rem;
            opacity: 0.7;
            margin-top: 4px;
        }

        .nav-menu {
            padding: 1.5rem 0;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.9rem 1.8rem;
            margin: 4px 12px;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.2s;
            font-weight: 500;
            color: #ddd2b6;
        }

        .nav-item i {
            width: 24px;
            font-size: 1.2rem;
        }

        .nav-item.active, .nav-item:hover {
            background: var(--gold-main);
            color: var(--green-deep);
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            padding: 1.8rem 2rem;
            overflow-x: auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            border-left: 5px solid var(--gold-main);
            padding-left: 1rem;
        }

        .admin-badge {
            background: white;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow-sm);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--card-white);
            border-radius: 1.6rem;
            padding: 1.2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(212,175,55,0.18);
        }

        .stat-info h4 {
            font-size: 0.85rem;
            color: #6C7A68;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--green-primary);
        }

        .stat-icon {
            font-size: 2.5rem;
            color: var(--gold-main);
        }

        /* Tables & Cards */
        .admin-card {
            background: white;
            border-radius: 1.6rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(212,175,55,0.18);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--green-primary);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: var(--gold-dark);
            color: var(--green-deep);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--gold-main);
            border-radius: 40px;
            padding: 0.4rem 1rem;
            font-weight: 500;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 0.9rem 0.5rem;
            border-bottom: 1px solid rgba(212,175,55,0.2);
        }

        th {
            font-weight: 600;
            color: var(--green-deep);
        }

        .status-badge {
            background: var(--green-light);
            padding: 4px 10px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .action-icons i {
            margin: 0 6px;
            cursor: pointer;
            color: var(--gold-dark);
            transition: 0.2s;
        }

        .action-icons i:hover {
            color: var(--green-deep);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-content {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            width: 90%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
        }

        .modal-content h3 {
            margin-bottom: 1rem;
        }

        .modal-content input, .modal-content select, .modal-content textarea {
            width: 100%;
            padding: 0.7rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid rgba(212,175,55,0.2);
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
        }

        @media (max-width: 780px) {
            .sidebar { width: 80px; }
            .sidebar-header h2, .sidebar-header p, .nav-item span { display: none; }
            .nav-item { justify-content: center; padding: 0.9rem; }
            .main-content { padding: 1rem; }
        }
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

        <!-- Dashboard Tab (default) -->
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
                <div style="overflow-x: auto;"><table id="shopsTable"><thead><tr><th>Shop Name</th><th>Type</th><th>Location</th><th>Products</th><th>Status</th><th>Actions</th></tr></thead><tbody id="shopsTableBody"></tbody></table></div>
            </div>
        </div>

        <!-- Products Tab -->
        <div id="productsTab" class="tab-content" style="display: none;">
            <div class="admin-card"><div class="card-header"><h3><i class="fas fa-box"></i> Product Inventory</h3><button class="btn-primary" id="addProductBtn"><i class="fas fa-plus"></i> Add Product</button></div>
            <table><thead><tr><th>Product Name</th><th>Shop</th><th>Price</th><th>Category</th><th>Actions</th></tr></thead><tbody id="productsTableBody"></tbody></table></div>
        </div>

        <!-- Registrations Tab (shop applications) -->
        <div id="registrationsTab" class="tab-content" style="display: none;">
            <div class="admin-card"><h3><i class="fas fa-user-check"></i> Pending & Approved Registrations</h3>
            <table><thead><tr><th>Applicant / Coop</th><th>Type</th><th>Location</th><th>Status</th><th>Actions</th></tr></thead><tbody id="registrationsTableBody"></tbody></table></div>
        </div>

        <!-- Analytics Tab -->
        <div id="analyticsTab" class="tab-content" style="display: none;">
            <div class="admin-card"><h3><i class="fas fa-chart-simple"></i> Platform Insights</h3><canvas id="growthChart" width="400" height="200" style="max-height: 250px;"></canvas></div>
            <div class="admin-card"><h3>Top Product Categories</h3><canvas id="categoryChart" width="400" height="200" style="max-height: 250px;"></canvas></div>
        </div>
    </div>
</div>

<!-- Add/Edit Shop Modal -->
<div id="shopModal" class="modal">
    <div class="modal-content">

        <h3 id="modalTitle">Add New Shop</h3>

        <input type="hidden"
               name="csrf_token"
               value="<?= csrf_token() ?>"
               id="csrfToken">

        <!-- Shop Name -->
        <input type="text"
               id="shopName"
               placeholder="Shop / Cooperative / ARB Group Name">

        <!-- Type -->
        <select id="shopType">
            <option value="cooperative">Cooperative</option>
            <option value="arb">ARB Group</option>
            <option value="shop">Shop</option>
        </select>

        <!-- Location -->
        <input type="text"
               id="shopLocation"
               placeholder="Barangay, Municipality, Aurora">

        <!-- Contact Number -->
        <input type="text"
               id="shopContact"
               placeholder="Phone or Mobile Number">

        <!-- Description -->
        <textarea id="shopDescription"
                  placeholder="Shop Description"
                  rows="4"></textarea>

        <!-- Tags -->
        <input type="text"
               id="shopTags"
               placeholder="Comma-separated keywords (e.g. Coconut, Organic)">

        <!-- Buttons -->
        <div style="display:flex; gap:10px; margin-top:15px;">

            <button class="btn-primary" id="saveShopBtn">
                Save Shop
            </button>

            <button class="btn-outline"
                    id="closeModalBtn">
                Cancel
            </button>

        </div>

    </div>
</div>

<!-- Add/Edit Product Modal -->
<div id="productModal" class="modal"><div class="modal-content"><h3 id="productModalTitle">Add Product</h3><input type="text" id="productName" placeholder="Product Name"><select id="productShopSelect"></select><input type="number" id="productPrice" placeholder="Price (₱)"><select id="productCategory"><option value="agri">Agricultural</option><option value="handicraft">Handicraft</option></select><button class="btn-primary" id="saveProductBtn">Save</button><button class="btn-outline" id="closeProductModalBtn">Cancel</button></div></div>

<script>
     const BASE_URL = "<?= base_url() ?>";
    // Initialize chart variables
    window.dashChart = null;
    window.growthChart = null;
    // ---------- DATA MODELS ----------
    let shops = [];
    let products = [
        { id: 101, name: "Pure Raw Honey", shopId: 1, price: 250, category: "agri" },
        { id: 102, name: "Handwoven Abaca Bag", shopId: 2, price: 150, category: "handicraft" },
        { id: 103, name: "Organic Coconut Soap", shopId: 3, price: 120, category: "agri" },
        { id: 104, name: "Herbal Wellness Tea", shopId: 4, price: 150, category: "agri" },
        { id: 105, name: "Macrame Wall Hanging", shopId: 5, price: 210, category: "handicraft" },
    ];
    let registrations = [
        { id: 201, name: "Aurora Honey Bee Coop", type: "cooperative", location: "Maria Aurora", status: "pending" },
        { id: 202, name: "Baler Basket Weavers", type: "arb", location: "Baler", status: "pending" },
        { id: 203, name: "Dipping Lagoon Coffee", type: "cooperative", location: "Dipaculao", status: "approved" },
    ];

    // Helper: update stats counts
    function updateStats() {
        document.getElementById("totalShopsStat").innerText = shops.length;
        document.getElementById("totalProductsStat").innerText = products.length;
        document.getElementById("pendingRegsStat").innerText = registrations.filter(r => r.status === "pending").length;
        document.getElementById("coopStat").innerText = shops.filter(s => s.type === "cooperative").length;
    }

    async function loadShops() {
        try {
            const response = await fetch(`${BASE_URL}/admin/get-shops`);
            const data = await response.json();
            shops = data.map(shop => ({
                id: shop.id,
                name: shop.name,
                type: shop.type,
                location: shop.location,
                productsCount: 0, // TODO: calculate from products
                status: shop.status,
                tags: shop.tags || ''
            }));
        } catch (error) {
            console.error('Error loading shops:', error);
        }
    }

    function renderShopsTable() {
        const tbody = document.getElementById("shopsTableBody");
        tbody.innerHTML = shops.map(shop => {
            const statusDisplay = shop.status === 'active' ? 'Active' : shop.status === 'pending' ? 'Pending' : 'Inactive';
            return `
                <tr>
                    <td>${shop.name}</td><td>${shop.type === "cooperative" ? "Cooperative" : "ARB Group"}</td><td>${shop.location}</td><td>${shop.productsCount || 0}</td>
                    <td><span class="status-badge">${statusDisplay}</span></td>
                    <td class="action-icons"><i class="fas fa-edit" onclick="editShop(${shop.id})"></i><i class="fas fa-trash-alt" onclick="deleteShop(${shop.id})"></i></td>
                </tr>
            `;
        }).join("");
    }

    function renderProductsTable() {
        const tbody = document.getElementById("productsTableBody");
        tbody.innerHTML = products.map(prod => {
            const shopName = shops.find(s => s.id === prod.shopId)?.name || "Unknown";
            return `<tr><td>${prod.name}</td><td>${shopName}</td><td>₱${prod.price}</td><td>${prod.category}</td>
            <td class="action-icons"><i class="fas fa-edit" onclick="editProduct(${prod.id})"></i><i class="fas fa-trash-alt" onclick="deleteProduct(${prod.id})"></i></td></tr>`;
        }).join("");
    }

    function renderRegistrations() {
        const tbody = document.getElementById("registrationsTableBody");
        tbody.innerHTML = registrations.map(reg => `
            <tr><td>${reg.name}</td><td>${reg.type}</td><td>${reg.location}</td><td><span class="status-badge">${reg.status}</span></td>
            <td class="action-icons">${reg.status === "pending" ? `<i class="fas fa-check-circle" onclick="approveReg(${reg.id})" style="color:green;"></i> <i class="fas fa-times-circle" onclick="rejectReg(${reg.id})" style="color:red;"></i>` : `-`}</td></tr>
        `).join("");
    }

    window.editShop = (id) => {
        const shop = shops.find(s => s.id === id);
        document.getElementById("modalTitle").innerText = "Edit Shop";
        document.getElementById("shopName").value = shop.name;
        document.getElementById("shopType").value = shop.type;
        document.getElementById("shopLocation").value = shop.location;
        document.getElementById("shopTags").value = shop.tags;
        window.currentEditShopId = id;
        document.getElementById("shopModal").style.display = "flex";
    };
    window.deleteShop = (id) => { if(confirm("Delete shop?")) { shops = shops.filter(s => s.id !== id); products = products.filter(p => p.shopId !== id); updateStats(); renderShopsTable(); renderProductsTable(); renderDashboardChart(); } };
    window.editProduct = (id) => {
        const prod = products.find(p => p.id === id);
        document.getElementById("productModalTitle").innerText = "Edit Product";
        document.getElementById("productName").value = prod.name;
        document.getElementById("productPrice").value = prod.price;
        document.getElementById("productCategory").value = prod.category;
        document.getElementById("productShopSelect").value = prod.shopId;
        window.currentEditProductId = id;
        document.getElementById("productModal").style.display = "flex";
    };
    window.deleteProduct = (id) => { if(confirm("Delete product?")) { products = products.filter(p => p.id !== id); updateStats(); renderProductsTable(); renderDashboardChart(); } };
    window.approveReg = (id) => { let reg = registrations.find(r => r.id === id); if(reg) { reg.status = "approved"; alert("Registration approved! Shop added."); const newShop = { id: Date.now(), name: reg.name, type: reg.type, location: reg.location, productsCount: 0, status: "approved", tags: "" }; shops.push(newShop); updateStats(); renderShopsTable(); renderRegistrations(); renderDashboardChart(); } };
    window.rejectReg = (id) => { registrations = registrations.filter(r => r.id !== id); renderRegistrations(); updateStats(); };

document.getElementById("saveShopBtn").onclick = async () => {

    const name = document.getElementById("shopName").value.trim();

    const type = document.getElementById("shopType").value;

    const location = document.getElementById("shopLocation").value.trim();

    const contact_number = document.getElementById("shopContact").value.trim();

    const description = document.getElementById("shopDescription").value.trim();

    const tags = document.getElementById("shopTags").value.trim();

    const csrfToken = document.getElementById("csrfToken").value;

    if (!name || !location) {

        alert("Shop name and location are required.");

        return;

    }

    try {

        const response = await fetch(BASE_URL + 'admin/add-shop', {

            method: 'POST',

            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest'
            },

            body: new URLSearchParams({

                name,
                type,
                location,
                contact_number,
                description,
                tags,
                csrf_token: csrfToken

            })

        });

        const result = await response.json();

        if (result.success) {

            const newShop = {

                id: result.id,
                name,
                type,
                location,
                contact_number,
                description,
                productsCount: 0,
                tags

            };

            shops.push(newShop);

            updateStats();

            renderShopsTable();

            renderDashboardChart();

            document.getElementById("shopModal").style.display = "none";

            alert("Shop added successfully!");

            // CLEAR FORM

            document.getElementById("shopName").value = "";

            document.getElementById("shopLocation").value = "";

            document.getElementById("shopContact").value = "";

            document.getElementById("shopDescription").value = "";

            document.getElementById("shopTags").value = "";

        } else {

            alert("Failed to add shop: " + result.message);

        }

    } catch (error) {

        console.error(error);

        alert("An error occurred while adding the shop.");

    }

};
    document.getElementById("saveProductBtn").onclick = () => {
        const name = document.getElementById("productName").value;
        const price = parseFloat(document.getElementById("productPrice").value);
        const category = document.getElementById("productCategory").value;
        const shopId = parseInt(document.getElementById("productShopSelect").value);
        if(window.currentEditProductId){
            const idx = products.findIndex(p => p.id === window.currentEditProductId);
            if(idx !== -1) products[idx] = { ...products[idx], name, price, category, shopId };
            window.currentEditProductId = null;
        } else {
            products.push({ id: Date.now(), name, price, category, shopId });
        }
        updateStats(); renderProductsTable(); renderDashboardChart();
        document.getElementById("productModal").style.display = "none";
    };
    function closeModals(){ document.getElementById("shopModal").style.display = "none"; document.getElementById("productModal").style.display = "none"; }
    document.getElementById("closeModalBtn").onclick = closeModals;
    document.getElementById("closeProductModalBtn").onclick = closeModals;
    document.getElementById("addShopBtn").onclick = () => { window.currentEditShopId = null; document.getElementById("modalTitle").innerText = "Add New Shop"; document.getElementById("shopName").value = ""; document.getElementById("shopModal").style.display = "flex"; };
    document.getElementById("addProductBtn").onclick = () => { 
        window.currentEditProductId = null;
        document.getElementById("productModalTitle").innerText = "Add Product";
        document.getElementById("productName").value = "";
        const shopSelect = document.getElementById("productShopSelect");
        shopSelect.innerHTML = shops.map(s => `<option value="${s.id}">${s.name}</option>`).join("");
        document.getElementById("productModal").style.display = "flex";
    };
    function renderDashboardChart() {
        const ctx = document.getElementById("dashboardChart")?.getContext("2d");
        if(ctx && window.dashChart) window.dashChart.destroy();
        if(ctx) { window.dashChart = new Chart(ctx, { type: 'bar', data: { labels: ['Shops', 'Products', 'Pending Regs'], datasets: [{ label: 'Count', data: [shops.length, products.length, registrations.filter(r=>r.status==='pending').length], backgroundColor: '#C9A03D' }] } }); }
    }
    function renderGrowthAnalytics() {
        const ctx = document.getElementById("growthChart")?.getContext("2d");
        if(ctx && window.growthChart) window.growthChart.destroy();
        if(ctx) { new Chart(ctx, { type: 'line', data: { labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'], datasets: [{ label: 'Shops Growth', data: [4,7,9,12, shops.length], borderColor: '#2C5E3F', tension: 0.3 }] } }); }
        const catCtx = document.getElementById("categoryChart")?.getContext("2d");
        if(catCtx) { new Chart(catCtx, { type: 'doughnut', data: { labels: ['Agri Products', 'Handicraft'], datasets: [{ data: [products.filter(p=>p.category==='agri').length, products.filter(p=>p.category==='handicraft').length], backgroundColor: ['#C9A03D', '#2C5E3F'] }] } }); }
    }

    // Tab switching
    document.querySelectorAll(".nav-item").forEach(item => {
        item.addEventListener("click", () => {
            document.querySelectorAll(".nav-item").forEach(nav => nav.classList.remove("active"));
            item.classList.add("active");
            const tabId = item.getAttribute("data-tab");
            document.querySelectorAll(".tab-content").forEach(tab => tab.style.display = "none");
            document.getElementById(`${tabId}Tab`).style.display = "block";
            if(tabId === "shops") renderShopsTable();
            if(tabId === "products") renderProductsTable();
            if(tabId === "registrations") renderRegistrations();
            if(tabId === "analytics") renderGrowthAnalytics();
            if(tabId === "dashboard") { renderDashboardChart(); updateStats(); }
        });
    });
    // initial load
    (async () => {
        await loadShops();
        updateStats(); renderShopsTable(); renderProductsTable(); renderRegistrations(); renderDashboardChart(); renderGrowthAnalytics();
    })();
</script>
</body>
</html>