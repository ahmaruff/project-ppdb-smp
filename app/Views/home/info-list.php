<?= $this->extend('home/layouts/base.php') ?>

<?= $this->section('content') ?>
<main class="container-fluid" style="min-height:100vh;">
    <section class="my-5">
        <h1 class="text-center fw-bold my-4">Informasi PPDB</h1>
        <div class="d-flex flex-wrap flex-row justify-content-center align-items-start">
            <div class="m-2">
                <div class="card p-2" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <div class="btn-group">     
                            <button class="btn btn-outline-primary" disabled>tanggal</button>
                            <a href="#" class="btn btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>