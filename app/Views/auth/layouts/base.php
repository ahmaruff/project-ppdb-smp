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
<body class="bg-light">
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- BOOTSTRAP -->
    <script src="/assets/libs/bootstrap-5.2.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>