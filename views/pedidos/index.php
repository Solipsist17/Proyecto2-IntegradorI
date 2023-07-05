<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
	<link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
  <link rel="stylesheet" href="<?= constant('URL') ?>public/css/pedido.css">
  <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
	<title>pedido</title>

</head>
<body>

	<?php require "views/header.php"; ?>

  <div class="titulo">Mis compras<hr width="100%" align="right"></div>


	 <section class="container">
  	<div class="orden">Orden#110834</div>
    
    <div class="row">
    	
      <div class="columna-1">
        <img src="public/img/blusa1.jpg" alt="Imagen del Producto" class="product-img">
      </div>

      <div class="columna-2">
        <div class="boxc2">Nombre del Producto:<p><input type="text" name="" maxlength="20"></p></div>
        <div class="boxc2">Descripción:<p><textarea name="textarea" rows="2" cols="25" maxlength="50"></textarea> </p></div>
      </div>


      <div class="columna-3">
        <div class="boxc3">Fecha de Pedido:<p><input type="text" name="" maxlength="10"></p></div>
        <div class="boxc3">Precio:<p><input type="text" class="precio" maxlength="10" ></p></div>
      </div>

      <div class="columna-4">
        <button class="boxc4-1">Seguimiento</button>
        <button class="boxc4-2">Confirmar Recepción</button>
      </div>
    </div>
  
    </section>

    <!-- Añade más filas de pedidos aquí si es necesario -->



<?php require "views/footer.php"; ?>


</body>
</html>