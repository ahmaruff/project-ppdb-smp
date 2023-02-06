<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('\Home\HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/',           '\App\Controllers\Home\HomeController::index');
$routes->get('home',        '\App\Controllers\Home\HomeController::index');
$routes->get('tentang',     '\App\Controllers\Home\HomeController::tentang');
$routes->get('info',        '\App\Controllers\Home\HomeController::info');
$routes->get('info/(:num)', '\App\Controllers\Home\HomeController::infoDetailById/$1');
$routes->get('tampil-persyaratan/(:num)/(:segment)/(:segment)','\App\Controllers\Admin\ManageSiswaController::showPersyaratan/$1/$2/$3');

service('auth')->routes($routes, [ 'except' => ['login', 'register']]);

$routes->get('login',       '\App\Controllers\Auth\LoginController::loginView');
$routes->post('login',      '\App\Controllers\Auth\LoginController::loginAction');
$routes->get('register',    '\App\Controllers\Auth\RegisterController::registerView');
$routes->post('register',   '\App\Controllers\Auth\RegisterController::registerSiswaAction');


$routes->group('siswa',['filter' => ['session','siswa-auth']], static function($routes) {
    $routes->get('/','\App\Controllers\Siswa\SiswaController::dashboard');
    $routes->get('kartu-pendaftaran', '\App\Controllers\Siswa\SiswaController::kartuPendaftaranView');
    $routes->get('info', '\App\Controllers\Siswa\SiswaController::infoDashboard');
    $routes->get('info/(:num)', '\App\Controllers\Siswa\SiswaController::infoDetailById/$1');
    $routes->get('pengumuman', '\App\Controllers\Siswa\SiswaController::pengumumanView');
    $routes->get('ubah-password',   '\App\Controllers\Siswa\SiswaController::ubahPasswordView');
    $routes->post('ubah-password',  '\App\Controllers\Siswa\SiswaController::ubahPasswordAction');
    $routes->get('biodata', '\App\Controllers\Siswa\BiodataController::biodataView');
    $routes->post('biodata', '\App\Controllers\Siswa\BiodataController::biodataAction');
    $routes->get('pendidikan', '\App\Controllers\Siswa\PendidikanController::pendidikanView');
    $routes->post('pendidikan', '\App\Controllers\Siswa\PendidikanController::pendidikanAction');
    $routes->get('orangtua', '\App\Controllers\Siswa\OrangtuaController::orangtuaView');
    $routes->post('orangtua', '\App\Controllers\Siswa\OrangtuaController::orangtuaAction');
    $routes->get('persyaratan', '\App\Controllers\Siswa\PersyaratanController::persyaratanView');
    $routes->post('persyaratan', '\App\Controllers\Siswa\PersyaratanController::persyaratanAction');
});

$routes->group('admin',['filter' => ['session','admin-auth']], static function($routes) {
    $routes->get('/', '\App\Controllers\Admin\AdminController::dashboard');
    $routes->post('ubah-jadwal', '\App\Controllers\Admin\AdminController::ubahJadwalAktifAction');
    $routes->get('ubah-password', '\App\Controllers\Admin\AdminController::ubahPasswordView');
    $routes->post('ubah-password', '\App\Controllers\Admin\AdminController::ubahPasswordAction');
    $routes->get('jadwal-ppdb', '\App\Controllers\Admin\JadwalPpdbController::jadwalDashboardView');
    $routes->get('jadwal-ppdb/add', '\App\Controllers\Admin\JadwalPpdbController::jadwalAddView');
    $routes->post('jadwal-ppdb/add', '\App\Controllers\Admin\JadwalPpdbController::jadwalAddAction');
    $routes->get('jadwal-ppdb/edit/(:num)', '\App\Controllers\Admin\JadwalPpdbController::jadwalEditView/$1');
    $routes->post('jadwal-ppdb/edit/(:num)', '\App\Controllers\Admin\JadwalPpdbController::jadwalEditAction/$1');
    $routes->get('jadwal-ppdb/delete/(:num)', '\App\Controllers\Admin\JadwalPpdbController::jadwalDeleteAction/$1');
    $routes->get('data-siswa', '\App\Controllers\Admin\ManageSiswaController::dataSiswaView');
    $routes->get('data-siswa/(:num)', '\App\Controllers\Admin\ManageSiswaController::dataSiswaDetailView/$1');
    $routes->post('verifikasi/(:segment)', '\App\Controllers\Admin\ManageSiswaController::verifikasiPersyaratanAction/$1' );
    $routes->post('ubah-status-seleksi', '\App\Controllers\Admin\ManageSiswaController::ubahStatusSeleksiAction');
    $routes->get('info-ppdb', '\App\Controllers\Admin\ManageInfoController::infoDashboard');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
