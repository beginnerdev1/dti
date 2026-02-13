<?php
// Header partial: logo + site navigation
?>
<header class="site-header">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
      <div class="d-flex align-items-center">
        <a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/DTI-LOGO.png') ?>" alt="DTI logo" class="site-logo me-3" /></a>
        <div>
          <h4 class="mb-0">Price Monitoring - DTI AURORA</h4>
          <div class="header-sub">The Official Website of DTI Aurora Price Monitoring System</div>
        </div>
      </div>
    </div>
    <ul class="nav nav-pills">
      <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('infos') ?>"><i class="bi bi-info-circle pe-2" aria-hidden="true"></i>Infos</a></li>
      <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('monitoring') ?>"><i class="bi bi-bar-chart-line pe-2" aria-hidden="true"></i>Price Monitoring</a></li>
      <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('price-comparison') ?>"><i class="bi bi-arrow-left-right pe-2" aria-hidden="true"></i>Price Comparison</a></li>
    </ul>
  </div>
</header>
