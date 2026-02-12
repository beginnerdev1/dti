<?php

namespace App\Controllers;

use CodeIgniter\Database\ConnectionInterface;

class PriceMonitoring extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     * Display the price monitoring dashboard
     */
    public function index(): string
    {
        return view('home');
    }

    /**
     * API endpoint to fetch products and price history as JSON
     */
    public function getProducts()
    {
        try {
            $sql = "SELECT p.id AS pid, p.name AS pname, p.category, p.size,
                    s.id AS store_id, s.name AS store_name, s.municipality, s.location,
                    ph.price, ph.date
                    FROM product p
                    LEFT JOIN product_price ph ON ph.product_id = p.id
                    LEFT JOIN store s ON ph.store_id = s.id
                    ORDER BY LOWER(p.name) ASC, p.size ASC, ph.date ASC";
            
            $stmt = $this->db->query($sql);
            $rows = $stmt->getResultArray();

            $out = [];
            foreach ($rows as $r) {
                // Group by product name + size
                $nameKey = mb_strtolower(trim($r['pname'] ?? ''));
                $sizeKey = mb_strtolower(trim($r['size'] ?? ''));
                $groupKey = $nameKey . '||' . $sizeKey;
                
                if (!isset($out[$groupKey])) {
                    $out[$groupKey] = [
                        'id' => isset($r['pid']) ? (int)$r['pid'] : null,
                        'name' => $r['pname'] ?? '',
                        'unit' => $r['size'] ?? '',
                        'category' => $r['category'] ?? '',
                        'latestPrice' => 0.0,
                        'priceHistory' => []
                    ];
                }
                
                if ($r['price'] !== null) {
                    $out[$groupKey]['priceHistory'][] = [
                        'date' => $r['date'],
                        'price' => (float)$r['price'],
                        'store' => $r['store_name'] ?? '',
                        'location' => $r['location'] ?? '',
                        'municipality' => $r['municipality'] ?? ''
                    ];
                    $out[$groupKey]['latestPrice'] = (float)$r['price'];
                }
            }

            $final = array_values($out);
            return $this->response->setJSON($final);
        } catch (\Exception $e) {
            return $this->response->setJSON([])
                ->setStatusCode(500);
        }
    }

    /**
     * Fetch categories for filter dropdown
     */
    public function getCategories()
    {
        try {
            $sql = "SELECT DISTINCT category FROM product WHERE category IS NOT NULL AND category != '' ORDER BY category ASC";
            $result = $this->db->query($sql)->getResultArray();
            $categories = array_column($result, 'category');
            return $this->response->setJSON($categories);
        } catch (\Exception $e) {
            return $this->response->setJSON([])
                ->setStatusCode(500);
        }
    }

    /**
     * Fetch municipalities for filter dropdown
     */
    public function getMunicipalities()
    {
        try {
            $sql = "SELECT DISTINCT municipality FROM store WHERE municipality IS NOT NULL AND municipality != '' ORDER BY municipality ASC";
            $result = $this->db->query($sql)->getResultArray();
            $municipalities = array_column($result, 'municipality');
            return $this->response->setJSON($municipalities);
        } catch (\Exception $e) {
            return $this->response->setJSON([])
                ->setStatusCode(500);
        }
    }

    /**
     * Get detailed price history for a specific product
     */
    public function getProductDetails($productId)
    {
        try {
            $productId = (int)$productId;
            $sql = "SELECT p.id, p.name, p.category, p.size,
                    s.name AS store_name, s.municipality, s.location,
                    ph.price, ph.date
                    FROM product p
                    LEFT JOIN product_price ph ON ph.product_id = p.id
                    LEFT JOIN store s ON ph.store_id = s.id
                    WHERE p.id = ?
                    ORDER BY ph.date ASC";
            
            $result = $this->db->query($sql, [$productId])->getResultArray();
            
            if (empty($result)) {
                return $this->response->setJSON(null)
                    ->setStatusCode(404);
            }

            $product = [
                'id' => (int)$result[0]['id'],
                'name' => $result[0]['name'],
                'category' => $result[0]['category'],
                'unit' => $result[0]['size'],
                'priceHistory' => []
            ];

            foreach ($result as $row) {
                if ($row['price'] !== null) {
                    $product['priceHistory'][] = [
                        'date' => $row['date'],
                        'price' => (float)$row['price'],
                        'store' => $row['store_name'] ?? '',
                        'municipality' => $row['municipality'] ?? '',
                        'location' => $row['location'] ?? ''
                    ];
                }
            }

            return $this->response->setJSON($product);
        } catch (\Exception $e) {
            return $this->response->setJSON(null)
                ->setStatusCode(500);
        }
    }
}
