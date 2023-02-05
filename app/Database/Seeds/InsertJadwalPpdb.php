<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertJadwalPpdb extends Seeder
{
    public function run()
    {
        $data = [
            'tahun_ajaran' => '2023/2024',
            'gelombang' => 1,
            'mulai_pendaftaran' => '2023-02-01',
            'akhir_pendaftaran' => '2023-03-30',
            'tanggal_seleksi' => '2023-04-5',
            'tanggal_pengumuman' => '2023-04-10',
            'is_active' => true,
            'ketua_panitia' => 'Sujatmiko, S.Pd.'
        ];
        $this->db->table('jadwal_ppdb')->insert($data);
    }
}
