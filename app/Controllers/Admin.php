<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProductModel;
use App\Models\StoreModel;
use App\Models\ProductPriceModel;

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

public function addShop()
{
    if ($this->request->getMethod() !== 'POST') {
        return $this->response
            ->setStatusCode(405)
            ->setJSON([
                'success' => false,
                'message' => 'Method not allowed'
            ]);
    }

    try {

        $data = [
            'name'            => trim($this->request->getPost('name')),
            'type'            => trim($this->request->getPost('type')),
            'location'        => trim($this->request->getPost('location')),
            'contact_number'  => trim($this->request->getPost('contact_number')),
            'description'     => trim($this->request->getPost('description')),
            'tags'            => trim($this->request->getPost('tags')),
            'created'         => date('Y-m-d H:i:s')
        ];

        // Validation
        if (empty($data['name']) || empty($data['location'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Shop name and location are required'
            ]);
        }

        $storeModel = new StoreModel();

        $insert = $storeModel->insert($data);

        if ($insert) {

            return $this->response->setJSON([
                'success' => true,
                'id'      => $insert,
                'message' => 'Shop added successfully'
            ]);

        } else {

            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to add shop'
            ]);
        }

    } catch (\Exception $e) {

        log_message('error', 'Add Shop Error: ' . $e->getMessage());

        return $this->response
            ->setStatusCode(500)
            ->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
    }
}
    public function getShops()
    {
        try {
            $storeModel = new StoreModel();
            $shops = $storeModel->findAll();

            return $this->response->setJSON($shops);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching shops: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to fetch shops']);
        }
    }
}