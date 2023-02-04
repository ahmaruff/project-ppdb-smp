<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInfoPpdbTable extends Migration
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
                'default' => 'CURRENT_TIMESTAMP',
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
    }

    public function down()
    {
        //
    }
}
