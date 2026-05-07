<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>DTI–CARP Connect | Aurora CARPreneurs Hub</title>
    <!-- Google Fonts: Poppins (same as main design) -->
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

        /* HERO SECTION (same as main, different headline) */
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
            content: "🌾";
            font-size: 200px;
            opacity: 0.06;
            position: absolute;
            bottom: -30px;
            right: -10px;
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
            object-fit: contain;
            display: block;
            max-width: 100%;
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
            max-width: 800px;
            margin: 0 auto;
        }
        .hero-content h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--green-deep);
        }
        .hero-content h1 span {
            color: var(--gold-dark);
            border-bottom: 2px dashed var(--gold-main);
        }
        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.95;
            color: #315b45;
        }

        /* about specific sections */
        .about-section {
            background: white;
            border-radius: 2rem;
            padding: 2.5rem;
            margin: 2rem 0;
            box-shadow: var(--shadow-sm);
            border: 1px solid #F2E7CE;
        }

        .mission-vision {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            margin: 2rem 0;
        }
        .card-mv {
            flex: 1;
            background: var(--green-light);
            border-radius: 1.8rem;
            padding: 2rem;
            transition: all 0.2s;
            border-left: 6px solid var(--gold-main);
        }
        .card-mv h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--green-deep);
        }
        .purpose-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.8rem;
            margin: 2rem 0;
        }
        .purpose-item {
            background: #FEFAF0;
            padding: 1.8rem;
            border-radius: 1.5rem;
            text-align: center;
            transition: 0.2s;
            border: 1px solid #EDE3CE;
        }
        .purpose-item i {
            font-size: 2.5rem;
            color: var(--gold-main);
            margin-bottom: 1rem;
        }
        .purpose-item h4 {
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
            color: var(--green-primary);
        }
        .story-quote {
            background: linear-gradient(120deg, #F9EFCF 0%, #FFF6E5 100%);
            padding: 2rem;
            border-radius: 2rem;
            margin: 2rem 0;
            text-align: center;
            font-style: italic;
            font-size: 1.2rem;
            border: 1px solid var(--gold-light);
        }
        .impact-stats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 1.5rem;
            margin: 2rem 0;
        }
        .stat {
            flex: 1;
            text-align: center;
            background: white;
            border-radius: 2rem;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--gold-dark);
        }
        .btn-connect {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            background: var(--gold-main);
            color: var(--green-deep);
            font-weight: 700;
            padding: 0.9rem 2rem;
            border-radius: 60px;
            transition: 0.2s;
            margin-top: 1rem;
        }
        .btn-connect:hover {
            background: #D9B650;
            transform: translateY(-3px);
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
        @media (max-width: 780px) {
            .hero-content h1 { font-size: 2rem; }
            .mission-vision { flex-direction: column; }
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
            <p>Connecting local farmers, ARBs, and cooperatives to wider markets — proudly Aurora.</p>
        </div>
    </div>
</div>

<div class="container">
    <!-- welcome & intro from brief -->
    <div class="about-section">
        <h2 style="font-size: 2rem; color: var(--green-deep); border-left: 6px solid var(--gold-main); padding-left: 1rem; margin-bottom: 1.5rem;">Welcome to DTI–CARP Connect</h2>
        <p style="font-size: 1.1rem; margin-bottom: 1rem;">Your gateway to discovering the vibrant products and inspiring stories of Aurora’s CARPreneurs — our local Agrarian Reform Beneficiaries (ARBs), cooperatives, and farmer organizations. This digital hub is designed to bridge farmers to markets, giving our local producers a stronger voice and wider reach.</p>
        <p>From handcrafted goods to proudly grown agricultural products, each feature represents the hard work, resilience, and innovation of Aurora’s farming communities.</p>
    </div>

    <!-- Our Purpose Section with 4 pillars (from brief) -->
    <div class="about-section">
        <h2 style="font-size: 1.9rem; color: var(--green-primary); margin-bottom: 0.5rem;"><i class="fas fa-bullseye" style="color: var(--gold-main);"></i> Our Purpose</h2>
        <p style="margin-bottom: 1rem;">DTI–CARP Connect exists to:</p>
        <div class="purpose-grid">
            <div class="purpose-item">
                <i class="fas fa-hand-holding-heart"></i>
                <h4>Empower local farmers & ARBs</h4>
                <p>Showcasing products from Agrarian Reform Beneficiaries, elevating their visibility and economic dignity.</p>
            </div>
            <div class="purpose-item">
                <i class="fas fa-chart-line"></i>
                <h4>Strengthen digital promotion</h4>
                <p>Leveraging e-brochure tools and online presence for rural enterprises in Aurora province.</p>
            </div>
            <div class="purpose-item">
                <i class="fas fa-handshake"></i>
                <h4>Connect buyers, partners & advocates</h4>
                <p>Building direct links between community enterprises and conscious consumers.</p>
            </div>
            <div class="purpose-item">
                <i class="fas fa-seedling"></i>
                <h4>Promote inclusive growth</h4>
                <p>Sustainable livelihood and equitable opportunities across Aurora’s farming communities.</p>
            </div>
        </div>
    </div>

    <!-- Mission & Vision aligned to CARP spirit -->
    <div class="mission-vision">
        <div class="card-mv">
            <h3><i class="fas fa-flag-checkered" style="color: var(--gold-main);"></i> Our Mission</h3>
            <p>To accelerate rural development by digitally empowering Aurora’s agrarian reform beneficiaries and small farmers — providing them with market access, product visibility, and a thriving e-commerce ecosystem rooted in fairness and sustainability.</p>
        </div>
        <div class="card-mv">
            <h3><i class="fas fa-eye"></i> Our Vision</h3>
            <p>A progressive Aurora where every CARPreneur, cooperative, and farming family is recognized as a vital pillar of local economy — with their stories and products celebrated across the Philippines and beyond.</p>
        </div>
    </div>

    <!-- Why it matters? deep storytelling -->
    <div class="about-section">
        <h2 style="font-size: 1.9rem;"><i class="fas fa-heart" style="color: var(--gold-main);"></i> Why It Matters?</h2>
        <div class="story-quote">
            <i class="fas fa-quote-left" style="color: var(--gold-dark); margin-right: 8px;"></i> Behind every product is a story — of dedication, community, and hope. By supporting Aurora CARPreneurs, you are not just buying a product — you are uplifting lives, strengthening rural enterprises, and contributing to a more inclusive economy.
        </div>
        <div class="impact-stats">
            <div class="stat"><div class="stat-number">150+</div><div>ARB Households</div><small>empowered across Aurora</small></div>
            <div class="stat"><div class="stat-number">28</div><div>Coops & Farmers' Orgs</div><small>actively listed</small></div>
            <div class="stat"><div class="stat-number">12</div><div>Municipalities</div><small>reaching from Baler to Dingalan</small></div>
            <div class="stat"><div class="stat-number">100%</div><div>Locally Grown & Crafted</div><small>pride of Aurora</small></div>
        </div>
    </div>

    <!-- CTA to Discover + Connect (support local mantra) -->
    <div style="background: linear-gradient(120deg, #E6F0EA 0%, #FEF5E3 100%); border-radius: 2rem; padding: 2.5rem; text-align: center; margin: 2rem 0;">
        <i class="fas fa-store" style="font-size: 3rem; color: var(--gold-main);"></i>
        <h2 style="margin: 0.5rem 0; font-size: 2rem;">✨ Discover. Connect. Support Local.</h2>
        <p style="max-width: 600px; margin: 1rem auto;">Together, let’s grow Aurora — one product, one farmer, one community at a time.</p>
        <a href="#" class="btn-connect"><i class="fas fa-leaf"></i> Explore CARPreneur Products</a>
        <div style="margin-top: 1.5rem;"><a href="#" style="color: var(--green-primary); font-weight: 500;"><i class="fas fa-hand-sparkles"></i> Partner with us →</a></div>
    </div>

    <!-- Additional quote / DTI-CARP endorsement -->
    <div class="about-section" style="background: white; text-align: left;">
        <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
            <div><i class="fas fa-landmark" style="font-size: 2.5rem; color: var(--gold-main);"></i></div>
            <div><strong style="font-size: 1.2rem;">DTI–CARP Convergence Program</strong><br>An initiative that bridges the Department of Trade and Industry and the Comprehensive Agrarian Reform Program, focusing on enterprise development for ARB organizations. Aurora stands as a model of cooperative-driven growth.</div>
        </div>
        <hr style="margin: 1.5rem 0; border-color: #F2E2CA;">
        <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: space-between; align-items: center;">
            <div><i class="fas fa-tractor"></i> Farmer-first approach</div>
            <div><i class="fas fa-chalkboard-user"></i> Technical & digital literacy</div>
            <div><i class="fas fa-hand-holding-usd"></i> Fair trade & ethical sourcing</div>
        </div>
    </div>
</div>

<!-- Footer (matches previous design with green/gold & consistent info) -->
<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-col">
                <h4>DTI–CARP Connect</h4>
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Products Directory</a>
                <a href="#">Partner with us</a>
                <a href="#">Log In / Sign Up</a>
            </div>
            <div class="footer-col">
                <h4>Discover Aurora</h4>
                <a href="#">All Categories</a>
                <a href="#">Agri Products</a>
                <a href="#">Handicrafts</a>
                <a href="#">Processed Foods</a>
                <a href="#">Wellness & Herbal</a>
            </div>
            <div class="footer-col">
                <h4>Resources</h4>
                <a href="#">CARP Program Guide</a>
                <a href="#">Farmers' Success Stories</a>
                <a href="#">E-Brochure Download</a>
                <a href="#">DTI Aurora Updates</a>
            </div>
            <div class="footer-col">
                <h4>Contact & Connect</h4>
                <a href="#"><i class="fas fa-envelope"></i> dti.carp@aurora.gov.ph</a>
                <a href="#"><i class="fab fa-facebook"></i> @DTICARPAurora</a>
                <a href="#"><i class="fab fa-instagram"></i> @carpconnect.aurora</a>
                <a href="#"><i class="fas fa-phone-alt"></i> (042) 123 4567</a>
            </div>
        </div>
        <div class="copyright">
            <i class="fas fa-leaf"></i> DTI–CARP Connect: Aurora CARPreneurs E-Brochure Hub — © 2025 | Empowering local farmers, celebrating rural craftsmanship, building inclusive growth.
        </div>
    </div>
</footer>
</body>
</html>