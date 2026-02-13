<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProductModel;
use App\Models\StoreModel;
use App\Models\ProductPriceModel;

class Admin extends BaseController
{
    protected $usersModel;
    protected $productModel;
    protected $storeModel;
    protected $productPriceModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->productModel = new ProductModel();
        $this->storeModel = new StoreModel();
        $this->productPriceModel = new ProductPriceModel();
    }

    public function login()
    {
        return view('admin/login');
    }

    // Handle login form submission
    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Get user from database
        $user = $this->usersModel->where('username', $username)->where('is_active', 1)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'admin_logged_in' => true,
                'user_id' => $user['id'],
                'username' => $user['username']
            ]);
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    //handle if the user is logged in or not
    public function dashboard()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        return view('admin/dashboard');
    }

    public function productStoreManagement()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        // Load stores and products for the price-entry search lists
        $stores = $this->storeModel->select('id,name')->orderBy('name', 'ASC')->findAll();
        $products = $this->productModel->select('id,name,size')->orderBy('name', 'ASC')->findAll();

        // Load recent price entries with joined product and store info
        $prices = $this->productPriceModel
            ->select('product_price.id, product_price.price, product_price.date, product.id as product_id, product.name as product_name, product.size as product_size, product.category as product_category, store.id as store_id, store.name as store_name, store.location as store_location')
            ->join('product', 'product.id = product_price.product_id')
            ->join('store', 'store.id = product_price.store_id')
            ->orderBy('product_price.date', 'DESC')
            ->findAll();

        $data = [
            'stores'   => $stores,
            'products' => $products,
            'prices'   => $prices,
        ];

        return view('admin/product-store-management', $data);
    }

    public function saveProduct()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'size' => $this->request->getPost('size'),
            'category' => $this->request->getPost('category'),
        ];

        $insertId = $this->productModel->saveProduct($data);

        if ($insertId) {
            return redirect()->to('/admin/product-store-management')->with('success', 'Product added successfully');
        } else {
            return redirect()->to('/admin/product-store-management')->with('error', 'Failed to add product. Please check your input.');
        }
    }

    // Save store (name, location, municipality) to store table
    public function saveStore()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'municipality' => $this->request->getPost('municipality'),
        ];

        if (empty($data['name']) || empty($data['location']) || empty($data['municipality'])) {
            return redirect()->back()->with('error', 'Please fill in all store fields')->withInput();
        }

        try {
            $insertId = $this->storeModel->saveStore($data);
            if ($insertId) {
                return redirect()->back()->with('success', 'Store saved successfully');
            }
            return redirect()->back()->with('error', 'Failed to save store');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save store');
        }
    }

    // Save price entry to product_price table
    public function savePrice()
    {
        if (! session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $storeId = $this->request->getPost('store_id');
        $productId = $this->request->getPost('product_id');
        $storeName = $this->request->getPost('store_search');
        $productName = $this->request->getPost('product_search');
        $price = $this->request->getPost('price');
        $date = $this->request->getPost('date');

        if (empty($price) || ($price !== '0' && $price === null)) {
            return redirect()->back()->with('error', 'Please fill store, product and price');
        }

        // Prefer IDs (set by client-side mapping). Fallback to name matching.
        $store = null;
        $product = null;

        if (! empty($storeId) && is_numeric($storeId)) {
            $store = $this->storeModel->find((int)$storeId);
        } elseif (! empty($storeName)) {
            $store = $this->storeModel->where('name', $storeName)->first();
        }

        if (! empty($productId) && is_numeric($productId)) {
            $product = $this->productModel->find((int)$productId);
        } elseif (! empty($productName)) {
            // Try exact match first
            $product = $this->productModel->where('name', $productName)->first();
            // If not found, strip parenthesis (size) and try again
            if (! $product) {
                $clean = preg_replace('/\s*\(.*\)$/', '', $productName);
                if ($clean !== $productName) {
                    $product = $this->productModel->where('name', $clean)->first();
                }
            }
        }

        if (! $store || ! $product) {
            return redirect()->back()->with('error', 'Store or product not found. Please select from the suggestions.');
        }

        $data = [
            'store_id' => $store['id'],
            'product_id' => $product['id'],
            'price' => $price,
            'date' => $date ?? date('Y-m-d'),
        ];

        try {
            $id = $this->productPriceModel->insert($data);
            if ($id) {
                return redirect()->back()->with('success', 'Price entry saved');
            }
            return redirect()->back()->with('error', 'Failed to save price entry');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save price entry');
        }
    }
}