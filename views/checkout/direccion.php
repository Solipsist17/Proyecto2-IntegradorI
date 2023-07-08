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

    <h1>Dirección de entrega: </h1>
    <form action="<?php echo constant('URL')?>checkout/verificarDireccion" method="post">
        <label for="departamento">departamento</label>
        <input type="text" name="departamento" id="departamento" required>
        <label for="provincia">provincia</label>
        <input type="text" name="provincia" id="provincia" required>
        <label for="distrito">distrito</label>
        <input type="text" name="distrito" id="distrito" required>
        <label for="calle">calle</label>
        <input type="text" name="calle" id="calle" required>
        <input type="submit" name="enviar" value="Enviar esta dirección">
    </form>

    <br><br><br>

    <!-- <p>Data de la session: <?php 
    include_once 'models/productomodel.php';
    include_once 'models/categoriamodel.php';
    include_once 'models/ofertamodel.php';
    session_write_close();
    session_start();
    var_dump($_SESSION['datosCompra']); 
        var_dump($this->data);
    ?> 
    </p> -->

    <!-- <p>Productos: <?= var_dump($_SESSION['datosCompra']['productosCarrito'][0]); ?></p>
    <p>Subtotal: <?= var_dump($_SESSION['datosCompra']['subtotal']); ?></p> -->
    
    <?php require 'views/footer.php';?>
</body>
</html>