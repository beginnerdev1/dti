<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProductModel;

class Admin extends BaseController
{
    protected $usersModel;
    protected $productModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->productModel = new ProductModel();
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

        return view('admin/product-store-management');
    }

    // Save product (name, size, category) to product table
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

        // basic validation
        if (empty($data['name']) || empty($data['size']) || empty($data['category'])) {
            return redirect()->back()->with('error', 'Please fill in all product fields')->withInput();
        }

        try {
            $this->productModel->insert($data);
            return redirect()->back()->with('success', 'Product saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save product');
        }
    }
}