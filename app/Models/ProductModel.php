<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'category', 'size', 'store_id'];
    protected $useTimestamps = false;

    /**
     * Validate and insert a product record.
     * Returns inserted ID on success, or false on failure.
     *
     * @param array $data ['name'=>..., 'size'=>..., 'category'=>..., 'store_id'=>optional]
     * @return int|false
     */
    public function saveProduct(array $data)
    {
        // basic required fields
        if (empty($data['name']) || empty($data['size']) || empty($data['category'])) {
            return false;
        }

        // only keep allowed fields
        $safe = [];
        foreach ($this->allowedFields as $field) {
            if (isset($data[$field])) {
                $safe[$field] = $data[$field];
            }
        }

        try {
            $insertId = $this->insert($safe);
            // insert() returns inserted ID when successful
            return $insertId ? (int)$insertId : false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
