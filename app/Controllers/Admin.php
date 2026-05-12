<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\RegistrationModel;
use App\Models\ShopModel;

class Admin extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    // --------------------------------------------------------------
    //  SHOPS
    // --------------------------------------------------------------
  public function getShops()
{
    try {
        $shopModel = new ShopModel();
        $shops = $shopModel
            ->select('carp_shops.*, (SELECT COUNT(*) FROM carp_shop_products WHERE carp_shop_id = carp_shops.id) AS products_count')
            ->orderBy('id', 'DESC')
            ->findAll();

        return $this->response->setJSON($shops);
    } catch (\Exception $e) {
        log_message('error', 'Admin|getShops error: ' . $e->getMessage());
        return $this->response->setJSON([]);
    }
}

    public function addShop()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed',
            ]);
        }

        $data = [
            'name'           => trim($this->request->getPost('name')),
            'type'           => trim($this->request->getPost('type')),
            'location'       => trim($this->request->getPost('location')),
            'contact_number' => trim($this->request->getPost('contact_number')),
            'description'    => trim($this->request->getPost('description')),
            'tags'           => trim($this->request->getPost('tags')),
            'status'         => 'active',
        ];

        if (empty($data['name']) || empty($data['location'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Shop name and location are required',
            ]);
        }

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/shops', $newName);
            $data['image'] = 'uploads/shops/' . $newName;
        }

        try {
            $shopModel = new ShopModel();
            $insertId = $shopModel->insert($data);

            if ($insertId === false) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to add shop',
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'id'      => $insertId,
                'message' => 'Shop added successfully',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Admin|addShop error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while adding the shop',
            ]);
        }
    }

    public function editShop()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed',
            ]);
        }

        $shopId = $this->request->getPost('id');
        if (empty($shopId)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Shop ID is required',
            ]);
        }

        $data = [
            'name'           => trim($this->request->getPost('name')),
            'type'           => trim($this->request->getPost('type')),
            'location'       => trim($this->request->getPost('location')),
            'contact_number' => trim($this->request->getPost('contact_number')),
            'description'    => trim($this->request->getPost('description')),
            'tags'           => trim($this->request->getPost('tags')),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/shops', $newName);
            $data['image'] = 'uploads/shops/' . $newName;
        }

        try {
            $shopModel = new ShopModel();
            if (!$shopModel->find($shopId)) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'message' => 'Shop not found',
                ]);
            }

            $updated = $shopModel->update($shopId, $data);
            if ($updated === false) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to update shop',
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Shop updated successfully',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Admin|editShop error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the shop',
            ]);
        }
    }

    public function deleteShop()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed',
            ]);
        }

        $shopId = $this->request->getPost('id');
        if (empty($shopId)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Shop ID is required',
            ]);
        }

        try {
            $shopModel = new ShopModel();
            if (!$shopModel->find($shopId)) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'message' => 'Shop not found',
                ]);
            }

            $shopModel->delete($shopId);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Shop deleted successfully',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Admin|deleteShop error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while deleting the shop',
            ]);
        }
    }

    // --------------------------------------------------------------
    //  PRODUCTS
    // --------------------------------------------------------------
    public function getProducts()
    {
        try {
            $productModel = new ProductModel();
            $products = $productModel
                ->select('carp_shop_products.*, carp_shops.name AS shop_name')
                ->join('carp_shops', 'carp_shops.id = carp_shop_products.carp_shop_id', 'left')
                ->orderBy('carp_shop_products.id', 'DESC')
                ->findAll();

            return $this->response->setJSON($products);
        } catch (\Exception $e) {
            log_message('error', 'Admin|getProducts error: ' . $e->getMessage());
            return $this->response->setJSON([]);
        }
    }

    public function addProduct()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed',
            ]);
        }

        $shopId = $this->request->getPost('carp_shop_id');
        $data = [
            'carp_shop_id' => $shopId,
            'name'         => trim($this->request->getPost('name')),
            'price'        => trim($this->request->getPost('price')),
            'category'     => trim($this->request->getPost('category')),
            'description'  => trim($this->request->getPost('description')),
            'tags'         => trim($this->request->getPost('tags')),
            'status'       => 'active',
        ];

        if (empty($shopId) || empty($data['name']) || $data['price'] === '') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Shop, name, and price are required',
            ]);
        }

        $shopModel = new ShopModel();
        if (!$shopModel->find($shopId)) {
            return $this->response->setStatusCode(404)->setJSON([
                'success' => false,
                'message' => 'Shop not found',
            ]);
        }

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/products', $newName);
            $data['image'] = 'uploads/products/' . $newName;
        }

        try {
            $productModel = new ProductModel();
            $insertId = $productModel->insert($data);

            if ($insertId === false) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to add product',
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'id'      => $insertId,
                'message' => 'Product added successfully',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Admin|addProduct error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while adding the product',
            ]);
        }
    }

    public function editProduct()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed',
            ]);
        }

        $productId = $this->request->getPost('id');
        if (empty($productId)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Product ID is required',
            ]);
        }

        $shopId = $this->request->getPost('carp_shop_id');
        $data = [
            'carp_shop_id' => $shopId,
            'name'         => trim($this->request->getPost('name')),
            'price'        => trim($this->request->getPost('price')),
            'category'     => trim($this->request->getPost('category')),
            'description'  => trim($this->request->getPost('description')),
            'tags'         => trim($this->request->getPost('tags')),
        ];

        if (!empty($shopId)) {
            $shopModel = new ShopModel();
            if (!$shopModel->find($shopId)) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'message' => 'Shop not found',
                ]);
            }
        }

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/products', $newName);
            $data['image'] = 'uploads/products/' . $newName;
        }

        try {
            $productModel = new ProductModel();
            if (!$productModel->find($productId)) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'message' => 'Product not found',
                ]);
            }

            $updated = $productModel->update($productId, $data);
            if ($updated === false) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to update product',
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Product updated successfully',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Admin|editProduct error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the product',
            ]);
        }
    }

    public function deleteProduct()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed',
            ]);
        }

        $productId = $this->request->getPost('id');
        if (empty($productId)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Product ID is required',
            ]);
        }

        try {
            $productModel = new ProductModel();
            if (!$productModel->find($productId)) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'message' => 'Product not found',
                ]);
            }

            $productModel->delete($productId);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Product deleted successfully',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Admin|deleteProduct error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while deleting the product',
            ]);
        }
    }

    // --------------------------------------------------------------
    //  REGISTRATIONS
    // --------------------------------------------------------------
    public function getRegistrations()
    {
        try {
            $registrationModel = new RegistrationModel();
            $registrations = $registrationModel->orderBy('id', 'DESC')->findAll();
            return $this->response->setJSON($registrations);
        } catch (\Exception $e) {
            log_message('error', 'Admin|getRegistrations error: ' . $e->getMessage());
            return $this->response->setJSON([]);
        }
    }

    public function approveRegistration()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed',
            ]);
        }

        $registrationId = $this->request->getPost('id');
        if (empty($registrationId)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Registration ID is required',
            ]);
        }

        try {
            $registrationModel = new RegistrationModel();
            $registration = $registrationModel->find($registrationId);
            if (!$registration) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'message' => 'Registration not found',
                ]);
            }

            $shopData = [
                'name'           => $registration['name'],
                'type'           => $registration['type'] ?? null,
                'location'       => $registration['location'] ?? null,
                'contact_number' => $registration['contact_number'] ?? null,
                'description'    => $registration['description'] ?? null,
                'tags'           => $registration['tags'] ?? null,
                'status'         => 'active',
            ];

            $shopModel = new ShopModel();
            $insertId = $shopModel->insert($shopData);

            if ($insertId === false) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to create shop from registration',
                ]);
            }

            $registrationModel->update($registrationId, ['status' => 'approved']);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Registration approved and shop created',
                'id'      => $insertId,
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Admin|approveRegistration error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while approving registration',
            ]);
        }
    }

    public function rejectRegistration()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed',
            ]);
        }

        $registrationId = $this->request->getPost('id');
        if (empty($registrationId)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Registration ID is required',
            ]);
        }

        try {
            $registrationModel = new RegistrationModel();
            if (!$registrationModel->find($registrationId)) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'message' => 'Registration not found',
                ]);
            }

            $registrationModel->update($registrationId, ['status' => 'rejected']);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Registration rejected',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Admin|rejectRegistration error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while rejecting registration',
            ]);
        }
    }
}