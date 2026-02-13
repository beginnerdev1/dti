<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductPriceTable extends Migration
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
            'product_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'store_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'date' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('product_id');
        $this->forge->addKey('store_id');

        $this->forge->addForeignKey(
            'product_id',
            'product',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'store_id',
            'store',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('product_price');
    }

    public function down()
    {
        $this->forge->dropTable('product_price', true);
    }
}
