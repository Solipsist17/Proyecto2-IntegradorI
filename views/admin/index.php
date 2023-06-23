<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/admin.css">
</head>

<body>

    <main class="container">
        <div class="sidebar">
            <div class="logo">
            <img src="<?php echo constant('URL')?>public/img/logo.png" alt="Logo">
            <h2>Admin Dashboard</h2>
            </div>
            <ul class="navigation">
            <li><a href="#">Reportes</a></li>
            <li><a href="#">Usuarios</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Pedidos</a></li>
            <li><a href="#">Cuenta</a></li>
            <li>
                <form action="<?php echo constant('URL'); ?>usuario/cerrarSesion" method="POST">
                <div class="cerrar" id="Cerrar">
                    <!-- <label for="logout">Cerrar sesión :</label> -->
                    <input class="close" id="logout" type="submit" value="Cerrar sesión">
                </div>
                </form>
            </li>
            </ul>
        </div>

        <div class="content">
            <h1>Bienvenido al Admin Dashboard</h1>
            <!-- Rest of the content -->
        </div>
    </main>

  

  <script src="script.js"></script>
</body>

</html>
