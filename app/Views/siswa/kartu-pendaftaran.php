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

    <title>Berhasil Registrasi - <?= $nama ?></title>
    <style>
        p {
                margin: 0 !important;
            }
        @media print {
            @page {
                size : A4 portrait;
                margin: 2cm !important;
            }
            * {
                box-sizing: border-box;
            }

            body {
                font-size: 12pt;
                line-height: 1.5;
                background: #FFFFFF !important;
                color: #000000;
                width: 100%;
                margin: 0;
                float: none;
            }
            
            .bg-light {
                background-color: white !important;
            }
            .container, .container-md, .container-sm, .container-lg {
                width: 100% !important;
                margin: 10px !important;
            }
            .shadow-sm {
                box-shadow: none !important;
            }
            .mx-auto, .my-5 {
                margin: 10px !important;
            }
            #toolbarContainer {
                display: none !important;
            }
        }
        @media screen {
            main {
                max-width: 540px;
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="containerk">
        <main class="card my-5 mx-auto p-4 shadow-sm bg-white">
            <div class="d-flex justify-content-center align-items-center gap-4">
                <div>
                    <img src="/assets/images/logo.png" alt="" class="img-fluid" width="150">
                </div>
                <div>
                    <h1 class="fw-bold">Selamat, Kamu telah Terdaftar!</h1>
                    <p class="lead m-0">
                        PPDB SMP Ma'arif Kalibawang
                        <br>
                        tahun ajaran <?= $tahun_ajaran ?>
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4"><p class="lead m-0">No Registrasi</p></div>
                <div class="col-8"><p class="lead fw-bold"><?= $no_registrasi ?></p></div>
            </div>
            <div class="row">
                <div class="col-4"><p>Nama</p></div>
                <div class="col-8"><p><?= $nama ?></p></div>
            </div>
            <div class="row">
                <div class="col-4"><p>Email</p></div>
                <div class="col-8"><p><?= $email ?></p></div>
            </div>
            <div class="row">
                <div class="col-4"><p>Password</p></div>
                <div class="col-8"><p><strong><?= $password ?></strong></p></div>
            </div>
            <div class="row">
                <div class="col-4"><p>Tanggal Registrasi</p></div>
                <div class="col-8"><p id= "tanggalRegistrasi" data-tgl ="<?= $tanggal_registrasi ?>"></p></div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <p class="m-0">* Simpan baik-baik kartu registrasi ini,</p>
                    <p class="m-0">** Gunakan nomor registrasi & password untuk login sistem PPDB</p>
                </div>
            </div>
        </main>
    </div>
    
    <script src="/assets/js/app.js"></script>
    <script>
        var tanggalRegistrasi = document.getElementById('tanggalRegistrasi');
        displayDate(tanggalRegistrasi);    
    </script>
    
    <!-- BOOTSTRAP -->
    <script src="/assets/libs/bootstrap-5.2.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>