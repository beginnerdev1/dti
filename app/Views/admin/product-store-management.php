<?= view('admin/head', ['title' => 'Product & Store Management — DTI Aurora']) ?>
<?= view('admin/header') ?>
<?= view('admin/sidebar') ?>

<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h2 class="mb-0">Product & Store Management</h2>
        <small class="text-muted">Manage monitored products and stores</small>
      </div>
      <div>
        <a href="<?= base_url('admin') ?>" class="btn btn-outline-secondary me-2"><i class="fa fa-arrow-left"></i> Back</a>
        <a href="#addProduct" class="btn btn-primary" data-bs-toggle="modal">Add Product</a>
      </div>
    </div>

    <div class="row g-3 mb-4 align-items-stretch">
      <div class="col-12 col-md-6">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Add Product</h5>
            <form>
              <div class="mb-2">
                <label class="form-label">Name</label>
                <input class="form-control" placeholder="Product name">
              </div>
              <div class="row">
                <div class="col-6 mb-2"><label class="form-label">Size</label><input class="form-control" placeholder="e.g., 1kg"></div>
                <div class="col-6 mb-2"><label class="form-label">Category</label><input class="form-control" placeholder="Category"></div>
              </div>
              <div class="mt-auto d-flex justify-content-end">
                <button class="btn btn-outline-secondary me-2" type="reset">Reset</button>
                <button class="btn btn-admin" type="submit">Save Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Add Store</h5>
            <form>
              <div class="mb-2"><label class="form-label">Name</label><input class="form-control" placeholder="Store name"></div>
              <div class="row">
                <div class="col-6 mb-2"><label class="form-label">Location</label><input class="form-control" placeholder="Address or barangay"></div>
                <div class="col-6 mb-2">
                  <label class="form-label">Municipality</label>
                  <select class="form-select">
                    <option selected>-- Select Municipality --</option>
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
        <div class="row g-2 align-items-end">
          <div class="col-12 col-md-4">
            <label class="form-label">Choose a Store</label>
            <select class="form-select">
              <option selected>-- Select Store --</option>
              <option>Store A</option>
              <option>Store B</option>
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">Choose a Product</label>
            <select class="form-select">
              <option selected>-- Select Product --</option>
              <option>Rice 1kg</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" placeholder="0.00" step="0.01">
          </div>
          <div class="col-6 col-md-2">
            <label class="form-label">Date</label>
            <input type="date" id="priceDate" class="form-control" value="<?= date('Y-m-d') ?>">
          </div>
        </div>
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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="7" class="text-center text-muted">No entries yet</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?= view('admin/footer') ?>
