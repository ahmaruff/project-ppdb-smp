<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;
use CodeIgniter\Validation\Exceptions\ValidationException;

class JadwalPpdbController extends BaseController
{
    protected $db;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function jadwalDashboardView()
    {
        $user = auth()->user();

        $jadwal_ppdb = $this->db->table('jadwal_ppdb')->get();
        $active_jadwal_ppdb = $this->db->table('jadwal_ppdb')->where('is_active', true)->get()->getFirstRow();

        $data = [
            'title' => 'Jadwal PPDB',
            'user' => $user,
            'jadwal_ppdb' => $jadwal_ppdb,
            'active_jadwal_ppdb' => $active_jadwal_ppdb,
        ];

        return view('admin/jadwal-ppdb.php', $data);
    }

    public function jadwalAddView()
    {
        $user = auth()->user();

        $data = [
            'title' => 'Admin dashboard',
            'user' => $user,
        ];

        return view('admin/jadwal-ppdb-add.php', $data);
    }

    public function jadwalAddAction()
    {
        $rules = [
            'tahun_ajaran' => [
                'label' => 'Tahun Ajaran',
                'rules' => ['required', 'string'],
            ],
            'gelombang' => [
                'label' => 'Gelombang',
                'rules' => ['required', 'integer'],
            ],
            'mulai_pendaftaran' => [
                'label' => 'Awal Pendaftaran',
                'rules' => ['required', ]
            ],
            'mulai_pendaftaran' => [
                'label' => 'Mulai Pendaftaran',
                'rules' => ['required', 'valid_date']
            ],
            'akhir_pendaftaran' => [
                'label' => 'Akhir Pendaftaran',
                'rules' => ['required', 'valid_date']
            ],
            'tanggal_seleksi' => [
                'label' => 'Tanggal Seleksi',
                'rules' => ['required', 'valid_date']
            ],
            'tanggal_pengumuman' => [
                'label' => 'Tanggal Pengumuman',
                'rules' => ['required', 'valid_date']
            ],
            'ketua_panitia' => [
                'label' => 'Ketua Panitia',
                'rules' => ['required', 'string'],
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $jadwalFields = array_keys($rules);
        $jadwalRequest = $this->request->getPost($jadwalFields);
        $jadwalRequest['is_active'] = null;
        $jadwalRequest['user_last_reg'] = 0;

        try {
            $this->db->table('jadwal_ppdb')->insert($jadwalRequest);
        } catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }
        $message = ['success', 'Jadwa PPDB baru telah ditambahkan'];
        return redirect()->to('/admin/jadwal-ppdb')->with('message', [$message]);
    }

    public function jadwalEditView($id)
    {
        $user = auth()->user();

        $jadwal_ppdb = $this->db->table('jadwal_ppdb')->where('id', $id)->get()->getFirstRow();

        $data = [
            'title' => 'Admin dashboard',
            'user' => $user,
            'jadwal_ppdb' => $jadwal_ppdb,
        ];

        return view('admin/jadwal-ppdb-edit.php', $data);
    }

    public function jadwalEditAction($id)
    {
        $rules = [
            'tahun_ajaran' => [
                'label' => 'Tahun Ajaran',
                'rules' => ['permit_empty', 'string'],
            ],
            'gelombang' => [
                'label' => 'Gelombang',
                'rules' => ['permit_empty', 'integer'],
            ],
            'mulai_pendaftaran' => [
                'label' => 'Mulai Pendaftaran',
                'rules' => ['permit_empty', 'valid_date']
            ],
            'akhir_pendaftaran' => [
                'label' => 'Akhir Pendaftaran',
                'rules' => ['permit_empty', 'valid_date']
            ],
            'tanggal_seleksi' => [
                'label' => 'Tanggal Seleksi',
                'rules' => ['permit_empty', 'valid_date']
            ],
            'tanggal_pengumuman' => [
                'label' => 'Tanggal Pengumuman',
                'rules' => ['permit_empty', 'valid_date']
            ],
            'user_last_reg' => [
                'label' => 'user_last_reg',
                'rules' => ['permit_empty', 'integer'],
            ],
            'ketua_panitia' => [
                'label' => 'Ketua Panitia',
                'rules' => ['permit_empty', 'string'],
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $jadwalFields = array_keys($rules);
        $jadwalRequest = $this->request->getPost($jadwalFields);
       
        try {
            $this->db->table('jadwal_ppdb')->update($jadwalRequest,['id'=> $id]);
        } catch (ValidationException $e) {
            $message = ['message',$this->db->error()];
            return redirect()->back()->withInput()->with('message',[$message]);
        }

        $message = ['success', 'Jadwal Berhasil di edit'];
        return redirect()->to('/admin/jadwal-ppdb')->with('message', [$message]);
    }

    public function jadwalDeleteAction($id)
    {
        try {
            $this->db->table('jadwal_ppdb')->delete(['id' => $id],1);
        } catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }
        
        $message = ['success', 'Jadwal Berhasil dihapus!'];
        return redirect()->to('/admin/jadwal-ppdb')->with('message', [$message]);
    }
}
