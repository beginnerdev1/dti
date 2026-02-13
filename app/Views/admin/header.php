<!-- DTI THEME HEADER (shared) -->
<header class="site-header">
  <button id="sidebarToggle" class="sidebar-toggle header-toggle" aria-label="Toggle navigation menu" aria-expanded="true">
    <i class="fa fa-bars"></i>
  </button>
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
    <div class="d-flex align-items-center gap-3">
      <a href="<?= base_url() ?>"><img src="<?= base_url('assets/DTI-LOGO.png') ?>" alt="DTI Philippines Logo" class="site-logo"></a>
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
            <a class="nav-link" href="../price-comparison.php">
              <i class="fa fa-scale-balanced"></i>
              <span>Price Comparison</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>
