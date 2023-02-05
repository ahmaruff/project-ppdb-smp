<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;
use CodeIgniter\Validation\Exceptions\ValidationException;
use PhpParser\Node\Expr\Cast\Array_;

class PersyaratanController extends BaseController
{
    protected $db;
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function persyaratanView()
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

        $data_persyaratan = [
            'kartu_nisn' => [
                'name' => 'kartu_nisn',
                'label' => 'Kartu NISN',
                'status'=> $persyaratan->kartu_nisn_status,
                'data' => $persyaratan->kartu_nisn
            ],
            'pas_foto' => [
                'name' => 'pas_foto',
                'label' => 'Pas Foto',
                'status'=> $persyaratan->pas_foto_status,
                'data' => $persyaratan->pas_foto
            ],
            'bukti_pembayaran' => [
                'name' => 'bukti_pembayaran',
                'label' => 'Bukti Pembayaran',
                'status'=> $persyaratan->bukti_pembayaran_status,
                'data' => $persyaratan->bukti_pembayaran
            ],
            'skl' => [
                'name' => 'skl',
                'label' => 'SKL',
                'status'=> $persyaratan->skl_status,
                'data' => $persyaratan->skl
            ],
            'transkrip_nilai' => [
                'name' => 'transkrip_nilai',
                'label' => 'Transkrip Nilai',
                'status'=> $persyaratan->transkrip_nilai_status,
                'data' => $persyaratan->transkrip_nilai
            ],
            'kartu_keluarga' => [
                'name' => 'kartu_keluarga',
                'label' => 'Kartu Keluarga',
                'status'=> $persyaratan->kartu_keluarga_status,
                'data' => $persyaratan->kartu_keluarga
            ],
            'akta_kelahiran' => [
                'name' => 'akta_kelahiran',
                'label' => 'Akta Kelahiran',
                'status'=> $persyaratan->akta_kelahiran_status,
                'data' => $persyaratan->akta_kelahiran
            ],
        ];

