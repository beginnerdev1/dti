<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>DTI-CARP Connect | About Us - Aurora CARPreneurs Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* HERO SECTION - Matching main design */
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
            content: "🌾";
            font-size: 220px;
            opacity: 0.05;
            position: absolute;
            bottom: -40px;
            right: -20px;
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
            background: rgba(255,255,255,0.95);
            padding: 0.8rem 1.2rem;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .logo img {
            width: auto;
            max-height: 110px;
            object-fit: contain;
            display: block;
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
        .nav-links a:hover,
        .nav-links a.active {
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
        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }
        .hero-content {
            text-align: center;
            max-width: 800px;
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

        /* Section Headers */
        .section-header {
            border-left: 6px solid var(--gold-main);
            padding-left: 1.2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        .section-header h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--green-primary);
        }
        .section-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--green-primary);
        }

        /* About Cards */
        .about-card {
            background: var(--white);
            border-radius: var(--border-radius-card);
            padding: 2rem;
            margin: 2rem 0;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(212,175,55,0.18);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .about-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--gold-main);
        }

        /* Mission Vision Grid */
        .mv-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        .mv-card {
            background: linear-gradient(135deg, var(--green-light) 0%, var(--white) 100%);
            border-radius: var(--border-radius-card);
            padding: 2rem;
            border-left: 6px solid var(--gold-main);
            transition: all 0.25s ease;
        }
        .mv-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }
        .mv-card h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--green-primary);
            margin-bottom: 1rem;
        }
        .mv-card h3 i {
            color: var(--gold-main);
            margin-right: 0.75rem;
        }
        .mv-card p {
            color: var(--neutral-gray);
            line-height: 1.6;
        }

        /* Purpose Grid */
        .purpose-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        .purpose-item {
            background: var(--white);
            border-radius: var(--border-radius-card);
            padding: 1.8rem;
            text-align: center;
            transition: all 0.25s ease;
            border: 1px solid rgba(212,175,55,0.18);
            cursor: pointer;
        }
        .purpose-item:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-md);
            border-color: var(--gold-main);
        }
        .purpose-item i {
            font-size: 2.8rem;
            color: var(--gold-main);
            margin-bottom: 1rem;
        }
        .purpose-item h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: var(--green-primary);
        }
        .purpose-item p {
            color: var(--neutral-gray);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Quote Block */
        .quote-block {
            background: linear-gradient(135deg, var(--gold-pale) 0%, var(--gold-soft) 100%);
            padding: 2.5rem;
            border-radius: var(--border-radius-card);
            margin: 2rem 0;
            text-align: center;
            border: 1px solid var(--gold-main);
            position: relative;
        }
        .quote-block i.fa-quote-left {
            font-size: 2rem;
            color: var(--gold-main);
            opacity: 0.5;
            position: absolute;
            top: 1rem;
            left: 1.5rem;
        }
        .quote-block i.fa-quote-right {
            font-size: 2rem;
            color: var(--gold-main);
            opacity: 0.5;
            position: absolute;
            bottom: 1rem;
            right: 1.5rem;
        }
        .quote-text {
            font-size: 1.2rem;
            font-style: italic;
            color: var(--green-primary);
            font-weight: 500;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        .stat-card {
            background: var(--white);
            border-radius: var(--border-radius-card);
            padding: 2rem;
            text-align: center;
            transition: all 0.25s ease;
            border: 1px solid rgba(212,175,55,0.18);
        }
        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
            border-color: var(--gold-main);
        }
        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--gold-dark);
            line-height: 1;
        }
        .stat-label {
            font-size: 1rem;
            font-weight: 600;
            color: var(--green-primary);
            margin: 0.5rem 0;
        }
        .stat-sub {
            font-size: 0.8rem;
            color: var(--neutral-gray);
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--green-light) 0%, var(--cream-bg) 100%);
            border-radius: var(--border-radius-card);
            padding: 3rem;
            text-align: center;
            margin: 3rem 0;
            border: 2px solid var(--gold-soft);
        }
        .cta-section i {
            font-size: 3rem;
            color: var(--gold-main);
            margin-bottom: 1rem;
        }
        .cta-section h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--green-primary);
            margin: 0.5rem 0;
        }
        .cta-section p {
            max-width: 600px;
            margin: 1rem auto;
            color: var(--neutral-gray);
        }

        /* Footer */
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
            color: white;
            transition: 0.2s;
        }
        .footer-col a:hover {
            color: var(--gold-main);
            opacity: 1;
            transform: translateX(4px);
        }
        .copyright {
            text-align: center;
            margin-top: 3rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 1.5rem;
            color: #D1D5DB;
            font-size: 0.9rem;
        }

        @media (max-width: 780px) {
            .hero-content h1 {
                font-size: 2.4rem;
            }
            .nav {
                flex-direction: column;
            }
            .nav-links {
                justify-content: center;
            }
            .logo img {
                max-height: 70px;
            }
            .mv-grid {
                grid-template-columns: 1fr;
            }
            .purpose-grid {
                grid-template-columns: 1fr;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .cta-section h2 {
                font-size: 1.5rem;
            }
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
                <a href="<?= base_url('aboutus') ?>" class="active">About Us</a>
            </div>
        </div>
        <div class="hero-content">
            <h1>About <span>Aurora CARPreneurs</span></h1>
            <p>Discover the heart behind DTI-CARP Connect — empowering local farmers, ARBs, and cooperatives across Aurora province.</p>
            <a href="<?= base_url('shops') ?>" class="btn-primary">
                <i class="fas fa-store"></i> Explore Our Shops
            </a>
        </div>
    </div>
</div>

<div class="container">
    <!-- Welcome Section -->
    <div class="about-card">
        <div class="section-header">
            <h2><i class="fas fa-heart" style="color: var(--gold-main);"></i> Welcome to DTI–CARP Connect</h2>
        </div>
        <p style="font-size: 1.1rem; line-height: 1.6; color: var(--neutral-gray); margin-bottom: 1rem;">
            Your gateway to discovering the vibrant products and inspiring stories of Aurora's CARPreneurs — our local Agrarian Reform Beneficiaries (ARBs), cooperatives, and farmer organizations.
        </p>
        <p style="font-size: 1rem; line-height: 1.6; color: var(--neutral-gray);">
            This digital hub is designed to bridge farmers to markets, giving our local producers a stronger voice and wider reach. 
            From handcrafted goods to proudly grown agricultural products, each feature represents the hard work, resilience, and innovation of Aurora's farming communities.
        </p>
    </div>


    <!-- Our Purpose Section -->
    <div class="about-card">
        <div class="section-header">
            <h2><i class="fas fa-bullseye" style="color: var(--gold-main);"></i> Our Purpose</h2>
        </div>
        <div class="purpose-grid">
            <div class="purpose-item">
                <i class="fas fa-hand-holding-heart"></i>
                <h4>Empower Local Farmers & ARBs</h4>
                <p>Showcasing products from Agrarian Reform Beneficiaries, elevating their visibility and economic dignity.</p>
            </div>
            <div class="purpose-item">
                <i class="fas fa-chart-line"></i>
                <h4>Strengthen Digital Promotion</h4>
                <p>Leveraging e-brochure tools and online presence for rural enterprises in Aurora province.</p>
            </div>
            <div class="purpose-item">
                <i class="fas fa-handshake"></i>
                <h4>Connect Buyers & Partners</h4>
                <p>Building direct links between community enterprises and conscious consumers.</p>
            </div>
            <div class="purpose-item">
                <i class="fas fa-seedling"></i>
                <h4>Promote Inclusive Growth</h4>
                <p>Sustainable livelihood and equitable opportunities across Aurora's farming communities.</p>
            </div>
        </div>
    </div>

    <!-- Inspirational Quote -->
    <div class="quote-block">
        <i class="fas fa-quote-left"></i>
        <div class="quote-text">
            Behind every product is a story — of dedication, community, and hope. By supporting Aurora CARPreneurs, you are not just buying a product — you are uplifting lives, strengthening rural enterprises, and contributing to a more inclusive economy.
        </div>
        <i class="fas fa-quote-right"></i>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <i class="fas fa-store"></i>
        <h2>✨ Discover. Connect. Support Local.</h2>
        <p>Together, let's grow Aurora — one product, one farmer, one community at a time.</p>
        <a href="<?= base_url('shops') ?>" class="btn-primary" style="margin-top: 1rem; display: inline-flex;">
            <i class="fas fa-leaf"></i> Explore CARPreneur Products
        </a>
        <div style="margin-top: 1.5rem;">
            <a href="#" style="color: var(--gold-dark); font-weight: 600;">
                <i class="fas fa-hand-sparkles"></i> Partner with us →
            </a>
        </div>
    </div>

    <!-- DTI-CARP Program Info -->
    <div class="about-card">
        <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div>
                <i class="fas fa-landmark" style="font-size: 3rem; color: var(--gold-main);"></i>
            </div>
            <div style="flex: 1;">
                <h3 style="font-size: 1.3rem; font-weight: 700; color: var(--green-primary); margin-bottom: 0.5rem;">
                    DTI–CARP Convergence Program
                </h3>
                <p style="color: var(--neutral-gray); line-height: 1.5;">
                    An initiative that bridges the Department of Trade and Industry and the Comprehensive Agrarian Reform Program, 
                    focusing on enterprise development for ARB organizations. Aurora stands as a model of cooperative-driven growth.
                </p>
                <hr style="margin: 1.5rem 0; border-color: rgba(212,175,55,0.2);">
                <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
                    <span><i class="fas fa-tractor" style="color: var(--gold-main);"></i> Farmer-first approach</span>
                    <span><i class="fas fa-chalkboard-user" style="color: var(--gold-main);"></i> Technical & digital literacy</span>
                    <span><i class="fas fa-hand-holding-usd" style="color: var(--gold-main);"></i> Fair trade & ethical sourcing</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-col">
                <h4>DTI–CARP Connect</h4>
                <a href="<?= base_url('/') ?>">Home</a>
                <a href="<?= base_url('aboutus') ?>">About Us</a>
                <a href="<?= base_url('shops') ?>">Products Directory</a>
                <a href="#">Partner with us</a>
                <a href="<?= base_url('admin/login') ?>">Log In</a>
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