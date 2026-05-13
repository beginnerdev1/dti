<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>DTI-CARP Connect | Aurora CARPreneurs - All Products at a Glance</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #FAF9F6;
            color: #0B3D2E;
            line-height: 1.4;
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
            --shadow-sm: 0 10px 30px rgba(0,0,0,0.06), 0 0 0 1px rgba(0,0,0,0.03);
            --shadow-md: 0 25px 45px rgba(0,0,0,0.12);
            --border-radius-card: 1.6rem;
        }

        a { text-decoration: none; color: inherit; }
        .container { max-width: 1300px; margin: 0 auto; padding: 0 24px; }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #06281C 0%, #0B3D2E 45%, #146B4D 100%);
            border-bottom: 4px solid var(--gold-main);
            border-radius: 0 0 2.5rem 2.5rem;
            padding: 2rem 0 4rem 0;
            margin-bottom: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .hero::after {
            content: "🌿";
            font-size: 220px;
            opacity: 0.05;
            position: absolute;
            bottom: -40px; right: -20px;
            pointer-events: none;
        }
        .nav {
            display: flex; justify-content: space-between;
            align-items: center; flex-wrap: wrap;
            gap: 1rem; margin-bottom: 3rem;
        }
        .logo {
            display: inline-flex; align-items: center; gap: 0.75rem;
            background: rgba(255,255,255,0.95);
            padding: 0.8rem 1.2rem; border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .logo img { width: auto; max-height: 110px; object-fit: contain; display: block; }
        .nav-links { display: flex; gap: 2rem; font-weight: 500; }
        .nav-links a { color: white; font-weight: 600; position: relative; transition: 0.3s; }
        .nav-links a:hover { color: var(--gold-main); }
        .nav-links a::after {
            content: ''; position: absolute;
            left: 0; bottom: -6px; width: 0%; height: 2px;
            background: var(--gold-main); transition: 0.3s;
        }
        .nav-links a:hover::after { width: 100%; }
        .hero-content { text-align: center; max-width: 680px; margin: 0 auto; }
        .hero-content h1 {
            font-size: 3.5rem; font-weight: 800;
            line-height: 1.1; color: white;
            letter-spacing: -1px; margin-bottom: 1rem;
        }
        .hero-content h1 span { color: var(--gold-main); border-bottom: 3px solid var(--gold-main); }
        .hero-content p { font-size: 1.2rem; color: #E5E7EB; margin-bottom: 2rem; }
        .btn-primary {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 1rem 2rem; border-radius: 60px;
            background: linear-gradient(135deg, #D4AF37, #B68A16);
            color: #06281C; font-weight: 700;
            box-shadow: 0 10px 20px rgba(212,175,55,0.25);
            transition: all 0.25s ease;
        }
        .btn-primary:hover {
            transform: translateY(-4px);
            background: linear-gradient(135deg, #E6C252, #C99A1C);
            box-shadow: 0 20px 35px rgba(212,175,55,0.35);
        }

        /* SECTIONS */
        .section { margin: 4rem 0; }
        .section-header {
            border-left: 6px solid var(--gold-main);
            padding-left: 1.2rem; margin-bottom: 2rem;
            display: flex; justify-content: space-between;
            align-items: baseline; flex-wrap: wrap; gap: 0.5rem;
        }
        .section-header h2 { font-size: 2rem; font-weight: 800; color: var(--green-primary); }
        .section-header a { color: var(--gold-dark); font-weight: 600; font-size: 0.95rem; }

        /* CARD GRID */
        .card-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(270px, 1fr)); gap: 2rem; }

        .product-card, .shop-card {
            background: var(--white); border-radius: var(--border-radius-card); overflow: hidden;
            border: 1px solid rgba(212,175,55,0.18); box-shadow: var(--shadow-sm);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            cursor: pointer;
        }
        .product-card:hover, .shop-card:hover {
            transform: translateY(-8px); box-shadow: var(--shadow-md); border-color: var(--gold-main);
        }
        .card-img {
            background: linear-gradient(135deg, #0B3D2E, #146B4D);
            height: 190px; display: flex; align-items: center;
            justify-content: center; font-size: 4rem; overflow: hidden;
        }
        .card-img img { width: 100%; height: 100%; object-fit: cover; }
        .card-img .emoji-fallback { font-size: 4rem; }
        .card-content { padding: 1.3rem; }
        .product-title { font-size: 1.15rem; font-weight: 700; margin-bottom: 0.4rem; }
        .price { color: var(--gold-dark); font-size: 1.3rem; font-weight: 800; margin: 0.5rem 0; }
        .vendor, .location { color: var(--neutral-gray); font-size: 0.9rem; margin: 4px 0; }
        .shop-type {
            display: inline-block; background: var(--green-light);
            color: var(--green-primary); padding: 3px 10px;
            border-radius: 20px; font-size: 0.75rem; font-weight: 500;
            margin-bottom: 6px;
        }
        .shop-desc { color: var(--neutral-gray); font-size: 0.85rem; margin: 4px 0; }
        .product-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 8px; }
        .tag {
            background: #F4EFE0; font-size: 0.7rem;
            padding: 3px 10px; border-radius: 30px; color: var(--green-deep);
        }

        /* SKELETON */
        .skeleton-card {
            background: var(--white); border-radius: var(--border-radius-card);
            overflow: hidden; border: 1px solid rgba(212,175,55,0.18);
            box-shadow: var(--shadow-sm);
        }
        .skeleton-img {
            height: 190px;
            background: linear-gradient(90deg, #e8e4db 25%, #f0ece3 50%, #e8e4db 75%);
            background-size: 200% 100%;
            animation: shimmer 1.4s infinite;
        }
        .skeleton-body { padding: 1.3rem; }
        .skeleton-line {
            height: 14px; border-radius: 6px; margin-bottom: 10px;
            background: linear-gradient(90deg, #e8e4db 25%, #f0ece3 50%, #e8e4db 75%);
            background-size: 200% 100%;
            animation: shimmer 1.4s infinite;
        }
        .skeleton-line.wide  { width: 80%; }
        .skeleton-line.med   { width: 55%; }
        .skeleton-line.short { width: 40%; }
        @keyframes shimmer {
            0%   { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* FOOTER */
        .footer {
            background: linear-gradient(135deg, #041B13, #0B3D2E);
            border-top: 3px solid var(--gold-main);
            color: white; margin-top: 5rem; padding: 4rem 0 2rem;
        }
        .footer-inner { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem; }
        .footer-col { min-width: 140px; }
        .footer-col h4 { color: var(--gold-main); margin-bottom: 1rem; }
        .footer-col a { display: block; margin: 0.6rem 0; opacity: 0.85; color: white; }
        .footer-col a:hover { color: var(--gold-main); opacity: 1; }
        .copyright {
            text-align: center; margin-top: 3rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 1.5rem; color: #D1D5DB; font-size: 0.9rem;
        }

        /* ERROR STATE */
        .fetch-error {
            grid-column: 1 / -1; text-align: center; padding: 2rem;
            color: var(--neutral-gray); font-size: 0.95rem;
        }
        .fetch-error i { color: var(--gold-dark); margin-right: 6px; }

        .all-products-wrapper {
            margin-top: 3.5rem;
            border-top: 2px dashed rgba(212,175,55,0.25);
            padding-top: 1.5rem;
        }

        @media (max-width: 780px) {
            .hero-content h1 { font-size: 2.4rem; }
            .card-grid { grid-template-columns: 1fr; }
            .nav { flex-direction: column; }
            .nav-links { justify-content: center; }
            .logo img { max-height: 70px; }
        }
    </style>
</head>
<body>

<div class="hero">
    <div class="container">
        <div class="nav">
            <div class="logo">
                <img src="<?= base_url('images/DTI-LOGO.png') ?>" alt="DTI Logo">
                <img src="<?= base_url('images/DTI-CARP_Logo-removebg-preview.png') ?>" alt="CARP Logo">
            </div>
            <div class="nav-links">
                <a href="<?= base_url('/') ?>">Home</a>
                <a href="<?= base_url('shops') ?>">ARBO</a>
                <a href="<?= base_url('aboutus') ?>">About Us</a>
            </div>
        </div>
        <div class="hero-content">
            <h1>DTI-CARP Connect : <span>Aurora CARPreneurs</span> E-Brochure Hub</h1>
            <p>Explore a wide variety of quality products from trusted local sellers in your community.</p>
            <a href="<?= base_url('shops') ?>" class="btn-primary">
                <i class="fas fa-store"></i> BROWSE Carp Brochure
            </a>
        </div>
    </div>
</div>

<div class="container">

    <!-- Featured Products -->
    <div class="section">
        <div class="section-header">
            <h2><i class="fas fa-star-of-life" style="color: var(--gold-main);"></i> Featured Products</h2>
        </div>
        <div class="card-grid" id="productsGrid">
            <?php for ($i = 0; $i < 4; $i++): ?>
            <div class="skeleton-card">
                <div class="skeleton-img"></div>
                <div class="skeleton-body">
                    <div class="skeleton-line wide"></div>
                    <div class="skeleton-line med"></div>
                    <div class="skeleton-line short"></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Shops Brochure -->
    <div class="section">
        <div class="section-header">
            <h2><i class="fas fa-shop" style="color: var(--gold-main);"></i> Shops Brochure</h2>
            <a href="<?= base_url('shops') ?>">All shops →</a>
        </div>
        <div class="card-grid" id="shopsGrid">
            <?php for ($i = 0; $i < 4; $i++): ?>
            <div class="skeleton-card">
                <div class="skeleton-img"></div>
                <div class="skeleton-body">
                    <div class="skeleton-line wide"></div>
                    <div class="skeleton-line med"></div>
                    <div class="skeleton-line short"></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- ========= ALL PRODUCTS DIRECTORY - LOOPS UNTIL ALL ARE DISPLAYED ========= -->
    <div class="all-products-wrapper" id="allProductsSection">
        <div class="section-header">
            <h2><i class="fas fa-boxes" style="color: var(--gold-main);"></i> Complete Product Directory (All Items)</h2>
            <span style="font-size: 0.85rem; color: var(--neutral-gray);"><i class="fas fa-database"></i> Every product from our partner shops</span>
        </div>
        <div class="card-grid" id="allProductsGrid">
            <!-- skeleton loaders (will be replaced by all products) -->
            <?php for ($i = 0; $i < 8; $i++): ?>
            <div class="skeleton-card">
                <div class="skeleton-img"></div>
                <div class="skeleton-body">
                    <div class="skeleton-line wide"></div>
                    <div class="skeleton-line med"></div>
                    <div class="skeleton-line short"></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- ========= END ALL PRODUCTS ========= -->

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
                <a href="<?= base_url('admin/login') ?>">Log In</a>
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
const BASE_URL = '<?= base_url() ?>';

// Helper functions
function badgeLabel(type) {
    if (type === 'cooperative') return 'Cooperative';
    if (type === 'arb')         return 'ARB Group';
    return 'Individual';
}

function formatPrice(price) {
    const num = parseFloat(price);
    if (isNaN(num)) return '₱ 0.00';
    return '₱ ' + num.toLocaleString('en-PH', { minimumFractionDigits: 2 });
}

function cardImg(image, fallback) {
    if (image && image.trim() !== '') {
        return `<img src="${image}" alt="${fallback}"
                     onerror="this.outerHTML='<span class=\\'emoji-fallback\\'>${fallback}</span>'">`;
    }
    return `<span class="emoji-fallback">${fallback}</span>`;
}

function errorHTML(message) {
    return `<div class="fetch-error">
                <i class="fas fa-exclamation-triangle"></i> ${message}
            </div>`;
}

function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/[&<>]/g, function(m) {
        if (m === '&') return '&amp;';
        if (m === '<') return '&lt;';
        if (m === '>') return '&gt;';
        return m;
    });
}

// -------- 1. Featured Products (shows up to 12 products) ----------
async function loadProducts() {
    const grid = document.getElementById('productsGrid');
    try {
        const res  = await fetch(`${BASE_URL}?json=products`);
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const json = await res.json();
        if (json.status !== 200 || !json.products.length) {
            grid.innerHTML = errorHTML('No products available yet.');
            return;
        }
        const featured = json.products.slice(0, 12);
        grid.innerHTML = featured.map(p => `
            <div class="product-card"
                 onclick="location.href='${BASE_URL}brochure?id=${p.carp_shop_id}'">
                <div class="card-img">
                    ${cardImg(p.image, '📦')}
                </div>
                <div class="card-content">
                    <div class="product-title">${escapeHtml(p.name)}</div>
                    <div class="price">${formatPrice(p.price)}</div>
                    ${p.category ? `<div class="vendor"><i class="fas fa-tag"></i> ${escapeHtml(p.category)}</div>` : ''}
                    ${p.description
                        ? `<div class="vendor" style="margin-top:4px;font-size:0.82rem;color:var(--neutral-gray);">
                               ${escapeHtml(p.description.length > 60 ? p.description.substring(0, 60) + '…' : p.description)}
                           </div>`
                        : ''}
                </div>
            </div>`).join('');
    } catch (err) {
        console.error('loadProducts error:', err);
        grid.innerHTML = errorHTML('Could not load products. Please try again.');
    }
}

// -------- 2. Load Shops ----------
async function loadShops() {
    const grid = document.getElementById('shopsGrid');
    try {
        const res  = await fetch(`${BASE_URL}?json=shops`);
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const json = await res.json();
        if (json.status !== 200 || !json.shops.length) {
            grid.innerHTML = errorHTML('No shops available yet.');
            return;
        }
        grid.innerHTML = json.shops.map(s => `
            <div class="shop-card"
                 onclick="location.href='${BASE_URL}brochure?id=${s.id}'">
                <div class="card-img">
                    ${cardImg(s.image, '🏢')}
                </div>
                <div class="card-content">
                    <div class="shop-type">${badgeLabel(s.type)}</div>
                    <div class="product-title">${escapeHtml(s.name)}</div>
                    <div class="location"><i class="fas fa-map-marker-alt"></i> ${escapeHtml(s.location)}</div>
                    ${s.contact_number
                        ? `<div class="vendor"><i class="fas fa-phone"></i> ${escapeHtml(s.contact_number)}</div>`
                        : ''}
                    ${s.description
                        ? `<div class="shop-desc">
                               ${escapeHtml(s.description.length > 70 ? s.description.substring(0, 70) + '…' : s.description)}
                           </div>`
                        : ''}
                    ${s.tags && s.tags.length
                        ? `<div class="product-tags">
                               ${s.tags.slice(0, 3).map(t => `<span class="tag">${escapeHtml(t)}</span>`).join('')}
                           </div>`
                        : ''}
                </div>
            </div>`).join('');
    } catch (err) {
        console.error('loadShops error:', err);
        grid.innerHTML = errorHTML('Could not load shops. Please try again.');
    }
}

// -------- 3. ALL PRODUCTS - complete list (no slicing, no load more) ----------
async function loadAllProducts() {
    const grid = document.getElementById('allProductsGrid');
    if (!grid) return;
    try {
         const res = await fetch(`${BASE_URL}?json=all_products`);
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const json = await res.json();
        if (json.status !== 200 || !json.products.length) {
            grid.innerHTML = errorHTML('No product catalog available at the moment.');
            return;
        }
        // Show EVERY product - loop through the entire array
        const allProducts = json.products;
        if (allProducts.length === 0) {
            grid.innerHTML = errorHTML('No products found in the catalog.');
            return;
        }
        grid.innerHTML = allProducts.map(p => `
            <div class="product-card"
                 onclick="location.href='${BASE_URL}brochure?id=${p.carp_shop_id}'">
                <div class="card-img">
                    ${cardImg(p.image, '📦')}
                </div>
                <div class="card-content">
                    <div class="product-title">${escapeHtml(p.name)}</div>
                    <div class="price">${formatPrice(p.price)}</div>
                    ${p.category ? `<div class="vendor"><i class="fas fa-tag"></i> ${escapeHtml(p.category)}</div>` : ''}
                    ${p.description
                        ? `<div class="vendor" style="margin-top:4px;font-size:0.82rem;color:var(--neutral-gray);">
                               ${escapeHtml(p.description.length > 75 ? p.description.substring(0, 75) + '…' : p.description)}
                           </div>`
                        : ''}
                </div>
            </div>`).join('');
    } catch (err) {
        console.error('loadAllProducts error:', err);
        grid.innerHTML = errorHTML('Unable to load complete product directory. Please refresh.');
    }
}

// Initialize all three sections
loadProducts();
loadShops();
loadAllProducts();
</script>

</body>
</html>