        $data = [
            'title'         => 'PPDB - '.$biodata->nama,
            'nama'          => $biodata->nama,
            'no_registrasi'  => $no_registrasi,
            'pas_foto_path' => $pas_foto_path,
            'data_persyaratan'       => $data_persyaratan,
        ];
        return view('siswa/persyaratan.php',$data);
    }

    public function persyaratanAction()
    {
        $user = auth()->user();
        $no_registrasi = $user->username;

        $rules = [
            'kartu_nisn' => [
                'label' => 'Kartu NISN',
                'rules' => ['max_size[kartu_nisn,2048]','mime_in[kartu_nisn,image/png,image/jpeg,application/pdf]'],
            ],
            'pas_foto' => [
                'label' => 'Pas Foto',
                'rules' => ['is_image[pas_foto]', 'max_size[pas_foto,2048]'],
            ],
            'bukti_pembayaran' => [
                'label' => 'Bukti Pembayaran',
                'rules' => ['max_size[bukti_pembayaran,2048]', 'mime_in[bukti_pembayaran,image/png,image/jpeg,application/pdf]'],
            ],
            'skl' => [
                'label' => 'SKL',
                'rules' => ['max_size[skl,2048]', 'mime_in[skl,image/png,image/jpeg,application/pdf]'],
            ],
            'transkrip_nilai' => [
                'label' => 'Transkrip Nilai',
                'rules' => ['max_size[transkrip_nilai,2048]', 'mime_in[transkrip_nilai,image/png,image/jpeg,application/pdf]'],
            ],
            'kartu_keluarga' => [
                'label' => 'Kartu Keluarga',
                'rules' => ['max_size[kartu_keluarga,2048]', 'mime_in[kartu_keluarga,image/png,image/jpeg,application/pdf]'],
            ],
            'akta_kelahiran' => [
                'label' => 'Akta Kelahiran',
                'rules' => ['max_size[akta_kelahiran,2048]', 'mime_in[akta_kelahiran,image/png,image/jpeg,application/pdf]'],
            ],
        ];

        if (!$this->validate($rules)) {
            $message = ['danger', $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $persyaratanRequest = [];
        $validFile = [];

        $kartu_nisn = $this->request->getFile('kartu_nisn');
        $pas_foto = $this->request->getFile('pas_foto');
        $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
        $skl = $this->request->getFile('skl');
        $transkrip_nilai = $this->request->getFile('transkrip_nilai');
        $kartu_keluarga = $this->request->getFile('kartu_keluarga');
        $akta_kelahiran = $this->request->getFile('akta_kelahiran');

        // FILE VALIDATION
        if ($kartu_nisn->isValid()) {
            $kartu_nisn_ext = $kartu_nisn->getExtension();
            $kartu_nisn_filename = "kartu_nisn{$no_registrasi}.{$kartu_nisn_ext}";
            $persyaratanRequest['kartu_nisn'] = $kartu_nisn_filename;
            $persyaratanRequest['kartu_nisn_status'] = 'pending';

            array_push($validFile, [$kartu_nisn, $kartu_nisn_filename]);
            // throw new \RuntimeException(($kartu_nisn->getErrorString().'('.$kartu_nisn->getError().')'));
        }
        if($pas_foto->isValid()) {
            $pas_foto_ext = $pas_foto->getExtension();
            $pas_foto_filename = "pas_foto{$no_registrasi}.{$pas_foto_ext}";
            $persyaratanRequest['pas_foto'] = $pas_foto_filename;
            $persyaratanRequest['pas_foto_status'] = 'pending';

            array_push($validFile, [$pas_foto, $pas_foto_filename]);
            // throw new \RuntimeException(($pas_foto->getErrorString().'('.$pas_foto->getError().')'));
        }
        if ($bukti_pembayaran->isValid()) {
            $bukti_pembayaran_ext = $bukti_pembayaran->getExtension();
            $bukti_pembayaran_filename = "bukti_pembayaran{$no_registrasi}.{$bukti_pembayaran_ext}";
            $persyaratanRequest['bukti_pembayaran'] = $bukti_pembayaran_filename;
            $persyaratanRequest['bukti_pembayaran_status'] = 'pending';

            array_push($validFile, [$bukti_pembayaran, $bukti_pembayaran_filename]);
            // throw new \RuntimeException(($bukti_pembayaran->getErrorString().'('.$bukti_pembayaran->getError().')'));
        }
        if ($skl->isValid()) {
            $skl_ext = $skl->getExtension();
            $skl_filename = "skl{$no_registrasi}.{$skl_ext}";
            $persyaratanRequest['skl'] = $skl_filename;
            $persyaratanRequest['skl_status'] = 'pending';

            array_push($validFile, [$skl, $skl_filename]);
            // throw new \RuntimeException(($skl->getErrorString().'('.$skl->getError().')'));
        }
        if ($transkrip_nilai->isValid()) {
            $transkrip_nilai_ext = $transkrip_nilai->getExtension();
            $transkrip_nilai_filename = "transkrip_nilai{$no_registrasi}.{$transkrip_nilai_ext}";
            $persyaratanRequest['transkrip_nilai'] = $transkrip_nilai_filename;
            $persyaratanRequest['transkrip_nilai_status'] = 'pending';

            array_push($validFile, [$transkrip_nilai, $transkrip_nilai_filename]);
            // throw new \RuntimeException(($transkrip_nilai->getErrorString().'('.$transkrip_nilai->getError().')'));
        }
        if ($kartu_keluarga->isValid()) {
            $kartu_keluarga_ext = $kartu_keluarga->getExtension();
            $kartu_keluarga_filename = "kartu_keluarga{$no_registrasi}.{$kartu_keluarga_ext}";
            $persyaratanRequest['kartu_keluarga'] = $kartu_keluarga_filename;
            $persyaratanRequest['kartu_keluarga_status'] = 'pending';

            array_push($validFile, [$kartu_keluarga, $kartu_keluarga_filename]);
            // throw new \RuntimeException(($kartu_keluarga->getErrorString().'('.$kartu_keluarga->getError().')'));
        }
        if ($akta_kelahiran->isValid()) {
            $akta_kelahiran_ext = $akta_kelahiran->getExtension();
            $akta_kelahiran_filename = "akta_kelahiran{$no_registrasi}.{$akta_kelahiran_ext}";
            $persyaratanRequest['akta_kelahiran'] = $akta_kelahiran_filename;
            $persyaratanRequest['akta_kelahiran_status'] = 'pending';

            array_push($validFile, [$akta_kelahiran,$akta_kelahiran_filename]);
            // throw new \RuntimeException(($akta_kelahiran->getErrorString().'('.$akta_kelahiran->getError().')'));
        }

        // path
        $year = substr($no_registrasi, 0,2);
        $gelombang = substr($no_registrasi, 2,1);

        try {
            // MOVE FILE
            // example path
            // uploads/berkas/<<tahun ajaran 2 digit akhir>>/<<gelombang>>/no_registrasi/filename.jpg
            // uploads/berkas/23/1/pas_foto2310001.jpg

            foreach ($validFile as $file) {
                $file[0]->move(FCPATH."uploads/persyaratan/$year/$gelombang/$no_registrasi/",$file[1], true);
            }

            $this->db->table('persyaratan')->update($persyaratanRequest,['id_user' => $user->id],1);
        }
        catch (ValidationException $e) {
            $message = ['danger',$this->db->error()];
            return redirect()->back()->withInput()->with('message', [$message]);
        }

        $message = ['success', 'Berkas persyaratan berhasil diupdate'];
        return redirect()->to('/siswa/persyaratan')->with('message',[$message]);
    }
}
