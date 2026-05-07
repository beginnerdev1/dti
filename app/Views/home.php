<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Locally | Discover & Support Local Treasures</title>
    <!-- Google Fonts: Poppins (weights 400,500,600,700) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 (free icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #FAF9F6; /* Cream White page background */
            color: #0B3D2E; /* Deep Green text */
            line-height: 1.4;
        }

        /* brand palette: primary greens, gold accents, and neutrals */
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

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header / Hero */
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
           
            font-size: 220px;
            opacity: 0.05;
            position: absolute;
            bottom: -40px;
            right: -20px;
            font-family: monospace;
            pointer-events: none;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            line-height: 1;
            background: rgba(255, 255, 255, 0.95);
            padding: 0.8rem 1.2rem;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
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
            color: #FEF1CF;
            text-shadow: 0 1px 2px rgba(0,0,0,0.15);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            font-weight: 500;
        }

        .nav-links a {
            color: white;
            font-weight: 600;
            position: relative;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--gold-main);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0%;
            height: 2px;
            background: var(--gold-main);
            transition: 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hero-content {
            text-align: center;
            max-width: 680px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: white;
            letter-spacing: -1px;
            margin-bottom: 1rem;
        }

        .hero-content h1 span {
            color: var(--gold-main);
            border-bottom: 3px solid var(--gold-main);
        }

        .hero-content p {
            font-size: 1.2rem;
            color: #E5E7EB;
            margin-bottom: 2rem;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 1rem 2rem;
            border-radius: 60px;
            background: linear-gradient(135deg, #D4AF37, #B68A16);
            color: #06281C;
            font-weight: 700;
            box-shadow: 0 10px 20px rgba(212,175,55,0.25);
            transition: all 0.25s ease;
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            background: linear-gradient(135deg, #E6C252, #C99A1C);
            box-shadow: 0 20px 35px rgba(212,175,55,0.35);
        }

        /* featured sections generic */
        .section {
            margin: 4rem 0;
        }

        .section-header {
            border-left: 6px solid var(--gold-main);
            padding-left: 1.2rem;
            margin-bottom: 2rem;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--green-primary);
        }

        .section-header a {
            color: var(--gold-dark);
            font-weight: 600;
        }

        /* card grid */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 2rem;
        }

        .product-card, .shop-card {
            background: var(--white);
            border-radius: var(--border-radius-card);
            overflow: hidden;
            border: 1px solid rgba(212,175,55,0.18);
            box-shadow: var(--shadow-sm);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .product-card:hover, .shop-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-md);
            border-color: var(--gold-main);
        }

        .card-img {
            background: linear-gradient(135deg, #0B3D2E, #146B4D);
            color: var(--gold-main);
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
        }

        .card-content {
            padding: 1.3rem;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
        }

        .price {
            color: var(--gold-dark);
            font-size: 1.4rem;
            font-weight: 800;
            margin: 0.5rem 0;
        }

        .vendor,
        .location {
            color: var(--neutral-gray);
            font-size: 0.9rem;
            margin: 4px 0;
        }

        .rating {
            margin-top: 10px;
            color: var(--gold-main);
            font-weight: 700;
        }

        .badge-prodcount {
            background: var(--green-light);
            color: var(--green-primary);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            margin-left: 8px;
        }

        /* Featured Shops row similar */
        .shop-card .card-img {
            background: #EADDB8;
            font-size: 2.5rem;
        }

        /* about us + categories + products layout */
        .info-panel {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            background: var(--white);
            border-radius: 2rem;
            padding: 2rem;
            margin: 2.5rem 0;
            box-shadow: var(--shadow-sm);
            border: 1px solid #EFE6D2;
        }

        .categories, .products-preview {
            flex: 1;
        }

        .categories h3, .products-preview h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--green-deep);
            font-weight: 600;
        }

        .cat-list {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .cat-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            padding: 0.4rem 0;
            border-bottom: 1px dashed #ede3cf;
        }

        .product-preview-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
        }

        .preview-link {
            background: var(--gold-soft);
            padding: 0.5rem 1rem;
            border-radius: 40px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: 0.1s;
            text-align: center;
        }

        /* filter bar */
        .filter-bar {
            background: white;
            border-radius: 80px;
            padding: 0.8rem 1.5rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin: 1.5rem 0 2rem;
            border: 1px solid #EBE0CA;
            box-shadow: var(--shadow-sm);
        }

        .filter-group {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .filter-chip {
            background: var(--gold-soft);
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            font-weight: 500;
            font-size: 0.85rem;
            color: var(--green-deep);
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: default;
        }

        .view-all-btn {
            background: var(--green-primary);
            color: white;
            border-radius: 40px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: 0.2s;
        }

        /* All products grid */
        .all-products-title {
            font-size: 1.7rem;
            margin: 1rem 0 0.5rem;
            font-weight: 700;
        }

        .result-stats {
            color: var(--neutral-gray);
            margin-bottom: 1.2rem;
            font-size: 0.9rem;
        }

        /* footer */
        .footer {
            background: linear-gradient(135deg, #041B13, #0B3D2E);
            border-top: 3px solid var(--gold-main);
            color: white;
            margin-top: 5rem;
            padding: 4rem 0 2rem;
        }

        .footer-inner {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 2rem;
        }

        .footer-col {
            min-width: 140px;
        }

        .footer-col h4 {
            color: var(--gold-main);
            margin-bottom: 1rem;
        }

        .footer-col a {
            display: block;
            margin: 0.6rem 0;
            opacity: 0.85;
        }

        .footer-col a:hover {
            color: var(--gold-main);
            opacity: 1;
        }

        .copyright {
            text-align: center;
            margin-top: 3rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 1.5rem;
            color: #D1D5DB;
            font-size: 0.9rem;
        }

        i {
            margin-right: 4px;
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
            <p>Explore a wide variety of quality products from trusted local sellers in your community.</p>
            <a href="#" class="btn-primary"><i class="fas fa-store"></i> BROWSE PRODUCTS</a>
        </div>
    </div>
</div>

<div class="container">
    <!-- Featured Products -->
    <div class="section">
        <div class="section-header">
            <h2><i class="fas fa-star-of-life" style="color: var(--gold-main);"></i> Featured Products</h2>
            <a href="#">View all →</a>
        </div>
        <div class="card-grid">
            <!-- product 1 -->
            <div class="product-card">
                <div class="card-img">🍯</div>
                <div class="card-content">
                    <div class="product-title">Pure Raw Honey</div>
                    <div class="price">$250.00</div>
                    <div class="vendor"><i class="fas fa-store"></i> Marla's Honey</div>
                    <div class="location"><i class="fas fa-map-marker-alt"></i> Bale, Aurora</div>
                    <div class="rating"><i class="fas fa-star"></i> 4.9 <span class="badge-prodcount">18 Products</span></div>
                </div>
            </div>
            <!-- product 2: Handwoven Abaca Bag -->
            <div class="product-card">
                <div class="card-img">👜</div>
                <div class="card-content">
                    <div class="product-title">Handwoven Abaca Bag</div>
                    <div class="price">$150.00</div>
                    <div class="vendor"><i class="fas fa-store"></i> Weave & Wonder</div>
                    <div class="location"><i class="fas fa-map-marker-alt"></i> Ratti Panaram / Bale</div>
                    <div class="rating"><i class="fas fa-star"></i> 4.8 <span class="badge-prodcount">Grow Your Business</span></div>
                </div>
            </div>
            <!-- product 3: Organic Coconut Soap -->
            <div class="product-card">
                <div class="card-img">🧼🌿</div>
                <div class="card-content">
                    <div class="product-title">Organic Coconut Soap</div>
                    <div class="price">$120.00</div>
                    <div class="vendor"><i class="fas fa-store"></i> Jasmines Delicacies</div>
                    <div class="location"><i class="fas fa-map-marker-alt"></i> Biot, Aurora</div>
                    <div class="rating"><i class="fas fa-star"></i> 3.5 <span class="badge-prodcount">Dried Mango</span></div>
                </div>
            </div>
            <!-- product 4: Herbal Wellness Tea -->
            <div class="product-card">
                <div class="card-img">🍃🍵</div>
                <div class="card-content">
                    <div class="product-title">Herbal Wellness Tea</div>
                    <div class="price">$150.00</div>
                    <div class="vendor"><i class="fas fa-store"></i> Kimchi & Thread</div>
                    <div class="location"><i class="fas fa-map-marker-alt"></i> San Luli, Aurora</div>
                    <div class="rating"><i class="fas fa-star"></i> 3.5 <span class="badge-prodcount">Handmade Macrame</span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Shops -->
    <div class="section">
        <div class="section-header">
            <h2><i class="fas fa-shop"></i> Featured Shops</h2>
            <a href="#">All shops →</a>
        </div>
        <div class="card-grid">
            <div class="shop-card">
                <div class="card-img">🍯🐝</div>
                <div class="card-content">
                    <div class="product-title">Maria's Honey</div>
                    <div class="location">Bale, Aurora</div>
                    <div class="rating"><i class="fas fa-star"></i> 4.9 · 18 Products</div>
                </div>
            </div>
            <div class="shop-card">
                <div class="card-img">🧵✨</div>
                <div class="card-content">
                    <div class="product-title">Lilha Studio</div>
                    <div class="location">Bale, Aurora</div>
                    <div class="rating"><i class="fas fa-star"></i> 4.8 · 24 Products</div>
                </div>
            </div>
            <div class="shop-card">
                <div class="card-img">🌴🌊</div>
                <div class="card-content">
                    <div class="product-title">Island Essentials</div>
                    <div class="location">Bale, Aurora</div>
                    <div class="rating"><i class="fas fa-star"></i> 4.7 · 15 Products</div>
                </div>
            </div>
            <div class="shop-card">
                <div class="card-img">🌿🍃</div>
                <div class="card-content">
                    <div class="product-title">Green Leaf PH</div>
                    <div class="location">Bale, Aurora</div>
                    <div class="rating"><i class="fas fa-star"></i> 4.7 · 22 Products</div>
                </div>
            </div>
        </div>
    </div>



    <div class="all-products-title">
        <i class="fas fa-leaf" style="color: var(--green-soft);"></i> All Products
    </div>
    <div class="result-stats">
        Showing 1–12 of 100 products
    </div>
    <div class="card-grid">
        <!-- additional product rows representing local items (blend of local artisan) -->
        <div class="product-card">
            <div class="card-img">🥭</div>
            <div class="card-content"><div class="product-title">Dried Mangoes</div><div class="price">$85.00</div><div class="vendor">Auro Mango Co.</div><div class="rating">★ 4.8</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🧺</div>
            <div class="card-content"><div class="product-title">Macrame Wall Hanging</div><div class="price">$210.00</div><div class="vendor">Thread & Folk</div><div class="rating">★ 4.9</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🌿🫒</div>
            <div class="card-content"><div class="product-title">Organic Virgin Coconut Oil</div><div class="price">$95.00</div><div class="vendor">CocoEssence</div><div class="rating">★ 4.7</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🍃🍚</div>
            <div class="card-content"><div class="product-title">Heirloom Rice Blend</div><div class="price">$65.00</div><div class="vendor">Aurora Grains</div><div class="rating">★ 4.6</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🏺</div>
            <div class="card-content"><div class="product-title">Handmade Pottery Mug</div><div class="price">$48.00</div><div class="vendor">Clay & Co.</div><div class="rating">★ 4.9</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🌸</div>
            <div class="card-content"><div class="product-title">Calming Herbal Tea</div><div class="price">$120.00</div><div class="vendor">Mountain Herbs PH</div><div class="rating">★ 4.5</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🧴</div>
            <div class="card-content"><div class="product-title">Lemon Grass Soap Set</div><div class="price">$98.00</div><div class="vendor">Island Aroma</div><div class="rating">★ 4.8</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🪴</div>
            <div class="card-content"><div class="product-title">Snake Plant in Pot</div><div class="price">$55.00</div><div class="vendor">Green thumb PH</div><div class="rating">★ 4.7</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🧣</div>
            <div class="card-content"><div class="product-title">Handwoven Textile Scarf</div><div class="price">$185.00</div><div class="vendor">Weave Aurora</div><div class="rating">★ 4.8</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🍯🌿</div>
            <div class="card-content"><div class="product-title">Raw Honey & Propolis</div><div class="price">$220.00</div><div class="vendor">Marla's Honey</div><div class="rating">★ 4.9</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🧺🧵</div>
            <div class="card-content"><div class="product-title">Abaca Tote Bag</div><div class="price">$132.00</div><div class="vendor">Ratti Panaram</div><div class="rating">★ 4.7</div></div>
        </div>
        <div class="product-card">
            <div class="card-img">🍪</div>
            <div class="card-content"><div class="product-title">Local Ube Cookies</div><div class="price">$38.00</div><div class="vendor">Jasmines Delicacies</div><div class="rating">★ 4.6</div></div>
        </div>
    </div>
    <div style="text-align: center; margin: 2rem 0;">
        <a href="#" class="btn-primary" style="background: var(--green-primary); color: white;"><i class="fas fa-shopping-bag"></i> Load more products</a>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-col">
                <h4>Locally</h4>
                <a href="#">Home</a>
                <a href="#">Products</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">Log In / Sign Up</a>
            </div>
            <div class="footer-col">
                <h4>Discover</h4>
                <a href="#">All Categories</a>
                <a href="#">Food & Beverages</a>
                <a href="#">Beauty & Wellness</a>
                <a href="#">Handmade Crafts</a>
                <a href="#">Plants & Garden</a>
            </div>
            <div class="footer-col">
                <h4>Support</h4>
                <a href="#">Sell with us</a>
                <a href="#">Community Guidelines</a>
                <a href="#">FAQs</a>
                <a href="#">Privacy & Terms</a>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <a href="#"><i class="fas fa-envelope"></i> hello@locally.ph</a>
                <a href="#"><i class="fab fa-instagram"></i> @locally.ph</a>
                <a href="#"><i class="fab fa-facebook"></i> LocallyPH</a>
            </div>
        </div>
        <div class="copyright">
            <i class="fas fa-leaf"></i> Discover Local. Support Local. — © 2025 Locally | Empowering local communities with green & gold values
        </div>
    </div>
</footer>
</body>
</html>