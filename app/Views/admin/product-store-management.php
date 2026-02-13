<?= view('admin/head', ['title' => 'Product & Store Management — DTI Aurora']) ?>
<?= view('admin/header') ?>
<?= view('admin/sidebar') ?>

<main class="main-content">
  <div class="container-fluid">
    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>
    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h2 class="mb-0">Product & Store Management</h2>
        <small class="text-muted">Manage monitored products and stores</small>
      </div>
    </div>

    <div class="row g-3 mb-4 align-items-stretch">
      <div class="col-12 col-md-6">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Add Product</h5>
            <form method="post" action="<?= site_url('admin/saveProduct') ?>">
              <?= csrf_field() ?>
              <div class="mb-2">
                <label class="form-label">Name</label>
                <input name="name" class="form-control" placeholder="Product name" required>
              </div>
              <div class="row">
                <div class="col-6 mb-2"><label class="form-label">Size</label><input name="size" class="form-control" placeholder="e.g., 1kg" required></div>
                <div class="col-6 mb-2"><label class="form-label">Category</label><input name="category" class="form-control" placeholder="Category" required></div>
              </div>
              <div class="mt-auto d-flex justify-content-end">
                <button class="btn btn-outline-secondary me-2" type="reset">Reset</button>
                <button class="btn btn-admin" type="submit">Save Product</button>
              </div>
                </form>
                <script>
                  // Build maps of display -> id from server-side data
                  (function(){
                    var storeMap = {};
                    var productMap = {};
                    <?php if (! empty($stores) && is_array($stores)): ?>
                      <?php foreach ($stores as $s): ?>
                        storeMap[<?= json_encode($s['name']) ?>] = <?= (int)$s['id'] ?>;
                      <?php endforeach ?>
                    <?php endif ?>
                    <?php if (! empty($products) && is_array($products)): ?>
                      <?php foreach ($products as $p):
                          $display = $p['name'] . (isset($p['size']) && $p['size'] ? ' (' . $p['size'] . ')' : '');
                      ?>
                        productMap[<?= json_encode($display) ?>] = <?= (int)$p['id'] ?>;
                      <?php endforeach ?>
                    <?php endif ?>

                    var storeInput = document.getElementById('store_search');
                    var productInput = document.getElementById('product_search');
                    var storeIdEl = document.getElementById('store_id');
                    var productIdEl = document.getElementById('product_id');

                    function setStoreId(){
                      var v = storeInput.value || '';
                      storeIdEl.value = storeMap[v] ? storeMap[v] : '';
                    }
                    function setProductId(){
                      var v = productInput.value || '';
                      productIdEl.value = productMap[v] ? productMap[v] : '';
                    }

                    storeInput.addEventListener('input', setStoreId);
                    storeInput.addEventListener('change', setStoreId);
                    productInput.addEventListener('input', setProductId);
                    productInput.addEventListener('change', setProductId);
                  })();
                </script>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Add Store</h5>
            <form method="post" action="<?= site_url('admin/saveStore') ?>">
              <?= csrf_field() ?>
              <div class="mb-2"><label class="form-label">Name</label><input name="name" class="form-control" placeholder="Store name" required></div>
              <div class="row">
                <div class="col-6 mb-2"><label class="form-label">Location</label><input name="location" class="form-control" placeholder="Address or barangay" required></div>
                <div class="col-6 mb-2">
                  <label class="form-label">Municipality</label>
                  <select name="municipality" class="form-select" required>
                    <option selected value="">-- Select Municipality --</option>
                    <option value="Dingalan">Dingalan</option>
                    <option value="Maria Aurora">Maria Aurora</option>
                    <option value="San Luis">San Luis</option>
                    <option value="Baler">Baler</option>
                    <option value="Dipaculao">Dipaculao</option>
                    <option value="Dinalungan">Dinalungan</option>
                    <option value="Casiguran">Casiguran</option>
                    <option value="Dilasag">Dilasag</option>
                  </select>
                </div>
              </div>
              <div class="mt-auto d-flex justify-content-end">
                <button class="btn btn-outline-secondary me-2" type="reset">Reset</button>
                <button class="btn btn-admin" type="submit">Save Store</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-body">
        <h6 class="card-title">Price Entry</h6>
        <form method="post" action="<?= site_url('admin/savePrice') ?>">
          <?= csrf_field() ?>
          <div class="row g-2 align-items-end">
          <div class="col-12 col-md-4">
            <label class="form-label">Choose a Store</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa fa-search"></i></span>
              <input list="storeList" id="store_search" name="store_search" class="form-control" placeholder="Search or select store...">
              <input type="hidden" name="store_id" id="store_id">
            </div>
            <datalist id="storeList">
              <?php if (! empty($stores) && is_array($stores)): ?>
                <?php foreach ($stores as $s): ?>
                  <option value="<?= esc($s['name']) ?>">
                <?php endforeach ?>
              <?php endif ?>
            </datalist>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">Choose a Product</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa fa-search"></i></span>
              <input list="productList" id="product_search" name="product_search" class="form-control" placeholder="Search or select product...">
              <input type="hidden" name="product_id" id="product_id">
            </div>
            <datalist id="productList">
              <?php if (! empty($products) && is_array($products)): ?>
                <?php foreach ($products as $p):
                    $display = esc($p['name']) . (isset($p['size']) && $p['size'] ? ' (' . esc($p['size']) . ')' : '');
                ?>
                  <option value="<?= $display ?>">
                <?php endforeach ?>
              <?php endif ?>
            </datalist>
          </div>
          <div class="col-6 col-md-2">
            <label class="form-label">Price</label>
            <input name="price" type="number" class="form-control" placeholder="0.00" step="0.01" required>
          </div>
          <div class="col-4 col-md-2">
            <label class="form-label">Date</label>
            <input name="date" type="date" id="priceDate" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
          </div>
          <div class="col-2 col-md-2 d-grid">
            <button type="submit" class="btn btn-admin">Submit</button>
          </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h6 class="card-title text-center">Table</h6>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Store Name</th>
                <th>Location</th>
                <th>Product Name</th>
                <th>Product Size</th>
                <th>Product Price</th>
                <th>Product Category</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (! empty($prices) && is_array($prices)): ?>
                <?php foreach ($prices as $r): ?>
                  <tr>
                    <td><?= esc($r['store_name'] ?? '') ?></td>
                    <td><?= esc($r['store_location'] ?? '') ?></td>
                    <td><?= esc($r['product_name'] ?? '') ?></td>
                    <td><?= esc($r['product_size'] ?? '') ?></td>
                    <td><?= number_format((float) ($r['price'] ?? 0), 2) ?></td>
                    <td><?= esc($r['product_category'] ?? '') ?></td>
                    <td><?= esc($r['date'] ?? '') ?></td>
                    <td>
                      <a href="<?= site_url('admin/editPrice/' . ($r['id'] ?? 0)) ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                        <i class="fa fa-pen" aria-hidden="true"></i>
                      </a>
                      <a href="<?= site_url('admin/deletePrice/' . ($r['id'] ?? 0)) ?>" class="btn btn-sm btn-danger ms-1" title="Delete" onclick="return confirm('Delete this entry?')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <tr>
                  <td colspan="7" class="text-center text-muted">No entries yet</td>
                </tr>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?= view('admin/footer') ?>
