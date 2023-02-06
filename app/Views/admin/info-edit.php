<?= $this->extend('admin/layouts/base.php') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0 my-4">
    <div class="card-body p-md-5">
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
    </div>
</div>

<div class="card shadow-sm border-0 my-4">
    <div class="card-body p-md-5">
        <h1 class="card-title">Info PPDB</h1>
        <hr>
        <form action="/admin/info/edit" method="post">
            <?php csrf_field() ?>
            <div class="row mb-3 align-items-center">
                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-9">
                    <input type="date" name="tanggal" value="<?= $info->tanggal ?>" class="form-control" id="tanggal">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-9">
                    <input type="text" name="judul" class="form-control" id="judul" value="<?= $info->judul ?>">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <label for="isi" class="col-sm-3 col-form-label">Isi</label>
                <div class="col-sm-9">
                    <textarea name="isi" id="isi" class="form-control" rows="12"><?= $info->isi ?></textarea>
                </div>
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary btn-lg">Tambah Info</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>