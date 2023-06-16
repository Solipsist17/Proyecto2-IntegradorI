<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <title>Main</title>
</head>
<body>
    <?php require "views/header.php"; ?>

    <h1>Esta es la vista de main</h1>
    <p><?php echo $this->mensaje ?></p>
    

    <?php require "views/footer.php"; ?>
</body>
</html>