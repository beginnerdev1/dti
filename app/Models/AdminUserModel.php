<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminUserModel extends Model
{
    protected $table = 'admin_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'role', 'last_login'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}