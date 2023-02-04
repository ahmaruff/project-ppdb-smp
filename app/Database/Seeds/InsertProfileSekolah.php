<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertProfileSekolah extends Seeder
{
    public function run()
    {
        $data = [
            'nama_sekolah' => 'SMP Ma\'arif Kalibawang',
            'alamat' => 'Jl. Kaliwiro, KM 01, Kalibawang, Wonosobo',
            'telepon' => '02863399092',
            'email' => 'spemka_ka@yahoo.co.id',
            'npsn' => '20306776',
        ];
        
        $this->db->table('profile_sekolah')->insert($data);
    }
}
