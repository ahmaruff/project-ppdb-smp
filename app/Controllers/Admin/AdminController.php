<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Database as ConfigDatabase;
use CodeIgniter\Validation\Exceptions\ValidationException;

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

    public function ubahPasswordView()
    {
        $user = auth()->user();
        $data = [
            'title'=> 'Ubah Password Admin',
            'user' => $user
        ];
        return view('admin/ubah-password.php', $data);
    }

    public function ubahPasswordAction()
    {
        $user = auth()->user();
        $rules = [
            'password_lama' => [
                'label' => 'Password Lama',
                'rules' => ['required', 'string']
            ],
            'password' => [
                'label' => 'Password Baru',
                'rules' => ['required', 'string']
            ],
            'password_confirm' => [
                'label' => 'Konfirmasi Password Baru',
                'rules' => ['required', 'string', 'matches[password]']
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $password_lama = $this->request->getPost('password_lama');
        $matchPassword = auth()->check([
            'username' => $user->username,
            'password' => $password_lama,
        ]);

        if(!$matchPassword->isOK()) {
            $message = ['danger', $matchPassword->extraInfo()];
            return redirect()->back()->withInput()->with('message',[]);
        }
        $password_baru = $this->request->getPost('password');
        $password_confirm = $this->request->getPost('password_confirm');

        if($password_baru !== $password_confirm) {
            $message = ['danger', 'Inputan password baru & konfirmasi password tidak cocok'];
            return redirect()->back()->withInput()->with('message',[$message]);
        }

        try {
            $users = new UserModel;
            $user->fill([
                'password' => $password_baru,
                'password_confirm' => $password_confirm, 
            ]);
            $users->save($user);

            $this->db->table('pw')->update(['pw' => $password_baru],['id_user'=> $user->id]);
        }
        catch (ValidationException $e) {
            $message = ['danger', $this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $message = [ 'success', 'Berhasil mengubah password'];
        return redirect()->back()->with('message', [$message]);
    }
}
