<?= view('admin/head', ['title' => 'Admin Dashboard — DTI Aurora Price Monitoring']) ?>
  <?= view('admin/header') ?>

  <?= view('admin/sidebar') ?>

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