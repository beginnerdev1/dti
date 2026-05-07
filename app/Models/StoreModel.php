<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model
{
    protected $table = 'carp_shops';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'type', 'location', 'contact_number', 'description', 'tags', 'status'];
    protected $useTimestamps = true;

    /**
     * Validate and insert a store record.
     * Returns inserted ID on success or false on failure.
     */
    public function saveStore(array $data)
    {
        if (empty($data['name']) || empty($data['location']) || empty($data['type'])) {
            return false;
        }

        $safe = [];
        foreach ($this->allowedFields as $field) {
            if (isset($data[$field])) {
                $safe[$field] = $data[$field];
            }
        }

        // Set default status if not provided
        if (!isset($safe['status'])) {
            $safe['status'] = 'pending';
        }

        try {
            $id = $this->insert($safe);
            if ($id === false) {
                log_message('error', 'StoreModel insert failed. Errors: ' . json_encode($this->errors()));
            }
            return $id ? (int)$id : false;
        } catch (\Exception $e) {
            log_message('error', 'StoreModel exception: ' . $e->getMessage());
            return false;
        }
    }
}
