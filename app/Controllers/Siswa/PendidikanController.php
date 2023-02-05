<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;
use CodeIgniter\Validation\Exceptions\ValidationException;

class PendidikanController extends BaseController
{
    protected $db;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function pendidikanView()
    {
        $user = auth()->user();
        $no_registrasi = $user->username;
        $biodata = $this->db->table('biodata')->where('id_user',$user->id)->get()->getFirstRow();

        //     file path under public folder / << first 2 number for tahun >> / << 3rd number, "gelombang" >> / <<username>> 
        $berkas_path = '/uploads/persyaratan/'.substr($no_registrasi,0,2).'/'.substr($no_registrasi,2,1).'/'.$no_registrasi;
        // output e.g /uploads/persyaratan/23/1/2310002

        // BERKAS
        $persyaratan = $this->db->table('persyaratan')->where('id_user', $user->id)->get()->getFirstRow(); 
        $pas_foto_path = $berkas_path.'/'.$persyaratan->pas_foto;

        // ------------------------------------
        $pendidikan = $this->db->table('pendidikan')->where('id_user', $user->id)->get()->getFirstRow();

        $data = [
            'title'         => 'PPDB - '.$biodata->nama,
            'nama'          => $biodata->nama,
            'no_registrasi'  => $no_registrasi,
            'pas_foto_path' => $pas_foto_path,
            'pendidikan'       => $pendidikan,
        ];

        return view('siswa/pendidikan.php',$data);
    }

    public function pendidikanAction()
    {
        $user = auth()->user();

        $rules = [
            'nisn' => [
                'label' => 'Nomor NISN',
                'rules' => ['permit_empty', 'string'],
            ],
            'nama_sekolah' => [
                'label' => 'Nama Sekolah',
                'rules' => ['permit_empty', 'string'],
            ],
            'npsn' => [
                'label' => 'NPSN',
                'rules' => ['permit_empty', 'string'],
            ],
            'alamat_sekolah' => [
                'label' => 'Alamat Sekolah',
                'rules' => ['permit_empty', 'string'],
            ],
            'tahun_lulus' => [
                'label' => 'Tahun Lulus',
                'rules' => ['permit_empty', 'numeric'],
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $pendidikanFields = array_keys($rules);
        $pendidikanRequest = $this->request->getPost($pendidikanFields);

        try {
            $this->db->table('pendidikan')->update($pendidikanRequest,['id_user' => $user->id],1);
        }
        catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $message = ['success', 'Data pendidikan berhasil diupdate'];
        return redirect()->to('/siswa/pendidikan')->with('message',[$message]);
    }
}
