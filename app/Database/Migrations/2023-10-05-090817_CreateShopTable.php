<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateShopTable extends Migration
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
            'shop_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 100, // Corrected the constraint value
            ],
            'shop_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
    
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'shops', 'id'); // Ensure 'id' matches the data type and length in the 'users' table
        $this->forge->createTable('shops');
    }
    

    public function down()
    {
        $this->forge->dropTable('shops');
    }
}
