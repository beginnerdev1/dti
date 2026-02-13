<?php
// Data is loaded via API endpoints from the controller
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Price Comparison - DTI AURORA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <style>
    .analytics-wrap{display:flex;gap:20px;align-items:flex-start}
    .left-analytics{flex:1 1 60%;background:#fff;border-radius:10px;padding:20px;box-shadow:0 6px 18px rgba(0,0,0,0.06)}
    .right-analytics{width:420px;max-height:660px;overflow:auto;padding:8px 6px 12px 12px;display:block}
    #miniList{width:100%;display:grid;grid-template-columns:repeat(2,170px);gap:12px;justify-content:end;align-content:start;box-sizing:border-box;padding-right:6px}
    .mini-card{background:#fff;border-radius:10px;padding:10px;margin:0;box-sizing:border-box;display:flex;flex-direction:column;align-items:center;justify-content:flex-start;width:170px;height:170px;border:2px solid transparent;cursor:pointer}
    .mini-card.active{border-color:#ff6b4a;box-shadow:0 6px 18px rgba(255,107,74,0.12)}
    .mini-canvas{width:140px;height:140px;display:block;margin-top:6px}
    .chart-legend{margin-top:12px}
    .product-title{font-weight:600;font-size:0.95rem}
    .scroll-area{padding-right:6px}
    @media(max-width:900px){.analytics-wrap{flex-direction:column}.right-analytics{width:100%;max-height:260px;display:flex;flex-direction:row;overflow-x:auto;gap:8px}}
  </style>
</head>
<body>
  <header class="site-header">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
        <div class="d-flex align-items-center">
          <img src="<?= base_url('images/dti-logo.png') ?>" alt="DTI logo" class="site-logo me-3" />
          <div>
            <h4 class="mb-0">Price Monitoring - DTI AURORA</h4>
            <div class="header-sub">The Official Website of DTI Aurora Price Monitoring System</div>
          </div>
        </div>
      </div>
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('infos') ?>"><i class="bi bi-info-circle pe-2" aria-hidden="true"></i>Infos</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('monitoring') ?>"><i class="bi bi-bar-chart-line pe-2" aria-hidden="true"></i>Price Monitoring</a></li>
        <li class="nav-item"><a class="nav-link px-3 active" href="<?= base_url('price-comparison') ?>"><i class="bi bi-arrow-left-right pe-2" aria-hidden="true"></i>Price Comparison</a></li>
      </ul>
    </div>
  </header>

  <main class="container py-4">
    <h2 class="mb-3">Price Comparison — Analytics.</h2>

    <div class="analytics-wrap">
      <div class="left-analytics">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div><strong id="mainTitle">Select a product</strong><div class="small text-muted" id="mainSubtitle">Click a chart on the right</div></div>
          <div>
            <select id="timeRange" class="form-select form-select-sm">
              <option value="all">All dates</option>
              <option value="30">Last 30</option>
              <option value="14">Last 14</option>
              <option value="7" selected>Last 7</option>
            </select>
          </div>
        </div>
        <div style="height:360px;position:relative">
          <canvas id="mainChart"></canvas>
        </div>
        <div class="chart-legend small text-muted">Click a small chart to highlight and compare</div>
      </div>

      <div class="right-analytics scroll-area">
        <div id="miniList"></div>
      </div>
    </div>

  </main>

  <script>
    // Build `products` from API endpoint
    let products = [];
    
    async function loadProducts() {
      try {
        const response = await fetch('<?= base_url('api/price-comparison/products') ?>');
        products = await response.json();
        renderMiniCards();
        if(products.length) setActiveProduct(0);
        
        // Setup event listener for time range
        timeRange.addEventListener('change', ()=>{
          const active = miniList.querySelector('.mini-card.active');
          if(active && active.dataset.type === 'product') {
            updateMainChart(products[Number(active.dataset.index)]);
          }
        });
      } catch (error) {
        console.error('Error loading products:', error);
      }
    }

    // Helper: format dates nicely (assumes YYYY-MM-DD)
    function fmtDate(d){ if(!d) return ''; try { const dt = new Date(d); return dt.toLocaleDateString(undefined,{month:'short',day:'numeric'}); } catch(e){ return d; } }

    // Create mini cards and charts (widgets + product minis)
    const miniList = document.getElementById('miniList');
    const mainTitle = document.getElementById('mainTitle');
    const mainSubtitle = document.getElementById('mainSubtitle');
    const timeRange = document.getElementById('timeRange');
    let mainChart=null;
    const miniCharts = [];

    const PALETTE = ['#2ecc71','#ff6b4a','#f6c23e','#6c5ce7','#00a8ff','#fd79a8'];

    // Build some analytic widgets (aggregations) from products
    function buildWidgets(){
      // category distribution (pie)
      const catMap = {};
      products.forEach(p=>{ const c=(p.category||'').trim()||'Uncategorized'; catMap[c]=(catMap[c]||0)+1; });
      const catLabels = Object.keys(catMap);
      const catValues = catLabels.map(k=>catMap[k]);

      // price histogram buckets (bar)
      const allPrices = products.flatMap(p=>p.priceHistory? p.priceHistory.map(h=>h.price||0):[]).filter(v=>v>0);
      const buckets = [0,20,40,60,80,100];
      const bucketCounts = buckets.map((b,i)=>0);
      allPrices.forEach(v=>{ for(let i=buckets.length-1;i>=0;i--){ if(v>=buckets[i]){ bucketCounts[i]++; break; } } });
      const bucketLabels = buckets.map(b=> '≥' + b);

      // top performers: count which store is the cheapest latest seller across products
      const storeCounts = {};
      products.forEach(p=>{
        const byStoreLatest = {};
        (p.priceHistory||[]).forEach(h=>{
          const key = (h.store||'').trim() + (h.location? ' — ' + h.location : '');
          // keep latest per store by date
          if(!byStoreLatest[key] || (h.date && byStoreLatest[key].date < h.date)) byStoreLatest[key] = {price: h.price||0, date: h.date};
        });
        const entries = Object.entries(byStoreLatest).map(([k,v])=>({store:k,price: Number(v.price||0)}));
        if(entries.length){
          entries.sort((a,b)=> a.price - b.price);
          const winner = entries[0].store;
          storeCounts[winner] = (storeCounts[winner]||0) + 1;
        }
      });
      const topStores = Object.keys(storeCounts).sort((a,b)=> storeCounts[b]-storeCounts[a]);
      const topStoreValues = topStores.map(s=> storeCounts[s]);

      // recent average trend (line) using average of last 7 days if present
      // For simplicity, build a small aggregated timeseries using available dates
      const dateMap = {};
      products.forEach(p=> (p.priceHistory||[]).forEach(h=>{ if(!h.date) return; dateMap[h.date] = dateMap[h.date] || []; dateMap[h.date].push(h.price||0); }));
      const dates = Object.keys(dateMap).sort();
      const trendLabels = dates.slice(-7).map(d=>fmtDate(d));
      const trendValues = dates.slice(-7).map(d=> { const arr = dateMap[d]||[]; if(!arr.length) return 0; return Number((arr.reduce((s,x)=>s+(x||0),0)/arr.length).toFixed(2)); });

      const widgets = [
        {id:'cat_dist',title:'Category Distribution',type:'doughnut',labels:catLabels,values:catValues},
        {id:'price_hist',title:'Price Buckets',type:'bar',labels:bucketLabels,values:bucketCounts},
        {id:'top_performers',title:'Top Cheapest Stores',type:'bar',labels:topStores,values:topStoreValues},
        {id:'recent_trend',title:'Recent Averages',type:'line',labels:trendLabels,values:trendValues}
      ];
      // attach color arrays to widgets
      widgets.forEach(w=>{ w.colors = PALETTE.slice(0, Math.max(1, w.labels.length)); });
      return widgets;
    }

    function renderMiniCards(){
      miniList.innerHTML='';
      const widgets = buildWidgets();
      // render widget cards first
      widgets.forEach((w,wi)=>{
        const div = document.createElement('div'); div.className='mini-card'; div.dataset.type='widget'; div.dataset.wi=wi;
        div.innerHTML = `<div class="product-title small" style="text-align:center;font-size:13px;line-height:1.1">${w.title}</div><canvas class="mini-canvas" id="widget_${w.id}" width="140" height="140"></canvas>`;
        miniList.appendChild(div);
      });

      // render product cards after widgets
      products.forEach((p,idx)=>{
        const div = document.createElement('div'); div.className='mini-card'; div.dataset.type='product'; div.dataset.index=idx;
        // show product title and small meta; per-product chart removed as requested
        div.innerHTML = `<div class="product-title small" style="text-align:center;font-size:13px;line-height:1.1">${p.name || 'Unnamed'}</div><div class="small text-muted" style="font-size:11px;text-align:center;margin-top:6px">${p.category || ''} ${p.unit||''}</div>`;
        miniList.appendChild(div);
      });

      // draw widget charts
      const widgetsAfter = buildWidgets(); // rebuild to use same computed values
      widgetsAfter.forEach((w,wi)=>{
        const ctx = document.getElementById('widget_'+w.id).getContext('2d');
        const cfg = new Chart(ctx, {type:w.type,data:{labels:w.labels,datasets:[{data:w.values,backgroundColor:w.colors,borderWidth:0}]},options:{maintainAspectRatio:false,plugins:{legend:{display:false}},scales: w.type==='bar'?{x:{display:false},y:{display:false}}:{}}});
        miniCharts.push(cfg);
      });

      // per-product mini charts have been removed — product cards now show title and meta only

      // attach click handlers for both widgets and product cards
      miniList.querySelectorAll('.mini-card').forEach(el=>{
        el.addEventListener('click', ()=>{
          if(el.dataset.type==='widget'){
            setActiveWidget(Number(el.dataset.wi));
          } else {
            setActiveProduct(Number(el.dataset.index));
          }
        });
      });
    }

    function setActiveProduct(idx){
      miniList.querySelectorAll('.mini-card').forEach((c,i)=> c.classList.toggle('active', c.dataset.type==='product' && Number(c.dataset.index)===idx));
      // clear widget active states
      miniList.querySelectorAll('.mini-card').forEach(c=>{ if(c.dataset.type==='widget') c.classList.remove('active'); });
      const p = products[idx];
      mainTitle.textContent = p.name || 'Product';
      mainSubtitle.textContent = p.category || '';
      updateMainChart(p);
    }

    function setActiveWidget(wi){
      miniList.querySelectorAll('.mini-card').forEach((c,i)=> c.classList.toggle('active', c.dataset.type==='widget' && Number(c.dataset.wi)===wi));
      // clear product active states
      miniList.querySelectorAll('.mini-card').forEach(c=>{ if(c.dataset.type==='product') c.classList.remove('active'); });
      const widgets = buildWidgets();
      const w = widgets[wi];
      mainTitle.textContent = w.title;
      mainSubtitle.textContent = 'Aggregate view';
      // show aggregate in main chart according to widget type, reuse widget colors
      const ctx = document.getElementById('mainChart').getContext('2d');
      if(mainChart) mainChart.destroy();
      const ds = {};
      if(w.type === 'line'){
        ds.label = w.title;
        ds.data = w.values;
        ds.borderColor = w.colors[0] || '#09203f';
        ds.backgroundColor = 'rgba(0,0,0,0)';
        ds.tension = 0.2;
      } else {
        ds.data = w.values;
        ds.backgroundColor = w.colors;
        ds.borderColor = w.colors;
      }
      mainChart = new Chart(ctx, {type:w.type,data:{labels:w.labels,datasets:[ds]},options:{responsive:true,maintainAspectRatio:false}});
    }

    function updateMainChart(p){
      const maxPoints = (timeRange.value==='all') ? Infinity : Number(timeRange.value);
      let hist = (p.priceHistory||[]).slice();
      if(maxPoints !== Infinity && hist.length > maxPoints) hist = hist.slice(-maxPoints);
      const labels = hist.map(h=>fmtDate(h.date));
      const data = hist.map(h=>h.price || 0);
      const ctx = document.getElementById('mainChart').getContext('2d');
      if(mainChart) mainChart.destroy();
      mainChart = new Chart(ctx, {type:'line',data:{labels,datasets:[{label:'Price (PHP)',data,borderColor:'#09203f',backgroundColor:'rgba(9,32,63,0.06)',tension:0.2,pointRadius:4}]},options:{responsive:true,maintainAspectRatio:false,scales:{y:{ticks:{callback:v=> '₱' + Number(v).toFixed(2)}}}}});
    }

    // initialize
    loadProducts();
  </script>

</body>
</html> 