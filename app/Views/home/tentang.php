<?= $this->extend('home/layouts/base.php') ?>

<?= $this->section('content') ?>
<main class="container-fluid" style="min-height: 100vh;">
    <section id="visi-misi" class="my-5" style="padding-top: 100px;">
        <h1 class="text-center fw-bold">Visi</h1>
        <p class="text-center lead fw-bold">"Terwujudnya peserta didik yang betaqwa, berakhlaqul karimah, kreatif dan berkualitas"</p>
        <hr class="my-4">
        <h1 class="text-center fw-bold">Misi</h1>
        <ol class="list-group list-group-flush list-group-numbered mx-auto" style="max-width: 760px;">
            <li class="list-group-item list-group-item-action">Menyelenggarakan pembelajaran dan bimbingan secara efektif, mengoptimalkan waktu yang ada untuk memacu prestasi peserta didik</li>
            <li class="list-group-item list-group-item-action">Menyelenggarakan pembelajaran yang PAKEM untuk meningkatkan prestasi peserta didik</li>
            <li class="list-group-item list-group-item-action">Mengembangkan pembelajaran dengan model, strategi serta teknik yang sesuai dengan kebutuhan peserta didik</li>
            <li class="list-group-item list-group-item-action">Menyelenggarakan pembelajaran dengan basis teknologi informasi dan komunikasi (TIK)</li>
            <li class="list-group-item list-group-item-action">Menyelenggarakan proses pembelajaran dengan mengoptimalkan administrasi</li>
            <li class="list-group-item list-group-item-action">Menyelenggarakan pembelajaran kontekstual dengan memanfaatkan lingkungan sekitarnya</li>
            <li class="list-group-item list-group-item-action">Meningkatkan pembelajaran yang efektif untuk meraih prestasi akademik maupun non akademik</li>
            <li class="list-group-item list-group-item-action">Mengupayakan budaya hidup bersih dan sehat</li>
            <li class="list-group-item list-group-item-action">Menciptakan situasi belajar mengajar yang kondusif dengan menata lingkungan sekolah</li>
            <li class="list-group-item list-group-item-action">Menjaga lingkungan sekitar agara terbebas dari polusi</li>
            <li class="list-group-item list-group-item-action">Menciptakan lingkungan sekolah yang hijau dan sejuk</li>
        </ol>
    </section>
    <section id="struktur" class="my-5 text-center">
        <h1 class="text-center fw-bold my-4">Struktur Organisasi</h1>
        <img src="/assets/images/struktur-org.png" alt="Struktur Organisasi" class="img-fluid">
    </section>
    <section id="galeri" class="my-5">
        <h1 class="text-center fw-bold my-4">Galeri</h1>
        <div class="container">
            <div id="galeri-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active"><img src="/assets/images/carousel/car-1.jpg" alt="" class="d-block w-100"></div>
                    <div class="carousel-item"><img src="/assets/images/carousel/car-2.jpg" alt="" class="d-block w-100"></div>
                    <div class="carousel-item"><img src="/assets/images/carousel/car-3.jpg" alt="" class="d-block w-100"></div>
                    <div class="carousel-item"><img src="/assets/images/carousel/car-4.jpg" alt="" class="d-block w-100"></div>
                    <div class="carousel-item"><img src="/assets/images/carousel/car-5.jpg" alt="" class="d-block w-100"></div>
                    <div class="carousel-item"><img src="/assets/images/carousel/car-6.jpg" alt="" class="d-block w-100"></div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#galeri-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galeri-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>