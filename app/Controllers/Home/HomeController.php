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
        
        $data = [
            'title' => "PPDB SMP MA'ARIF KALIBAWANG",
            'jadwal_ppdb' => $active_jadwal_ppdb,
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
        $data = [
            'title' => "PPDB SMP MA'ARIF KALIBAWANG",
        ];

        return view('home/info-list.php', $data);
    }

    public function infoDetailById($id)
    {
        $data = [
            'title' => "PPDB SMP MA'ARIF KALIBAWANG",
        ];

        return view('home/info-detail.php', $data);
    }
}
