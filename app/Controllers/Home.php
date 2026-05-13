<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ShopModel;
use App\Models\ProductModel;

class Home extends BaseController
{
public function index()
{
    // Featured products (latest 4)
    if ($this->request->getGet('json') === 'products') {
        $productModel = new \App\Models\ProductModel();
        $products = $productModel->where('status', 'active')
                                 ->orderBy('created_at', 'DESC')
                                 ->limit(4)
                                 ->findAll();
        foreach ($products as &$p) {
            $p['image'] = !empty($p['image']) ? base_url($p['image']) : null;
        }
        return $this->response->setJSON(['status' => 200, 'products' => $products]);
    }

    // All products (complete directory)
    if ($this->request->getGet('json') === 'all_products') {
        $productModel = new \App\Models\ProductModel();
        $products = $productModel->where('status', 'active')
                                 ->orderBy('name', 'ASC')
                                 ->findAll();
        foreach ($products as &$p) {
            $p['image'] = !empty($p['image']) ? base_url($p['image']) : null;
        }
        return $this->response->setJSON(['status' => 200, 'products' => $products]);
    }

    // All shops (full brochure)
    if ($this->request->getGet('json') === 'all_shops') {
        $shopModel = new \App\Models\ShopModel();
        $shops = $shopModel->where('status', 'active')
                           ->orderBy('name', 'ASC')
                           ->findAll();
        foreach ($shops as &$s) {
            $s['tags']  = !empty($s['tags']) ? explode(',', $s['tags']) : [];
            $s['image'] = !empty($s['image']) ? base_url($s['image']) : null;
        }
        return $this->response->setJSON(['status' => 200, 'shops' => $shops]);
    }

    // Existing limited shops (optional, keep for legacy)
    if ($this->request->getGet('json') === 'shops') {
        // ... your existing limited shops code
    }

    return view('home');
}
    public function home()
    {
        return view('home');
    }

    public function aboutus()
    {
        return view('aboutus');
    }

public function shops()
{
    $model = new \App\Models\ShopModel();
    $perPage = 9;
    $page = (int) ($this->request->getGet('page') ?? 1);

    // Count BEFORE paginate consumes/resets the builder
    $total = $model->where('status', 'active')->countAllResults(false);

    // Re-apply the where clause — paginate() resets it internally
    $shops = $model
        ->where('status', 'active')   // ← must repeat this
        ->orderBy('name', 'ASC')
        ->paginate($perPage, 'default', $page);

    foreach ($shops as &$shop) {
        $shop['tags']  = !empty($shop['tags']) ? explode(',', $shop['tags']) : [];
        $shop['image'] = !empty($shop['image']) ? base_url($shop['image']) : null;
    }

    if ($this->request->getGet('json')) {
        return $this->response->setJSON([
            'status'  => 200,
            'data'    => $shops,
            'total'   => $total,
            'page'    => $page,
            'perPage' => $perPage,
        ]);
    }

    return view('shops');
}

// In your controller
public function brochure()
{
    $id = (int) $this->request->getGet('id');
    if (!$id) return redirect()->to(base_url('shops'));

    $shopModel    = new \App\Models\ShopModel();
    $productModel = new \App\Models\ProductModel();

    $shop = $shopModel->where('status', 'active')->find($id);
    if (!$shop) {
        // Return JSON error if JS is asking
        if ($this->request->getGet('json')) {
            return $this->response->setJSON(['status' => 404, 'message' => 'Shop not found']);
        }
        return redirect()->to(base_url('shops'));
    }

    // Normalize
    $shop['tags']  = !empty($shop['tags']) ? explode(',', $shop['tags']) : [];
    $shop['image'] = !empty($shop['image']) ? base_url($shop['image']) : null;

    $products = $productModel->where('carp_shop_id', $id)
                             ->where('status', 'active')
                             ->orderBy('name', 'ASC')
                             ->findAll();

    foreach ($products as &$p) {
        $p['tags']  = !empty($p['tags']) ? explode(',', $p['tags']) : [];
        $p['image'] = !empty($p['image']) ? base_url($p['image']) : null;
    }

    // JSON for JS fetch
    if ($this->request->getGet('json')) {
        return $this->response->setJSON([
            'status'   => 200,
            'shop'     => $shop,
            'products' => $products,
        ]);
    }

    // Normal page load — view needs no PHP variables now
    return view('brochure');
}
}
