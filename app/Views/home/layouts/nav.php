<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
    <div class="container-xl">
        <div class="text-center mx-auto">
            <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="bi bi-list"></i>MENU</span>
            </button>
        </div>

        <div class="collapse navbar-collapse justify-content-center" id="navbars">
            <ul class="navbar-nav d-flex justify-content-center align-items-center fw-bold">
                <li class="nav-item me-md-4">
                    <a href="/">
                        <img src="/assets/images/logo.png" alt="Logo SMP" class="img-fluid" width="50">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/info" >Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#persyaratan">Persyaratan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#jadwal">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tentang">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#kontak">Kontak</a>
                </li>

                <?php if(!auth()->loggedIn()) :?>
                <li class="nav-item ms-md-4">
                    <div class="btn-group" role="group">
                        <a class="btn btn-outline-success" href="/register" >Daftar</a>
                        <a class="btn btn-success" href="/login">Masuk</a>
                    </div>
                </li>
                <?php elseif(auth()->loggedIn() && auth()->user()->inGroup('user')) :?>
                <li class="nav-item ms-md-4">
                    <div class="btn-group" role="group">
                        <a class="btn btn-success" href="/siswa" >Dashboard</a>
                        <a class="btn btn-outline-danger" href="/logout">Logout</a>
                    </div>
                </li>
                <?php elseif(auth()->loggedIn() && auth()->user()->inGroup('superadmin','admin')) : ?>
                <li class="nav-item ms-md-4">
                    <div class="btn-group" role="group">
                        <a class="btn btn-outline-success " href="/admin" >Dashboard</a>
                        <a class="btn btn-outline-danger" href="/logout">Logout</a>
                    </div>
                </li>
                <?php endif?>
            </ul>
        </div>
    </div>
</nav>
