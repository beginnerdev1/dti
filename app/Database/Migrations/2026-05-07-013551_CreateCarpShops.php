<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarpShops extends Migration
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
                'constraint' => 200,
                'comment'    => 'Shop/Cooperative/ARB group name',
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['cooperative', 'arb', 'individual'],
                'default'    => 'arb',
                'comment'    => 'Type of enterprise',
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'comment'    => 'Barangay, Municipality, Aurora',
            ],
            'contact_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'comment'    => 'Phone or mobile number',
            ],
            'description' => [
                'type'    => 'TEXT',
                'null'    => true,
                'comment' => 'Shop story, products, mission',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Image file path or URL (profile/logo)',
            ],
            'tags' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Comma‑separated keywords (e.g. Coconut,Organic)',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'pending', 'inactive'],
                'default'    => 'pending',
                'comment'    => 'Approval status',
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
        $this->forge->addKey('type');
        $this->forge->addKey('status');
        $this->forge->addKey('location');

        $this->forge->createTable('carp_shops', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('carp_shops', true);
    }
}