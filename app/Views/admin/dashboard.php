<?= view('admin/head', ['title' => 'Admin Dashboard — DTI Aurora Price Monitoring']) ?>
  <?= view('admin/header') ?>

  <?= view('admin/sidebar') ?>
=======
    /* ================================================
       BASE STYLES
       ================================================ */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html, body {
      height: 100%;
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      background-color: var(--dti-light);
      color: var(--dti-dark);
      line-height: 1.5;
    }

    /* ================================================
       SITE HEADER - DTI THEME
       ================================================ */
    .site-header {
      background: #09203f;
      color: white;
      padding: 1rem 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 4px 12px rgba(9, 32, 63, 0.2);
    }

    .site-logo {
      width: 50px;
      height: 50px;
      object-fit: contain;
      background: white;
      padding: 5px;
      border-radius: 8px;
    }

    .site-header h4 {
      font-size: 1.25rem;
      font-weight: 700;
      margin: 0;
      color: white;
    }

    .header-sub {
      font-size: 0.875rem;
      color: rgba(255, 255, 255, 0.9);
      font-weight: 400;
    }

    .header-flag {
      display: flex;
      align-items: center;
      gap: 5px;
      margin-left: 1rem;
      padding-left: 1rem;
      border-left: 2px solid rgba(255, 255, 255, 0.3);
    }

    .flag-stripe {
      width: 20px;
      height: 4px;
      border-radius: 2px;
    }

    .flag-blue { background-color: #0038a8; }
    .flag-red { background-color: #ce1126; }
    .flag-white { background-color: white; }
    .flag-yellow { background-color: #fcd116; }

    .site-header .nav-link {
      color: rgba(255, 255, 255, 0.9);
      font-weight: 500;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      transition: all 0.2s ease;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .site-header .nav-link:hover {
      color: white;
      background-color: rgba(255, 255, 255, 0.15);
    }

    .site-header .nav-link i {
      font-size: 0.9rem;
    }

    /* ================================================
       SIDEBAR - DTI THEME
       ================================================ */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 260px;
      height: 100vh;
      background: var(--dti-white);
      border-right: 1px solid var(--dti-border);
      padding-top: 5rem;
      z-index: 999;
      overflow-y: auto;
      transition: transform 0.3s ease;
      box-shadow: 2px 0 15px rgba(0, 85, 165, 0.1);
    }

    .sidebar-header {
      padding: 1rem 1.5rem;
      border-bottom: 1px solid var(--dti-border);
      margin-bottom: 1rem;
      position: absolute;
      top: 0;
      width: 100%;
      background: var(--dti-white);
    }

    .sidebar-header h5 {
      color: var(--dti-blue);
      font-weight: 700;
      margin: 0;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar-header h5 i {
      color: var(--dti-red);
    }

    .sidebar a {
      color: var(--dti-dark);
      display: flex;
      align-items: center;
      padding: 0.875rem 1.5rem;
      margin: 0.25rem 1rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s ease;
      position: relative;
    }

    .sidebar a:hover {
      background: var(--dti-light-blue);
      color: var(--dti-blue);
      transform: translateX(5px);
    }

    .sidebar a.active {
      background: linear-gradient(135deg, var(--dti-blue) 0%, var(--dti-dark) 100%);
      color: white;
      box-shadow: 0 4px 12px rgba(0, 85, 165, 0.25);
    }

    .sidebar a i {
      width: 24px;
      text-align: center;
      font-size: 1.1rem;
    }

    .sidebar-badge {
      background: var(--dti-red);
      color: white;
      font-size: 0.75rem;
      padding: 2px 8px;
      border-radius: 12px;
      margin-left: auto;
    }

    /* ================================================
       MAIN CONTENT AREA
       ================================================ */
    .main-content {
      margin-left: 260px;
      padding: 2rem;
      min-height: calc(100vh - 80px);
      transition: margin-left 0.3s ease;
    }

    /* ================================================
       DASHBOARD HEADER
       ================================================ */
    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .dashboard-title h1 {
      color: var(--dti-blue);
      font-weight: 700;
      margin-bottom: 0.25rem;
    }

    .dashboard-subtitle {
      color: var(--dti-gray);
      font-size: 0.95rem;
    }

    /* ================================================
       STATS CARDS
       ================================================ */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .stat-card {
      background: var(--dti-white);
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 4px 6px rgba(0, 85, 165, 0.08);
      transition: all 0.3s ease;
      border-top: 4px solid var(--dti-blue);
      position: relative;
      overflow: hidden;
    }

    .stat-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 25px rgba(0, 85, 165, 0.15);
    }

    .stat-card.pending { border-top-color: var(--dti-warning); }
    .stat-card.completed { border-top-color: var(--dti-success); }
    .stat-card.orders { border-top-color: var(--dti-blue); }
    .stat-card.products { border-top-color: var(--dti-red); }

    .stat-icon {
      position: absolute;
      right: 1.5rem;
      top: 1.5rem;
      color: rgba(0, 85, 165, 0.1);
      font-size: 2rem;
    }

    .stat-label {
      color: var(--dti-gray);
      font-size: 0.875rem;
      font-weight: 500;
      margin-bottom: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .stat-value {
      font-size: 2rem;
      font-weight: 700;
      color: var(--dti-dark);
      margin-bottom: 0.25rem;
    }

    .stat-change {
      font-size: 0.875rem;
      display: flex;
      align-items: center;
      gap: 0.25rem;
    }

    .stat-change.positive { color: var(--dti-success); }
    .stat-change.negative { color: var(--dti-danger); }

    /* ================================================
       CHARTS & DATA SECTIONS
       ================================================ */
    .data-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    @media (max-width: 992px) {
      .data-grid {
        grid-template-columns: 1fr;
      }
    }

    .chart-card,
    .quick-stats-card,
    .mini-charts-card {
      background: var(--dti-white);
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 4px 6px rgba(0, 85, 165, 0.08);
    }

    .card-title {
      color: var(--dti-blue);
      font-weight: 700;
      margin-bottom: 1.5rem;
      padding-bottom: 0.75rem;
      border-bottom: 2px solid var(--dti-light-blue);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .card-title i {
      color: var(--dti-red);
    }

    .chart-container {
      height: 280px;
      background: linear-gradient(180deg, #f8fafc 0%, #f0f7ff 100%);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--dti-gray);
      font-weight: 500;
      border: 2px dashed #e0e7ff;
      position: relative;
    }

    .chart-placeholder {
      text-align: center;
    }

    .chart-placeholder i {
      font-size: 3rem;
      color: var(--dti-blue);
      margin-bottom: 1rem;
      opacity: 0.3;
    }

    /* ================================================
       QUICK STATS
       ================================================ */
    .quick-stat {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
      border-bottom: 1px solid var(--dti-border);
    }

    .quick-stat:last-child {
      border-bottom: none;
    }

    .stat-info h4 {
      color: var(--dti-dark);
      font-weight: 600;
      margin-bottom: 0.25rem;
    }

    .stat-info p {
      color: var(--dti-gray);
      font-size: 0.875rem;
      margin: 0;
    }

    .stat-badge {
      background: var(--dti-light-blue);
      color: var(--dti-blue);
      padding: 0.5rem 1rem;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.875rem;
    }

    /* ================================================
       MINI CHARTS
       ================================================ */
    .mini-charts-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
      gap: 1rem;
    }

    .mini-chart-item {
      background: var(--dti-light);
      border-radius: 10px;
      padding: 1rem;
      text-align: center;
      transition: all 0.2s ease;
      border: 2px solid transparent;
    }

    .mini-chart-item:hover {
      border-color: var(--dti-blue);
      background: var(--dti-white);
    }

    .mini-chart-icon {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, var(--dti-blue) 0%, var(--dti-dark) 100%);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      color: white;
      font-size: 1.5rem;
    }

    .mini-chart-label {
      color: var(--dti-dark);
      font-weight: 600;
      font-size: 0.875rem;
    }

    .mini-chart-value {
      color: var(--dti-blue);
      font-weight: 700;
      font-size: 1.1rem;
      margin-top: 0.25rem;
    }

    /* ================================================
       BUTTONS - DTI THEME
       ================================================ */
    .btn-dti {
      background: linear-gradient(135deg, var(--dti-blue) 0%, var(--dti-dark) 100%);
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
    }

    .btn-dti:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 85, 165, 0.25);
      color: white;
    }

    .btn-dti-outline {
      background: transparent;
      color: var(--dti-blue);
      border: 2px solid var(--dti-blue);
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-dti-outline:hover {
      background: var(--dti-blue);
      color: white;
      transform: translateY(-2px);
    }

    /* ================================================
       SIDEBAR TOGGLE
       ================================================ */
    .sidebar-toggle {
      background: rgba(255, 255, 255, 0.15);
      border: 2px solid rgba(255, 255, 255, 0.3);
      color: white;
      width: 40px;
      height: 40px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .sidebar-toggle:hover {
      background: rgba(255, 255, 255, 0.25);
      border-color: white;
      transform: rotate(90deg);
    }

    /* ================================================
       RESPONSIVE DESIGN
       ================================================ */
    @media (max-width: 1200px) {
      .main-content {
        padding: 1.5rem;
      }
      
      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
        width: 280px;
      }
      
      .main-content {
        margin-left: 0;
        padding: 1rem;
      }
      
      .stats-grid {
        grid-template-columns: 1fr;
      }
      
      .data-grid {
        grid-template-columns: 1fr;
      }
      
      .site-header .container {
        flex-direction: column;
        gap: 1rem;
        padding: 1rem;
      }
      
      .site-header .nav {
        flex-wrap: wrap;
        justify-content: center;
      }
      
      .dashboard-header {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    /* Sidebar hidden state */
    body.sidebar-hidden .sidebar {
      transform: translateX(0);
    }
    
    body.sidebar-hidden .main-content {
      margin-left: 280px;
    }
    
    @media (max-width: 768px) {
      body.sidebar-hidden .main-content {
        margin-left: 0;
      }
    }

    /* ================================================
       ACCESSIBILITY & UTILITIES
       ================================================ */
    .sr-only {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border: 0;
    }

    .text-muted {
      color: var(--dti-gray) !important;
    }

    .bg-dti-light {
      background-color: var(--dti-light-blue) !important;
    }

    /* Focus styles for accessibility */
    .sidebar a:focus,
    .btn-dti:focus,
    .btn-dti-outline:focus,
    .sidebar-toggle:focus,
    .nav-link:focus {
      outline: 3px solid var(--dti-yellow);
      outline-offset: 2px;
    }

    /* Animation for loading states */
    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }

    .loading {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
  </style>
</head>
<body>
  <!-- DTI THEME HEADER -->
  <header class="site-header">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <img src="../images/dti-logo.png" alt="DTI Philippines Logo" class="site-logo">
        <div>
          <h4>Department of Trade and Industry</h4>
          <div class="header-sub">Aurora Province - Price Monitoring System</div>
        </div>
        <div class="header-flag d-none d-md-flex">
          <div class="flag-stripe flag-blue"></div>
          <div class="flag-stripe flag-red"></div>
          <div class="flag-stripe flag-white"></div>
          <div class="flag-stripe flag-yellow"></div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-3">
        <button id="sidebarToggle" class="sidebar-toggle" aria-label="Toggle navigation menu">
          <i class="fa fa-bars"></i>
        </button>
        <nav aria-label="Main navigation">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../infos.php">
                <i class="fa fa-circle-info"></i>
                <span>Infos</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('monitoring') ?>">
                <i class="fa fa-chart-line"></i>
                <span>Price Monitoring</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('price-comparison') ?>">
                <i class="fa fa-scale-balanced"></i>
                <span>Price Comparison</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/logout') ?>" style="color: #ffcccc;">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <!-- SIDEBAR -->
  <nav class="sidebar" aria-label="Admin dashboard navigation">
    <br>
    <div class="sidebar-header">
      <h5><i class="fa fa-user-shield"></i> Admin Dashboard</h5>
    </div>
    <div class="sidebar-content">
      <a href="<?= base_url('admin/dashboard') ?>" class="active">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
      </a>
      <a href="<?= base_url('admin/products') ?>">
        <i class="fa fa-box"></i>
        <span>Products</span>
        <span class="sidebar-badge">128</span>
      </a>
     
      <a href="<?= base_url('admin/stores') ?>">
        <i class="fa fa-store"></i>
        <span>Establishments</span>
      </a> 
      <a href="#">
       <i class="bi bi-graph-up-arrow"></i>
        <span>Reports</span>
      </a>
      <a href="#">
        <i class="fa fa-gear"></i>
        <span>Settings</span>
      </a>
    </div>
  </nav>


  <!-- MAIN CONTENT -->
  <main class="main-content">
    <div class="dashboard-header">
      <div class="dashboard-title">
        <h1>Price Monitoring Dashboard</h1>
        <div class="dashboard-subtitle">
          <i class="fa fa-calendar text-muted me-1"></i>
          Last updated: February 11, 2026 | DTI Aurora Province
        </div>
      </div>
      <div class="dashboard-actions">
        <button class="btn-dti-outline me-2">
          <i class="fa fa-download"></i>
          Export Data
        </button>
        <button class="btn-dti">
          <i class="fa fa-plus"></i>
          Create Report
        </button>
      </div>
    </div>

    <!-- STATS CARDS -->
    <div class="stats-grid">
      <div class="stat-card pending">
        <i class="stat-icon fa fa-clock"></i>
        <div class="stat-label">
          <i class="fa fa-circle-exclamation"></i>
          Pending Amount
        </div>
        <div class="stat-value">₱157.00</div>
        <div class="stat-change positive">
          <i class="fa fa-arrow-up"></i>
          2.3% from last month
        </div>
        <div class="text-muted text-small mt-2">As of 2026-02-01</div>
      </div>

      <div class="stat-card completed">
        <i class="stat-icon fa fa-check-circle"></i>
        <div class="stat-label">
          <i class="fa fa-circle-check"></i>
          Completed Amount
        </div>
        <div class="stat-value">₱165.00</div>
        <div class="stat-change positive">
          <i class="fa fa-arrow-up"></i>
          5.7% increase
        </div>
        <div class="text-muted text-small mt-2">Last 7 days</div>
      </div>

      <div class="stat-card orders">
        <i class="stat-icon fa fa-shopping-cart"></i>
        <div class="stat-label">
          <i class="fa fa-clipboard-list"></i>
          Total Orders
        </div>
        <div class="stat-value">42</div>
        <div class="stat-change positive">
          <i class="fa fa-arrow-up"></i>
          8 new orders
        </div>
        <div class="text-muted text-small mt-2">Active monitoring</div>
      </div>

      <div class="stat-card products">
        <i class="stat-icon fa fa-boxes-stacked"></i>
        <div class="stat-label">
          <i class="fa fa-tags"></i>
          Active Products
        </div>
        <div class="stat-value">128</div>
        <div class="stat-change positive">
          <i class="fa fa-arrow-up"></i>
          12 added recently
        </div>
        <div class="text-muted text-small mt-2">Across 24 categories</div>
      </div>
    </div>

    <!-- CHARTS & DATA -->
    <div class="data-grid">
      <div class="chart-card">
        <div class="card-title">
          <span><i class="fa fa-chart-line me-2"></i> 7-Day Price Monitoring Trend</span>
          <select class="form-select form-select-sm w-auto bg-dti-light">
            <option>This Week</option>
            <option>Last Week</option>
            <option>This Month</option>
          </select>
        </div>
        <div class="chart-container">
          <div class="chart-placeholder">
            <i class="fa fa-chart-column"></i>
            <div>Interactive Chart Placeholder</div>
            <small class="text-muted">Data visualization for price trends</small>
          </div>
        </div>
      </div>

      <div class="quick-stats-card">
        <div class="card-title">
          <span><i class="fa fa-gauge-high me-2"></i> System Overview</span>
        </div>
        <div class="quick-stats">
          <div class="quick-stat">
            <div class="stat-info">
              <h4>1,234</h4>
              <p>Registered Users</p>
            </div>
            <span class="stat-badge">Active</span>
          </div>
          <div class="quick-stat">
            <div class="stat-info">
              <h4>89</h4>
              <p>Messages</p>
            </div>
            <span class="stat-badge">12 sent</span>
          </div>
          <div class="quick-stat">
            <div class="stat-info">
              <h4>24</h4>
              <p>Monitoring Sites</p>
            </div>
            <span class="stat-badge">All active</span>
          </div>
          <div class="quick-stat">
            <div class="stat-info">
              <h4>98.2%</h4>
              <p>System Uptime</p>
            </div>
            <span class="stat-badge">Excellent</span>
          </div>
        </div>
      </div>
    </div>

    <!-- MINI CHARTS -->
    <div class="mini-charts-card">
      <div class="card-title">
        <span><i class="fa fa-chart-pie me-2"></i> Quick Metrics</span>
        <button class="btn-dti-outline btn-sm">
          <i class="fa fa-refresh"></i>
          Refresh
        </button>
      </div>
      <div class="mini-charts-grid">
        <div class="mini-chart-item">
          <div class="mini-chart-icon">
            <i class="fa fa-money-bill-wave"></i>
          </div>
          <div class="mini-chart-label">Average Price</div>
          <div class="mini-chart-value">₱45.75</div>
        </div>
        <div class="mini-chart-item">
          <div class="mini-chart-icon">
            <i class="fa fa-percentage"></i>
          </div>
          <div class="mini-chart-label">Compliance Rate</div>
          <div class="mini-chart-value">94.8%</div>
        </div>
        <div class="mini-chart-item">
          <div class="mini-chart-icon">
            <i class="fa fa-arrow-trend-up"></i>
          </div>
          <div class="mini-chart-label">Price Changes</div>
          <div class="mini-chart-value">+3.2%</div>
        </div>
        <div class="mini-chart-item">
          <div class="mini-chart-icon">
            <i class="fa fa-bell"></i>
          </div>
          <div class="mini-chart-label">Alerts</div>
          <div class="mini-chart-value">5</div>
        </div>
      </div>
    </div>

    </main>
    <?= view('admin/footer') ?>