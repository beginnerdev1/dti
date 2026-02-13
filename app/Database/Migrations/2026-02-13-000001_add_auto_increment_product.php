<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAutoIncrementProduct extends Migration
{
    public function up()
    {
        // Make `id` auto-increment so inserts without id succeed
        $this->db->query("ALTER TABLE `product` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT");
    }

    public function down()
    {
        // Revert to non-auto-increment (use with caution)
        $this->db->query("ALTER TABLE `product` MODIFY `id` INT(11) NOT NULL");
    }
}
