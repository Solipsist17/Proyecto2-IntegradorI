<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_login.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    
    <title>Login</title>
</head>
<body>
    <?php require "views/header.php"; ?>
    <div class="login-box">
      <img src="public/img/Logo.png" class="avatar" alt="Avatar Image">
      <h1>POLOTEX</h1>
      <form>

        <!--  -->

        <label for="username">Username</label>
        <input type="text" placeholder="Ingrese el Nombre de Usuario">

        <!--  -->
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password">
        <input type="submit" value="Ingresar">

          <a href="#">¿Perdiste tu contraseña?</a><br>
          <a href="<?= constant('URL') ?>registro">¿No tienes una cuenta?</a>

      </form>
    </div>
    
    <?php require "views/footer.php"; ?>

</body>
</html>