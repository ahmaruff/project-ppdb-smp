<?= $this->extend('home/layouts/base.php') ?>

<?= $this->section('content') ?>
<main class="container-fluid" style="min-height:100vh;">
    <section class="my-5">
        <h1 class="text-center fw-bold my-4">Informasi PPDB</h1>
        <div class="d-flex flex-wrap flex-row justify-content-center align-items-start">
            <div class="m-2">
            <?php foreach($info as $item) : ?>
            <div class="card shadow-sm my-2 p-3" style="width: 22rem;">
                <div class="row justify-content-between align-items-center">
                    <h3 class="col mb-2 display-6 fw-bold"><?= $item->judul ?></h3>
                    <p class="col-auto m-0 tanggal lead" data-tgl="<?= $item->tanggal ?>"></p>
                </div>
                <hr>
                <p class="txt-info" data-txt="<?= $item->isi ?>"></p>
                <a href="/info/<?= $item->id ?>" class="text-decoration-none fw-bold my-1">Info Lebih Lanjut</a>
            </div>
            <?php endforeach ?>
            </div>
        </div>
    </section>
</main>
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