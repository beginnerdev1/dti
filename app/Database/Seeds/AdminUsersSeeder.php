<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'carp_aurora_7FQ2X9',
                'email'      => 'admin@carp-aurora.local',
                'password'   => password_hash('D4#pL9@kT8!mV3', PASSWORD_DEFAULT),
                'role'       => 'super_admin',
                'last_login' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert into database
        $this->db->table('admin_users')->insertBatch($data);
    }
}