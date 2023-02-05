<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">

     <!-- CUSTOM -->
    <link rel="stylesheet" media="screen" href="/assets/css/style.css">
    <link rel="stylesheet" media="print" href="/assets/css/pengumuman-print.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="/assets/libs/bootstrap-5.2.2/css/bootstrap.min.css">

    <title><?= $title ?></title>
    <style>
        @media screen {
            body {
                font-family: 'Times New Roman', Times, serif;
                max-width: 800px;
                margin: 2.5rem 5rem;
            }
        }
        @media print {
            #cetak {
                display: none;
            }
        }
    </style>
</head>
<body>
    <button id="cetak" class="btn btn-primary btn-lg my-2" onclick="window.print()">CETAK</button>
    <div id="page">
        <section style="border-bottom: 4pt solid #000000;">
            <div class="d-flex flex-row justify-content-center align-items-center gap-3 pb-1">
                <img src="/assets/images/logo.png" alt="logo" class="img-fluid" style="width: 3cm;">
                <h3 class="w-75 mb-0 text-center fw-bold">
                    LEMBAGA PENDIDIKAN MAA'RIF NU <br>
                    SMP MA'ARIF KALIBAWANG<br>
                    TAHUN AJARAN <?= $jadwal_ppdb->tahun_ajaran ?>
                </h3>
            </div>
            <p class="text-center small fst-italic fst-lighter m-0">Jalan Kaliwiro KM. 01, Kalibawang, Wonosobo 56375. telepon: 0286 3399092. email: spemka_ka@yahoo.co.id</p>
        </section>
        <section class="my-3">
            <h3 class="text-center fw-bold text-decoration-underline">SURAT KETERANGAN</h3>
        </section>
        <section class="row">
            <div class="data col-9">
                <p>
                    <em>Assalamualaikum wr.wb</em><br>
                    Yang bertanda tangan dibawah ini, ketua panitia Penerimaan Peserta Didik Baru SMP Ma'arif Kalibawang, tahun ajaran <?= $jadwal_ppdb->tahun_ajaran ?>.
                    Berdasarkan hasil seleksi penerimaan peserta didik baru gelombang <?= $jadwal_ppdb->gelombang ?>, Menerangkan bahwa:
                </p>
                <table class="table table-borderless table-sm mt-0">
                    <tr>
                        <td>Nama</td>
                        <td>: <?= $nama ?></td>
                    </tr>
                    <tr>
                        <td>No Registrasi</td>
                        <td>: <?= $no_registrasi ?></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>: <?= $biodata->nik ?></td>
                    </tr>
                    <tr>
                        <td>Tempat, tanggal lahir</td>
                        <td>: <?= $biodata->tempat_lahir?>,  <span class="tanggal" data-tgl="<?= $biodata->tanggal_lahir ?>"></span></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>: <?= $biodata->telepon ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?= $email ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-3 text-center">
                <img src="<?= $pas_foto_path ?>" alt="" class="img-fluid">
                <p class="lead fw-bold m-0"><?= $nama ?></p>
                <p class="fst-lighter m-0"><?= $no_registrasi ?></p>
            </div>
        </section>
        <section>
            <div class="text-center">
                <p class="m-0">Dengan ini, yang bersangkutan dinyatakan:</p>
                <h3 class="m-0">
                    <?php if($status === 'diterima') :?>
                        <strong>Diterima/<s>Tidak Diterima</s></strong>
                    <?php else :?>
                        <strong><s>Diterima</s>/Tidak Diterima</strong>
                    <?php endif ?>    
                </h3>
                <p>
                    Sebagai peserta didik baru SMP Ma'arif Kalibawang, tahun ajaran <?= $jadwal_ppdb->tahun_ajaran ?>.
                </p>
            </div>
            <p>
                Surat keterangan ini harap disimpan dengan baik dan dipergunakan untuk proses <strong>daftar ulang.</strong>
                Bagi calon peserta didik yang tidak melaksanakan proses daftar ulang sesuai dengan jadwal yang ditentukan,
                maka status pendaftaran akan dianggap gugur.
                <br>
                <br>
                Demikian surat keterangan ini kami buat dengan sebenar-benarnya, untuk dipergunakan sebagaimana mestinya.
                <br>
                <em>Wassalamualaikum wr.wb.</em>
            </p>
            <div class="float-end text-center m-0">
                <p>Wonosobo, <span class="tanggal" data-tgl="<?= $jadwal_ppdb->tanggal_pengumuman ?>"></span></p>         
                <p>Ketua Panitia</p>
                <div style="height: 1.6cm; width:auto;"></div>

                <?php if(isset($jadwal_ppdb->ketua_panitia)) :?>
                    <p class="fw-bold"><?= $jadwal_ppdb->ketua_panitia ?></p>
                <?php else :?>
                    <p>(..........................................)</p>
                <?php endif ?>    
            </div>
        </section>
    </div>
</body>
<script src="/assets/js/app.js"></script>
<script>
    var tanggal = document.querySelectorAll('.tanggal').forEach(element => {
        displayDate(element);
    });
</script>
</html>