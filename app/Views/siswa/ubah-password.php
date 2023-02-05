<?= $this->extend('siswa/layouts/base.php') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0 my-4">
    <div class="card-body p-md-5">
        <h1 class="card-title">Ubah Password</h1>
        <hr>
        <div class="mt-4">
            <?php if (session('message') !== null && is_array(session('message'))) : ?>
                <div class="card shadow-sm border-0 my-4">
                    <div class="card-body p-md-5">
                        <div class="d-flex justify-content-between align-content-center flex-wrap">
                        <?php foreach (session('message') as $flash) :?>
                            <div class="alert alert-<?= $flash[0]?> alert-dismissible fade show m-1 small" role="alert">
                                <?= $flash[1] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            
            <form action="" method="post">
            <?= csrf_field() ?>
                <div class="row mb-3">
                    <label for="password_lama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10 w-50">
                        <input type="password" class="form-control" id="password_lama" name="password_lama" value="">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10 w-50">
                        <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_confirm" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10 w-50">
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" value="">
                    </div>
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-pencil-square"></i> Ubah Password</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?= $this->endSection() ?>