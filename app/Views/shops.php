<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Shop Directory | Aurora CARPreneurs Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Poppins',sans-serif; background:#FAF9F6; color:#0B3D2E; line-height:1.4; }
        :root {
            --green-deep:#06281C; --green-primary:#0B3D2E; --green-soft:#146B4D; --green-light:#EAF4EE;
            --gold-main:#D4AF37; --gold-dark:#9C7412; --gold-soft:#F8E7A8; --gold-pale:#FFF7D6;
            --white:#FFFFFF; --cream-bg:#F8F7F2; --neutral-gray:#667085;
            --shadow-sm:0 10px 30px rgba(0,0,0,0.06),0 0 0 1px rgba(0,0,0,0.03);
            --shadow-md:0 25px 45px rgba(0,0,0,0.12); --border-radius-card:1.6rem;
        }
        a{text-decoration:none;color:inherit;}.container{max-width:1300px;margin:0 auto;padding:0 24px;}
        .hero{background:linear-gradient(135deg,#06281C 0%,#0B3D2E 45%,#146B4D 100%);border-bottom:4px solid var(--gold-main);border-radius:0 0 2.5rem 2.5rem;padding:2rem 0 4rem 0;margin-bottom:2rem;color:white;position:relative;overflow:hidden;}
        .hero::after{content:"🏪";font-size:220px;opacity:0.05;position:absolute;bottom:-40px;right:-20px;pointer-events:none;}
        .nav{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;margin-bottom:3rem;}
        .logo{display:inline-flex;align-items:center;gap:0.75rem;background:rgba(255,255,255,0.95);padding:0.8rem 1.2rem;border-radius:1rem;box-shadow:0 8px 24px rgba(0,0,0,0.15);}
        .logo img{max-height:110px;object-fit:contain;}
        .nav-links{display:flex;gap:2rem;font-weight:500;}
        .nav-links a{color:white;font-weight:600;position:relative;transition:0.3s;}
        .nav-links a:hover,.nav-links a.active{color:var(--gold-main);border-bottom:2px solid var(--gold-main);padding-bottom:4px;}
        .nav-links a::after{content:'';position:absolute;left:0;bottom:-6px;width:0%;height:2px;background:var(--gold-main);transition:0.3s;}
        .nav-links a:hover::after{width:100%;}
        .hero-content{text-align:center;max-width:700px;margin:0 auto;}
        .hero-content h1{font-size:3.5rem;font-weight:800;line-height:1.1;color:white;letter-spacing:-1px;margin-bottom:1rem;}
        .hero-content h1 span{color:var(--gold-main);border-bottom:2px solid var(--gold-main);}
        .hero-content p{font-size:1.2rem;color:#E5E7EB;margin-top:0.5rem;}
        .section-header{border-left:6px solid var(--gold-main);padding-left:1.2rem;margin-bottom:2rem;display:flex;justify-content:space-between;align-items:baseline;flex-wrap:wrap;}
        .section-header h2{font-size:2rem;font-weight:800;color:var(--green-primary);}
        .shop-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:2rem;}
        .shop-card{background:var(--white);border-radius:var(--border-radius-card);overflow:hidden;border:1px solid rgba(212,175,55,0.18);box-shadow:var(--shadow-sm);transition:transform 0.25s ease,box-shadow 0.25s ease;cursor:pointer;display:flex;flex-direction:column;}
        .shop-card:hover{transform:translateY(-8px);box-shadow:var(--shadow-md);border-color:var(--gold-main);}
        .shop-banner{background:linear-gradient(135deg,#0B3D2E,#146B4D);height:120px;position:relative;display:flex;align-items:flex-end;justify-content:flex-start;padding:0 1rem 0.8rem;}
        .shop-avatar{background:var(--gold-main);width:70px;height:70px;border-radius:30px;display:flex;align-items:center;justify-content:center;font-size:2.2rem;border:3px solid white;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:-30px;color:#1E3A2F;overflow:hidden;}
        .shop-avatar img{width:100%;height:100%;object-fit:cover;border-radius:30px;}
        .shop-details{padding:2rem 1.2rem 1.2rem;flex:1;}
        .shop-name{font-size:1.2rem;font-weight:700;margin-bottom:0.3rem;display:flex;align-items:center;gap:8px;flex-wrap:wrap;}
        .badge-coop{background:var(--green-light);color:var(--green-primary);padding:4px 10px;border-radius:20px;font-size:0.7rem;font-weight:500;}
        .shop-location,.shop-category{color:var(--neutral-gray);font-size:0.85rem;margin:4px 0;display:flex;align-items:center;gap:6px;}
        .product-tags{display:flex;flex-wrap:wrap;gap:8px;margin:12px 0 10px;}
        .tag{background:#F4EFE0;font-size:0.7rem;padding:4px 12px;border-radius:30px;color:var(--green-deep);}
        .btn-visit{display:inline-block;background:linear-gradient(135deg,#D4AF37,#B68A16);color:#06281C;padding:0.5rem 1.2rem;border-radius:40px;font-weight:700;font-size:0.85rem;transition:transform 0.25s;margin-top:0.5rem;text-align:center;}
        .btn-visit:hover{transform:translateY(-2px);background:linear-gradient(135deg,#E6C252,#C99A1C);}
        .btn-visit i{margin-right:5px;}
        .no-results{text-align:center;padding:3rem;background:var(--white);border-radius:2rem;color:var(--neutral-gray);box-shadow:var(--shadow-sm);}
        .pagination{display:flex;justify-content:center;gap:10px;margin:3rem 0;}
        .page-item{background:var(--white);padding:0.5rem 1rem;border-radius:30px;border:1px solid #E2D5BB;font-weight:500;cursor:pointer;transition:0.2s;color:var(--green-primary);display:inline-block;}
        .page-item.active{background:var(--gold-main);color:var(--green-deep);border:none;}
        .page-item:hover:not(.active){background:var(--gold-pale);}
        .footer{background:linear-gradient(135deg,#041B13,#0B3D2E);border-top:3px solid var(--gold-main);color:white;margin-top:5rem;padding:4rem 0 2rem;}
        .footer-inner{display:flex;flex-wrap:wrap;justify-content:space-between;gap:2rem;}
        .footer-col{min-width:140px;}
        .footer-col h4{color:var(--gold-main);margin-bottom:1rem;}
        .footer-col a{display:block;margin:0.6rem 0;opacity:0.85;color:white;}
        .footer-col a:hover{color:var(--gold-main);opacity:1;}
        .copyright{text-align:center;margin-top:3rem;border-top:1px solid rgba(255,255,255,0.08);padding-top:1.5rem;color:#D1D5DB;font-size:0.9rem;}
        @media(max-width:780px){.hero-content h1{font-size:2.4rem;}.shop-grid{grid-template-columns:1fr;}.nav{flex-direction:column;}.nav-links{justify-content:center;}.logo img{max-height:70px;}}
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
            <h1>DTI-CARP Connect : Aurora CARPreneurs E-Brochure Hub</h1>
            <p>Discover and support local cooperatives, farmer groups, and artisan enterprises — each shop is a story of resilience and quality.</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="section-header">
        <h2><i class="fas fa-store-alt" style="color: var(--gold-main);"></i> Local Enterprises Directory</h2>
        <span id="resultCount" style="font-size: 0.85rem; color: var(--neutral-gray);">Loading shops...</span>
    </div>

    <div id="shopsGrid" class="shop-grid"></div>
    <div id="pagination" class="pagination"></div>
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
let currentPage = 1, totalPages = 1, totalShops = 0;

async function fetchShops(page = 1) {
    try {
        // Use existing shops route with ?json=1 to get JSON
        const response = await fetch(`${BASE_URL}shops?json=1&page=${page}`);
        const json = await response.json();
        if (json.status !== 200) throw new Error('Failed');

        totalShops = json.total;
        totalPages = Math.ceil(totalShops / json.perPage);
        currentPage = json.page;
        renderShops(json.data);
        renderPagination();
        document.getElementById('resultCount').textContent =
            `${totalShops} shop${totalShops !== 1 ? 's' : ''} in directory`;
    } catch (err) {
        console.error(err);
        document.getElementById('shopsGrid').innerHTML = `
            <div class="no-results">
                <i class="fas fa-exclamation-triangle" style="font-size:3rem; color: var(--gold-dark);"></i>
                <h3>Error loading shops</h3>
                <p>Please try again later.</p>
            </div>`;
        document.getElementById('pagination').innerHTML = '';
    }
}

function badge(type) {
    if (type === 'cooperative') return 'Cooperative';
    if (type === 'arb') return 'ARB Group';
    return 'Individual';
}

function truncate(str, max) {
    return str && str.length > max ? str.substring(0, max) + '…' : str || '';
}

function renderShops(shops) {
    const grid = document.getElementById('shopsGrid');
    if (!shops.length) {
        grid.innerHTML = `<div class="no-results"><i class="fas fa-store-slash" style="font-size:3rem; color: var(--gold-dark);"></i><h3>No shops found</h3></div>`;
        return;
    }
    grid.innerHTML = shops.map(s => `
        <div class="shop-card" onclick="location.href='${BASE_URL}brochure?id=${s.id}'">
            <div class="shop-banner">
                <div class="shop-avatar">${s.image ? `<img src="${s.image}" alt="logo">` : '🏢'}</div>
            </div>
            <div class="shop-details">
                <div class="shop-name">${s.name} <span class="badge-coop">${badge(s.type)}</span></div>
                <div class="shop-location"><i class="fas fa-map-marker-alt"></i> ${s.location}</div>
                ${s.contact_number ? `<div class="shop-category"><i class="fas fa-phone"></i> ${s.contact_number}</div>` : ''}
                ${s.description ? `<div class="shop-category" style="margin-top:0.2rem;"><i class="fas fa-info-circle"></i> ${truncate(s.description, 80)}</div>` : ''}
                ${s.tags && s.tags.length ? `<div class="product-tags">${s.tags.slice(0,4).map(t => `<span class="tag">${t}</span>`).join('')}</div>` : ''}
               <a class="btn-visit" href="${BASE_URL}brochure?id=${s.id}" 
   onclick="event.stopPropagation()">
    <i class="fas fa-store"></i> Connect with us →
</a>
            </div>
        </div>`).join('');
}

function renderPagination() {
    const container = document.getElementById('pagination');
    if (totalPages <= 1) { container.innerHTML = ''; return; }
    let html = '';
    for (let i = 1; i <= totalPages; i++) {
        html += `<div class="page-item${i === currentPage ? ' active' : ''}" data-page="${i}">${i}</div>`;
    }
    container.innerHTML = html;
    container.querySelectorAll('.page-item').forEach(el => {
        el.addEventListener('click', function() {
            const page = parseInt(this.dataset.page);
            if (page !== currentPage) {
                fetchShops(page);
                window.scrollTo({ top: 400, behavior: 'smooth' });
            }
        });
    });
}

fetchShops(1);
</script>
</body>
</html>