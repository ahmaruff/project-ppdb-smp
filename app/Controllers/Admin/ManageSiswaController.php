<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Database as ConfigDatabase;
use CodeIgniter\Validation\Exceptions\ValidationException;

class ManageSiswaController extends BaseController
{
    protected $db;
    
    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }

    public function dataSiswaView()
    {
        $user = auth()->user();

        $userModel = new UserModel();
        $users = $userModel
                    ->select('users.*')
                    ->join('auth_groups_users agu', 'agu.user_id = users.id')
                    ->whereIn('agu.group',['user'])->findAll();

        $biodata = $this->db->table('biodata')->get()->getResult();
        $hasil_seleksi = $this->db->table('hasil_seleksi')->get()->getResult();

        // userdata = [id, no_registrasi, email, nama, status, ]
        $userDataList = [];
        foreach($users as $siswa) {
            foreach($biodata as $bio) {
                if($siswa->id == $bio->id_user) {
                    $userdata['jenis_pendaftaran'] = $bio->jenis_pendaftaran;
                    $userdata['id'] = $siswa->id;
                    $userdata['no_registrasi'] = $siswa->username;
                    $userdata['email'] = $siswa->email;
                    $userdata['nama'] = $bio->nama;
                }
            }
            foreach($hasil_seleksi as $hasil) {
                if($siswa->id == $hasil->id_user){
                    $userdata['status'] = $hasil->status;
                }
            }
            array_push($userDataList, $userdata);
        }
        
        $data = [
            'title' => 'Siswa - Admin Dashboard',
            'user' => $user,
            'userDataList' => $userDataList,
        ];

        return view('admin/data-siswa.php', $data);
    }

    public function dataSiswaDetailView($id)
    {
        $user = auth()->user();

        $userModel = new UserModel();
        $siswa = $userModel->find($id);
        $biodata = $this->db->table('biodata')->where('id_user', $id)->get()->getFirstRow();
        $orangtua = $this->db->table('orangtua')->where('id_user', $id)->get()->getFirstRow();
        $pendidikan = $this->db->table('pendidikan')->where('id_user', $id)->get()->getFirstRow();
        $persyaratan = $this->db->table('persyaratan')->where('id_user', $id)->get()->getFirstRow();
        $hasil_seleksi = $this->db->table('hasil_seleksi')->where('id_user', $id)->get()->getFirstRow();

        $persyaratanHasEmpty = count(array_filter((array)$persyaratan,fn($v)  => empty($v))) > 0;
        $biodataHasEmpty = count(array_filter((array)$biodata,fn($v)  => empty($v))) > 0;
        $pendidikanHasEmpty = count(array_filter((array)$pendidikan,fn($v)  => empty($v))) > 0;
        $orangtuaHasEmpty = count(array_filter((array)$orangtua,fn($v)  => empty($v))) > 0;

        $ubahStatusSeleksi = true;
        if($persyaratanHasEmpty || $biodataHasEmpty || $pendidikanHasEmpty || $orangtuaHasEmpty) {
            $ubahStatusSeleksi = false;
        }

        $jadwal_ppdb = $this->db->table('jadwal_ppdb')->where('is_active', true)->get()->getFirstRow();

        $year = substr($jadwal_ppdb->tahun_ajaran,2,2);
        $gelombang = $jadwal_ppdb->gelombang;
        $file_path = "uploads/persyaratan/$year/$gelombang/$siswa->username";

        $data_persyaratan = [
            'pas_foto' => [
                'name' => 'Pas Foto',
                'label' => 'pas_foto',
                'file' => $persyaratan->pas_foto,
                'status' => $persyaratan->pas_foto_status,
                'mime'  => mime_content_type(FCPATH."/$file_path/$persyaratan->pas_foto"),
                'column' => 'pas_foto_status',
            ],
            'kartu_nisn' => [
                'name' => 'Kartu NISN',
                'label' => 'kartu_nisn',
                'file' => $persyaratan->kartu_nisn,
                'status' => $persyaratan->kartu_nisn_status,
                'mime'  => mime_content_type(FCPATH."/$file_path/$persyaratan->kartu_nisn"),
                'column' => 'kartu_nisn_status',
            ],
            'bukti_pembayaran' => [
                'name' => 'Bukti Pembayaran',
                'label' => 'bukti_pembayaran',
                'file' => $persyaratan->bukti_pembayaran,
                'status' => $persyaratan->bukti_pembayaran_status,
                'mime'  => mime_content_type(FCPATH."/$file_path/$persyaratan->bukti_pembayaran"),
                'column' => 'bukti_pembayaran_status',
            ],
            'skl' => [
                'name' => 'SKL',
                'label' => 'skl',
                'file' => $persyaratan->skl,
                'status' => $persyaratan->skl_status,
                'mime'  => mime_content_type(FCPATH."/$file_path/$persyaratan->skl"),
                'column' => 'skl_status',
            ],
            'transkrip_nilai' => [
                'name' => 'Transkrip Nilai',
                'label' => 'transkrip_nilai',
                'file' => $persyaratan->transkrip_nilai,
                'status' => $persyaratan->transkrip_nilai_status,
                'mime'  => mime_content_type(FCPATH."/$file_path/$persyaratan->transkrip_nilai"),
                'column' => 'transkrip_nilai_status',
            ],
            'kartu_keluarga' => [
                'name' => 'Kartu Keluarga',
                'label' => 'kartu_keluarga',
                'file' => $persyaratan->kartu_keluarga,
                'status' => $persyaratan->kartu_keluarga_status,
                'mime'  => mime_content_type(FCPATH."/$file_path/$persyaratan->kartu_keluarga"),
                'column' => 'kartu_keluarga_status',
            ],
            'akta_kelahiran' => [
                'name' => 'Akta Kelahiran',
                'label' => 'akta_kelahiran',
                'file' => $persyaratan->akta_kelahiran,
                'status' => $persyaratan->akta_kelahiran_status,
                'mime'  => mime_content_type(FCPATH."/$file_path/$persyaratan->akta_kelahiran"),
                'column' => 'akta_kelahiran_status',
            ],
        ];

        // JIKA STATUS BERKAS BELUM TERVERIFIKASI< TIDAK BISA MENGUBAH STATUS SELEKSI
        foreach($data_persyaratan as $persyaratan) {
            if($persyaratan['status'] !== 'terverifikasi') {
                $ubahStatusSeleksi = false;
            }
        }

        $data = [
            'title' => "Detail Siswa - $biodata->nama",
            'user' => $user,
            'siswa' => $siswa,
            'biodata' => $biodata,
            'orangtua' => $orangtua,
            'pendidikan' => $pendidikan,
            'data_persyaratan' => $data_persyaratan,
            'file_path' => $file_path,
            'ubahStatusSeleksi' => $ubahStatusSeleksi,
            'hasil_seleksi' => $hasil_seleksi,
        ];

        return view('admin/data-siswa-detail.php', $data);
    }

    public function verifikasiPersyaratanAction($column)
    {
        $id_user = $this->request->getPost('id_user');
        $status = $this->request->getPost('status');

        try {
           $this->db->table('persyaratan')->update([$column => $status], ['id_user' => $id_user]);
        } catch (ValidationException $e) {
            $message = ['danger', $this->db->error()];
            return redirect()->back()->withInput()->with('message',[$message]);
        }

        $message = ['success', 'data berhasil diverifikasi'];
        return redirect()->to("/admin/data-siswa/$id_user")->with('message', [$message]);
    }

    public function ubahStatusSeleksiAction()
    {
        $id_user = $this->request->getPost('id_user');
        $status = $this->request->getPost('status');

        try {
            // $this->db->table('biodata')->update(['status' => $status], ['id_user' => $id_user]);
            $this->db->table('hasil_seleksi')->update(['status' => $status],['id_user' => $id_user]);
         } catch (ValidationException $e) {
            $message = ['success', 'data berhasil diverifikasi'];
             return redirect()->back()->withInput()->with('message',[$message]);
         }

         $message = ['danger', $this->db->error()];
         return redirect()->to("/admin/data-siswa/$id_user")->with('message', [$message]);
    }

    public function showPersyaratan($id, $username, $file)
    {
        $year = substr($username,0,2);
        $gel = substr($username,2,1);

        $file_path = "/uploads/persyaratan/$year/$gel/$username";
        
        $persyaratan = $this->db->table('persyaratan')->where('id_user', $id)->get()->getFirstRow('array');

        $berkas = $persyaratan[$file];
        $data = [
            'file_path' => $file_path,
            'berkas' => $berkas,
            'mime' => mime_content_type(FCPATH."$file_path/$berkas"),
        ];

        return view('admin/show-persyaratan',$data);
    }

    
}
