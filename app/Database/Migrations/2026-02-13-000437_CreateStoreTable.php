<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStoreTable extends Migration
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
                'constraint' => 255,
            ],
            'municipality' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('store');
    }

    public function down()
    {
        $this->forge->dropTable('store', true);
    }
}
