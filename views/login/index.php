<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_login.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer_login.css">
    
    <title>Login</title>
</head>
<body>
    <?php require "views/header.php"; ?>
    <div class="login-box">
      <img src="<?= constant('URL') ?>public/img/Logo.png" class="avatar" alt="Avatar Image">
      <h1>POLOTEX</h1>

      <form action="<?php echo constant('URL'); ?>usuario/iniciarSesion" method="POST">

        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Ingrese el Nombre de Usuario" required>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Enter Password" required>

        <input type="submit" value="Ingresar">

        <a href="#">¿Perdiste tu contraseña?</a><br>
        <a href="<?= constant('URL') ?>registro">¿No tienes una cuenta?</a>

      </form>

    </div>

    <!-- MENSAJE DE REGISTRO -->
    <?php if(isset($_SESSION["mensajeUsuario"])) { ?> <!-- Validamos si existe el mensaje guardado -->
                <?= $_SESSION["mensajeUsuario"] ?> <!-- Imprimimos el mensaje en caso exista -->
            <?php session_unset(); }?> <!-- Limpiamos los datos de la session --> 
    
    <!-- MENSAJE LOGIN FALLIDO -->
    <?= $this->mensaje ?>

    <?php require "views/footer.php"; ?>

</body>
</html>