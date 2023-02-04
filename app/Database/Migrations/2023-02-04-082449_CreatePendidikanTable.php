<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendidikanTable extends Migration
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
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'nama_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'npsn' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'alamat_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tahun_lulus' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user', 'users','id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pendidikan', true);
    }

    public function down()
    {
        $this->forge->dropTable('pendidikan');
    }
}
