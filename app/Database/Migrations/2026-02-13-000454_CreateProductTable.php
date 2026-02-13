<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTable extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'size' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'store_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('store_id');

        $this->forge->addForeignKey(
            'store_id',
            'store',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product', true);
    }
}
