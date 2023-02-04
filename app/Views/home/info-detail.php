<?= $this->extend('home/layouts/base.php') ?>

<?= $this->section('content') ?>
<main class="container-fluid" style="min-height: 100vh;">
    <section class="my-5" style="padding-top:100px;">

    <h1 class="fw-bold">Judul</h1>
    <p class="lead">Tanggal</p>
    <hr>
    <p>isi Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam quibusdam optio velit incidunt reiciendis at beatae similique iste asperiores recusandae obcaecati tempore dignissimos corrupti possimus repudiandae voluptatum, voluptates delectus quasi.</p>
    <hr>
    <a href="/info" class="btn btn-lg btn-outline-secondary"><i class="bi bi-arrow-bar-left"></i>Kembali</a>
</section>
</main>
<?= $this->endSection() ?>