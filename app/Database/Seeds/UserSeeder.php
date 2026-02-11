<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'admin',
                'email'      => 'admin@example.com',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'first_name' => 'System',
                'last_name'  => 'Administrator',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'johndoe',
                'email'      => 'john@example.com',
                'password'   => password_hash('password123', PASSWORD_DEFAULT),
                'first_name' => 'John',
                'last_name'  => 'Doe',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'janedoe',
                'email'      => 'jane@example.com',
                'password'   => password_hash('password123', PASSWORD_DEFAULT),
                'first_name' => 'Jane',
                'last_name'  => 'Doe',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data
        $this->db->table('users')->insertBatch($data);
    }
}
