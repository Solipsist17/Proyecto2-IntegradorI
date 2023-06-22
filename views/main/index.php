<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_slider.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    

    <title>Inicio</title>
</head>
<body>

    <?php require "views/header.php"; ?>

    <div class="slider-frame">
        <ul>
            <li><img src="public/img/slider1.png" alt=""></li>
            <li><img src="public/img/slider2.png" alt=""></li>
            <li><img src="public/img/slider3.png" alt=""></li>
            <li><img src="public/img/slider4.png" alt=""></li>
        </ul>
    </div>

    <script src="public/js/js_slider.js"></script>

    <h1>Esta es la vista de inicio</h1>

    <?php require "views/footer.php"; ?>
</body>
</html>