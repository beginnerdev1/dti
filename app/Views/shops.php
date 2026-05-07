<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Shop Directory | Aurora CARPreneurs Hub</title>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f7faf4; /* lighter soft off-white for clarity */
            color: #1d4f33; /* deep green for text */
            line-height: 1.4;
        }

        /* color palette aligned with home.php branding */
        :root {
            --green-deep: #1d4f33;
            --green-primary: #4ea178;
            --green-soft: #96d0b5;
            --green-light: #e7f6ef;
            --gold-dark: #9f7a26;
            --gold-main: #d4b13b;
            --gold-light: #f3e3a8;
            --gold-pale: #fbf5d7;
            --cream-bg: #f7faf4;
            --shadow-sm: 0 12px 28px rgba(0, 0, 0, 0.04), 0 0 0 1px rgba(0,0,0,0.02);
            --shadow-md: 0 20px 30px -12px rgba(0, 0, 0, 0.08);
            --border-radius-card: 1.5rem;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* HERO SECTION */
        .hero {
            background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
            border-radius: 0 0 2.5rem 2.5rem;
            padding: 2rem 0 3rem 0;
            margin-bottom: 2rem;
            color: var(--green-deep);
            position: relative;
            overflow: hidden;
        }
        .hero::after {
            content: "🏪";
            font-size: 180px;
            opacity: 0.06;
            position: absolute;
            bottom: -20px;
            right: 0px;
            pointer-events: none;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .logo {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            line-height: 1;
        }
        .logo img {
            width: auto;
            max-height: 110px;
            max-width: 100%;
            object-fit: contain;
            display: block;
        }
        .logo span {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
        }
        .nav-links {
            display: flex;
            gap: 2rem;
            font-weight: 500;
        }
        .nav-links a {
            color: var(--green-deep);
            transition: 0.2s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--gold-dark);
            border-bottom: 2px solid var(--gold-main);
            padding-bottom: 4px;
        }
        .hero-content {
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }
        .hero-content h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--green-deep);
        }
        .hero-content h1 span {
            color: var(--gold-dark);
            border-bottom: 2px dashed var(--gold-main);
        }
        .hero-content p {
            font-size: 1.1rem;
            margin-top: 0.5rem;
            opacity: 0.95;
            color: #315b45;
        }

        /* filters & search bar */
        .shop-filters {
            background: white;
            border-radius: 60px;
            padding: 0.7rem 1.8rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin: 1.8rem 0 2rem;
            border: 1px solid #EBE0CA;
            box-shadow: var(--shadow-sm);
        }
        .filter-group {
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
        }
        .filter-chip {
            background: #F9F3E6;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            font-weight: 500;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: 0.2s;
        }
        .filter-chip:hover, .filter-chip.active {
            background: var(--gold-main);
            color: var(--green-deep);
        }
        .search-shop {
            display: flex;
            gap: 10px;
            background: #F4EFE3;
            border-radius: 40px;
            padding: 0.3rem 1rem;
        }
        .search-shop input {
            border: none;
            background: transparent;
            font-family: 'Poppins', sans-serif;
            padding: 0.4rem;
            min-width: 180px;
            outline: none;
        }
        .btn-outline-gold {
            background: transparent;
            border: 1px solid var(--gold-main);
            border-radius: 40px;
            padding: 0.4rem 1rem;
            font-weight: 600;
            color: var(--green-primary);
            transition: 0.2s;
            cursor: pointer;
        }
        .btn-outline-gold:hover {
            background: var(--gold-light);
        }

        /* shop grid */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            margin: 1rem 0 1.5rem;
            border-left: 5px solid var(--gold-main);
            padding-left: 1rem;
        }
        .shop-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
        }
        .shop-card {
            background: white;
            border-radius: var(--border-radius-card);
            overflow: hidden;
            transition: all 0.25s ease;
            box-shadow: var(--shadow-sm);
            border: 1px solid #f0e8da;
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }
        .shop-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }
        .shop-banner {
            background: linear-gradient(145deg, #EADDB8, #F7EFDA);
            height: 120px;
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            padding: 0 1rem 0.8rem;
        }
        .shop-avatar {
            background: var(--green-deep);
            width: 70px;
            height: 70px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            border: 3px solid white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: -30px;
            background: var(--gold-main);
            color: #1E3A2F;
        }
        .shop-details {
            padding: 2rem 1.2rem 1.2rem;
        }
        .shop-name {
            font-size: 1.4rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 4px;
        }
        .badge-coop {
            background: var(--green-light);
            font-size: 0.7rem;
            padding: 4px 10px;
            border-radius: 50px;
            font-weight: 500;
            color: var(--green-primary);
        }
        .shop-location, .shop-category {
            font-size: 0.85rem;
            color: #5f6b5c;
            margin: 6px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .shop-stats {
            display: flex;
            gap: 1.2rem;
            margin: 0.8rem 0;
            font-size: 0.85rem;
            font-weight: 500;
            color: #4a5b49;
        }
        .product-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 12px 0;
        }
        .tag {
            background: #F4EFE0;
            font-size: 0.7rem;
            padding: 4px 12px;
            border-radius: 30px;
        }
        .btn-visit {
            display: inline-block;
            background: var(--green-primary);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: 0.2s;
            margin-top: 0.5rem;
            text-align: center;
        }
        .btn-visit i {
            margin-right: 5px;
        }
        .btn-visit:hover {
            background: var(--gold-dark);
            color: var(--green-deep);
        }
        .no-results {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 2rem;
            color: #6C7A68;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 3rem 0;
        }
        .page-item {
            background: white;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            border: 1px solid #E2D5BB;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
        }
        .page-item.active {
            background: var(--gold-main);
            color: var(--green-deep);
            border: none;
        }
        .page-item:hover:not(.active) {
            background: var(--gold-pale);
        }
        .footer {
            background: var(--green-deep);
            color: #DFD9C4;
            border-radius: 2rem 2rem 0 0;
            padding: 3rem 0 2rem;
            margin-top: 4rem;
        }
        .footer-inner {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 2rem;
        }
        .footer-col h4 {
            color: var(--gold-light);
            margin-bottom: 1rem;
        }
        .footer-col a {
            display: block;
            margin: 0.6rem 0;
            opacity: 0.85;
        }
        .footer-col a:hover {
            opacity: 1;
            color: var(--gold-main);
        }
        .copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(201,160,61,0.3);
            font-size: 0.8rem;
        }
        @media (max-width: 760px) {
            .shop-filters { flex-direction: column; gap: 14px; align-items: stretch; border-radius: 28px; }
            .hero-content h1 { font-size: 2rem; }
            .shop-grid { grid-template-columns: 1fr; }
            .logo img { max-height: 80px; }
        }
    </style>
