<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <title>Prueba - detalle de matrícula</title>
</head>
<body>
    <?php require "views/header.php"; ?>

    <h1>Detalle de <?= $this->alumno->matricula ?></h1>

    <div style="background-color: orange;"><?= $this->mensaje; ?></div>
    
    <form action="<?php echo constant('URL'); ?>consulta/actualizarAlumno" method="POST">
        <label for="matricula">matrícula</label><br>
        <input type="text" name="matricula" disabled value="<?= $this->alumno->matricula; ?>" required><br>

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" value="<?= $this->alumno->nombre; ?>" required><br>

        <label for="apellido">Apellido</label><br>
        <input type="text" name="apellido" value="<?= $this->alumno->apellido; ?>" required><br>

        <input type="submit" value="Actualizar alumno">
    </form>
    
    
    <?php require "views/footer.php"; ?>
</body>
</html>