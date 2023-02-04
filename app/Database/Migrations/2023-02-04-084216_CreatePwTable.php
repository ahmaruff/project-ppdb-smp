<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePwTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'unique' => true,
            ],
            'pw' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user', 'users','id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pw', true);
    }

    public function down()
    {
        $this->forge->dropTable('pw');
    }
}
