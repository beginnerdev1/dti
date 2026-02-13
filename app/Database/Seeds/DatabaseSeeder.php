<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks (optional but safer)
        $this->db->disableForeignKeyChecks();

        // Call seeders in correct order
        $this->call('StoreSeeder');
        $this->call('ProductSeeder');
        $this->call('ProductPriceSeeder');

        // Enable foreign key checks again
        $this->db->enableForeignKeyChecks();
    }
}
