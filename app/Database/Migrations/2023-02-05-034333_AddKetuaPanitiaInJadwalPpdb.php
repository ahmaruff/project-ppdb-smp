<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKetuaPanitiaInJadwalPpdb extends Migration
{
    public function up()
    {
        $this->forge->addColumn('jadwal_ppdb',[
            'ketua_panitia' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ]
            ]);
    }

    public function down()
    {
        $this->forge->dropColumn('jadwal_ppdb', 'ketua_panitia');
    }
}
