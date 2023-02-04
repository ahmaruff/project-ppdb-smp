<?= $this->extend('auth/layouts/base.php') ?>

<?= $this->section('content') ?>
<main class="card my-5 mx-auto p-4 shadow-sm border-0 bg-white" style="max-width: 767px;">
    <div class="d-flex justify-content-center align-items-center gap-4">
        <div class="d-none d-md-block">
            <img src="/assets/images/logo.png" alt="" class="img-fluid" width="150">
        </div>
        <div>
            <h1 class="fw-bold">Registrasi Peserta Didik Baru</h1>
            <p class="lead">SMP Ma'arif Kalibawang, Tahun ajaran <?= $tahun_ajaran ?></p>
        </div>
    </div>
    <?php if (session('error') !== null) : ?>
        <div class="alert alert-danger m-3" role="alert"><?= session('error') ?></div>
    <?php elseif (session('errors') !== null) : ?>
        <div class="alert alert-danger m-3" role="alert">
            <?php if (is_array(session('errors'))) : ?>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                    <br>
                <?php endforeach ?>
            <?php else : ?>
                <?= session('errors') ?>
            <?php endif ?>
        </div>
    <?php endif ?>

    <form action="/register" method="post" class="my-5" enctype="multipart/form-data">
        <?= csrf_field() ?>
        

        <div class="row mb-3 align-items-center">
            <label for="tanggal_pendaftaran" class="col-sm-3 col-form-label">Tanggal pendaftaran</label>
            <div class="col-sm-9">
                <input type="date" name="tanggal_pendaftaran" value="" class="form-control" id="tanggal_pendaftaran" readonly>
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <label for="jenis_pendaftaran" class="col-sm-3 col-form-label">Jenis pendaftaran</label>
            <div class="col-sm-9">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_pendaftaran" id="jenis_pendaftaran1" value="baru" checked>
                    <label for="jenis_pendaftaran1" class="form-check-label">Siswa Baru</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_pendaftaran" id="jenis_pendaftaran2" value="pindahan">
                    <label for="jenis_pendaftaran2" class="form-check-label">Pindahan</label>
                </div>
            </div>
        </div>
        <hr>
        <h3>Data Diri</h3>
        <div class="row mb-3 align-items-center">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" name="email" class="form-control" id="email">
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="nama" class="col-sm-3 col-form-label">Nama lengkap</label>
            <div class="col-sm-9">
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat lahir</label>
            <div class="col-sm-9">
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal lahir</label>
            <div class="col-sm-9">
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="agama" class="col-sm-3 col-form-label">Agama</label>
            <div class="col-sm-9">
                <select name="agama" id="agama" class="form-select">
                    <option value="islam" selected>Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="budha">Budha</option>
                    <option value="hindu">Hindu</option>
                    <option value="konghuchu">Konghuchu</option>
                </select>
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
            </div>
        </div>

        <hr>
        <h3>Data Orang Tua</h3>
        <div class="row mb-3 align-items-center">
            <label for="ayah_nama" class="col-sm-3 col-form-label">Nama ayah</label>
            <div class="col-sm-9">
                <input type="text" name="ayah_nama" class="form-control" id="ayah_nama">
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="ayah_telepon" class="col-sm-3 col-form-label">No HP ayah</label>
            <div class="col-sm-9">
                <input type="tel" name="ayah_telepon" class="form-control" id="ayah_telepon">
            </div>
        </div>
        <br>
        <div class="row mb-3 align-items-center">
            <label for="ibu_nama" class="col-sm-3 col-form-label">Nama ibu</label>
            <div class="col-sm-9">
                <input type="text" name="ibu_nama" class="form-control" id="ibu_nama">
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="ibu_telepon" class="col-sm-3 col-form-label">No HP ibu</label>
            <div class="col-sm-9">
                <input type="tel" name="ibu_telepon" class="form-control" id="ibu_telepon">
            </div>
        </div>

        <hr>
        <h3>Data Pendidikan</h3>
        <div class="row mb-3 align-items-center">
            <label for="nisn" class="col-sm-3 col-form-label">Nomor NISN</label>
            <div class="col-sm-9">
                <input type="text" name="nisn" class="form-control" id="nisn">
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="nama_sekolah" class="col-sm-3 col-form-label">Asal sekolah</label>
            <div class="col-sm-9">
                <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah">
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="pas_foto" class="col-sm-3 col-form-label">Pas foto 3x4</label>
            <div class="col-sm-9">
                <input type="file" name="pas_foto" class="form-control" id="pas_foto" multiple>
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="bukti_pembayaran" class="col-sm-3 col-form-label">Bukti pembayaran</label>
            <div class="col-sm-9">
                <input type="file" name="bukti_pembayaran" class="form-control" id="bukti_pembayaran" multiple>
                <div class="form-text">Hanya menerima jenis file <strong>gambar/pdf</strong></div>
            </div>
        </div>
        <div class="row mb-3 align-items-center mt-5">
            <p class="col-sm-7 mb-0">
                Silakan <strong>teliti dahulu</strong> seluruh data yang dimasukkan diatas sebelum klik tombol <strong>daftar.</strong>
                Apabila sudah benar, silakan klik tombol <strong>daftar</strong> disamping
            </p>
            <div class="col-sm-5 d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
            </div>
        </div>
    </form>
</main>

<div class="my-5 text-center">
    <h4 class="fw-bold"><i class="bi bi-telephone-fill me-3"></i>Pertanyaan seputar pendaftaran?</h4>
    <p class="lead">Hubungi kami di layanan PPDB, <a href="https://wa.me/6285867171242"> +62 858 6717 1242</a> atau <a href="/#kontak">kontak lainnya</a></p>
</div>
<div class="py-4" s></div>

<script>
    function getDate() {
        var time = new Date(Date.now());
        var date = time.toLocaleDateString('en-CA',{timeZone: 'Asia/Jakarta'});
        document.getElementById('tanggal_pendaftaran').setAttribute('value', date);
        console.log(date);
    }

    document.addEventListener('DOMContentLoaded',(event)=> {getDate()});
</script>
<?= $this->endSection() ?>