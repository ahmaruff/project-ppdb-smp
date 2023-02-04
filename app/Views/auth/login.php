<?= $this->extend('auth/layouts/base.php') ?>

<?= $this->section('content') ?>
<main class="card my-5 mx-auto p-4 shadow-sm border-0 bg-white" style="max-width: 540px;">
    <h1 class="fw-bold text-center">Login Sistem PPDB</h1>
    <p class="lead text-center d-block d-md-none">SMP Maa'rif Kalibawang</p>
    <hr>
    <?php if (session('error') !== null) : ?>
        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
    <?php elseif (session('errors') !== null) : ?>
        <div class="alert alert-danger" role="alert">
            <?php if (is_array(session('errors'))) : ?>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                    <br>
                <?php endforeach ?>
            <?php else : ?>
                <?= session('errors') ?>
            <?php endif ?>
        </div>
    <?php endif ?>
    <?php if (session('message') !== null) : ?>
        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
    <?php endif ?>

    <section class="row g-3 justify-content-center align-items-center">
        <div class="col-md-4">
            <img src="/assets/images/logo.png" alt="" class="img-fluid d-none d-md-block" width="200">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <form action="/login" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username/No Registrasi</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </section>
    <p class="text-center mt-3">Belum memiliki akun? <a href="/register">daftar sekarang!</a></p>
</main>

<?= $this->endSection() ?>