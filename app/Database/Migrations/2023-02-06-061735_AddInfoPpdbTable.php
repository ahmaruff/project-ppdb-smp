<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddInfoPpdbTable extends Migration
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
            'tanggal' => [
                'type' => 'DATE',
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '255',  
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('info_ppdb',true);
    }

    public function down()
    {
        $this->forge->dropTable('info_ppdb');
    }
}
