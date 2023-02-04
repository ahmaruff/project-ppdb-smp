<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwalPpdbTable extends Migration
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
            'tahun_ajaran' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
            'gelombang' => [
                'type' => 'INT',
                'constraint'=> 1,
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => null,
                'unique' => true,
            ],
            'mulai_pendaftaran' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'akhir_pendaftaran' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_seleksi' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_pengumuman' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'user_last_reg' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('jadwal_ppdb',true);
    }

    public function down()
    {
        $this->forge->dropTable('jadwal_ppdb');
    }
}
