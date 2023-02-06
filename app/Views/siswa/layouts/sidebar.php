<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="d-flex flex-column justify-content-start align-items-center mb-1">
            <div class="w-50">
                <?php if(isset($pas_foto_path)) :?>
                    <img src="<?= $pas_foto_path ?>" alt="pas foto" class="border border-secondary rounded img-fluid">
                <?php else : ?>
                    <img src="/assets/images/default-ava.svg" alt="pas foto" class="border border-secondary rounded img-fluid">
                <?php endif ?>      
            </div>
            <p class="text-wrap lead fw-bold mb-0"><?= $nama ?></p>
            <p class="text-muted mb-0"><?= $no_registrasi ?></p>
        </div>
        <div class="nav">
            <a class="nav-link" href="/siswa">
                <div class="sb-nav-link-icon"><i class="bi bi-speedometer"></i></div>
                Dashboard
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePersyaratan" aria-expanded="false" aria-controls="collapsePersyaratan">
                <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-check"></i></div>
                Persyaratan
                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
            </a>
            <div class="collapse" id="collapsePersyaratan" aria-labelledby="headingPersyaratan" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/siswa/biodata">Biodata</a>
                    <a class="nav-link" href="/siswa/orangtua">Data Orang Tua</a>
                    <a class="nav-link" href="/siswa/pendidikan">Data Pendidikan</a>
                    <a class="nav-link" href="/siswa/persyaratan">Berkas Persyaratan</a>
                </nav>
            </div>
            <a class="nav-link" href="/siswa/info">
                <div class="sb-nav-link-icon"><i class="bi bi-info-circle"></i></div>
                Info PPDB
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