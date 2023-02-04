<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="/assets/libs/bootstrap-5.2.2/css/bootstrap.min.css">
    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <?php if(isset($title)) :?>
        <title><?= $title ?></title>
    <?php else : ?>
        <title>PPDB SMP Ma'arif Kalibawang</title>
    <?php endif ?>

</head>
<body>
    <div class="container">
        <header>
            <div class="px-4 pt-5 text-center">
                <img src="/assets/images/logo.png" alt="logo" class="img-fluid my-4" width="150">
                <h1 class="display-5 fw-bold">SMP Ma'arif Kalibawang, Wonosobo</h1>
                <h2 class="text-secondary mb-4">Sekolah NU, Sekolah Unggul</h2>
                <!--
                <div class="d-flex justify-content-center align-items-center">
                    <div class="flex-items m-2">
                        <img src="/assets/images/logo.png" alt="logo" class="img-fluid" width="150">
                    </div>
                    <div class="flex-items m-2">
                        <h1 class="display-5 fw-bold">SMP Ma'arif Kalibawang, Wonosobo</h1>
                        <h2></h2>
                    </div>
                </div>
                -->
            </div>
            <hr>
        </header>
    </div>
    <?= $this->include('home/layouts/nav.php') ?>

    <div class="container">
        <?= $this->renderSection('content') ?> 
    </div>


    <?= $this->include('home/layouts/footer.php') ?>
    <!-- BOOTSTRAP -->
    <script src="/assets/libs/bootstrap-5.2.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>