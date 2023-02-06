<?= $this->extend('home/layouts/base.php') ?>

<?= $this->section('content') ?>
<main class="container-fluid" style="min-height: 100vh;">
<section class="my-5" style="padding-top:100px;">
    <h1 class="fw-bold"><?= $info->judul ?></h1>
    <p class="lead tanggal" data-tgl="<?= $info->tanggal ?>"></p>
    <hr>
    <p><?= $info->isi ?></p>
    <hr>
    <a href="/info" class="btn btn-lg btn-outline-secondary"><i class="bi bi-arrow-bar-left"></i>Kembali</a>
</section>
</main>
<script src="/assets/js/app.js"></script>
<script>
     var tanggal = document.querySelectorAll('.tanggal').forEach(element => {
            displayDate(element);
        });
</script>
<?= $this->endSection() ?>