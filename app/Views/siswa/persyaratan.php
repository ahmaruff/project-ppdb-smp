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
        <h1 class="card-title">Persyaratan</h1>
        <hr>
        <div class="mt-4">
            
            <form action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <?php foreach($data_persyaratan as $persyaratan) :?>
                <div class="mb-4">
                    <label for="<?= $persyaratan['name'] ?>" class="form-label fw-bold"><?= $persyaratan['label'] ?></label>
                    <div class="row">
                        <div class="col-4">
                            <input class="form-control" type="file" id="<?= $persyaratan['name'] ?>" name="<?= $persyaratan['name'] ?>"">
                            <?php if($persyaratan['name'] == 'pas_foto') :?>
                                <div class="form-text">Hanya menerima jenis file <strong>png/jpg/jpeg</strong></div>
                            <?php else : ?>
                                <div class="form-text">Hanya menerima jenis file <strong>gambar/pdf</strong></div>
                            <?php endif ?>
                        </div>
                        <div class="col-1 me-5 text-center">
                            <?php if($persyaratan['status'] == 'pending') :?>
                                <p class="m-0"><span class="badge rounded-pill bg-warning">Pending</span></p>
                            <?php elseif($persyaratan['status'] == 'terverifikasi') :?>
                                <p class="m-0"><span class="badge rounded-pill bg-success">Terverifikasi</span></p>
                            <?php elseif($persyaratan['status'] == 'gagal') :?>
                                <p class="m-0"><span class="badge rounded-pill bg-danger">Gagal</span></p>
                            <?php else : ?>
                                <p></p>
                            <?php endif ?>    
                        </div>
                        <div class="col">
                            <p class="text-muted m-0">Uploaded file: <?= $persyaratan['data'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

                <br>
                <div class="my-3 float-end">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>