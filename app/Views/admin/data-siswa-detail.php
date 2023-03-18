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

<div class="card shadow-sm border-0 my-4">
    <div class="card-body p-md-5">
        <h1 class="card-title">Data Pendaftaran - <?= $biodata->nama ?></h1>
        <p class="lead">
           No Registrasi: <?= $siswa->username ?> - <?= $siswa->email ?>
        </p>
    </div>
</div>
<div class="card shadow-sm border-0 my-4">
    <div class="card-body p-md-5">
        <div class="accordion accordion-flush" id="accordionSiswa">
            <div class="accordion-item">
                <h2 class="accordion-header" id="item-heading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#itemCollapse1" aria-expanded="false" aria-controls="itemCollapse1">
                        <h3>Biodata</h3>
                    </button>
                </h2>
            </div>
            <div id="itemCollapse1" class="accordion-collapse collapse" aria-labelledby="#item-heading1" data-bs-parent="#accordionSiswa">
                <div class="accordion-body">
                    <table class="table table-hover">
                        <tr>
                            <td class="fw-bold">No Registrasi</td>
                            <td><?= $siswa->username ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email</td>
                            <td><?= $siswa->email ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tanggal Pendaftaran</td>
                            <td><?= $biodata->tanggal_pendaftaran ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Jenis Pendaftaran</td>
                            <td><?= $biodata->jenis_pendaftaran ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nama</td>
                            <td><?= $biodata->nama ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">NIK</td>
                            <td><?= $biodata->nik ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tempat Lahir</td>
                            <td><?= $biodata->tempat_lahir ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tanggal Lahir</td>
                            <td><?= $biodata->tanggal_lahir ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Agama</td>
                            <td><?= $biodata->anak_ke ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Anak Ke</td>
                            <td><?= $biodata->anak_ke ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Saudara Kandung</td>
                            <td><?= $biodata->jml_saudara_kandung ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Telepon</td>
                            <td><?= $biodata->telepon ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Alamat</td>
                            <td><?= $biodata->alamat ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Kode Pos</td>
                            <td><?= $biodata->kode_pos ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Berkebutuhan Khusus</td>
                            <td><?= $biodata->kebutuhan_khusus ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="item-heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#itemCollapse2" aria-expanded="false" aria-controls="itemCollapse2">
                        <h3>Orang Tua</h3>
                    </button>
                </h2>
            </div>
            <div id="itemCollapse2" class="accordion-collapse collapse" aria-labelledby="#item-heading2" data-bs-parent="#accordionSiswa">
                <div class="accordion-body">
                    <h4>Ayah</h4>
                    <table class="table table-hover">
                        <tr>
                            <td class="fw-bold">Nama ayah</td>
                            <td><?= $orangtua->ayah_nama ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">NIK ayah</td>
                            <td><?= $orangtua->ayah_nik ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">No Telp ayah</td>
                            <td><?= $orangtua->ayah_telepon ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Pendidikan Terakhir ayah</td>
                            <td><?= $orangtua->ayah_pendidikan ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Pekerjaan ayah</td>
                            <td><?= $orangtua->ayah_pekerjaan ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Penghasilan ayah</td>
                            <td><?= $orangtua->ayah_gaji ?></td>
                        </tr>
                    </table>
                    <br>
                    <h4>Ibu</h4>
                    <table class="table table-hover">
                        <tr>
                            <td class="fw-bold">Nama ibu</td>
                            <td><?= $orangtua->ibu_nama ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">NIK ibu</td>
                            <td><?= $orangtua->ibu_nik ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">No Telp ibu</td>
                            <td><?= $orangtua->ibu_telepon ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Pendidikan Terakhir ibu</td>
                            <td><?= $orangtua->ibu_pendidikan ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Pekerjaan ibu</td>
                            <td><?= $orangtua->ibu_pekerjaan ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Penghasilan ibu</td>
                            <td><?= $orangtua->ibu_gaji ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="item-heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#itemCollapse3" aria-expanded="false" aria-controls="itemCollapse3">
                        <h3>Pendidikan</h3>
                    </button>
                </h2>
            </div>
            <div id="itemCollapse3" class="accordion-collapse collapse" aria-labelledby="#item-heading3" data-bs-parent="#accordionSiswa">
                <div class="accordion-body">
                    <table class="table table-hover">
                        <tr>
                            <td class="fw-bold">NISN</td>
                            <td><?= $pendidikan->nisn ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tahun Lulus</td>
                            <td><?= $pendidikan->tahun_lulus ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nama Sekolah</td>
                            <td><?= $pendidikan->nama_sekolah ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">NPSN Sekolah</td>
                            <td><?= $pendidikan->npsn ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Alamat Sekolah</td>
                            <td><?= $pendidikan->alamat_sekolah ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="item-heading4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#itemCollapse4" aria-expanded="false" aria-controls="itemCollapse4">
                        <h3>Persyaratan</h3>
                    </button>
                </h2>
            </div>
            <div id="itemCollapse4" class="accordion-collapse collapse" aria-labelledby="#item-heading4" data-bs-parent="#accordionSiswa">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Persyaratan</th>
                                    <th>Berkas</th>
                                    <th>Status</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data_persyaratan as $persyaratan) :?>
                                    <tr>
                                        <td><?= $persyaratan['name'] ?></td>
                                        <td><?= $persyaratan['file'] ?></td>

                                        <?php if($persyaratan['status'] == 'terverifikasi') : ?>
                                            <td><span class="badge bg-success">Terverifikasi</span></td>
                                        <?php elseif($persyaratan['status'] == 'gagal') :?>
                                            <td><span class="badge bg-danger">Gagal</span></td>
                                        <?php else :?>
                                            <td><span class="badge bg-warning"><?= $persyaratan['status'] ?></span></td>
                                        <?php endif ?>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#<?= str_replace('.','',$persyaratan['file']) ?>">
                                            Lihat
                                            </button>

                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="<?= str_replace('.','',$persyaratan['file']) ?>" tabindex="-1" aria-labelledby="<?= str_replace('.','',$persyaratan['file']) ?>Label" aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex">
                                                    <h1 class="modal-title fs-5"><?= $persyaratan['name'] ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="ratio ratio-16x9">
                                                        <iframe src="/tampil-persyaratan/<?= $siswa->id ?>/<?= $siswa->username ?>/<?= $persyaratan['label'] ?>" width="100%"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer align-self-center mb-5">
                                                    <form action="<?= '/admin/verifikasi/'.$persyaratan['column'] ?>" method="post">
                                                        <input type="hidden" name="id_user" value="<?= $siswa->id ?>">
                                                        <div class="row gx-3">
                                                            <label class="col-auto col-form-label">Ubah Status</label>
                                                            <div class="div col-auto">
                                                                <select class="form-select" name="status">
                                                                    <option selected><?= $persyaratan['status'] ?></option>
                                                                    <option value="pending">Pending</option>
                                                                    <option value="gagal">Gagal</option>
                                                                    <option value="terverifikasi">Terverifikasi</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-sm border-0 my-4">
    <div class="card-body p-md-5">
        <h1 class="card-title">Status Seleksi</h1>
        <p class="lead">Sebelum mengubah status seleksi, mohon cek kembali kelengkapan persyaratan calon peserta didik</p>
        <hr>

        <?php if($ubahStatusSeleksi) :?>
            <div>
                <form action="/admin/ubah-status-seleksi" method="post" onchange="showUbahStatusSeleksi()">
                    <input type="hidden" name="id_user" value="<?= $siswa->id ?>">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="biodataSwitch" name="biodata" value="lengkap">
                        <label class="form-check-label" for="biodataSwitch">Biodata sudah lengkap dan terverifikasi</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="orangtuaSwitch" name="orangtua" value="lengkap">
                        <label class="form-check-label" for="orangtuaSwitch">Data orangtua sudah lengkap dan terverifikasi</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="pendidikanSwitch" name="pendidikan" value="lengkap">
                        <label class="form-check-label" for="pendidikanSwitch">Data pendidikan sudah lengkap dan terverifikasi</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="persyaratanSwitch" name="persyaratan" value="lengkap">
                        <label class="form-check-label" for="persyaratanSwitch">Berkas persyaratan sudah lengkap dan terverifikasi</label>
                    </div>
                    <hr>
                    
                    <div id="ubah-status-seleksi" class="d-flex flex-column mb-3 d-none">
                        <label for="" class="col-auto form-label">Ubah Status Seleksi</label>
                        <div class="col-sm-6">
                            <select class="form-select" name="status">
                                <option selected><?= $hasil_seleksi->status ?></option>
                                <option value="pending">pending</option>
                                <option value="diterima">diterima</option>
                                <option value="gagal">gagal</option>
                            </select>
                        </div>
                        <div class="my-3">
                            <button type="submit" role="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php else : ?>
            <div class="alert alert-warning" role="alert">
            Data/berkas persyaratan <strong>belum lengkap atau belum terverifikasi</strong> - tidak bisa mengubah status seleksi.
            </div>
        <?php endif ?>
        <div class="row"></div>
    </div>
</div>
<script type="text/javascript">
    function showUbahStatusSeleksi() {
        var biodata = document.getElementById('biodataSwitch');
        var orangtua = document.getElementById('orangtuaSwitch');
        var pendidikan = document.getElementById('pendidikanSwitch');
        var persyaratan = document.getElementById('persyaratanSwitch');

        var status = document.getElementById('ubah-status-seleksi');

        if(biodata.checked == true && orangtua.checked == true && pendidikan.checked == true && persyaratan.checked == true) {
            status.classList.remove('d-none');
        } else {
            status.classList.add('d-none');
        }
    }
</script>
<?= $this->endSection() ?>