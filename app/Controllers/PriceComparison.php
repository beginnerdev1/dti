<?php

namespace App\Controllers;

use CodeIgniter\Database\Database;

class PriceComparison extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('admin/price_comparison');
    }

    // API endpoint to get all products with price history
    public function getProducts()
    {
        try {
            $products = $this->db->table('product p')
                ->select('p.id AS pid, p.name AS pname, p.category, p.size, s.name AS store_name, s.municipality, s.location, ph.price, ph.date')
                ->join('product_price ph', 'ph.product_id = p.id', 'left')
                ->join('store s', 'ph.store_id = s.id', 'left')
                ->orderBy('p.id ASC, ph.date ASC')
                ->get()
                ->getResultArray();

            $out = [];
            foreach ($products as $r) {
                $key = ($r['pid'] ?? '') . '||' . ($r['size'] ?? '');
                if (!isset($out[$key])) {
                    $out[$key] = [
                        'id' => $r['pid'] ?? null,
                        'name' => $r['pname'] ?? '',
                        'category' => $r['category'] ?? '',
                        'unit' => $r['size'] ?? '',
                        'priceHistory' => [],
                    ];
                }
                if ($r['price'] !== null) {
                    $out[$key]['priceHistory'][] = [
                        'date' => $r['date'] ?? '',
                        'price' => is_numeric($r['price']) ? (float)$r['price'] : null,
                        'store' => $r['store_name'] ?? '',
                        'location' => $r['location'] ?? '',
                        'municipality' => $r['municipality'] ?? ''
                    ];
                }
            }

            return $this->response->setJSON(array_values($out));
        } catch (\Exception $e) {
            return $this->response->setJSON([])->setStatusCode(500);
        }
    }
}
