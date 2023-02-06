<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertInfoPpdb extends Seeder
{
    public function run()
    {
        $data = [
            'tanggal' => '2023-02-06',
            'judul' => 'Rahmat Surahmat Judul',
            'isi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum eligendi assumenda dignissimos? Adipisci recusandae, itaque unde nulla corrupti tempore natus ea possimus odit eius nobis quaerat quidem optio molestias fuga.'
        ];
        $this->db->table('info_ppdb')->insert($data);
    }
}
