<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <title>Consulta</title>
</head>
<body>
    <?php require "views/header.php"; ?>

    <h1>Consulta</h1>    

    <table>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include_once "models/alumno.php";
                foreach($this->alumnos as $row) { // Iteramos sobre el array de alumnos
                    $alumno = new Alumno();
                    $alumno = $row;
            ?>
            <tr>
                <td><?= $alumno->matricula; ?></td>
                <td><?= $alumno->nombre; ?></td>
                <td><?= $alumno->apellido; ?></td>
                <td><a href="">Editar</a></td>
                <td><a href="">Eliminar</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    
    <?php require "views/footer.php"; ?>
</body>
</html>