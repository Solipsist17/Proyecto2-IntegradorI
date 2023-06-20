<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_slider.css">
    <title>Inicio</title>
</head>
<body>
    <?php require "views/header.php"; ?>
    <div class="slider-container">
        <img class="slider-image" src="Lib_Img/slider1.png" alt="Imagen 1">
        <img class="slider-image" src="Lib_Img/slider2.png" alt="Imagen 2">
        <img class="slider-image" src="Lib_Img/slider3.png" alt="Imagen 3">
    </div>

    <script src="js_slider.js"></script>

    <h1>Esta es la vista de inicio</h1>

    <?php require "views/footer.php"; ?>
</body>
</html>