</head>
<body>
<div class="hero">
    <div class="container">
        <div class="nav">
            <div class="logo">
                <img src="<?= base_url('images/DTI-CARP_Logo-removebg-preview.png') ?>" alt="CARP Logo">
                <img src="<?= base_url('images/DTI-LOGO.png') ?>" alt="DTI Logo">
            </div>
            <div class="nav-links">
                <a href="<?= base_url('/') ?>">Home</a>
                <a href="<?= base_url('shops') ?>">Shops</a>
                <a href="<?= base_url('aboutus') ?>">About Us</a>
            </div>
        </div>
        <div class="hero-content">
            <h1>DTI-CARP Connect : Aurora CARPreneurs E-Brochure Hub</h1>
            <p>Discover and support local cooperatives, farmer groups, and artisan enterprises — each shop is a story of resilience and quality.</p>
        </div>
    </div>
</div>

<div class="container">
    <!-- filter row with interactive JS -->
    <div class="shop-filters">
        <div class="filter-group" id="filterGroup">
            <div class="filter-chip active" data-filter="all"><i class="fas fa-store"></i> All Shops</div>
            <div class="filter-chip" data-filter="cooperative"><i class="fas fa-handshake"></i> Cooperatives</div>
            <div class="filter-chip" data-filter="arb"><i class="fas fa-leaf"></i> ARB Groups</div>
            <div class="filter-chip" data-filter="handicraft"><i class="fas fa-hands"></i> Handicraft</div>
            <div class="filter-chip" data-filter="agri"><i class="fas fa-tractor"></i> Agri Products</div>
        </div>
        <div class="search-shop">
            <i class="fas fa-search" style="color: #B48C2C;"></i>
            <input type="text" id="searchInput" placeholder="Search shop name or location...">
            <button class="btn-outline-gold" id="searchBtn"><i class="fas fa-search"></i> Find</button>
        </div>
    </div>

    <div class="section-header">
        <h2><i class="fas fa-store-alt" style="color: var(--gold-main);"></i> Local Enterprises Directory</h2>
        <span id="resultCount" style="font-size: 0.85rem;">Loading shops...</span>
    </div>

    <!-- Shops grid container -->
    <div id="shopsGrid" class="shop-grid">
        <!-- shops will be dynamically injected via JS -->
    </div>

    <!-- Pagination -->
    <div id="pagination" class="pagination"></div>

    <!-- Call to action for new shops -->
    <div style="background: linear-gradient(115deg, #E6F0EA, #FEF5E3); border-radius: 2rem; padding: 2rem; text-align: center; margin: 1.5rem 0 0.5rem;">
        <i class="fas fa-store-alt" style="font-size: 2rem; color: var(--gold-main);"></i>
        <h3 style="margin: 0.5rem;">Are you an ARB or cooperative in Aurora?</h3>
        <p>Join DTI–CARP Connect and get your own e-brochure showcase — reach more buyers for free.</p>
        <a href="#" class="btn-visit" style="background: var(--gold-main); color: #1E3A2F; margin-top: 0.8rem; display: inline-block;"><i class="fas fa-hand-peace"></i> Register your Shop</a>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-col">
                <h4>DTI–CARP Connect</h4>
                <a href="#">Home</a>
                <a href="#">About CARPreneurs</a>
                <a href="#">Shop Directory</a>
                <a href="#">Product Catalog</a>
                <a href="#">Log In</a>
            </div>
            <div class="footer-col">
                <h4>For Shops</h4>
                <a href="#">Join the Hub</a>
                <a href="#">Seller Guidelines</a>
                <a href="#">E-Brochure Toolkit</a>
                <a href="#">CARP Training Updates</a>
            </div>
            <div class="footer-col">
                <h4>Support Local Aurora</h4>
                <a href="#">Agri Products</a>
                <a href="#">Handicrafts & Weaves</a>
                <a href="#">Processed Food</a>
                <a href="#">Wellness & Organics</a>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <a href="#"><i class="fas fa-envelope"></i> dti.carp@aurora.gov.ph</a>
                <a href="#"><i class="fab fa-facebook"></i> @DTICARPAurora</a>
                <a href="#"><i class="fab fa-instagram"></i> @carpconnect.aurora</a>
            </div>
        </div>
        <div class="copyright">
            <i class="fas fa-leaf"></i> DTI–CARP Connect: Aurora CARPreneurs E-Brochure Hub — Bridging farmers to markets, one shop at a time.
        </div>
    </div>
