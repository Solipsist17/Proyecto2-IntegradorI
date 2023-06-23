<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My account</title>
     <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/cuenta.css">
    
    <!-- <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_registro.css"> -->

  </head>
  <body>
    <?php require "views/header.php"; ?>

    <h1>Mi cuenta</h1>

    <form action="<?php echo constant('URL'); ?>usuario/modificarUsuario" method="POST">

      <ul>
    
      <li>
        <label for="username">Username</label>
        <ul>
        <input id="username" name="username" type="text" placeholder="Ingrese el Nombre de Usuario" value="<?= $this->usuario->username ?>" required>
        </ul>
      </li>

      <li>
        <label for="password">Password</label>
        <ul>
        <input id="password" name="password" type="password" placeholder="Enter Password" value="<?= $this->usuario->password ?>" required>
        </ul>
      </li>

      <li>
        <label for="correo">Correo</label>
        <ul>
        <input id="correo" name="correo" type="text" placeholder="Ingrese su correo" value="<?= $this->usuario->correo ?>" required>
        </ul>
      </li> 
      

      <li>
        <label for="nombre">Nombre</label>
        <ul>
        <input id="nombre" name="nombre" type="text" placeholder="Ingrese su nombre" value="<?= $this->usuario->nombre ?>" required>
        </ul>
      </li>


      <li>
        <label for="apellido">Apellido</label>
        <ul>
        <input id="apellido" name="apellido" type="text" placeholder="Ingrese su apellido" value="<?= $this->usuario->apellido ?>" required>
        </ul>
      </li>
        
      <li>
        <label for="dni">DNI</label>
        <ul>
        <input id="dni" name="dni" type="text" placeholder="Ingrese su DNI" value="<?= $this->usuario->dni ?>" >
        </ul>
      </li>

      <li>
        <label for="telefono">Teléfono</label>
        <ul>
        <input id="telefono" name="telefono" type="text" placeholder="Ingrese su teléfono" value="<?= $this->usuario->telefono ?>" >
        </ul>
      </li>
    </ul>
        
    <ul>
      <div class="modifier">
      <input class="modificar" type="submit" value="Modificar">
      </div>
    </ul>

    </form>

    <form action="<?php echo constant('URL'); ?>usuario/cerrarSesion" method="POST">
      <div class="cerrar" id="Cerrar">
        <label for="logout">Cerrar sesión :</label>
        <input class="close" id="logout" type="submit" value="Cerrar sesión">
      </div>


    </form>

    <!-- <?php var_dump($this->usuario) ?> -->
    <?= $this->mensaje ?>

    <?php require "views/footer.php"; ?>

  </body>

</html>