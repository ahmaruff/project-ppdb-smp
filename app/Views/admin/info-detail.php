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
        <div class="my-5">
            <h1 class="fw-bold"><?= $info->judul ?></h1>
            <p class="lead tanggal" data-tgl="<?= $info->tanggal ?>"></p>
            <hr>
            <p><?= $info->isi ?></p>
            <hr>
            <a href="/admin/info" class="btn btn-lg btn-outline-secondary"><i class="bi bi-arrow-bar-left"></i>Kembali</a>
        </div>
    </div>
</div>
<script src="/assets/js/app.js"></script>
<script>
    var tanggal = document.querySelectorAll('.tanggal').forEach(element => {
        displayDate(element);
    });

    var info = document.querySelectorAll('.txt-info').forEach(element => {
        var txt = element.dataset.txt;
        element.innerHTML = shorten(txt,80)+'.....';
    });
</script>
<?= $this->endSection() ?>