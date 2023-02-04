<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfileSekolahTable extends Migration
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
            'nama_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'npsn' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('profile_sekolah',true);
    }

    public function down()
    {
        $this->forge->dropTable('profile_sekolah');
    }
}
