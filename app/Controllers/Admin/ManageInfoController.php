<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;
use CodeIgniter\Validation\Exceptions\ValidationException;

class ManageInfoController extends BaseController
{
    protected $db;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function infoDashboard()
    {
        $user = auth()->user();

        $info = $this->db->table('info_ppdb')->orderBy('tanggal')->get()->getResult();
        $data = [
            'user' => $user,
            'info' => $info,
        ];

        return view('admin/info-dashboard.php', $data);
    }

    public function infoDetailById($id)
    {
        $user = auth()->user();

        $info = $this->db->table('info_ppdb')->where('id', $id)->get()->getFirstRow();

        $data = [
            'title' => 'Info PPDB',
            'user' => $user,
            'info' => $info,
        ];

        return view('admin/info-detail.php', $data);
    }

    public function infoAddView()
    {
        $user = auth()->user();

        $data = [
            'title' => 'Tambah info PPDB',
            'user' => $user,
        ];

        return view('admin/info-add.php', $data);
    }

    public function infoAddAction()
    {
        $rules = [
            'tanggal' => [
                'label' => 'Tanggal',
                'rules' => ['required', 'valid_date']
            ],
            'judul' => [
                'label' => 'Judul',
                'rules' => ['required', 'string'],
            ],
            'isi' => [
                'label' => 'Isi',
                'rules' => ['required', 'string'],
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $infoFields = array_keys($rules);
        $infoRequest = $this->request->getPost($infoFields);

        try {
            $this->db->table('info_ppdb')->insert($infoRequest);
        } catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }
        $message = ['success', 'Info PPDB baru telah ditambahkan'];
        return redirect()->to('/admin/info')->with('message', [$message]);
    }

    public function infoEditView($id)
    {
        $user = auth()->user();

        $info = $this->db->table('info_ppdb')->where('id', $id)->get()->getFirstRow();

        $data = [
            'title' => 'Info PPDB',
            'user' => $user,
            'info' => $info,
        ];

        return view('admin/info-edit.php', $data);
    }

    public function infoEditAction($id)
    {
        $rules = [
            'tanggal' => [
                'label' => 'Tanggal',
                'rules' => ['permit_empty', 'valid_date']
            ],
            'judul' => [
                'label' => 'Judul',
                'rules' => ['permit_empty', 'string'],
            ],
            'isi' => [
                'label' => 'Isi',
                'rules' => ['permit_empty', 'string'],
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $infoFields = array_keys($rules);
        $infoRequest = $this->request->getPost($infoFields);

        try {
            $this->db->table('info_ppdb')->update($infoRequest,['id', $id]);
        } catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }
        $message = ['success', 'Info PPDB baru telah ditambahkan'];
        return redirect()->to('/admin/info')->with('message', [$message]);
    }

    public function infoDeleteAction($id)
    {
        try {
            $this->db->table('info_ppdb')->delete(['id' => $id],1);
        } catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }
        
        $message = ['success', 'Jadwal Berhasil dihapus!'];
        return redirect()->to('/admin/info')->with('message', [$message]);
    }
}
