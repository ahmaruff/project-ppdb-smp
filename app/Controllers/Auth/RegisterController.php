<?php

namespace App\Controllers\Auth;

use CodeIgniter\Events\Events;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegister;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Traits\Viewable;
use Config\Database as ConfigDatabase;

class RegisterController extends ShieldRegister
{
    use Viewable;

    protected $db;

    public function __construct() {
        $this->db = ConfigDatabase::connect();
    }
    /**
     * Displays the registration form.
     *
     * @return RedirectResponse|string
     */
    public function registerView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        $active_jadwal_ppdb = $this->db->table('jadwal_ppdb')->where('is_active', true)->get()->getFirstRow();

        $data = [
            'title' => 'Registrasi Peserta Didik Baru',
            'tahun_ajaran' => $active_jadwal_ppdb->tahun_ajaran,
        ];
        return $this->view(setting('Auth.views')['register'], $data);
    }

    /**
     * Attempts to register the user
     */
    public function registerSiswaAction()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.

        $validationRules = $this->getValidationRules(); // DEFAULT SHIELD USERS VALIDATION RULES

        // RULES FOR EACH TABLE
        $usersRules = [
            'email' => $validationRules['email'],         
        ];

        $biodataRules = [
            'tanggal_pendaftaran' => [
                'label' => 'tanggal_pendaftaran',
                'rules' => ['required', 'valid_date']
            ],
            'jenis_pendaftaran' => [
                'label' => 'jenis_pendaftaran',
                'rules' => ['required', 'in_list[baru,pindahan]'],
            ],
            'nama' => [
                'label' => 'nama',
                'rules' => ['required', 'string'],
            ],
            'tempat_lahir' => [
                'label' => 'tempat_lahir',
                'rules' => ['required', 'string'],
            ],
            'tanggal_lahir' => [
                'label' => 'tanggal_lahir',
                'rules' => ['required', 'valid_date'],
            ],
            'agama' => [
                'label' => 'agama',
                'rules' => ['required', 'string'],
            ],
            'alamat' => [
                'label' => 'alamat',
                'rules' => ['required', 'string'],
            ],
        ];
        
        $orangtuaRules = [
            'ayah_nama' => [
                'label' => 'ayah_nama',
                'rules' => ['required', 'string'],
            ],
            'ayah_telepon' => [
                'label' => 'ayah_telepon',
                'rules' => ['required', 'string'],
            ],
            'ibu_nama' => [
                'label' => 'ibu_nama',
                'rules' => ['required', 'string'],
            ],
            'ibu_telepon' => [
                'label' => 'ibu_telepon',
                'rules' => ['required', 'string'],
            ],
        ];

        $pendidikanRules = [
            'nisn' => [
                'label' => 'nisn',
                'rules' => ['required', 'string'],
            ],
            'nama_sekolah' => [
                'label' => 'nama_sekolah',
                'rules' => ['required', 'string'],
            ],
        ];

        $persyaratanRules = [
            'pas_foto' => [
                'label' => 'pas_foto',
                'rules' => ['uploaded[pas_foto]','is_image[pas_foto]', 'max_size[pas_foto,2048]'],
            ],
            'bukti_pembayaran' => [
                'label' => 'bukti_pembayaran',
                'rules' => ['uploaded[bukti_pembayaran]', 'max_size[bukti_pembayaran,2048]', 'mime_in[bukti_pembayaran,image/png,image/jpeg,application/pdf]'],
            ],
        ];
        
        if (!$this->validate($usersRules) || !$this->validate($biodataRules) || !$this->validate($orangtuaRules) || !$this->validate($pendidikanRules) || !$this->validate($persyaratanRules )) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // --------- SAVE USER ------
    
        // GENERATE no_registrasi for USERNAME
        $active_jadwal_ppdb = $this->db->table('jadwal_ppdb')->where('is_active',true)->get()->getFirstRow();

        $year = substr($active_jadwal_ppdb->tahun_ajaran,2,2);
        $gelombang = $active_jadwal_ppdb->gelombang;
        $user_last_reg = $active_jadwal_ppdb->user_last_reg;
        $new_user_last_reg = $user_last_reg +1; //add 1
        $paddedNumber = str_pad($new_user_last_reg,4,'0',STR_PAD_LEFT);
    
        // GENERATE no registrasi for USERNAME -- 7 (tahun_ajaran 2 + gelombang 1 + new_user_last_reg 4)
        $no_registrasi = $year.$gelombang.$paddedNumber; //username
        
        // GENERATE PASSWORD/PIN (6 number PIN)
        $password = mt_rand(100000,999999);
        
        // GET EMAIL FROM REQUEST 
        $email = $this->request->getPost('email');

        // USER DATA REQUEST
        $userRequest = [
            'email' => $email,
            'username' => $no_registrasi,
            'password' => $password,
            'password_confirm' => $password,
        ];

        $user = $this->getUserEntity();
        $user->fill($userRequest);

        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }

        // BIODATA DATA REQUEST
        $biodataFields = array_keys($biodataRules);
        $biodataRequest = $this->request->getPost($biodataFields);

        // ORANG TUA DATA REQUEST
        $orangtuaFields = array_keys($orangtuaRules);
        $orangtuaRequest = $this->request->getPost($orangtuaFields);

        // PENDIDIKAN DATA REQUEST
        $pendidikanFields = array_keys($pendidikanRules);
        $pendidikanRequest = $this->request->getPost($pendidikanFields);

        // PERSYARATAN DATA REQUEST
        $persyaratanFields = array_keys($persyaratanRules);
        $persyaratanRequest = $this->request->getPost($persyaratanFields);

        $pas_foto = $this->request->getFile('pas_foto');
        $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');

        // GET FILE EXTENSION
        $pas_foto_ext = $pas_foto->getExtension();
        $bukti_pembayaran_ext = $bukti_pembayaran->getExtension();

        // FILE VALIDATION
        if(!$pas_foto->isValid()) {
            throw new \RuntimeException(($pas_foto->getErrorString().'('.$pas_foto->getError().')'));
        } elseif (!$bukti_pembayaran->isValid()) {
            throw new \RuntimeException(($bukti_pembayaran->getErrorString().'('.$bukti_pembayaran->getError().')'));
        }

        // RENAME FILE & EXTENSION
        $pas_foto_filename = "pas_foto{$no_registrasi}.{$pas_foto_ext}";
        $bukti_pembayaran_filename = "bukti_pembayaran{$no_registrasi}.{$bukti_pembayaran_ext}";

        $persyaratanRequest['pas_foto'] = $pas_foto_filename;
        $persyaratanRequest['pas_foto_status'] = 'pending';
        $persyaratanRequest['bukti_pembayaran'] = $bukti_pembayaran_filename;
        $persyaratanRequest['bukti_pembayaran_status'] = 'pending';

        try {
            $users->save($user);
            $id_user = $users->getInsertID();

            // ADD id_user
            $biodataRequest['id_user'] = $id_user;
            $orangtuaRequest['id_user'] = $id_user;
            $pendidikanRequest['id_user'] = $id_user;
            $persyaratanRequest['id_user'] = $id_user;

            // MOVE FILE
            // example path
            // uploads/berkas/<<tahun ajaran 2 digit akhir>>/<<gelombang>>/no_registrasi/filename.jpg
            // uploads/berkas/23/1/pas_foto2310001.jpg

            $pas_foto->move(FCPATH."uploads/persyaratan/$year/$gelombang/$no_registrasi/",$pas_foto_filename);
            $bukti_pembayaran->move(FCPATH."uploads/persyaratan/$year/$gelombang/$no_registrasi/",$bukti_pembayaran_filename);
            
            // SAVE
            $this->db->table('biodata')->insert($biodataRequest);
            $this->db->table('orangtua')->insert($orangtuaRequest);
            $this->db->table('pendidikan')->insert($pendidikanRequest);
            $this->db->table('persyaratan')->insert($persyaratanRequest);

            // SAVE RAW PASSWORD
            $this->db->table('pw')->insert(['id_user' => $id_user, 'pw' => $password]);

            // SAVE hasil_seleksi
            $this->db->table('hasil_seleksi')->insert(['id_user' => $id_user, 'status' => 'pending']);

            // UPDATE USER_LAST_REG
            $this->db->table('jadwal_ppdb')->update(['user_last_reg' => $new_user_last_reg],['is_active' => true]);

        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($user);

        Events::trigger('register', $user);

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined for register, start it up.
        $hasAction = $authenticator->startUpAction('register', $user);
        if ($hasAction) {
            return redirect()->to('auth/a/show');
        }

        // RETURN TO USER
        $data = [
            'email' => $email,
            'nama' => $biodataRequest['nama'],
            'no_registrasi' => $no_registrasi,
            'password' => $password,
            'tanggal_registrasi' => $biodataRequest['tanggal_pendaftaran'],
            'tahun_ajaran' => $active_jadwal_ppdb->tahun_ajaran,
        ];

        // Success!
        return view('auth/register-success',$data);
    }
}
