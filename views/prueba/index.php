<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <title>Prueba</title>
</head>
<body>
    <?php require "views/header.php"; ?>

    <h1>Prueba</h1>

    <div style="background-color: orange;"><?= $this->mensaje; ?></div>
    
    <form action="<?php echo constant('URL'); ?>prueba/registrarAlumno" method="POST">
        <label for="matricula">Matricula</label><br>
        <input type="text" name="matricula" id="" required><br>

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="" required><br>

        <label for="apellido">Apellido</label><br>
        <input type="text" name="apellido" id="" required><br>

        <input type="submit" value="Registrar nuevo alumno">
    </form>
    
    
    <?php require "views/footer.php"; ?>
</body>
</html>