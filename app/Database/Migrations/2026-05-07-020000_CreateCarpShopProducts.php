<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarpShopProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'carp_shop_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'comment'    => 'Related carp shop id',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'comment'    => 'Product name',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Product description',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Product image path or URL',
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
                'default'    => '0.00',
                'comment'    => 'Product price',
            ],
            'currency' => [
                'type'       => 'VARCHAR',
                'constraint' => 3,
                'default'    => 'PHP',
                'comment'    => 'Currency code',
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'comment'    => 'Product category',
            ],
            'tags' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Comma-separated tags',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'draft', 'inactive'],
                'default'    => 'active',
                'comment'    => 'Product status',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('carp_shop_id');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('carp_shop_id', 'carp_shops', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('carp_shop_products', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('carp_shop_products', true);
    }
}