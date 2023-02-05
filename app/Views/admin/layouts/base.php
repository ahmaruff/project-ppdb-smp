<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">

    <!-- SB ADMIN CSS -->
    <link href="/assets/libs/sbadmin-7.0.5/css/styles.css" rel="stylesheet" />
    
    <!-- CUSTOM -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="/assets/libs/bootstrap-5.2.2/css/bootstrap.min.css">
    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <?php if(isset($title)): ?>
        <title><?= $title ?></title>
    <?php else: ?>
        <title>PPDB SMP Ma'arif Kalibawang</title>
    <?php endif ?>

</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <div class="navbar-brand">
        </div>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-lg order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="bi bi-list"></i></button>
        <!-- forced to right-->
        <div class="mx-auto d-flex justify-content-center align-items-center">
            <img src="/assets/images/logo.png" alt="" class="img-fluid m-0" width="40">
            <a class="ps-3 m-0 text-white text-decoration-none d-none d-md-block" href="/"><h5 class="m-0">Sistem PPDB SMP Ma'arif Kalibawang</h5></a>
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/admin/ubah-password">Ubah Password</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- SIDEBAR -->
              <?= $this->include('admin/layouts/sidebar.php') ?>
            </div>
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container py-3">
                        <!-- content -->
                        <?= $this->renderSection('content') ?>
                    </div>
                </main>
                <!-- FOOTER -->
                <?= $this->include('admin/layouts/footer.php') ?>
            </div>
        </div>


    <!-- SB ADMIN JS -->
    <script src="/assets/libs/sbadmin-7.0.5/js/scripts.js"></script>
    <!-- BOOTSTRAP -->
    <script src="/assets/libs/bootstrap-5.2.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>