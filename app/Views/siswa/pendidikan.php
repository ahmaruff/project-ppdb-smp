<?= $this->extend('siswa/layouts/base.php') ?>

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

<div class="card shadow-sm border-0 my-4">
    <div class="card-body p-md-5">
        <h1 class="card-title">Pendidikan</h1>
        <hr>
        <div class="mt-4">
            <form action="" method="post">
                <?= csrf_field() ?>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="nisn" class="col-md-4 col-form-label">Nomor NISN</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $pendidikan->nisn ?>" placeholder="Nomor NISN">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label for="tahun_lulus" class="col-md-4 col-form-label">Tahun Lulus</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" value="<?= $pendidikan->tahun_lulus ?>" placeholder="Tahun Lulus">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_sekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="<?= $pendidikan->nama_sekolah ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="npsn" class="col-sm-2 col-form-label">NPSN Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="npsn" name="npsn" value="<?= $pendidikan->npsn ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat_sekolah" class="col-sm-2 col-form-label">Alamat Sekolah</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat sekolah" name="alamat sekolah" placeholder="alamat sekolah..."> <?= $pendidikan->alamat_sekolah ?></textarea>
                    </div>
                </div>
                <div class="my-3 float-end">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>