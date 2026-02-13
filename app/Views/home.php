<?php
// Data is loaded via API endpoints from the controller
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Price Monitoring - DTI AURORA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="<?= base_url('assets/css/home.css') ?>" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body>
  <?= view('partials/header') ?>

  <div class="container mt-3 d-flex justify-content-end">
    <div class="input-group" style="width:360px;">
      <span class="input-group-text bg-transparent border-0" id="search-addon">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-muted">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.415l-3.85-3.85zm-5.242 1.11a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/>
        </svg>
      </span>
      <input id="searchBox" class="form-control" placeholder="Search product" aria-label="Search" aria-describedby="search-addon" />
    </div>
  </div>

  <main class="container-fluid px-0 my-4">
    <div class="grid grid-cols-1 gap-0 lg:grid-cols-12">
      <div class="lg:col-span-5 left-panel">
        <div class="product-card">
          <div id="selectedTitle"><strong>Select a product to view details</strong></div>
          <div class="mt-3">
            <div class="row g-2 mb-2 align-items-end">
              <div class="col-md-5">
                <label for="dateFrom" class="form-label small mb-1 text-muted">Date From</label>
                <input id="dateFrom" type="date" class="form-control form-control-sm" />
              </div>
              <div class="col-auto d-flex align-items-center justify-content-center px-1">
                <i class="bi bi-arrow-right-short text-muted" aria-hidden="true" style="font-size:1.35rem;"></i>
              </div>
              <div class="col-md-5">
                <label for="dateTo" class="form-label small mb-1 text-muted">Date To</label>
                <input id="dateTo" type="date" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="chart-container">
              <canvas id="priceChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="lg:col-span-7 right-panel">
        <div class="product-card1">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <strong style="display:inline-flex;align-items:center;gap:8px">Products <span class="badge bg-secondary product-count-badge" id="productCount">0</span></strong>
            </div>
          </div>
          <div class="mb-3 d-flex justify-content-between align-items-center">
            <div>
              <select id="categoryFilter" class="form-select category-select" style="width:220px;">
                <option value="all">All Categories</option>
              </select>
            </div>
            <div>
              <select id="municipalityFilter" class="form-select" style="width:220px;">
                <option value="all">All Municipalities</option>
              </select>
            </div>
          </div>
          <div id="productList"></div>
        </div>
      </div>

    </div>
  </main>

  <!-- Modal overlay -->
  <div id="modalOverlay" class="modal-overlay" onclick="if(event.target.id==='modalOverlay') closeModal()" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true">
     
      <div class="modal-badge"><span class="tag-badge-sm" id="modalFloatingCategory"></span></div>
      <div class="modal-header d-flex justify-content-between align-items-start">
        <div class="modal-logo" aria-hidden="true"><img src="<?= base_url('assets/DTI-LOGO.png') ?>" alt="DTI" /></div>
        <div class="modal-header-content">
          <div class="h4 mb-1">Product Details</div>
          <div class="small ">DTI Price Monitoring — <span id="modalHeaderMunicipality">Municipality</span></div>
           
          <div class="mt-2"><strong id="modalProductName">Product</strong> <span class="tag-badge" id="modalProductCategory">Category</span></div>
        </div>
        <button class="btn btn-sm btn-close-modal" onclick="closeModal()">✕</button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <br>
          <div class="d-flex align-items-center justify-content-between">
            <strong>Price History</strong>
            <div class="d-flex gap-2 align-items-center">
              <div class="small text-white-50">Filter:</div>
              <input id="modalDateFrom" type="date" class="form-control form-control-sm" style="width:160px;" />
              <div class="small text-white-50">—</div>
              <input id="modalDateTo" type="date" class="form-control form-control-sm" style="width:160px;" />
            </div>
          </div>
          <div class="table-responsive mt-2">
            <table class="table table-sm table-striped" aria-label="Price history table">
              <thead>
                <tr>
                  <th scope="col"><i class="bi bi-shop" aria-hidden="true"></i> Store</th>
                  <th scope="col" class="price-column">₱ Price (PHP)</th>
                  <th scope="col" class="date-column"><i class="bi bi-calendar3" aria-hidden="true"></i> Date</th>
                </tr>
              </thead>
              <tbody id="modalPriceHistoryTable"></tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
    // ========================================
    // PRICE MONITORING DASHBOARD
    // API Configuration
    // ========================================
    const BASE_URL = '<?= base_url() ?>';
    const API_ENDPOINTS = {
      products: BASE_URL + 'api/products',
      categories: BASE_URL + 'api/categories',
      municipalities: BASE_URL + 'api/municipalities'
    };

    const CHART_COLORS = ['#ff6b4a', '#2ecc71', '#00a8ff', '#6c5ce7', '#f6c23e', '#fd79a8', '#4d7cfe', '#06b6d4'];

    // ========================================
    // Application State
    // ========================================
    let products = [];
    let chart = null;

    // ========================================
    // DOM Elements Cache
    // ========================================
    const DOM = {
      productListEl: document.getElementById('productList'),
      productCountEl: document.getElementById('productCount'),
      searchBox: document.getElementById('searchBox'),
      categoryFilter: document.getElementById('categoryFilter'),
      municipalityFilter: document.getElementById('municipalityFilter'),
      dateFrom: document.getElementById('dateFrom'),
      dateTo: document.getElementById('dateTo'),
      selectedTitle: document.getElementById('selectedTitle'),
      priceChart: document.getElementById('priceChart').getContext('2d'),
      modalOverlay: document.getElementById('modalOverlay'),
      modalProductName: document.getElementById('modalProductName'),
      modalProductCategory: document.getElementById('modalProductCategory'),
      modalHeaderMunicipality: document.getElementById('modalHeaderMunicipality'),
      modalFloatingCategory: document.getElementById('modalFloatingCategory'),
      modalPriceHistoryTable: document.getElementById('modalPriceHistoryTable'),
      modalDateFrom: document.getElementById('modalDateFrom'),
      modalDateTo: document.getElementById('modalDateTo')
    };

    // ========================================
    // Helper Functions
    // ========================================
    function debounce(fn, wait = 200) {
      let timeoutId;
      return (...args) => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => fn(...args), wait);
      };
    }

    function createTableRow(store, price, date, location = '') {
      const tr = document.createElement('tr');
      
      const storeTd = document.createElement('td');
      storeTd.className = 'store-column';
      const storeIcon = document.createElement('i');
      storeIcon.className = 'bi bi-geo-alt-fill';
      storeIcon.setAttribute('aria-hidden', 'true');
      storeIcon.style.marginRight = '8px';
      storeIcon.style.fontSize = '1.05rem';
      storeTd.appendChild(storeIcon);
      storeTd.appendChild(document.createTextNode(store + (location ? ' — ' + location : '')));
      
      const priceTd = document.createElement('td');
      priceTd.textContent = '₱' + (price || 0).toFixed(2);
      priceTd.className = 'price-column';
      
      const dateTd = document.createElement('td');
      dateTd.textContent = date || '';
      dateTd.className = 'date-column';
      
      tr.appendChild(storeTd);
      tr.appendChild(priceTd);
      tr.appendChild(dateTd);
      
      return tr;
    }

    function getDateRangeFilter(history, dateFrom, dateTo) {
      if (!dateFrom && !dateTo) return history;
      
      let filtered = history.slice();
      if (dateFrom && !dateTo) {
        filtered = filtered.filter(h => h.date === dateFrom);
      } else {
        if (dateFrom) filtered = filtered.filter(h => h.date >= dateFrom);
        if (dateTo) filtered = filtered.filter(h => h.date <= dateTo);
      }
      return filtered;
    }

    function deduplicateByStore(history) {
      const latestByStore = {};
      history.forEach(h => {
        const key = ((h.store || '') + '||' + (h.location || '')).toLowerCase().trim();
        if (!latestByStore[key] || new Date(h.date) > new Date(latestByStore[key].date)) {
          latestByStore[key] = h;
        }
      });
      return Object.values(latestByStore).sort((a, b) => new Date(b.date) - new Date(a.date));
    }

    // ========================================
    // Data Loading
    // ========================================
    async function loadProducts() {
      try {
        const response = await fetch(API_ENDPOINTS.products);
        products = await response.json();
        loadFilters();
        renderProducts();
      } catch (error) {
        console.error('Error loading products:', error);
      }
    }

    async function loadFilters() {
      try {
        const [catResponse, muniResponse] = await Promise.all([
          fetch(API_ENDPOINTS.categories),
          fetch(API_ENDPOINTS.municipalities)
        ]);

        const categories = await catResponse.json();
        categories.forEach(cat => {
          const option = document.createElement('option');
          option.value = cat;
          option.textContent = cat;
          DOM.categoryFilter.appendChild(option);
        });

        const municipalities = await muniResponse.json();
        municipalities.forEach(muni => {
          const option = document.createElement('option');
          option.value = muni;
          option.textContent = muni;
          DOM.municipalityFilter.appendChild(option);
        });
      } catch (error) {
        console.error('Error loading filters:', error);
      }
    }

    // ========================================
    // Product List Rendering
    // ========================================
    function renderProducts() {
      const query = (DOM.searchBox.value || '').toLowerCase();
      const dateFrom = DOM.dateFrom.value;
      const dateTo = DOM.dateTo.value;
      const category = DOM.categoryFilter.value;
      const municipality = DOM.municipalityFilter.value || 'all';

      const filtered = products.filter(p => {
        if (category !== 'all') {
          const pcat = (p.category || '').toString().trim().toLowerCase();
          if (pcat !== category.toLowerCase()) return false;
        }

        if (municipality !== 'all') {
          const hasMuni = p.priceHistory && p.priceHistory.some(h => {
            if ((h.municipality || '').toLowerCase() !== municipality.toLowerCase()) return false;
            if (dateFrom && h.date < dateFrom) return false;
            if (dateTo && h.date > dateTo) return false;
            return true;
          });
          if (!hasMuni) return false;
        }

        if (query) {
          const nameMatch = p.name && p.name.toLowerCase().includes(query);
          const storeMatch = p.priceHistory && p.priceHistory.some(h =>
            (h.store || '').toLowerCase().includes(query) || (h.location || '').toLowerCase().includes(query)
          );
          if (!(nameMatch || storeMatch)) return false;
        }

        return true;
      });

      DOM.productListEl.innerHTML = '';
      DOM.productCountEl.textContent = filtered.length;

      filtered.forEach(p => renderProductCard(p, dateFrom, dateTo));
    }

    function renderProductCard(product, dateFrom, dateTo) {
      const div = document.createElement('div');
      div.className = 'mb-3';
      div.dataset.pid = product.id;

      const ph = (product.priceHistory || []).filter(h => {
        if (dateFrom && h.date < dateFrom) return false;
        if (dateTo && h.date > dateTo) return false;
        return true;
      });

      const latestHistory = (ph && ph.length) ? ph.slice(-1)[0] : null;
      const latestDate = latestHistory ? latestHistory.date : '';
      const bestPricesHtml = renderBestPrices(ph, product);

      div.innerHTML = `
        <div class="d-flex justify-content-between align-items-start">
          <div style="flex:1;min-width:0">
            <div class="d-flex align-items-baseline">
              <div class="fw-bold me-2">${product.name}</div>
              <div class="small text-muted">${product.unit || ''}</div>
            </div>
            <div class="small text-muted">Category: <span class="text-dark">${product.category}</span></div>
            <div class="mt-2">
              <ul class="best-price-list mb-0">${bestPricesHtml}</ul>
            </div>
            <div class="small text-muted">Municipality: <span class="text-dark">${(latestHistory && latestHistory.municipality) || ''}</span></div>
            <div class="small text-muted">Date: <span class="text-dark">${latestDate}</span></div>
          </div>
          <div class="text-end ms-3">
            <div class="d-flex flex-column align-items-end">
              <div class="category-top"><span class="tag-badge-sm">${product.category || ''}</span></div>
              <button class="btn btn-primary-filled btn-sm mt-2 view-button" onclick="event.stopPropagation(); openModal(${product.id})">View</button>
            </div>
          </div>
        </div>
      `;

      DOM.productListEl.appendChild(div);

      div.addEventListener('click', () => {
        DOM.productListEl.querySelectorAll('.mb-3').forEach(c => c.classList.remove('selected'));
        div.classList.add('selected');
        showProduct(product.id);
      });
    }

    function renderBestPrices(history, product) {
      const pinSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 16 16" fill="currentColor" style="color:var(--accent);margin-right:8px;vertical-align:middle"><path d="M8 0a6 6 0 0 0-6 6c0 4.5 6 10 6 10s6-5.5 6-10a6 6 0 0 0-6-6zm0 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>';

      if (!history || !history.length) {
        return `<li class="best-price-item d-flex justify-content-between align-items-center"><div><span class="loc">${pinSvg}<strong>N/A</strong></span></div></li>`;
      }

      const byStore = {};
      history.forEach(h => {
        const key = (h.store || '').trim().toLowerCase() + '||' + (h.location || '').trim().toLowerCase();
        if (!byStore[key] || new Date(h.date) > new Date(byStore[key].date)) {
          byStore[key] = { store: h.store || '', price: parseFloat(h.price || 0), location: h.location || '', date: h.date };
        }
      });

      const bestList = Object.values(byStore)
        .sort((a, b) => (a.price - b.price) || (new Date(b.date) - new Date(a.date)))
        .slice(0, 3);

      return bestList.map(h =>
        `<li class="best-price-item d-flex justify-content-between align-items-center"><div><span class="loc">${pinSvg}<strong>${h.store}${h.location ? ' — ' + h.location : ''}</strong></span></div><span class="amt"><strong>₱${(h.price || 0).toFixed(2)}</strong></span></li>`
      ).join('');
    }

    // ========================================
    // Chart Rendering
    // ========================================
    function showProduct(id) {
      const product = products.find(x => x.id === id);
      if (!product) return;

      DOM.selectedTitle.innerHTML = `
        <div class="d-flex align-items-center gap-2">
          <div class="d-flex align-items-baseline">
            <div class="fw-bold" style="font-size:1.15rem">${product.name}</div>
            <div class="small text-muted ms-2">${product.unit || ''}</div>
          </div>
          <div class="tag-badge">${product.category || ''}</div>
        </div>
      `;

      const dateFrom = DOM.dateFrom.value;
      const dateTo = DOM.dateTo.value;
      const history = (product.priceHistory || []).filter(h => {
        if (dateFrom && h.date < dateFrom) return false;
        if (dateTo && h.date > dateTo) return false;
        return true;
      });

      if (!history.length) {
        if (chart) chart.destroy();
        chart = new Chart(DOM.priceChart, {
          type: 'line',
          data: { labels: [], datasets: [] },
          options: { responsive: true, maintainAspectRatio: false }
        });
        return;
      }

      const dateSet = Array.from(new Set(history.map(h => h.date))).sort();
      const byStore = {};

      history.forEach(h => {
        const storeName = (h.store || '').toString().trim();
        const loc = (h.location || '').toString().trim();
        const key = (storeName + '||' + loc).toLowerCase();
        if (!byStore[key]) byStore[key] = { label: storeName || (loc || 'Store'), entries: [] };
        byStore[key].entries.push({ date: h.date, price: Number(h.price || 0) });
      });

      const datasets = Object.values(byStore).map((s, idx) => {
        const data = dateSet.map(d => {
          const match = s.entries.find(e => e.date === d);
          return match ? match.price : null;
        });
        return {
          label: s.label || `Store ${idx + 1}`,
          data,
          borderColor: CHART_COLORS[idx % CHART_COLORS.length],
          backgroundColor: CHART_COLORS[idx % CHART_COLORS.length] + '33',
          tension: 0.2,
          pointRadius: 4,
          spanGaps: false
        };
      });

      if (chart) chart.destroy();
      chart = new Chart(DOM.priceChart, {
        type: 'line',
        data: { labels: dateSet, datasets },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          layout: { padding: 12 },
          plugins: { legend: { display: true, position: 'top' } },
          scales: {
            y: { beginAtZero: false, title: { display: true, text: 'Price (PHP)' } },
            x: { ticks: { autoSkip: true, maxRotation: 0 } }
          }
        }
      });
    }

    // ========================================
    // Modal Functions
    // ========================================
    function openModal(id) {
      const product = products.find(x => x.id === id);
      if (!product) return;

      DOM.modalProductName.textContent = `${product.name || ''}${product.unit ? ' ' + product.unit : ''}`;
      DOM.modalProductCategory.textContent = product.category || '';

      populateModalTable(product);

      const headerMunicipality = (product.priceHistory && product.priceHistory.length)
        ? product.priceHistory.slice(-1)[0].municipality
        : '';
      DOM.modalHeaderMunicipality.textContent = headerMunicipality || '';
      DOM.modalFloatingCategory.textContent = product.category || '';

      const globalFrom = DOM.dateFrom ? DOM.dateFrom.value : '';
      const globalTo = DOM.dateTo ? DOM.dateTo.value : '';
      if (DOM.modalDateFrom) DOM.modalDateFrom.value = globalFrom || '';
      if (DOM.modalDateTo) DOM.modalDateTo.value = globalTo || '';

      if (DOM.modalDateFrom) DOM.modalDateFrom.onchange = () => populateModalTable(product);
      if (DOM.modalDateTo) DOM.modalDateTo.onchange = () => populateModalTable(product);

      document.body.classList.add('modal-open');
      DOM.modalOverlay.classList.add('visible');
    }

    function populateModalTable(product) {
      if (!(product.priceHistory && product.priceHistory.length)) {
        DOM.modalPriceHistoryTable.innerHTML = '';
        return;
      }

      const mFrom = DOM.modalDateFrom ? DOM.modalDateFrom.value : '';
      const mTo = DOM.modalDateTo ? DOM.modalDateTo.value : '';
      let history = getDateRangeFilter(product.priceHistory.slice(), mFrom, mTo);

      let rows = [];
      if (mFrom && mTo) {
        rows = history.slice().sort((a, b) => new Date(b.date) - new Date(a.date));
      } else if (mFrom && !mTo) {
        rows = history.slice().sort((a, b) => new Date(b.date) - new Date(a.date));
      } else {
        rows = deduplicateByStore(history);
      }

      DOM.modalPriceHistoryTable.innerHTML = '';
      rows.forEach(h => {
        const tr = createTableRow(h.store || product.store || '', h.price, h.date, h.location || product.location || '');
        DOM.modalPriceHistoryTable.appendChild(tr);
      });
    }

    function closeModal() {
      DOM.modalOverlay.classList.remove('visible');
      document.body.classList.remove('modal-open');
    }

    // ========================================
    // Event Listeners
    // ========================================
    const debouncedRender = debounce(renderProducts, 180);
    DOM.searchBox.addEventListener('input', () => debouncedRender());
    DOM.categoryFilter.addEventListener('change', renderProducts);
    DOM.municipalityFilter.addEventListener('change', renderProducts);

    [DOM.dateFrom, DOM.dateTo].forEach(el => {
      if (el) {
        el.addEventListener('change', () => {
          renderProducts();
          const sel = DOM.productListEl.querySelector('.mb-3.selected');
          if (sel && sel.dataset && sel.dataset.pid) {
            showProduct(Number(sel.dataset.pid));
          } else {
            const first = DOM.productListEl.querySelector('.mb-3');
            if (first && first.dataset && first.dataset.pid) {
              first.classList.add('selected');
              showProduct(Number(first.dataset.pid));
            }
          }
        });
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeModal();
    });

    // ========================================
    // Initialization
    // ========================================
    loadProducts();
  </script>

  <?= view('partials/footer') ?>

</body>
</html>