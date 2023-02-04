<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePersyaratanTable extends Migration
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
            'kartu_nisn' => [
                'type' =>'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'kartu_nisn_status' => [
                'type' => 'ENUM("terverifikasi","pending","gagal")',
                'null' => true,
            ],
            'pas_foto' => [
                'type' =>'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'pas_foto_status' => [
                'type' => 'ENUM("terverifikasi","pending","gagal")',
                'null' => true,
            ],
            'bukti_pembayaran' => [
                'type' =>'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'bukti_pembayaran_status' => [
                'type' => 'ENUM("terverifikasi","pending","gagal")',
                'null' => true,
            ],
            'skl' => [
                'type' =>'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'skl_status' => [
                'type' => 'ENUM("terverifikasi","pending","gagal")',
                'null' => true,
            ],
            'transkrip_nilai' => [
                'type' =>'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'transkrip_nilai_status' => [
                'type' => 'ENUM("terverifikasi","pending","gagal")',
                'null' => true,
            ],
            'kartu_keluarga' => [
                'type' =>'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'kartu_keluarga_status' => [
                'type' => 'ENUM("terverifikasi","pending","gagal")',
                'null' => true,
            ],
            'akta_kelahiran' => [
                'type' =>'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'akta_kelahiran_status' => [
                'type' => 'ENUM("terverifikasi","pending","gagal")',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user', 'users','id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('persyaratan', true);
    }

    public function down()
    {
        $this->forge->dropTable('persyaratan');
    }
}
