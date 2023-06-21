<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Polotex</title>
     <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_registro.css">

  </head>
  <body>
    <?php require "views/header.php"; ?>

    <div class="login-box">
      <img src="<?= constant('URL') ?>public/img/Logo.png" class="avatar" alt="Avatar Image">
      <h1>Registrate</h1>
      <form>

        <!--  -->

        <label for="username">Nombres</label>
        <input type="text" placeholder="Ingrese el Nombre">

        <!--  -->

        <label for="username">Apellidos</label>
        <input type="text" placeholder="Ingrese los Apellidos">

        <!--  -->

        <label for="username">Correo</label>
        <input type="text" placeholder="Ingrese su correo">

        <!--  -->
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password">
        <input type="submit" value="Registrar">

      </form>

    </div>
  </body>

   <?php require "views/footer.php"; ?>




</html>