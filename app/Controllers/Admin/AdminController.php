<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Database as ConfigDatabase;

class AdminController extends BaseController
{
    protected $db;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function dashboard()
    {
        $user = auth()->user();

        $jadwal_ppdb = $this->db->table('jadwal_ppdb')->get();

        $jadwal_active = $this->db->table('jadwal_ppdb')->where('is_active', true)->get()->getFirstRow();

        $year = substr($jadwal_active->tahun_ajaran,2,2);

        $indicator = $year.$jadwal_active->gelombang;

        $count_pendaftar = $this->db->table('users')->like('username',$indicator,'after')->countAllResults();
        $count_diterima = $this->db->table('hasil_seleksi')
            ->select()->join('users','users.id = hasil_seleksi.id_user','left')
            ->where('hasil_seleksi.status','diterima')->like('users.username',$indicator,'after')
            ->countAllResults();

        $count_tahunan = $this->db->table('users')->like('username',$year,'after')->countAllResults();
        $count_diterima_tahunan = $this->db->table('hasil_seleksi')
            ->select()->join('users','users.id = hasil_seleksi.id_user','left')
            ->where('hasil_seleksi.status','diterima')->like('users.username',$indicator,'after')
            ->countAllResults();
        
        $data = [
            'title' => 'Admin dashboard',
            'user' => $user,
            'jadwal_active' => $jadwal_active,
            'jadwal_ppdb' => $jadwal_ppdb,
            'count_pendaftar' => $count_pendaftar,
            'count_diterima' => $count_diterima,
            'count_tahunan' => $count_tahunan,
            'count_diterima_tahunan' => $count_diterima_tahunan,
        ];

        return view('admin/dashboard.php', $data);
    }
}
