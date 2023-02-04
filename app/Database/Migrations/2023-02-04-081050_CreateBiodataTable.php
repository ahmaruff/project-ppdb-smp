<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBiodataTable extends Migration
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
            'tanggal_pendaftaran' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'jenis_pendaftaran' => [
                'type' => 'ENUM("baru","pindahan")',
                'default' => 'baru',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'nik' => [ 
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'anak_ke' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'jml_saudara_kandung' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'kebutuhan_khusus' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user', 'users','id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('biodata', true);
    }

    public function down()
    {
        $this->forge->dropTable('biodata');
    }
}
