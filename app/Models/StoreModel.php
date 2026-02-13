<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'municipality', 'location'];
    protected $useTimestamps = false;

    /**
     * Validate and insert a store record.
     * Returns inserted ID on success or false on failure.
     */
    public function saveStore(array $data)
    {
        if (empty($data['name']) || empty($data['location']) || empty($data['municipality'])) {
            return false;
        }

        $safe = [];
        foreach ($this->allowedFields as $field) {
            if (isset($data[$field])) {
                $safe[$field] = $data[$field];
            }
        }

        try {
            $id = $this->insert($safe);
            return $id ? (int)$id : false;
        } catch (\Exception $e) {
            return false;
        
        }
    }
}