</footer>

<script>
    // Shop Data (expanded list based on your original content + additional CARP shops)
    const shopsData = [
        { id: 1, name: "Marla's Honey", type: "cooperative", category: "agri", location: "Bale, Aurora", rating: 4.9, products: 18, since: "2019", avatar: "🍯", bannerIcon: "🍯", tags: ["Organic", "Raw Honey", "Forest Harvest"], description: "Pure raw honey from local ARB beekeepers." },
        { id: 2, name: "Weave & Wonder", type: "cooperative", category: "handicraft", location: "Ratti Panaram, Aurora", rating: 4.8, products: 24, since: "2020", avatar: "👜", tags: ["Eco-friendly", "Fair Trade", "Handmade"], description: "Handwoven abaca bags and home decor." },
        { id: 3, name: "Island Essentials", type: "arb", category: "agri", location: "Dipaculao, Aurora", rating: 4.7, products: 15, since: "2018", avatar: "🌴", tags: ["Vegan", "Cold-pressed", "Zero Waste"], description: "Organic coconut oil and natural skincare." },
        { id: 4, name: "Green Leaf PH", type: "cooperative", category: "agri", location: "Maria Aurora, Aurora", rating: 4.7, products: 22, since: "2017", avatar: "🌿", tags: ["Indigenous", "Wellness", "Wildcrafted"], description: "Herbal teas and medicinal plants." },
        { id: 5, name: "Lilha Studio", type: "arb", category: "handicraft", location: "Baler, Aurora", rating: 4.9, products: 24, since: "2021", avatar: "🧵", tags: ["Hand-knotted", "Cotton", "Boho"], description: "Handmade macrame and artisan gifts." },
        { id: 6, name: "Jasmine's Delicacies", type: "arb", category: "agri", location: "Biot, Aurora", rating: 4.6, products: 11, since: "2019", avatar: "🥭", tags: ["Gourmet", "Sulfate-Free", "All-natural"], description: "Organic coconut soap and dried mangoes." },
        { id: 7, name: "Kimchi & Thread", type: "arb", category: "handicraft", location: "San Luli, Aurora", rating: 4.5, products: 9, since: "2022", avatar: "🍃", tags: ["Caffeine-free", "Jute", "Gift-ready"], description: "Herbal tea blends and macrame decor." },
        { id: 8, name: "Aurora Grains Collective", type: "cooperative", category: "agri", location: "San Luis, Aurora", rating: 4.9, products: 8, since: "2016", avatar: "🌾", tags: ["Rainfed Rice", "Traditional", "No pesticides"], description: "Heirloom rice and organic grains." },
        { id: 9, name: "CocoEssence Aurora", type: "arb", category: "agri", location: "Dingalan, Aurora", rating: 4.8, products: 14, since: "2020", avatar: "🥥", tags: ["Keto-friendly", "Cold Centrifuge"], description: "Virgin coconut oil and coconut sugar." },
        { id: 10, name: "Mountaintop Herbs PH", type: "cooperative", category: "agri", location: "Maria Aurora, Aurora", rating: 4.7, products: 12, since: "2018", avatar: "🌿", tags: ["DOHerbal", "Forest Goodness"], description: "Medicinal teas, lagundi, tsaang gubat." },
        { id: 11, name: "Aurora Pottery Guild", type: "cooperative", category: "handicraft", location: "Dingalan, Aurora", rating: 4.8, products: 30, since: "2015", avatar: "🏺", tags: ["Stoneware", "Hand-thrown", "Glazed"], description: "Handmade pottery and ceramic art." },
        { id: 12, name: "Baler Basket Weavers", type: "arb", category: "handicraft", location: "Baler, Aurora", rating: 4.6, products: 19, since: "2020", avatar: "🧺", tags: ["Natural Fibers", "Sustainable", "Eco"], description: "Traditional woven baskets and organizers." },
        { id: 13, name: "Dipping Lagoon Coffee", type: "cooperative", category: "agri", location: "Dipaculao, Aurora", rating: 4.9, products: 6, since: "2021", avatar: "☕", tags: ["Arabica", "Single Origin", "Forest-grown"], description: "Premium local coffee from upland ARBs." },
        { id: 14, name: "Aurora Honey Bee Coop", type: "cooperative", category: "agri", location: "Maria Aurora, Aurora", rating: 4.8, products: 12, since: "2017", avatar: "🐝", tags: ["Raw Honey", "Propolis", "Beeswax"], description: "Pure honey and bee by-products." }
    ];

    let currentFilter = "all";
    let currentSearch = "";
    let currentPage = 1;
    const itemsPerPage = 9;

    function filterShops() {
        return shopsData.filter(shop => {
            // type filter
            if (currentFilter !== "all" && shop.type !== currentFilter && 
                !(currentFilter === "handicraft" && shop.category === "handicraft") &&
                !(currentFilter === "agri" && shop.category === "agri") &&
                !(currentFilter === "cooperative" && shop.type === "cooperative") &&
                !(currentFilter === "arb" && shop.type === "arb")) {
                // additional matching for category-based filters
                if (currentFilter === "handicraft" && shop.category !== "handicraft") return false;
                if (currentFilter === "agri" && shop.category !== "agri") return false;
                if (currentFilter === "cooperative" && shop.type !== "cooperative") return false;
                if (currentFilter === "arb" && shop.type !== "arb") return false;
                if (currentFilter !== "all" && currentFilter !== "handicraft" && currentFilter !== "agri" && currentFilter !== "cooperative" && currentFilter !== "arb") return false;
            }
            // search filter
            if (currentSearch !== "") {
                const searchLower = currentSearch.toLowerCase();
                return shop.name.toLowerCase().includes(searchLower) || shop.location.toLowerCase().includes(searchLower) || shop.tags.some(t => t.toLowerCase().includes(searchLower));
            }
            return true;
        });
    }

    function renderShops() {
        const filtered = filterShops();
        const totalItems = filtered.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const start = (currentPage - 1) * itemsPerPage;
        const paginatedShops = filtered.slice(start, start + itemsPerPage);
        
        const gridContainer = document.getElementById("shopsGrid");
        const resultSpan = document.getElementById("resultCount");
        resultSpan.innerHTML = `${totalItems} shop${totalItems !== 1 ? 's' : ''} found`;
        
        if (paginatedShops.length === 0) {
            gridContainer.innerHTML = `<div class="no-results"><i class="fas fa-store-slash" style="font-size: 3rem; color: var(--gold-dark);"></i><h3>No shops found</h3><p>Try adjusting your filters or search term.</p></div>`;
            document.getElementById("pagination").innerHTML = "";
            return;
        }
        
        gridContainer.innerHTML = paginatedShops.map(shop => `
            <div class="shop-card" onclick="viewShopDetail(${shop.id})">
                <div class="shop-banner"><div class="shop-avatar">${shop.avatar}</div></div>
                <div class="shop-details">
                    <div class="shop-name">${shop.name} <span class="badge-coop">${shop.type === 'cooperative' ? 'Cooperative' : 'ARB Group'}</span></div>
                    <div class="shop-location"><i class="fas fa-map-marker-alt"></i> ${shop.location}</div>
                    <div class="shop-category"><i class="fas fa-tag"></i> ${shop.category === 'agri' ? 'Agricultural Products' : 'Handicrafts & Artisan'}</div>
                    <div class="shop-stats">
                        <span><i class="fas fa-star" style="color: var(--gold-main);"></i> ${shop.rating}</span>
                        <span><i class="fas fa-box"></i> ${shop.products} products</span>
                        <span><i class="fas fa-calendar"></i> since ${shop.since}</span>
                    </div>
                    <div class="product-tags">
                        ${shop.tags.slice(0,3).map(tag => `<span class="tag">${tag}</span>`).join('')}
                    </div>
                    <div class="btn-visit"><i class="fas fa-store"></i> Visit Shop →</div>
                </div>
            </div>
        `).join('');
        
        // Pagination controls
        let paginationHtml = '';
        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `<div class="page-item ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</div>`;
        }
        if (totalPages > 1) {
            paginationHtml += `<div class="page-item" data-page="next"><i class="fas fa-chevron-right"></i></div>`;
        }
        document.getElementById("pagination").innerHTML = paginationHtml;
        
        // attach pagination events
        document.querySelectorAll('.page-item').forEach(el => {
            el.addEventListener('click', (e) => {
                const pageVal = el.getAttribute('data-page');
                if (pageVal === 'next') {
                    if (currentPage < totalPages) currentPage++;
                    else return;
                } else {
                    currentPage = parseInt(pageVal);
                }
                renderShops();
                window.scrollTo({ top: 400, behavior: 'smooth' });
            });
        });
    }
    
    function viewShopDetail(shopId) {
        alert(`Shop details for "${shopsData.find(s => s.id === shopId)?.name}" — full profile view coming soon.\nIn the full version, you would see complete product catalog and story.`);
        // In a full implementation, redirect to shop detail page
    }
    
    // Filter event listeners
    document.querySelectorAll('.filter-chip').forEach(chip => {
        chip.addEventListener('click', function() {
            document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            const filterValue = this.getAttribute('data-filter');
            currentFilter = filterValue;
            currentPage = 1;
            renderShops();
        });
    });
    
    document.getElementById('searchBtn').addEventListener('click', () => {
        currentSearch = document.getElementById('searchInput').value.trim();
        currentPage = 1;
        renderShops();
    });
    document.getElementById('searchInput').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            currentSearch = e.target.value.trim();
            currentPage = 1;
            renderShops();
        }
    });
    
    // Initial render
    renderShops();
</script>
</body>
</html>