<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_slider.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/tarjeta.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/tarjeta2.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/carrito.css">
    <title>Inicio</title>
</head>
<body>

    <?php require "views/header.php"; ?>

    <div class="slider-frame">
        <ul>
            <li><img src="public/img/slider1.png" alt=""></li>
            <li><img src="public/img/slider2.png" alt=""></li>
            <li><img src="public/img/slider3.png" alt=""></li>
            <li><img src="public/img/slider4.png" alt=""></li>
        </ul>
    </div>

    <script src="public/js/js_slider.js"></script>

    <h1 class="infowe">Acerca de nosotros</h1>

    <div class="contenedor">
        <div class="target">
            <div class="sign">
                <img src="public/img/logo.png">

            </div>
            <p>
                "En Polotex, nuestro principal objetivo es brindar a nuestros clientes una experiencia de compra excepcional y satisfacer sus necesidades de vestimenta con productos de calidad. Nuestra empresa se enorgullece de ofrecer prendas modernas, cómodas y duraderas que se adaptan a diferentes estilos y ocasiones."
            </p>
            </div> 

            <div class="target-2">
                <img src="public/img/info2.png">
        </div>
        
    </div>

    <!----------------->

    <div class="container-texto">
      <text class ="head-text"><p>Encuentras nuestras tienda :</p></text>    
    </div>

    <div class="container-mapa">
    <div class="container-texto"><text>#Piura</text></div>    
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.434518786919!2d-80.63110892429698!3d-5.19418169478338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904a107ec77a24a5%3A0xc8cc5adb847d2f31!2sPolotex!5e0!3m2!1ses-419!2spe!4v1687503516139!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div class="container-texto"><text>#Tumbes</text></div> 

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.080446767582!2d-80.45980192406608!3d-3.56896344238387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9033f2d4fb886923%3A0x2321837c625a663c!2sPOLOTEX!5e0!3m2!1ses-419!2spe!4v1687507567132!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

    <?php if (isset($_SESSION['idUsuario'])) : ?>
    <div class="seleccion" id="seleccion">

        <div id="seleccionContainer" class="seleccion-container">
          
          <div class="producto-seleccion"> 
            <p id="nombreProducto">Lorem, ipsum dolor.</p>
            <div class="imagen-seleccion">
              <img data-id="1" src="../img/Productos/mancuerna-20kg1.jpg" id="imgSeleccionada" class="producto-miniatura" alt="">
              
            </div>

            <div class="producto-opciones">
                <select class="select-unidades">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <select class="select-tallas">
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                </select>
            </div>
            
            <div class="producto-eliminar">
              <img src="<?php echo constant('URL')?>public/img/eliminar.png" onclick="quitarCarrito(this)" alt="">
            </div>
            <p class="precio-unitario">S/50.00</p>
          </div>

          

        </div>
        
        <div class="calculo-precio">
          <span class="subtotal">
            Subtotal
            <!-- <p id="subtotal">90</p> -->
          </span>
          <span class="envio">
            <!-- Envío: S/20.00 -->
            Envío: Calculado en el próximo paso
          </span>
        </div>

        <div class="carrito">
          <img src="<?php echo constant('URL')?>public/img/carrito-de-compras.png" alt="">
        </div>

        <div class="cerrar" id="cerrar" onclick="cerrar()">
          &#x2715
        </div>

        <button class="boton-comprar">
          Comprar
        </button>

    </div>

    <?php endif; ?>


    <?php require "views/footer.php"; ?>
    <script src="<?= constant('URL') ?>public/js/carrito.js" ></script>
</body>
</html>