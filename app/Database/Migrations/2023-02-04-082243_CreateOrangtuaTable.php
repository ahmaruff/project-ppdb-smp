<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrangtuaTable extends Migration
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
            'ayah_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ayah_nik' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ayah_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ayah_pendidikan' => [
                'type' => 'ENUM("Tidak Sekolah","SD/Sederajat","SMP/Sederajat","SMA/Sederajat", "S1", "S2", "S3")',
                'null' => true,
            ],
            'ayah_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ayah_gaji' => [
                'type'=> ' DECIMAL(15,2)', 
                'null' => true
            ],
            'ibu_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ibu_nik' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ibu_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ibu_pendidikan' => [
                'type' => 'ENUM("Tidak Sekolah","SD/Sederajat","SMP/Sederajat","SMA/Sederajat", "S1", "S2", "S3")',
                'null' => true,
            ],
            'ibu_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ibu_gaji' => [
                'type'=> ' DECIMAL(15,2)', 
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user', 'users','id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orangtua', true);
    }

    public function down()
    {
        $this->forge->dropTable('orangtua');
    }
}
