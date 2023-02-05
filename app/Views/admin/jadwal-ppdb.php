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
        <div class="row justify-content-between align-items-center">
            <h1 class="card-title col">Jadwal PPDB</h1>
            <div class="col-auto">
                <a href="/admin/jadwal-ppdb/add" role="button" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Jadwal</a>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover mb-4 text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tahun Ajaran</th>
                        <th>Gel</th>
                        <th>Mulai Reg.</th>
                        <th>Akhir Reg.</th>
                        <th>Seleksi</th>
                        <th>Pengumuman</th>
                        <th>Aktif</th>
                        <th>Ketua Panitia</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($jadwal_ppdb->getResult() as $row) :?>
                        <?php if($row->is_active): ?>
                            <tr class="table-info">
                        <?php else : ?>
                            <tr>
                        <?php endif ?>
                            <td><?= $row->id ?></td>
                            <td><?= $row->tahun_ajaran ?></td>
                            <td><?= $row->gelombang ?></td>
                            <td class="tanggal" data-tgl="<?= $row->mulai_pendaftaran ?>"></td>
                            <td class="tanggal" data-tgl="<?= $row->akhir_pendaftaran ?>"></td>
                            <td class="tanggal" data-tgl="<?= $row->tanggal_seleksi ?>"></td>
                            <td class="tanggal" data-tgl="<?= $row->tanggal_pengumuman ?>"></td>
                            <td><?= $row->is_active ?></td>
                            <td><?= $row->ketua_panitia ?></td>
                            <td class="btn-group btn-group-sm" role="group">
                                <a class="btn btn-warning " href="/admin/jadwal-ppdb/edit/<?= $row->id ?>" ><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger" href="/admin/jadwal-ppdb/delete/<?= $row->id ?>"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="/assets/js/app.js"></script>
<script>
    var tanggal = document.querySelectorAll('.tanggal').forEach(element => {
        displayDate(element);
    });
</script>
<?= $this->endSection() ?>