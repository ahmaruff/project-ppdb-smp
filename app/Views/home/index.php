<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="/assets/libs/bootstrap-5.2.2/css/bootstrap.min.css">
    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title><?= $title ?></title>
</head>
<body>
    <div class="container mb-5">
        <header>
            <div class="px-4 pt-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="m-2">
                        <img src="/assets/images/logo.png" alt="logo" class="img-fluid" width="150">
                    </div>
                    <div class="vr m-3"></div>
                    <div class="m-2">
                        <h1 class="display-5 fw-bold">Sistem Penerimaan Peserta Didik Baru</h1>
                        <h2>SMP Ma'arif Kalibawang, Wonosobo</h2>
                    </div>
                </div>
                <hr>
                <p class="lead text-center">
                    Terwujudnya peserta didik yang betaqwa, berakhlaqul karimah, kreatif dan berkualitas. <br>
                </p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center my-4">
                    <a href="/register" class="btn btn-primary btn-lg px-4">Daftar Sekarang</a>
                    <a href="#selamatdatang" class="btn btn-outline-secondary btn-lg px-4">Info Lebih Lanjut</a>
                </div>
                <div class="overflow-hidden" style="max-height: 40vh;">
                    <div class="container px-5">
                        <img src="/assets/images/heroes.jpg" alt="hero images" class="img-fluid border rounded-3 shadow-lg" loading="lazy">
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- NAVBARS -->
    <?= $this->include('home/layouts/nav.php') ?>

    <!-- CONTENT -->
    <main class="container" style="min-height: 100vh;">
        <section class="container-fluid" id="selamatdatang" style="padding-top: 100px;">
            <div class="row">
                <div class="col-md-7">
                    <img src="/assets/images/orang1.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-md-5">
                    <h1 class="fw-bold">PPDB SMP Ma'arif Kalibawang</h1>
                    <h3>Tahun ajaran 2022/2023</h3>
                    <p class="lead">
                        Informasi seputar kegiatan PPDB SMP Ma'arif Kalibawang
                    </p>
                    <div class="row">
                        <div class="col d-grid">
                            <a href="/info" class="btn btn-outline-primary btn-lg">Info PPDB</a>
                        </div>
                        <div class="col d-grid">
                            <a href="/login" class="btn btn-success btn-lg">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- INFO PPDB -->
            <div class="row mt-5">
                <div class="col-sm-6 col-md-4 col-lg-4 m-2">
                    <div class="card" style="width: 18rem;">
                        <img src="/assets/images/drumband.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid" id="persyaratan" style="padding-top: 100px;">
            <div class="d-flex flex-md-row flex-sm-column justify-content-center align-items-center">
                <div class="flex-item m-3">
                    <h1 class="text-center mb-3 fw-bold">Persyaratan</h1>
                    <ul>
                        <li>
                            <p>Mengisi Formulir Pendaftaran</p>
                        </li>
                        <li>
                            <p>Fotocopy Ijazah SD/MI</p>
                        </li>
                        <li>
                            <p>Fotocopy SKHUN SD/MI</p>
                        </li>
                        <li>
                            <p>Fotocopy Kartu Keluarga</p>
                        </li>
                        <li>
                            <p>Fotocopy NISN</p>
                        </li>
                        <li>
                            <p>fotocopy Akta Kelahiran</p>
                        </li>
                        <li>
                            <p>Fotocopy KTP Orang Tua/Wali</p>
                        </li>
                        <li>
                            <p>Fotocopy KPS/KIS/KIP</p>
                        </li>
                        <li>
                            <p>Pas Foto 3x4 (4 Lembar)</p>
                        </li>
                    </ul>
                </div>
                <div class="flex-item m-3">
                    <img src="/assets/images/info-ppdb.jpg" alt="info pdb" class="img-fluid" width="400">
                </div>
            </div>
        </section>

        <section class="container-fluid" id="jadwal" style="padding-top: 100px;">
            <div class="row">
                <div class="col-md-5 d-flex flex-column justify-content-center">
                    <h1 class="mb-3 fw-bold mb-0">Jadwal PPDB</h1>
                    <p class="lead m-0 p-2">
                        Timeline/linimasa PPDB SMP Ma'arif Kalibawang,
                        Gelombang <span class="badge rounded-pill bg-success"><?= $jadwal_ppdb->gelombang ?></span>
                        Tahun Ajaran <span class="badge rounded-pill bg-success"><?= $jadwal_ppdb->tahun_ajaran ?></span> 
                    </p>
                    <table class="table table-hover">
                        <tr>
                            <td>Mulai Pendaftaran</td>
                            <td class="tanggal" data-tgl="<?= $jadwal_ppdb->mulai_pendaftaran ?>"></td>
                        </tr>
                        <tr>
                            <td>Akhir Pendaftaran</td>
                            <td class="tanggal" data-tgl="<?= $jadwal_ppdb->akhir_pendaftaran ?>"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Seleksi</td>
                            <td class="tanggal" data-tgl="<?= $jadwal_ppdb->tanggal_seleksi ?>"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengumuman</td>
                            <td class="tanggal" data-tgl="<?= $jadwal_ppdb->tanggal_pengumuman ?>"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-7">
                    <img src="/assets/images/pramuka.jpg" alt="" class="img-fluid" width="600">
                </div>
            </div>
        </section>

        <section class="container-fluid" id="kontak" style="padding-top: 100px;">
            <div class="row">
                <div class="col-md-7">
                    <iframe class="ratio ratio-16x9" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.6543215445495!2d109.92221511431342!3d-7.5033603612972035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7abd4742cf89f3%3A0x8061741c9ea77609!2sSMP%20Ma&#39;arif%20Kalibawang!5e0!3m2!1sid!2sid!4v1673346746250!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-5">
                    <div>
                        <h1 class="mb-3 fw-bold">Kontak</h1>
                        <h3>SMP Ma'arif Kalibawang</h3>
                        <p><i class="bi bi-geo-alt-fill lead me-3"></i>Jalan Kaliwiro KM. 01, Kalibawang, Wonosobo 56375</p>
                        <p><i class="bi bi-telephone-fill lead me-3"></i>0286 3399092</p>
                        <p><i class="bi bi-envelope-fill lead me-3"></i>spemka_ka@yahoo.co.id</p>
                    </div>
                    <hr>
                    <div>
                        <h4>Contact Person</h4>
                        <div class="list-group-flush">
                            <a href="https://wa.me/6285867171242" class="list-group-item list-group-item-action p-1"><i class="bi bi-whatsapp lead me-3"></i>+62 858 6717 1242 (Ahmad Faizun)</a>
                            <a href="https://wa.me/6281329983344" class="list-group-item list-group-item-action p-1"><i class="bi bi-whatsapp lead me-3"></i>+62 813 2998 3344 (Ahmad Fauzen)</a>
                            <a href="https://wa.me/6285868524590" class="list-group-item list-group-item-action p-1"><i class="bi bi-whatsapp lead me-3"></i>+62 858 6852 4590 (Indah Haryanti)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER  -->
    <?= $this->include('home/layouts/footer.php') ?>

    <script src="/assets/js/app.js"></script>

    <script>
        var tanggal = document.querySelectorAll('.tanggal').forEach(element => {
            displayDate(element);
        });
    </script>
    <!-- BOOTSTRAP -->
    <script src="/assets/libs/bootstrap-5.2.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>