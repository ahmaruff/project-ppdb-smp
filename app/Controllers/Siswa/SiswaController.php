<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;
use Config\Services;
use App\Models\UserModel;
use CodeIgniter\Validation\Exceptions\ValidationException;

class SiswaController extends BaseController
{
    protected $db;
    protected $session;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
        $this->session = Services::session();
    }

    public function dashboard()
    {
        $user = auth()->user();
        $no_registrasi = $user->username;

        //     file path under public folder / << first 2 number for tahun >> / << 3rd number, "gelombang" >> / <<username>> 
        $file_path = '/uploads/persyaratan/'.substr($no_registrasi,0,2).'/'.substr($no_registrasi,2,1).'/'.$no_registrasi;
        // output e.g /uploads/persyaratan/23/1/2310002

        // BERKAS
        $persyaratan = $this->db->table('persyaratan')->where('id_user', $user->id)->get()->getFirstRow(); 
        $pas_foto_path = $file_path.'/'.$persyaratan->pas_foto;

        $biodata = $this->db->table('biodata')->where('id_user',$user->id)->get()->getFirstRow();
        $orangtua = $this->db->table('orangtua')->where('id_user',$user->id)->get()->getFirstRow();
        $pendidikan = $this->db->table('pendidikan')->where('id_user',$user->id)->get()->getFirstRow();
        
        $persyaratanHasEmpty = count(array_filter((array)$persyaratan,fn($v)  => empty($v))) > 0;
        $biodataHasEmpty = count(array_filter((array)$biodata,fn($v)  => empty($v))) > 0;
        $pendidikanHasEmpty = count(array_filter((array)$pendidikan,fn($v)  => empty($v))) > 0;
        $orangtuaHasEmpty = count(array_filter((array)$orangtua,fn($v)  => empty($v))) > 0;

        $message = array();

        if ($persyaratanHasEmpty) {
            array_push($message,['warning', 'Terdapat BERKAS PERSYARATAN yang belum lengkap, Mohon segera lengkapi!']);
        } 
        if ($biodataHasEmpty) {
            array_push($message,['warning', 'Terdapat BIODATA yang belum lengkap, Mohon segera lengkapi!']);
        } 
        if ($pendidikanHasEmpty) {
            array_push($message, ['warning', 'Terdapat DATA PENDIDIKAN yang belum lengkap, Mohon segera lengkapi!']);
        } 
        if ($orangtuaHasEmpty) {
            array_push($message, ['warning', 'Terdapat DATA ORANGTUA yang belum lengkap, Mohon segera lengkapi!']);
        }

        $this->session->setFlashdata('message', $message);

        $data = [
            'title'         => 'PPDB - '.$biodata->nama,
            'no_registrasi' => $user->username,
            'pas_foto_path' => $pas_foto_path,
            'nama'          => $biodata->nama,
            'biodata'       => $biodata,
            'orangtua'      => $orangtua,
            'pendidikan'    => $pendidikan,
            'persyaratan'   => $persyaratan,
        ];
        
        return view('siswa/dashboard.php', $data);
    }

    public function kartuPendaftaranView()
    {
        $user = auth()->user();
        
        $biodata = $this->db->table('biodata')->where('id_user', $user->id)->get()->getFirstRow();
        $password = $this->db->table('pw')->where('id_user', $user->id)->get()->getFirstRow();
        $active_jadwal_ppdb = $this->db->table('jadwal_ppdb')->where('is_active', true)->get()->getFirstRow();

        $data = [
            'email' => $user->email,
            'nama' => $biodata->nama,
            'no_registrasi' => $user->username,
            'password' => $password->pw,
            'tanggal_registrasi' => $biodata->tanggal_pendaftaran,
            'tahun_ajaran' => $active_jadwal_ppdb->tahun_ajaran,
        ];

        return view('siswa/kartu-pendaftaran.php', $data);
    }

    public function pengumumanView()
    {
        $user = auth()->user();
        $no_registrasi = $user->username;
        $biodata = $this->db->table('biodata')->where('id_user',$user->id)->get()->getFirstRow();

        //     file path under public folder / <<first 2 number for tahun>> / << 3rd number,"gelombang" >> / <<username>> 
        $berkas_path = '/uploads/persyaratan/'.substr($no_registrasi,0,2).'/'.substr($no_registrasi,2,1).'/'.$no_registrasi;
        // output e.g /uploads/persyaratan/23/1/2310002

        // BERKAS
        $persyaratan = $this->db->table('persyaratan')->where('id_user', $user->id)->get()->getFirstRow(); 
        $pas_foto_path = $berkas_path.'/'.$persyaratan->pas_foto;

        $active_jadwal_ppdb = $this->db->table('jadwal_ppdb')->where('is_active',true)->get()->getFirstRow();

        $hasil_seleksi = $this->db->table('hasil_seleksi')->where('id_user', $user->id)->get()->getFirstRow();

        $data = [
            'title'         => 'Pengumuman - '.$biodata->nama,
            'nama'          => $biodata->nama,
            'no_registrasi' => $no_registrasi,
            'pas_foto_path' => $pas_foto_path,
            'biodata'       => $biodata,
            'email'         => $user->email,
            'status'      => $hasil_seleksi->status,
            'jadwal_ppdb'   => $active_jadwal_ppdb,
        ];

        return view('siswa/pengumuman.php', $data);
    }

    public function infoDashboard()
    {
        $user = auth()->user();

        $no_registrasi = $user->username;
        $biodata = $this->db->table('biodata')->where('id_user',$user->id)->get()->getFirstRow();

        //     file path under public folder / <<first 2 number for tahun>> / << 3rd number,"gelombang" >> / <<username>> 
        $berkas_path = '/uploads/persyaratan/'.substr($no_registrasi,0,2).'/'.substr($no_registrasi,2,1).'/'.$no_registrasi;
        // output e.g /uploads/persyaratan/23/1/2310002

        // BERKAS
        $persyaratan = $this->db->table('persyaratan')->where('id_user', $user->id)->get()->getFirstRow(); 
        $pas_foto_path = $berkas_path.'/'.$persyaratan->pas_foto;

        $info = $this->db->table('info_ppdb')->orderBy('tanggal')->get()->getResult();

        $data = [
            'title'         => 'Info PPDB',
            'nama'          => $biodata->nama,
            'no_registrasi' => $no_registrasi,
            'pas_foto_path' => $pas_foto_path,
            'info' => $info,
        ];

        return view('siswa/info-dashboard.php', $data);
    }

    public function infoDetailById($id)
    {
        $user = auth()->user();

        $no_registrasi = $user->username;
        $biodata = $this->db->table('biodata')->where('id_user',$user->id)->get()->getFirstRow();

        //     file path under public folder / <<first 2 number for tahun>> / << 3rd number,"gelombang" >> / <<username>> 
        $berkas_path = '/uploads/persyaratan/'.substr($no_registrasi,0,2).'/'.substr($no_registrasi,2,1).'/'.$no_registrasi;
        // output e.g /uploads/persyaratan/23/1/2310002

        // BERKAS
        $persyaratan = $this->db->table('persyaratan')->where('id_user', $user->id)->get()->getFirstRow(); 
        $pas_foto_path = $berkas_path.'/'.$persyaratan->pas_foto;

        $info = $this->db->table('info_ppdb')->where('id', $id)->get()->getFirstRow();

        $data = [
            'title'         => 'Info PPDB',
            'nama'          => $biodata->nama,
            'no_registrasi' => $no_registrasi,
            'pas_foto_path' => $pas_foto_path,
            'info' => $info,
        ];

        return view('siswa/info-detail.php', $data);
    }

    public function ubahPasswordView()
    {
        $user = auth()->user();
        $no_registrasi = $user->username;
        $biodata = $this->db->table('biodata')->where('id_user',$user->id)->get()->getFirstRow();

        //     file path under public folder / <<first 2 number for tahun>> / << 3rd number,"gelombang" >> / <<username>> 
        $berkas_path = '/uploads/persyaratan/'.substr($no_registrasi,0,2).'/'.substr($no_registrasi,2,1).'/'.$no_registrasi;
        // output e.g /uploads/persyaratan/23/1/2310002

        // BERKAS
        $persyaratan = $this->db->table('persyaratan')->where('id_user', $user->id)->get()->getFirstRow(); 
        $pas_foto_path = $berkas_path.'/'.$persyaratan->pas_foto;

        $data = [
            'title'         => 'Pengumuman - '.$biodata->nama,
            'nama'          => $biodata->nama,
            'no_registrasi'  => $no_registrasi,
            'pas_foto_path' => $pas_foto_path,
        ];
        return view('siswa/ubah-password.php', $data);
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
