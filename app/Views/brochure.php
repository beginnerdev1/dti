<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Shop Brochure | DTI-CARP Connect</title>
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
            --cream-bg: #FAF9F6;
            --neutral-gray: #667085;
            --shadow-sm: 0 10px 30px rgba(0,0,0,0.06), 0 0 0 1px rgba(0,0,0,0.03);
            --shadow-md: 0 25px 45px rgba(0,0,0,0.12);
            --border-radius-card: 1.6rem;
        }

        a { text-decoration: none; color: inherit; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #06281C 0%, #0B3D2E 45%, #146B4D 100%);
            border-bottom: 4px solid var(--gold-main);
            border-radius: 0 0 2.5rem 2.5rem;
            padding: 2rem 0 3rem 0;
            margin-bottom: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .hero::after {
            content: "🏪";
            font-size: 200px;
            opacity: 0.05;
            position: absolute;
            bottom: -30px; right: -20px;
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
        .logo img { width: auto; max-height: 90px; object-fit: contain; }
        .nav-links { display: flex; gap: 2rem; font-weight: 500; }
        .nav-links a { color: white; font-weight: 600; position: relative; transition: 0.3s; }
        .nav-links a:hover { color: var(--gold-main); }
        .nav-links a::after {
            content: ''; position: absolute;
            left: 0; bottom: -6px; width: 0%; height: 2px;
            background: var(--gold-main); transition: 0.3s;
        }
        .nav-links a:hover::after { width: 100%; }

        /* HERO CONTENT */
        .hero-content { text-align: center; max-width: 640px; margin: 0 auto; min-height: 260px; }
        .shop-avatar {
            width: 200px; height: 200px; border-radius: 30px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            background: var(--gold-main); color: #06281C; font-size: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25); overflow: hidden;
        }
        .shop-avatar img { width: 100%; height: 100%; object-fit: cover; border-radius: inherit; }
        .hero-content h1 { font-size: 2.8rem; font-weight: 800; color: white; margin-bottom: 0.5rem; }
        .badge {
            display: inline-block; background: var(--green-light);
            color: var(--green-primary); padding: 4px 16px; border-radius: 30px;
            font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem;
        }
        .hero-content p { color: #E5E7EB; font-size: 1.05rem; margin-bottom: 1.2rem; }
        .hero-meta {
            display: flex; justify-content: center; gap: 1.5rem;
            font-size: 0.9rem; color: #E5E7EB; flex-wrap: wrap; margin-bottom: 1rem;
        }
        .hero-meta i { color: var(--gold-main); margin-right: 4px; }
        .hero-tags { display: flex; gap: 8px; justify-content: center; flex-wrap: wrap; margin: 0.8rem 0 1.2rem; }
        .hero-tag {
            background: rgba(255,255,255,0.15); padding: 4px 14px;
            border-radius: 30px; font-size: 0.78rem; color: white;
        }
        .btn-back {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 0.6rem 1.5rem; border-radius: 40px;
            background: rgba(255,255,255,0.15); color: white;
            font-weight: 500; transition: 0.2s; margin-top: 0.5rem;
        }
        .btn-back:hover { background: rgba(255,255,255,0.25); color: var(--gold-main); }

        /* LOADING SKELETON */
        .skeleton {
            background: linear-gradient(90deg,
                rgba(255,255,255,0.08) 25%,
                rgba(255,255,255,0.18) 50%,
                rgba(255,255,255,0.08) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.4s infinite;
            border-radius: 8px;
        }
        @keyframes shimmer {
            0%   { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        .skeleton-avatar { width: 100px; height: 100px; border-radius: 30px; margin: 0 auto 1rem; }
        .skeleton-title  { width: 260px; height: 40px; margin: 0 auto 0.6rem; }
        .skeleton-badge  { width: 100px; height: 24px; margin: 0 auto 1rem; border-radius: 30px; }
        .skeleton-text   { width: 80%;  height: 14px; margin: 0 auto 0.5rem; }
        .skeleton-text.short { width: 50%; }

        /* SECTION HEADER */
        .section-header { border-left: 6px solid var(--gold-main); padding-left: 1.2rem; margin: 2rem 0 1.5rem; }
        .section-header h2 { font-size: 2rem; font-weight: 800; color: var(--green-primary); }

        /* PRODUCT GRID */
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 2rem; }
        .product-card {
            background: var(--white); border-radius: var(--border-radius-card); overflow: hidden;
            border: 1px solid rgba(212,175,55,0.18); box-shadow: var(--shadow-sm);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            display: flex; flex-direction: column;
        }
        .product-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); border-color: var(--gold-main); }
        .card-img {
            height: 180px; width: 100%;
            background: linear-gradient(135deg, #0B3D2E, #146B4D);
            display: flex; align-items: center; justify-content: center; overflow: hidden;
        }
        .card-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .card-img .fallback-icon { font-size: 3.5rem; color: var(--gold-main); }
        .card-content { padding: 1.2rem; flex: 1; display: flex; flex-direction: column; }
        .product-title { font-size: 1.1rem; font-weight: 700; margin-bottom: 0.3rem; }
        .price { color: var(--gold-dark); font-size: 1.3rem; font-weight: 800; margin: 0.5rem 0; }
        .product-meta {
            color: var(--neutral-gray); font-size: 0.85rem;
            margin: 4px 0; display: flex; align-items: center; gap: 6px;
        }
        .btn-inquiry {
            display: inline-block; margin-top: 0.8rem;
            background: linear-gradient(135deg, #D4AF37, #B68A16);
            color: #06281C; padding: 0.5rem 1.2rem; border-radius: 40px;
            font-weight: 700; font-size: 0.85rem;
            transition: transform 0.25s; cursor: pointer;
            text-align: center; align-self: flex-start;
        }
        .btn-inquiry:hover { transform: translateY(-2px); background: linear-gradient(135deg, #E6C252, #C99A1C); }

        /* STATE BOXES (empty / error) */
        .state-box {
            grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;
            background: var(--white); border-radius: var(--border-radius-card);
            box-shadow: var(--shadow-sm); color: var(--neutral-gray);
        }
        .state-box i { font-size: 3rem; color: var(--gold-main); display: block; margin-bottom: 1rem; }

        /* ── REDESIGNED MODAL (aesthetic & full image) ── */
        .modal-overlay {
            display: none; position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.6); backdrop-filter: blur(8px);
            z-index: 1000; align-items: center; justify-content: center;
        }
        .modal-overlay.active { display: flex; }

        .modal-content {
            background: var(--white);
            border-radius: 2rem;
            max-width: 500px;
            width: 95%;
            box-shadow: 0 30px 50px rgba(0,0,0,0.2), 0 0 0 1px rgba(0,0,0,0.05);
            overflow: hidden;
            position: relative;
            animation: modalFade 0.35s cubic-bezier(0.15, 0.85, 0.35, 1);
        }
        @keyframes modalFade {
            from { opacity: 0; transform: translateY(40px) scale(0.96); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* Top close button */
        .modal-close {
            position: absolute;
            top: 1rem; right: 1rem;
            background: white;
            width: 38px; height: 38px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            font-size: 1.1rem;
            color: var(--green-deep);
            z-index: 2;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.2s, color 0.2s;
            border: none;
        }
        .modal-close:hover {
            transform: scale(1.08);
            color: var(--gold-dark);
        }

        /* Image container – shows the WHOLE picture */
        .modal-img {
            background: #F0F2F0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1.5rem 0.5rem 1.5rem;
            max-height: 360px;
            overflow: hidden;
        }
        .modal-img img {
            max-width: 100%;
            max-height: 320px;
            object-fit: contain;       /* ensures full image is always visible */
            display: block;
            border-radius: 1rem;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        }
        .modal-img .fallback-icon {
            font-size: 5rem;
            color: var(--gold-main);
            opacity: 0.7;
        }

        .modal-body {
            padding: 1.5rem 2rem 0.5rem;
        }
        .modal-body h3 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--green-deep);
            margin-bottom: 0.4rem;
            letter-spacing: -0.3px;
        }
        .modal-price {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--gold-dark);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .modal-price::before {
            content: "Price";
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--neutral-gray);
            letter-spacing: 0.4px;
        }
        .modal-desc {
            color: var(--neutral-gray);
            margin-bottom: 1rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        .modal-category {
            color: var(--green-soft);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        .modal-contact {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--green-soft);
            font-size: 0.95rem;
            margin-top: 0.5rem;
        }
        .modal-contact i {
            color: var(--gold-main);
        }

        .modal-footer {
            border-top: 1px solid #F0EAD6;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: flex-end;
        }
        .btn-close-modal {
            background: transparent;
            border: 1.5px solid var(--neutral-gray);
            color: var(--neutral-gray);
            padding: 0.5rem 1.8rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-close-modal:hover {
            background: var(--neutral-gray);
            color: white;
            border-color: var(--neutral-gray);
        }

        /* Mobile friendly */
        @media (max-width: 500px) {
            .modal-content { margin: 0 10px; }
            .modal-img { max-height: 280px; padding: 1rem 1rem 0.2rem; }
            .modal-img img { max-height: 240px; }
            .modal-body { padding: 1.2rem 1.5rem 0.3rem; }
        }

        /* FOOTER */
        .footer {
            background: linear-gradient(135deg, #041B13, #0B3D2E);
            border-top: 3px solid var(--gold-main);
            color: white; margin-top: 5rem; padding: 4rem 0 2rem;
        }
        .footer-inner { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem; }
        .footer-col h4 { color: var(--gold-main); margin-bottom: 1rem; }
        .footer-col a { display: block; margin: 0.6rem 0; opacity: 0.85; color: white; }
        .footer-col a:hover { color: var(--gold-main); opacity: 1; }
        .copyright {
            text-align: center; margin-top: 3rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 1.5rem; color: #D1D5DB; font-size: 0.9rem;
        }

        @media (max-width: 760px) {
            .hero-content h1 { font-size: 2.2rem; }
            .hero-meta { flex-direction: column; gap: 0.5rem; }
            .nav { flex-direction: column; }
            .nav-links { justify-content: center; }
            .logo img { max-height: 60px; }
        }
    </style>
</head>
<body>

<!-- HERO -->
<div class="hero">
    <div class="container">
        <div class="nav">
            <div class="logo">
                 <img src="<?= base_url('images/DTI-LOGO.png') ?>" alt="DTI Logo" onerror="this.style.display='none'">
                <img src="<?= base_url('images/DTI-CARP_Logo-removebg-preview.png') ?>" alt="CARP Logo" onerror="this.style.display='none'">

            </div>
            <div class="nav-links">
                <a href="<?= base_url('/') ?>">Home</a>
                <a href="<?= base_url('shops') ?>">ARBO</a>
                <a href="<?= base_url('aboutus') ?>">About Us</a>
            </div>
        </div>

        <!-- Skeleton shown while fetching -->
        <div class="hero-content" id="shopHero">
            <div class="skeleton skeleton-avatar"></div>
            <div class="skeleton skeleton-title"></div>
            <div class="skeleton skeleton-badge"></div>
            <div class="skeleton skeleton-text"></div>
            <div class="skeleton skeleton-text short"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="section-header">
        <h2><i class="fas fa-boxes" style="color: var(--gold-main);"></i> Our Products</h2>
    </div>
    <div id="productsGrid" class="product-grid"></div>
</div>

<!-- REDESIGNED PRODUCT MODAL (full picture, cleaner layout) -->
<div class="modal-overlay" id="productModal">
    <div class="modal-content">
        <button class="modal-close" id="closeProductModal"><i class="fas fa-times"></i></button>
        <div class="modal-img" id="modalProductImage"></div>
        <div class="modal-body">
            <h3 id="modalProductName"></h3>
            <div class="modal-price" id="modalProductPrice"></div>
            <p class="modal-desc" id="modalProductDesc"></p>
            <div class="modal-category">
                <i class="fas fa-tag"></i>
                <span id="modalProductCategory"></span>
            </div>
            <!-- Shop contact number inside modal -->
            <div class="modal-contact" id="modalShopContact" style="display:none;">
                <i class="fas fa-phone-alt"></i>Contact us: <span></span>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-close-modal" id="btnCloseModalFooter">
                <i class="fas fa-times"></i> Close
            </button>
        </div>
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

// Read ?id= from the URL
const params = new URLSearchParams(window.location.search);
const shopId = params.get('id');

// No ID → go back to directory
if (!shopId) {
    window.location.href = BASE_URL + 'shops';
}

// ── Helpers ───────────────────────────────────────────────────────────────────

function badgeLabel(type) {
    if (type === 'cooperative') return 'Cooperative';
    if (type === 'arb')         return 'ARB Group';
    return 'Individual';
}

function formatPrice(price) {
    return '₱ ' + parseFloat(price).toLocaleString('en-PH', { minimumFractionDigits: 2 });
}

function imgOrFallback(image, name, fallback) {
    if (image && image.trim() !== '') {
        return `<img src="${image}" alt="${name}"
                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <span class="fallback-icon" style="display:none;">${fallback}</span>`;
    }
    return `<span class="fallback-icon">${fallback}</span>`;
}

// ── Render shop hero ──────────────────────────────────────────────────────────

function renderShop(shop) {
    // Save shop data globally so we can access its contact number later
    window.currentShop = shop;

    document.title = shop.name + ' | Shop Brochure';

    const avatarHTML = shop.image
        ? `<img src="${shop.image}" alt="${shop.name}" onerror="this.outerHTML='🏢'">`
        : '🏢';

    const tagsHTML = (shop.tags && shop.tags.length)
        ? `<div class="hero-tags">
               ${shop.tags.map(t => `<span class="hero-tag">${t}</span>`).join('')}
           </div>`
        : '';

    const contactHTML = shop.contact_number
        ? `<span><i class="fas fa-phone"></i> ${shop.contact_number}</span>`
        : '';

    document.getElementById('shopHero').innerHTML = `
        <div class="shop-avatar">${avatarHTML}</div>
        <h1>${shop.name}</h1>
        <div class="badge">${badgeLabel(shop.type)}</div>
        <p>${shop.description || 'No description available.'}</p>
        <div class="hero-meta">
            <span><i class="fas fa-map-marker-alt"></i> ${shop.location}</span>
            ${contactHTML}
        </div>
        ${tagsHTML}
        <a href="${BASE_URL}shops" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back to All Brochures
        </a>
    `;
}

// ── Render products ───────────────────────────────────────────────────────────

function renderProducts(products) {
    const grid = document.getElementById('productsGrid');

    if (!products || !products.length) {
        grid.innerHTML = `
            <div class="state-box">
                <i class="fas fa-box-open"></i>
                <h3>No products listed yet</h3>
                <p>Check back soon — this shop is preparing their catalog.</p>
            </div>`;
        return;
    }

    grid.innerHTML = products.map(p => `
        <div class="product-card">
            <div class="card-img">
                ${imgOrFallback(p.image, p.name, '📦')}
            </div>
            <div class="card-content">
                <div class="product-title">${p.name}</div>
                <div class="price">${formatPrice(p.price)}</div>
                ${p.category    ? `<div class="product-meta"><i class="fas fa-tag"></i> ${p.category}</div>` : ''}
                ${p.description ? `<div class="product-meta"><i class="fas fa-info-circle"></i> ${p.description}</div>` : ''}
                <div class="btn-inquiry" data-product-id="${p.id}">
                    <i class="fas fa-envelope"></i> Inquire
                </div>
            </div>
        </div>`).join('');

    // Attach modal triggers after cards are in the DOM
    document.querySelectorAll('.btn-inquiry').forEach(btn => {
        btn.addEventListener('click', e => {
            e.stopPropagation();
            const product = products.find(p => p.id == btn.dataset.productId);
            if (product) openProductModal(product);
        });
    });
}

// ── Fetch from API ────────────────────────────────────────────────────────────

async function loadBrochure() {
    try {
        const response = await fetch(`${BASE_URL}brochure?id=${shopId}&json=1`);

        if (!response.ok) throw new Error(`HTTP error ${response.status}`);

        const json = await response.json();

        if (json.status !== 200) throw new Error(json.message || 'Shop not found');

        renderShop(json.shop);
        renderProducts(json.products);

    } catch (err) {
        console.error('loadBrochure error:', err);

        document.getElementById('shopHero').innerHTML = `
            <h1 style="color:white; margin-bottom:1rem;">Shop not found</h1>
            <p>This shop may no longer be available.</p>
            <a href="${BASE_URL}shops" class="btn-back" style="margin-top:1rem;">
                <i class="fas fa-arrow-left"></i> Back to All Shops
            </a>`;

        document.getElementById('productsGrid').innerHTML = `
            <div class="state-box">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>Could not load products</h3>
                <p>Please try again later.</p>
            </div>`;
    }
}

// ── Modal logic ───────────────────────────────────────────────────────────────

const modal           = document.getElementById('productModal');
const closeTopBtn     = document.getElementById('closeProductModal');
const closeFooterBtn  = document.getElementById('btnCloseModalFooter');

function closeModal() {
    modal.classList.remove('active');
}

closeTopBtn.addEventListener('click', closeModal);
closeFooterBtn.addEventListener('click', closeModal);
modal.addEventListener('click', e => {
    if (e.target === modal) closeModal();
});

function openProductModal(product) {
    document.getElementById('modalProductImage').innerHTML =
        imgOrFallback(product.image, product.name, '📦');
    document.getElementById('modalProductName').textContent     = product.name;
    document.getElementById('modalProductPrice').textContent    = formatPrice(product.price);
    document.getElementById('modalProductDesc').textContent     = product.description || 'No description available.';
    document.getElementById('modalProductCategory').textContent = product.category || '—';

    // Show/hide shop contact number inside modal
    const contactDiv = document.getElementById('modalShopContact');
    const contactSpan = contactDiv.querySelector('span');
    if (window.currentShop && window.currentShop.contact_number) {
        contactSpan.textContent = window.currentShop.contact_number;
        contactDiv.style.display = 'flex';
    } else {
        contactDiv.style.display = 'none';
    }

    modal.classList.add('active');
}

// ── Start ─────────────────────────────────────────────────────────────────────
loadBrochure();
</script>

</body>
</html>