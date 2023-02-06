<?= $this->extend('siswa/layouts/base.php') ?>

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
        <div class="mt-4">
            <div class="d-flex gap-2">
                <?php foreach($info as $item) : ?>
                <div class="card shadow-sm my-2 p-3" style="width:20rem">
                    <div class="row justify-content-between align-items-center">
                        <h3 class="col m-0"><?= $item->judul ?></h3>
                        <p class="col m-0 fw-bold tanggal text-end" data-tgl="<?= $item->tanggal ?>"></p>
                    </div>
                    <hr>
                    <p class="txt-info" data-txt="<?= $item->isi ?>"></p>
                    <a href="/siswa/info/<?= $item->id ?>" class="text-decoration-none fw-bold my-1">Info Lebih Lanjut</a>
                </div>
                <?php endforeach ?>
            </div>
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