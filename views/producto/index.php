<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <title>Producto</title>
</head>
<body>
    <?php require "views/header.php"; ?>

    <h1>Esta es la vista del Catálogo de productos</h1> 
    <?= $this->mensaje ?> 
    

    <?php require "views/footer.php"; ?>
</body>
</html>