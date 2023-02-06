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
        <h1 class="card-title">Data Siswa Pendaftar</h1>
        <hr>
        <div id="siswa" class="table-responsive">
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
                            <button class="btn btn-outline-dark sort" data-sort="jenis_pendaftaran">Jenis</button>
                            <button class="btn btn-outline-dark sort" data-sort="no_registrasi">No Registrasi</button>
                            <button class="btn btn-outline-dark sort" data-sort="nama">Nama</button>
                            <button class="btn btn-outline-dark sort" data-sort="email">Email</button>
                            <button class="btn btn-outline-dark sort" data-sort="status">Status</button>
                        </div>     
                    </div>   
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jenis</th>
                        <th>No Registrasi</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status Seleksi</th>
                        <th>Persyaratan</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php foreach($userDataList as $data) :?>
                    <tr>
                        <td class="id"><?= $data['id'] ?></td>
                        <td class="jenis_pendaftaran"><?= $data['jenis_pendaftaran'] ?></td>
                        <td class="no_registrasi"><?= $data['no_registrasi'] ?></td>
                        <td class="nama"><?= $data['nama'] ?></td>
                        <td class="email"><?= $data['email'] ?></td>
                       
                        <?php if($data['status'] == 'diterima') :?>
                            <td class="status"> <span class=" badge rounded-pill bg-success">Diterima</span></td>
                        <?php elseif($data['status'] == 'gagal') :?>
                            <td class="status"><span class="badge rounded-pill bg-danger">Gagal</span></td>
                        <?php else : ?>
                            <td class="status"><span class="badge rounded-pill bg-warning">Pending</span></td>
                        <?php endif ?>
                        
                        <td class="persyaratan">
                            <a href="/admin/data-siswa/<?= $data['id'] ?>"
                            class="btn btn-sm btn-primary rounded-5" role="button">
                               <i class="bi bi-eye"></i> Lihat
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div>
                <ul class="pagination"></ul>
            </div>
        </div>
    </div>
</div>
<script src="/assets/libs/listjs-2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: ['id', 'jenis_pendaftaran','no_registrasi', 'nama', 'email', 'status', 'persyaratan'],
        page: 5,
        pagination: true,
    };
    var siswaList = new List('siswa', options);
    
    var list = document.getElementById('list-group').children;

    for (var i = 0; i < list.length; i++) {
        var li = list[i];
        li.classList.add('list-group-item');
    }
</script>

<?= $this->endSection() ?>