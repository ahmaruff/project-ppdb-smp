<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;
use CodeIgniter\Validation\Exceptions\ValidationException;

class BiodataController extends BaseController
{
    protected $db;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function biodataView()
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

        $data = [
            'title'         => 'PPDB - '.$biodata->nama,
            'nama'          => $biodata->nama,
            'no_registrasi'  => $no_registrasi,
            'pas_foto_path' => $pas_foto_path,
            'biodata'       => $biodata,
            'email'         => $user->email,
        ];

        return view('siswa/biodata.php', $data);
    }

    public function biodataAction()
    {
        $user = auth()->user();
        $rules = [
            'tanggal_pendaftaran' => [
                'label' => 'tanggal_pendaftaran',
                'rules' => ['valid_date', 'permit_empty']
            ],
            'jenis_pendaftaran' => [
                'label' => 'jenis_pendaftaran',
                'rules' => ['in_list[baru,pindahan]', 'permit_empty'],
            ],
            'nama' => [
                'label' => 'nama',
                'rules' => ['string', 'permit_empty'],
            ],
            'nik' => [
                'label' => 'NIK',
                'rules' => ['string', 'exact_length[16]', 'permit_empty'],
            ],
            'tempat_lahir' => [
                'label' => 'tempat_lahir',
                'rules' => ['string', 'permit_empty'],
            ],
            'tanggal_lahir' => [
                'label' => 'tanggal_lahir',
                'rules' => ['valid_date', 'permit_empty'],
            ],
            'agama' => [
                'label' => 'agama',
                'rules' => ['string', 'permit_empty'],
            ],
            'anak_ke' => [
                'label' => 'Anak Ke',
                'rules' => ['is_natural', 'permit_empty'],
            ],
            'jml_saudara_kandung' => [
                'label' => 'Jumlah Saudara Kandung',
                'rules' => ['is_natural', 'permit_empty'],
            ],
            'kebutuhan_khusus' => [
                'label' => 'Kebutuhan khusus',
                'rules' => ['string', 'permit_empty'],
            ],
            'telepon' => [
                'label' => 'Telepon',
                'rules' => ['alpha_numeric', 'permit_empty']
            ],
            'alamat' => [
                'label' => 'alamat',
                'rules' => ['string', 'permit_empty'],
            ],
            'kode_pos' => [
                'label' => 'Kode pos',
                'rules' => ['string', 'permit_empty'],
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $biodataFields = array_keys($rules);
        $biodataRequest = $this->request->getPost($biodataFields);

        try {
            $this->db->table('biodata')->update($biodataRequest,['id_user' => $user->id],1);
        }
        catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $message = ['success', 'Biodata berhasil diupdate'];
        return redirect()->to('/siswa/biodata')->with('message',[$message]);
    }
}
