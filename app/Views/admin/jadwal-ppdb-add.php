<?= $this->extend('admin/layouts/base.php') ?>

<?= $this->section('content') ?>
<?php if (session('message') !== null && is_array(session('message'))) : ?>
    <div class="card shadow-sm border-0 my-4">
        <div class="card-body p-md-5">
            <div class="d-flex justify-content-start align-content-center flex-wrap">
            <?php foreach (session('message') as $flash) :?>
                <div class="alert alert-<?= $flash[0]?> alert-dismissible fade show m-1 small" role="alert">
                    <?php print_r($flash[1]) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>

<div class="card border-0 shadow-sm my-4">
    <div class="card-body p-md-5">
        <h1 class="card-title">Tambah Jadwal PPDB</h1>
        <hr>
        <form action="" method="post">
            <?php csrf_field() ?>
            <div class="mb-4 row">
                <div class="col-12 col-md-4">
                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="e.g. 2021/2022" required>       
                </div>
                <div class="col-6 col-md-2">
                    <label for="gelombang" class="form-label">Gelombang</label>
                    <select name="gelombang" id="gelombang" class="form-select" aria-label="Gelombang" required> 
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <div class="mb-4 row">
                <div class="col-12 col-md-4">
                    <label for="mulai_pendaftaran" class="form-label">Mulai Pendaftaran</label>
                    <input type="date" class="form-control" id="mulai_pendaftaran" name="mulai_pendaftaran" required>       
                </div>
                <div class="col-12 col-md-4">
                    <label for="akhir_pendaftaran" class="form-label">Akhir Pendaftaran</label>
                    <input type="date" class="form-control" id="akhir_pendaftaran" name="akhir_pendaftaran" required>       
                </div>
            </div>
            <div class="mb-4 row">
                <div class="col-12 col-md-4">
                    <label for="tanggal_seleksi" class="form-label">Tanggal Seleksi</label>
                    <input type="date" class="form-control" id="tanggal_seleksi" name="tanggal_seleksi" required>       
                </div>
                <div class="col-12 col-md-4">
                    <label for="tanggal_pengumuman" class="form-label">Tanggal Pengumuman</label>
                    <input type="date" class="form-control" id="tanggal_pengumuman" name="tanggal_pengumuman" required>       
                </div>
            </div>
            <div class="mb-4 row">
                <div class="col-12 col-md-4">
                    <label for="ketua_panitia" class="form-label">Ketua Panitia</label>
                    <input type="text" class="form-control" id="ketua_panitia" name="ketua_panitia" required>  
                </div>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i> Tambah Jadwal</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>