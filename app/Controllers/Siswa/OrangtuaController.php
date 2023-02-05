<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;
use CodeIgniter\Validation\Exceptions\ValidationException;

class OrangtuaController extends BaseController
{
    protected $db;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function orangtuaView()
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
        $orangtua = $this->db->table('orangtua')->where('id_user', $user->id)->get()->getFirstRow();

        $data = [
            'title'         => 'PPDB - '.$biodata->nama,
            'nama'          => $biodata->nama,
            'no_registrasi'  => $no_registrasi,
            'pas_foto_path' => $pas_foto_path,
            'orangtua'       => $orangtua,
        ];

        return view('siswa/orangtua.php', $data);
    }

    public function orangtuaAction()
    {
        $user = auth()->user();
        $rules = [
            'ayah_nama' => [
                'label' => 'Nama ayah',
                'rules' => ['permit_empty', 'string'],
            ],
            'ayah_nik' => [
                'label' => 'NIK Ayah',
                'rules' => ['string', 'exact_length[16]', 'permit_empty'],
            ],
            'ayah_telepon' => [
                'label' => 'Telepon Ayah',
                'rules' => ['permit_empty', 'alpha_numeric'],
            ],
            'ayah_pendidikan' => [
                'label' => 'Pendidikan Ayah',
                'rules' => ['permit_empty','in_list[Tidak Sekolah,SD/Sederajat,SMP/Sederajat,SMA/Sederajat,S1,S2,S3]'],
            ],
            'ayah_pekerjaan' => [
                'label' => 'Pekerjaan Ayah',
                'rules' => ['permit_empty', 'string'],
            ],
            'ayah_gaji' => [
                'label' => 'Penghasilan Ayah',
                'rules' => ['permit_empty', 'numeric'],
            ],
            'ibu_nama' => [
                'label' => 'Nama Ibu',
                'rules' => ['permit_empty', 'string'],
            ],
            'ibu_nik' => [
                'label' => 'NIK Ibu',
                'rules' => ['string', 'exact_length[16]', 'permit_empty'],
            ],
            'ibu_telepon' => [
                'label' => 'Telepon Ibu',
                'rules' => ['permit_empty', 'alpha_numeric'],
            ],
            'ibu_pendidikan' => [
                'label' => 'Pendidikan Ibu',
                'rules' => ['permit_empty','in_list[Tidak Sekolah,SD/Sederajat,SMP/Sederajat,SMA/Sederajat,S1,S2,S3]'],
            ],
            'ibu_pekerjaan' => [
                'label' => 'Pekerjaan Ibu',
                'rules' => ['permit_empty', 'string'],
            ],
            'ibu_gaji' => [
                'label' => 'Penghasilan Ibu',
                'rules' => ['permit_empty', 'numeric'],
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $orangtuaFields = array_keys($rules);
        $orangtuaRequest = $this->request->getPost($orangtuaFields);

        try {
            $this->db->table('orangtua')->update($orangtuaRequest,['id_user' => $user->id],1);
        }
        catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $message = ['success', 'Data orang tua berhasil diupdate'];
        return redirect()->to('/siswa/orangtua')->with('message',[$message]);
    }
}
