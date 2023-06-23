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

    <!-- MENSAJE LOGIN FALLIDO o REGISTRO EXITOSO-->
    <?php if (!empty($this->mensaje)): ?>
      <div class="alert">
        <p class="message"><?= $this->mensaje ?></p>
        <span class="close-btn">&times;</span>
      </div>
    <?php endif; ?>


    <div class="login-box">
      <img src="<?= constant('URL') ?>public/img/Logo.png" class="avatar" alt="Avatar Image">
      <h1>Registrate</h1>

      
      <form action="<?php echo constant('URL'); ?>usuario/registrarUsuario" method="POST">

        <!--  -->

        <label for="nombre">Nombres</label>
        <input id="nombre" name="nombre" type="text" placeholder="Ingrese el Nombre" required>

        <!--  -->

        <label for="apellido">Apellidos</label>
        <input id="apellido" name="apellido" type="text" placeholder="Ingrese los Apellidos" required>

        <!--  -->

        <label for="correo">Correo</label>
        <input id="correo" name="correo" type="text" placeholder="Ingrese su correo" required>

        <label for="username">username</label>
        <input id="username" name="username" type="text" placeholder="Ingrese el Nombre" required>

        <!--  -->
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Enter Password" required>

        <input type="submit" value="Registrar">

        <a href="<?= constant('URL') ?>login">¿Ya tienes una cuenta?</a>

      </form>

    </div>

    <?php require "views/footer.php"; ?>

    <!-- js para cerrar el mensaje -->
    <script src="<?= constant('URL') ?>public/js/cerrarMensaje.js"></script>

  </body>

</html>