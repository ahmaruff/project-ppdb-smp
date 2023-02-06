<?= $this->extend('admin/layouts/base.php') ?>

<?= $this->section('content') ?>
<?php if (session('message') !== null && is_array(session('message'))) : ?>
    <div class="card shadow-sm border-0 my-4">
        <div class="card-body p-md-5">
            <div class="d-flex justify-content-between align-content-center flex-wrap">
            <?php foreach (session('message') as $flash) :?>
                <div class="alert alert-<?= $flash[0]?> alert-dismissible fade show m-1 small" role="alert">
                    <?= print_r($flash[1]) ?>
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
            <h1 class="card-title col">Info PPDB</h1>
            <div class="col-auto">
                <a href="/admin/info/add" role="button" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Info</a>
            </div>
        </div>
        <hr>
        <div class="mt-4">
            <div id="info" class="table-responsive">
                <div class="my-2 row mx-1">
                    <div class="col-md-4">
                        <label for="search" class="fw-bold mb-1">Cari Data</label>
                        <input id="search" class="search form-control" placeholder="Search">
                    </div>
                    <div class="col-md-8">
                        <label class="fw-bold mb-1">Urutkan data berdasarkan</label>
                        <div class="d-grid">
                            <div class="btn-group" role="button">
                                <button class="btn btn-outline-dark sort" data-sort="id">id</button>
                                <button class="btn btn-outline-dark sort" data-sort="tanggal">tanggal</button>
                                <button class="btn btn-outline-dark sort" data-sort="judul">judul</button>
                            </div>     
                        </div>   
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Info</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="list">
                        <?php foreach($info as $item) :?>
                            <tr>
                                <td class="id"><?= $item->id ?></td>
                                <td class="tanggal" data-tgl="<?= $item->tanggal ?>"></td>
                                <td class="judul"><?= $item->judul ?></td>
                                <td><a href="/admin/info/<?= $item->id ?>" class="text-decoration-none">Info Lanjut</a></td>
                                <td class="btn-group btn-group-sm" role="group">
                                    <a class="btn btn-warning " href="/admin/info/edit/<?= $item->id ?>" ><i class="bi bi-pencil-square"></i></a>
                                    <a class="btn btn-danger" href="/admin/info/delete/<?= $item->id ?>"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <?php  ?>
                    </tbody>
                </table>
                <div>
                    <ul class="pagination"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/app.js"></script>
<script src="/assets/libs/listjs-2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: ['id', 'tanggal', 'judul'],
        page: 5,
        pagination: true,
    };
    var infoList = new List('info', options);

    var tanggal = document.querySelectorAll('.tanggal').forEach(element => {
        displayDate(element);
    });
</script>
<?= $this->endSection() ?>