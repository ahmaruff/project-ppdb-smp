<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHasilSeleksiTable extends Migration
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
            'status' => [
                'type' => 'ENUM("diterima","pending","tidak diterima")',
                'default' => 'pending',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user', 'users','id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('hasil_seleksi', true);
    }

    public function down()
    {
        $this->forge->dropTable('hasil_seleksi');
    }
}
