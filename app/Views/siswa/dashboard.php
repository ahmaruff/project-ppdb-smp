<?= $this->extend('siswa/layouts/base.php') ?>
<?php $session = session(); ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0 my-4">
    <div class="card-body">
        <h3 class="card-title">Notifikasi</h3>
        <div class="d-flex justify-content-between align-content-center flex-wrap">
            <?php if(session('message')!== null && is_array(session('message'))) : ?>
                <?php foreach (session('message') as $flash) :?>
                    <div class="alert alert-<?= $flash[0]?> alert-dismissible fade show m-1 small" role="alert">
                        <?= $flash[1] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endforeach ?>
            <?php endif ?>            
        </div>
    </div>
</div>

<div class="card shadow-sm border-0 my-4">
    <div class="card-body">
        <div class="card-group">
            <div class="card text-center border-0 border-end">
                <div class="card-body">
                    <h5 class="card-title">Kartu Pendaftaran</h5>
                    <a href="#" class="btn btn-outline-secondary d-block btn-lg" onclick="frames['printKartuPendaftaran'].print()"><i class="bi bi-printer"></i> Cetak</a>
                </div>
            </div>
            <div class="card text-center border-0 border-end">
                <div class="card-body">
                    <h5 class="card-title">Hasil Seleksi</h5>
                    <a href="#" class="btn btn-outline-secondary d-block btn-lg" onclick="frames['printPengumuman'].print()"><i class="bi bi-printer"></i> Cetak</a>
                </div>
            </div>
            <div class="card text-center border-0">
                <div class="card-body">
                    <h5 class="card-title">Ada Pertanyaan?</h5>
                    <a href="/#kontak" class="btn btn-outline-secondary d-block btn-lg"><i class="bi bi-telephone"></i> Kontak</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-sm border-0 my-4">
    <div class="card-body">
        <h3 class="card-title">Status Verifikasi Persyaratan</h3>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Berkas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pas Foto</td>
                            <td>
                                <?php if($persyaratan->pas_foto_status == 'pending') : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif($persyaratan->pas_foto_status == 'terverifikasi') : ?>
                                    <span class="badge bg-success">Terverifikasi</span>
                                <?php elseif($persyaratan->pas_foto_status == 'gagal') : ?>
                                    <span class="badge bg-danger">Gagal</span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Kartu NISN</td>
                            <td>
                                <?php if($persyaratan->kartu_nisn_status == 'pending') : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif($persyaratan->kartu_nisn_status == 'terverifikasi') : ?>
                                    <span class="badge bg-success">Terverifikasi</span>
                                <?php elseif($persyaratan->kartu_nisn_status == 'gagal') : ?>
                                    <span class="badge bg-danger">Gagal</span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Bukti Pembayaran</td>
                            <td>
                                <?php if($persyaratan->bukti_pembayaran_status == 'pending') : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif($persyaratan->bukti_pembayaran_status == 'terverifikasi') : ?>
                                    <span class="badge bg-success">Terverifikasi</span>
                                <?php elseif($persyaratan->bukti_pembayaran_status == 'gagal') : ?>
                                    <span class="badge bg-danger">Gagal</span>
                                <?php endif ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Berkas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SKL</td>
                            <td>
                                <?php if($persyaratan->skl_status == 'pending') : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif($persyaratan->skl_status == 'terverifikasi') : ?>
                                    <span class="badge bg-success">Terverifikasi</span>
                                <?php elseif($persyaratan->skl_status == 'gagal') : ?>
                                    <span class="badge bg-danger">Gagal</span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Transkrip Nilai</td>
                            <td>
                                <?php if($persyaratan->transkrip_nilai_status == 'pending') : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif($persyaratan->transkrip_nilai_status == 'terverifikasi') : ?>
                                    <span class="badge bg-success">Terverifikasi</span>
                                <?php elseif($persyaratan->transkrip_nilai_status == 'gagal') : ?>
                                    <span class="badge bg-danger">Gagal</span>
                                <?php endif ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Berkas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kartu Keluarga</td>
                            <td>
                                <?php if($persyaratan->kartu_keluarga_status == 'pending') : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif($persyaratan->kartu_keluarga_status == 'terverifikasi') : ?>
                                    <span class="badge bg-success">Terverifikasi</span>
                                <?php elseif($persyaratan->kartu_keluarga_status == 'gagal') : ?>
                                    <span class="badge bg-danger">Gagal</span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Akta Kelahiran</td>
                            <td>
                                <?php if($persyaratan->akta_kelahiran_status == 'pending') : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif($persyaratan->akta_kelahiran_status == 'terverifikasi') : ?>
                                    <span class="badge bg-success">Terverifikasi</span>
                                <?php elseif($persyaratan->akta_kelahiran_status == 'gagal') : ?>
                                    <span class="badge bg-danger">Gagal</span>
                                <?php endif ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="my-4">
    <div class="row">
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title">Data Diri</h3>
                    <dl class="row">
                        <dt class="col-5">Nama</dt>
                        <dd class="col-7">: <?= $biodata->nama ?></dd>
                        
                        <dt class="col-5">NIK</dt>
                        <dd class="col-7">: <?= $biodata->nik ?></dd>
                        
                        <dt class="col-5">Tanggal Lahir</dt>
                        <dd class="col-7">: <?= $biodata->tanggal_lahir ?></dd>
                        
                        <dt class="col-5">Alamat</dt>
                        <dd class="col-7">: <?= $biodata->alamat ?></dd>

                        <dt class="col-5">Kode Pos</dt>
                        <dd class="col-7">: <?= $biodata->kode_pos ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title">Orang Tua</h3>
                    <dl class="row">
                        <dt class="col-5">Ayah</dt>
                        <dd class="col-7">: <?= $orangtua->ayah_nama ?></dd>
                        
                        <dt class="col-5">No Telepon</dt>
                        <dd class="col-7">: <?= $orangtua->ayah_telepon ?></dd>
                        
                        <dt class="col-5">Ibu</dt>
                        <dd class="col-7">: <?= $orangtua->ibu_nama ?></dd>
                        
                        <dt class="col-5">No Telepon</dt>
                        <dd class="col-7">: <?= $orangtua->ibu_telepon ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title">Pendidikan</h3>
                    <dl class="row">
                        <dt class="col-5">NISN</dt>
                        <dd class="col-7">: <?= $pendidikan->nisn ?></dd>
                        
                        <dt class="col-5">Sekolah</dt>
                        <dd class="col-7">: <?= $pendidikan->nama_sekolah ?></dd>
                        
                        <dt class="col-5">NPSN Sekolah</dt>
                        <dd class="col-7">: <?= $pendidikan->npsn ?></dd>
                        
                        <dt class="col-5">Alamat Sekolah</dt>
                        <dd class="col-7">: <?= $pendidikan->alamat_sekolah ?></dd>

                        <dt class="col-5">Tahun Lulus</dt>
                        <dd class="col-7">: <?= $pendidikan->tahun_lulus ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
<iframe src="/siswa/pengumuman" frameborder="0" style="display:none;" name="printPengumuman"></iframe>
<iframe src="/siswa/kartu-pendaftaran" frameborder="0" style="display:none;" name="printKartuPendaftaran"></iframe>
<?= $this->endSection() ?>