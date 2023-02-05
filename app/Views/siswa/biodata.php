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
        <h1 class="card-title">Biodata</h1>
        <hr>
        <div class="mt-4">
            <form action="" method="post">
                <?= csrf_field() ?>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <label for="tanggal_pendaftaran" class="col-md-4 col-form-label">Tanggal Pendaftaran</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="tanggal_pendaftaran" name="tanggal_pendaftaran" value="<?= $biodata->tanggal_pendaftaran ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="jenis_pendaftaran" class="col-md-4 col-form-label text-md-end">Jenis Pendaftaran</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="jenis_pendaftaran" name="jenis_pendaftaran" value="<?= $biodata->jenis_pendaftaran ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $biodata->nama ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <label for="nik" class="col-md-4 col-form-label">NIK</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $biodata->nik ?>" placeholder="nomor NIK">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="agama" class="col-md-4 col-form-label text-md-end">Agama</label>
                            <div class="col-md-8">
                                <select name="agama" id="agama" class="form-select">
                                    <option value="<?= $biodata->agama ?>" selected><?= ucfirst($biodata->agama) ?></option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="konghuchu">Konghuchu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <label for="tempat_lahir" class="col-md-4 col-form-label">Tempat Lahir</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $biodata->tempat_lahir ?>" placeholder="kota/kabupaten">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">Tanggal Lahir</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $biodata->tanggal_lahir ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <label for="telepon" class="col-md-4 col-form-label">Telepon</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $biodata->telepon ?>" placeholder="no telepon">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="kode_pos" class="col-md-4 col-form-label text-md-end">Kode Pos</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?= $biodata->kode_pos ?>" placeholder="kode pos">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="alamat..."> <?= $biodata->alamat ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <div class="col-2">
                        <label for="anak_ke" class="col-form-label">Anak Ke</label>
                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" value="<?= $biodata->anak_ke ?>" placeholder="Anak Ke">
                    </div>
                    <div class="col-4">
                        <label for="jml_saudara_kandung" class="col-form-label">Jumlah Saudara Kandung</label>
                        <input type="text" class="form-control" id="jml_saudara_kandung" name="jml_saudara_kandung" value="<?= $biodata->jml_saudara_kandung ?>" placeholder="Tidak Termasuk Anda">
                    </div>
                    <div class="col">
                        <label for="kebutuhan_khusus" class="col-form-label">Kebutuhan Khusus</label>
                        <select name="kebutuhan_khusus" id="kebutuhan_khusus" class="form-select" onchange="showfield(this.options[this.selectedIndex].value)">
                            <option value="<?= $biodata->kebutuhan_khusus ?>" selected><?= ucwords($biodata->kebutuhan_khusus) ?></option>
                            <option value="Saya tidak berkebutuhan khusus">Saya tidak berkebutuhan khusus</option>
                            <option value="Bisu/Tuli">Bisu/Tuli</option>
                            <option value="Tuna netra/penglihatan">Tuna netra/penglihatan</option>
                            <option value="Tuna grahita/disabilitas intelektual">Tuna grahita/disabilitas intelektual</option>
                            <option value="Tuna daksa/disabilitas fisik">Tuna daksa/disabilitas fisik</option>
                            <option value="Gangguan emosional">Gangguan emosional</option>
                            <option value="Hiperaktif/ADHD">Hiperaktif/ADHD</option>
                            <option value="Autisme">Autisme</option>
                            <option value="Epilepsi">Epilepsi</option>
                            <option value="Cerdas istimewa/bakat istimewa">Cerdas istimewa/bakat istimewa</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <div id="otherDisabilitas"></div>
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
<script type="text/javascript">
    function showfield(name){
        if(name=='Lainnya'){
            document.getElementById('otherDisabilitas').innerHTML='<input type="text" class="form-control mt-2" name="kebutuhan_khusus" placeholder="Kebutuhan khusus..."/>';
        }
        else {
            document.getElementById('otherDisabilitas').innerHTML='';
        }
    }
</script>
<?= $this->endSection() ?>