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
    
    <div id="respuesta"></div>

    <table>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
        </thead>
        <tbody id="tbody-alumnos">
            <?php 
                include_once "models/alumno.php";
                foreach($this->alumnos as $row) { // Iteramos sobre el array de alumnos
                    $alumno = new Alumno();
                    $alumno = $row;
            ?>
            <tr id="fila-<?= $alumno->matricula; ?>">
                <td><?= $alumno->matricula; ?></td>
                <td><?= $alumno->nombre; ?></td>
                <td><?= $alumno->apellido; ?></td>
                
                <td><a href="<?= constant('URL').'consulta/verAlumno/'.$alumno->matricula?>">Editar</a></td>
                <!-- <td><a href="<?= constant('URL').'consulta/eliminarAlumno/'.$alumno->matricula?>">Eliminar</a></td> -->
                <td><button class="btnEliminar" data-matricula="<?= $alumno->matricula; ?>" >Eliminar</button></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    
    <?php require "views/footer.php"; ?>

    <script src="<?php echo constant('URL')?>public/js/consulta.js"></script>
</body>
</html>