<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <title>Dirección</title>
</head>
<body>
    <?php require 'views/header.php';?>

    <!-- <h1 style="color: red;"><?php echo $this->mensaje; ?></h1>
    <p><?php echo $this->prueba; ?></p> -->

    <h1>Dirección</h1>
    <form action="<?php echo constant('URL')?>venta/verificarDireccion" method="post">
        <label for="departamento">departamento</label>
        <input type="text" name="departamento" id="departamento">
        <label for="provincia">provincia</label>
        <input type="text" name="provincia" id="provincia">
        <label for="distrito">distrito</label>
        <input type="text" name="distrito" id="distrito">
        <label for="calle">calle</label>
        <input type="text" name="calle" id="calle">
        <input type="submit" name="enviar" value="enviar">
    </form>

    <p>Data de la session: <?php 
    include_once 'models/productomodel.php';
    include_once 'models/categoriamodel.php';
    include_once 'models/ofertamodel.php';
    session_write_close();
    session_start();
    var_dump($_SESSION['datosCompra']); ?> </p>

    <p>Productos: <?= var_dump($_SESSION['datosCompra']['productosCarrito'][0]); ?></p>
    <p>Subtotal: <?= var_dump($_SESSION['datosCompra']['subtotal']); ?></p>
    
    <?php require 'views/footer.php';?>
</body>
</html>