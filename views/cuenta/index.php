<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My account</title>
     <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <!-- <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_registro.css"> -->

  </head>
  <body>
    <?php require "views/header.php"; ?>

    <h1>Mi cuenta</h1>

    <form action="<?php echo constant('URL'); ?>usuario/modificarUsuario" method="POST">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Ingrese el Nombre de Usuario" value="<?= $this->usuario->username ?>" required>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Enter Password" value="<?= $this->usuario->password ?>" required>

        <label for="correo">Correo</label>
        <input id="correo" name="correo" type="text" placeholder="Ingrese su correo" value="<?= $this->usuario->correo ?>" required>

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" placeholder="Ingrese su nombre" value="<?= $this->usuario->nombre ?>" required>

        <label for="apellido">Apellido</label>
        <input id="apellido" name="apellido" type="text" placeholder="Ingrese su apellido" value="<?= $this->usuario->apellido ?>" required>

        <label for="dni">DNI</label>
        <input id="dni" name="dni" type="text" placeholder="Ingrese su DNI" value="<?= $this->usuario->dni ?>" >

        <label for="telefono">Teléfono</label>
        <input id="telefono" name="telefono" type="text" placeholder="Ingrese su teléfono" value="<?= $this->usuario->telefono ?>" >

        <input type="submit" value="Modificar">
    </form>

    <form action="<?php echo constant('URL'); ?>usuario/cerrarSesion" method="POST">
        <label for="logout">Cerrar sesión</label>
        <input id="logout" type="submit" value="Cerrar sesión">
    </form>

    <!-- <?php var_dump($this->usuario) ?> -->
    <?= $this->mensaje ?>

     <?php require "views/footer.php"; ?>

  </body>

</html>