<?= $this->extend('admin/layouts/base.php') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0 my-4">
    <div class="card-body">
        <h3 class="card-title">Notifikasi</h3>
        <div class="d-flex justify-content-between align-content-center flex-wrap">
            <?php if(session('message')!== null && is_array(session('message'))) : ?>
                <?php foreach (session('message') as $flash) :?>
                    <div class="alert alert-<?= $flash[0]?> alert-dismissible fade show m-1 small" role="alert">
                        <?php print_r($flash[1]) ?>
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
            <div class="card text-center border-success text-success">
                <div class="card-body">
                    <h4 class="card-title m-0">Jumlah Pendaftar</h4>
                    <p class="lead m-0">Gelombang <?= $jadwal_active->gelombang.' - '. $jadwal_active->tahun_ajaran ?></p>
                    <h1 class="display-2"><?= $count_pendaftar ?></h1>
                </div>
            </div>
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <h4 class="card-title m-0">Pendaftar Diterima</h4>
                    <p class="lead m-0">Gelombang <?= $jadwal_active->gelombang.' - '. $jadwal_active->tahun_ajaran ?></p>
                    <h1 class="display-2"><?= $count_diterima ?></h1>
                </div>
            </div>
            <div class="card text-center border-success text-success">
                <div class="card-body">
                    <h4 class="card-title m-0">Seluruh Pendaftar</h4>
                    <p class="lead m-0"><?= 'Tahun Ajaran '.$jadwal_active->tahun_ajaran ?></p>
                    <h1 class="display-2"><?= $count_tahunan ?></h1>
                </div>
            </div>
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <h4 class="card-title m-0">Total Diterima</h4>
                    <p class="lead m-0"><?= 'Tahun Ajaran '.$jadwal_active->tahun_ajaran ?></p>
                    <h1 class="display-2"><?= $count_diterima_tahunan ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0 my-4">
    <div class="card-body">
        <h3 class="card-title">Jadwal Aktif</h3>
        <div class="table-responsive">
            <table class="table table-hover text-center mb-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tahun Ajaran</th>
                        <th>Gel</th>
                        <th>Mulai Reg.</th>
                        <th>Akhir Reg.</th>
                        <th>Seleksi</th>
                        <th>Pengumuman</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $jadwal_active->id ?></td>
                        <td><?= $jadwal_active->tahun_ajaran ?></td>
                        <td><?= $jadwal_active->gelombang ?></td>
                        <td class="tanggal" data-tgl="<?= $jadwal_active->mulai_pendaftaran ?>"></td>
                        <td class="tanggal" data-tgl="<?= $jadwal_active->akhir_pendaftaran ?>"></td>
                        <td class="tanggal" data-tgl="<?= $jadwal_active->tanggal_seleksi ?>"></td>
                        <td class="tanggal" data-tgl="<?= $jadwal_active->tanggal_pengumuman ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="/admin/ubah-jadwal" method="post">
            <?= csrf_field() ?>

            <div class="mb-3 row align-items-center gap-3">
                <label for="jadwal_aktif" class="form-label m-0 col-sm-2">Jadwal PPDB Aktif</label>
                <div class="col-sm-5">
                    <select class="form-select" name="jadwal_aktif" id="jadwal_aktif">
                        <option value="<?= $jadwal_active->id ?>" selected><?= 'gelombang '.$jadwal_active->gelombang.' - '.$jadwal_active->tahun_ajaran ?></option>
                        <?php foreach($jadwal_ppdb->getResult() as $row) :?>
                            <option value="<?= $row->id ?>" selected><?= 'gelombang '.$row->gelombang.' - '.$row->tahun_ajaran ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="m-0 col-auto">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Ubah Jadwal Aktif</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="/assets/js/app.js"></script>
<script>
    var tanggal = document.querySelectorAll('.tanggal').forEach(element => {
        displayDate(element);
    });
</script>
<?= $this->endSection() ?>