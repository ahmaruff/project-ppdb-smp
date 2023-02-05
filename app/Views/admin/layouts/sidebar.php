<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="d-flex flex-column justify-content-start align-items-center mb-1">
            <div class="w-50">
                <img src="/assets/images/default-ava.svg" alt="pas foto admin" class="border border-secondary rounded img-fluid">
            </div>
            <p class="text-wrap lead fw-bold mb-0"><?= $user->email ?></p>
        </div>
        <div class="nav">
            <a class="nav-link" href="/admin">
                <div class="sb-nav-link-icon"><i class="bi bi-speedometer"></i></div>
                Dashboard
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJadwal" aria-expanded="false" aria-controls="collapseJadwal">
                <div class="sb-nav-link-icon"><i class="bi bi-calendar-date"></i></div>
                Jadwal PPDB
                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
            </a>
            <div class="collapse" id="collapseJadwal" aria-labelledby="headingJadwal" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/admin/jadwal-ppdb">Lihat Jadwal</a>
                    <a class="nav-link" href="/admin/jadwal-ppdb/add">Tambah Jadwal</a>
                </nav>
            </div>
            <a class="nav-link" href="/admin/data-siswa">
                <div class="sb-nav-link-icon"><i class="bi bi-mortarboard"></i></div>
                Data Siswa
            </a>    
            <a class="nav-link" href="/siswa/pengumuman">
                <div class="sb-nav-link-icon"><i class="bi bi-megaphone"></i></div>
                Pengumuman
            </a>
            <hr>
            <a class="nav-link" href="/logout">
                <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-right"></i></div>
                Logout
            </a>
        </div>
    </div>
</nav>