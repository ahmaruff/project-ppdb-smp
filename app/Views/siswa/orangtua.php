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
        <h1 class="card-title">Orang Tua</h1>
        <hr>
        <div class="mt-4">
            <form action="" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <h3>Ayah</h3>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ayah_nama" class="col-md-4 col-form-label">Nama Ayah</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ayah_nama" name="ayah_nama" value="<?= $orangtua->ayah_nama ?>" placeholder="nama">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ayah_nik" class="col-md-4 col-form-label">NIK Ayah</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ayah_nik" name="ayah_nik" value="<?= $orangtua->ayah_nik ?>" placeholder="Nomor Induk Kependudukan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ayah_telepon" class="col-md-4 col-form-label">Telepon Ayah</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ayah_telepon" name="ayah_telepon" value="<?= $orangtua->ayah_telepon ?>" placeholder="telepon">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ayah_pendidikan" class="col-md-4 col-form-label">Pendidikan Terakhir Ayah</label>
                            <div class="col-md-8">
                            <select name="ayah_pendidikan" id="ayah_pendidikan" class="form-select">
                                    <option value="<?= $orangtua->ayah_pendidikan ?>" selected><?= $orangtua->ayah_pendidikan ?></option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="SD/Sederajat">SD/Sederajat</option>
                                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ayah_pekerjaan" class="col-md-4 col-form-label">Pekerjaan Ayah</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ayah_pekerjaan" name="ayah_pekerjaan" value="<?= $orangtua->ayah_pekerjaan ?>" placeholder="pekerjaan">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ayah_gaji" class="col-md-4 col-form-label">Penghasilan Ayah</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ayah_gaji" name="ayah_gaji" value="<?= $orangtua->ayah_gaji ?>" placeholder="penghasilan per bulan">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    <h3>Ibu</h3>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ibu_nama" class="col-md-4 col-form-label">Nama Ibu</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ibu_nama" name="ibu_nama" value="<?= $orangtua->ibu_nama ?>" placeholder="nama">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ibu_nik" class="col-md-4 col-form-label">NIK Ibu</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ibu_nik" name="ibu_nik" value="<?= $orangtua->ibu_nik ?>" placeholder="Nomor Induk Kependudukan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ibu_telepon" class="col-md-4 col-form-label">Telepon Ibu</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ibu_telepon" name="ibu_telepon" value="<?= $orangtua->ibu_telepon ?>" placeholder="telepon">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ibu_pendidikan" class="col-md-4 col-form-label">Pendidikan Terakhir Ibu</label>
                            <div class="col-md-8">
                            <select name="ibu_pendidikan" id="ibu_pendidikan" class="form-select">
                                    <option value="<?= $orangtua->ibu_pendidikan ?>" selected><?= $orangtua->ibu_pendidikan ?></option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="SD/Sederajat">SD/Sederajat</option>
                                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ibu_pekerjaan" class="col-md-4 col-form-label">Pekerjaan Ibu</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ibu_pekerjaan" name="ibu_pekerjaan" value="<?= $orangtua->ibu_pekerjaan ?>" placeholder="pekerjaan">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label for="ibu_gaji" class="col-md-4 col-form-label">Penghasilan Ibu</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ibu_gaji" name="ibu_gaji" value="<?= $orangtua->ibu_gaji ?>" placeholder="penghasilan per bulan">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="my-3 float-end">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>