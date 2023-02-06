<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;

class HomeController extends BaseController
{
    protected $db;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function index()
    {
        $active_jadwal_ppdb = $this->db->table('jadwal_ppdb')->where('is_active', true)->get()->getFirstRow();

        $info = $this->db->table('info_ppdb')->orderBy('tanggal')->limit(3)->get()->getResult();

        $data = [
            'title' => "PPDB SMP MA'ARIF KALIBAWANG",
            'jadwal_ppdb' => $active_jadwal_ppdb,
            'info' => $info,
        ];

        return view('home/index.php', $data);
    }

    public function tentang()
    {
        $data = [
            'title' => "PPDB SMP MA'ARIF KALIBAWANG",
        ];

        return view('home/tentang.php', $data);
    }

    public function info()
    {
        $info = $this->db->table('info_ppdb')->orderBy('tanggal')->get()->getResult();

        $data = [
            'title' => "PPDB SMP MA'ARIF KALIBAWANG",
            'info' => $info,
        ];

        return view('home/info-list.php', $data);
    }

    public function infoDetailById($id)
    {
        $info = $this->db->table('info_ppdb')->where('id', $id)->get()->getFirstRow();
        $data = [
            'title' => "PPDB SMP MA'ARIF KALIBAWANG",
            'info' => $info,
        ];

        return view('home/info-detail.php', $data);
    }
}
