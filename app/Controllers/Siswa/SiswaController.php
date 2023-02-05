<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use Config\Database as ConfigDatabase;
use Config\Services;

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

        $this->session->set('message',[]);
        $this->session->regenerate(true);
        
        if ($persyaratanHasEmpty) {
            $this->session->push('message',[['warning', 'Terdapat BERKAS PERSYARATAN yang belum lengkap, Mohon segera lengkapi!']]);
        } 
        if ($biodataHasEmpty) {
            $this->session->push('message',[['warning', 'Terdapat BIODATA yang belum lengkap, Mohon segera lengkapi!']]);
        } 
        if ($pendidikanHasEmpty) {
            $this->session->push('message',[['warning', 'Terdapat DATA PENDIDIKAN yang belum lengkap, Mohon segera lengkapi!']]);
        } 
        if ($orangtuaHasEmpty) {
            $this->session->push('message',[['warning', 'Terdapat DATA ORANGTUA yang belum lengkap, Mohon segera lengkapi!']]);
        }

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
}
