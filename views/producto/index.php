<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css"> -->
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_producto.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/carrito.css">
    <title>Producto</title>
</head>

<body>

<?php require "views/header.php"; ?>

<section class="container" id="container" >
    <br>

    <!-- MENSAJE AGREGAR CARRITO FALLIDO -->
    <!-- <?php if (isset($_SESSION['mensaje'])){ ?>
      <div class="alert">
        <p class="message"><?= $_SESSION['mensaje'] ?></p>
        <span class="close-btn">&times;</span>
      </div>
    <?php unset($_SESSION['mensaje']); } ?> -->
 
    <h1>LAS MEJORES PRENDAS Y ACCESORIOS PARA TI</h2>

        <br>

        <div class="products">
            <div class="title">
            <br/>
                <h3> Ropa para mujeres </h3>
                <a href="#" class="vermas">ver más</a>
            <br/>
            </div>
            <br>
            
            <?php 
                //include_once "models/productomodel.php";
                foreach($this->ropaMujeres as $producto) :
                    //$producto = new Producto();
                    //$producto = $row;
            ?>
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?><?= $producto->imagen ?>" alt="">
                    <?php 
                    if ($producto->oferta->idOferta != null) : 
                        include_once("models/ofertamodel.php");
                        $oferta = new OfertaModel();
                        $oferta = $oferta->consultarOferta($producto->oferta->idOferta);
                    ?>
                        <p><span><?= ($oferta->descuento*100) ?>%</span> </p>
                    <?php endif; ?>
                </div>
                <h3 class="producto-titulo"><?= $producto->nombre ?></h3>
                <p><?= $producto->descripcion ?></p>
                   <h4>S/<?= $producto->precio ?></h4>
                <!-- <a data-id="<?= $producto->idProducto ?>" class="btn-add-cart" onclick="cargar(this)">Añadir</a> -->
                <?php if (isset($_SESSION['idUsuario'])) : ?>
                <button data-id="<?= $producto->idProducto ?>" class="btn-add-cart" onclick="agregarCarrito(this)">Añadir</button>
                <?php endif; ?>
            </div>
            <?php endforeach;?>
            <!-- <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/blusa1.jpg" alt="">
                </div>
                <h3>BLUSA FLOREADA BLANCA</h3>
                <p>Blusa blanca con flores rosadas</p>
                   <h4>S/. 48.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/blusa2.jpg" alt="">
                </div>
                <h4>BLUSA FLOREADA VERDE</h4>
                <p>Blusa verde con flores de colores</p>
                   <h4>S/. 40.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>
           
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/blusa3.jpg" alt="">
                </div>
                <h4>BLUSA FLOREADA MORADA</h4>
                <p>Blusa morada con flores blancas</p>
                   <h4>S/. 35.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/blusa4.jpg" alt="">
                </div>
                <h4>BLUSA FLOREADA VERDE AGUA</h4>
                <p>Blusa verde agua con flores blancas</p>
                   <h4>S/. 95.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/blusa7.jpg" alt="">
                </div>
                <h4>BLUSA ROJA</h4>
                <p>Blusa roja con escote en la espalda y hombros</p>
                   <h4>S/. 55.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div> -->
        </div>


        <div class="products">
            <div class="title">
            <br/>
                <h3> Ropa y accesorios para niños </h3>
                <a href="#" class="vermas">ver más</a>
            <br/>
            </div>
            <br>

            <?php 
                foreach($this->ropaNiños as $producto) :
            ?>
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?><?= $producto->imagen ?>" alt="">
                    <?php 
                    if ($producto->oferta->idOferta != null) : 
                        include_once("models/ofertamodel.php");
                        $oferta = new OfertaModel();
                        $oferta = $oferta->consultarOferta($producto->oferta->idOferta);
                    ?>
                        <p><span><?= ($oferta->descuento*100) ?>%</span> </p>
                    <?php endif; ?>
                </div>
                <h3 class="producto-titulo"><?= $producto->nombre ?></h3>
                <p><?= $producto->descripcion ?></p>
                   <h4>S/<?= $producto->precio ?></h4>
                <!-- <a href="" data-id="<?= $producto->idProducto ?>" class="btn-add-cart">Añadir</a> -->
                <?php if (isset($_SESSION['idUsuario'])) : ?>
                <button data-id="<?= $producto->idProducto ?>" class="btn-add-cart" onclick="agregarCarrito(this)">Añadir</button>
                <?php endif; ?>
            </div>
            <?php endforeach;?>

            <?php 
                foreach($this->accesoriosNiños as $producto) :
            ?>
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?><?= $producto->imagen ?>" alt="">
                    <?php 
                    if ($producto->oferta->idOferta != null) : 
                        include_once("models/ofertamodel.php");
                        $oferta = new OfertaModel();
                        $oferta = $oferta->consultarOferta($producto->oferta->idOferta);
                    ?>
                        <p><span><?= ($oferta->descuento*100) ?>%</span> </p>
                    <?php endif; ?>
                </div>
                <h3 class="producto-titulo"><?= $producto->nombre ?></h3>
                <p><?= $producto->descripcion ?></p>
                   <h4>S/<?= $producto->precio ?></h4>
                <!-- <a href="" data-id="<?= $producto->idProducto ?>" class="btn-add-cart">Añadir</a> -->
                <?php if (isset($_SESSION['idUsuario'])) : ?>
                <button data-id="<?= $producto->idProducto ?>" class="btn-add-cart" onclick="agregarCarrito(this)">Añadir</button>
                <?php endif; ?>
            </div>
            <?php endforeach;?>
            
            <!-- <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/pijama_niño1.jpg" alt="">
                </div>
                <h3>PIJAMA PARA NIÑO </h3>
                <p>Conjunto de pijama para niño talla 10</p>
                   <h4>S/. 35.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/pijama_niño2.jpg" alt="">
                </div>
                <h3>PIJAMA PARA NIÑA </h3>
                <p>Conjunto de pijama para niña talla 10</p>
                   <h4>S/. 35.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>
           
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/pijama_niño3.jpg" alt="">
                </div>
               <h3>PIJAMA PARA NIÑO </h3>
                <p>Conjunto de pijama para niño talla 8</p>
                   <h4>S/. 28.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/gorra_niño1.jpg" alt="">
                </div>
                <h4>GORRO AZUL</h4>
                <p>Gorro azul para niño</p>
                   <h4>S/. 23.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/gorra_niño2.jpg" alt="">
                </div>
                <h4>GORRO ROSADO</h4>
                <p>Gorro rosado para niña</p>
                   <h4>S/. 23.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div> -->
        </div>


        <div class="products">
            <div class="title">
            <br/>
                <h3> Ropa para hombres </h3>
                <a href="#" class="vermas">ver más</a>
            <br/>
            </div>
            <br>
            
            <?php 
                foreach($this->ropaHombres as $producto) :
            ?>
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?><?= $producto->imagen ?>" alt="">
                    <?php 
                    if ($producto->oferta->idOferta != null) : 
                        include_once("models/ofertamodel.php");
                        $oferta = new OfertaModel();
                        $oferta = $oferta->consultarOferta($producto->oferta->idOferta);
                    ?>
                        <p><span><?= ($oferta->descuento*100) ?>%</span> </p>
                    <?php endif; ?>
                </div>
                <h3 class="producto-titulo"><?= $producto->nombre ?></h3>
                <p><?= $producto->descripcion ?></p>
                   <h4>S/<?= $producto->precio ?></h4>
                <!-- <a href="" data-id="<?= $producto->idProducto ?>" class="btn-add-cart">Añadir</a> -->
                <?php if (isset($_SESSION['idUsuario'])) : ?>
                <button data-id="<?= $producto->idProducto ?>" class="btn-add-cart" onclick="agregarCarrito(this)">Añadir</button>
                <?php endif; ?>
            </div>
            <?php endforeach;?>        

            <!-- <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/chompa_deporte_hombre1.png" alt="">
                </div>
                <h3>CHOMPA GRIS </h3>
                <p>Chompa gris con capucha</p>
                   <h4>S/. 49.90</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/chompa_deporte_hombre2.png" alt="">
                </div>
                <h4>CHOMPA CON PUNTOS</h4>
                <p>Chompa gris con puntos negros con capucha</p>
                   <h4>S/. 49.90</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>
           
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/chompa_deporte_hombre3.png" alt="">
                </div>
                <h4>CASACA NEGRA</h4>
                <p>Casaca deportiva negra</p>
                   <h4>S/. 58.90</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/chompa_deporte_hombre7.png" alt="">
                </div>
                <h4>CHOMPA DE INVIERNO</h4>
                <p>Chompa de invierno verde oscuro</p>
                   <h4>S/. 110.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?>public/img/chompa_deporte_hombre5.png" alt="">
                </div>
                <h4>CHOMPA AZUL</h4>
                <p>Chompa azul con capucha</p>
                   <h4>S/. 45.90</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div> -->
        </div>


        <div class="products">
            <div class="title">
            <br/>
                <h3> Accesorios para mujeres </h3>
                <a href="#" class="vermas">ver más</a>
            <br/>
            </div>
            <br>
            
            <?php 
                foreach($this->accesoriosMujeres as $producto) :
            ?>
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?><?= $producto->imagen ?>" alt="">
                    <?php 
                    if ($producto->oferta->idOferta != null) : 
                        include_once("models/ofertamodel.php");
                        $oferta = new OfertaModel();
                        $oferta = $oferta->consultarOferta($producto->oferta->idOferta);
                    ?>
                        <p><span><?= ($oferta->descuento*100) ?>%</span> </p>
                    <?php endif; ?>
                </div>
                <h3 class="producto-titulo"><?= $producto->nombre ?></h3>
                <p><?= $producto->descripcion ?></p>
                   <h4>S/<?= $producto->precio ?></h4>
                <!-- <a href="" data-id="<?= $producto->idProducto ?>" class="btn-add-cart">Añadir</a> -->
                <?php if (isset($_SESSION['idUsuario'])) : ?>
                <button data-id="<?= $producto->idProducto ?>" class="btn-add-cart" onclick="agregarCarrito(this)">Añadir</button>
                <?php endif; ?>
            </div>
            <?php endforeach;?> 

            <!-- <div class="carts">
                <div>
                    <img src="./public/img/accesorio1.jpg" alt="">
                    <p><span>5%</span> </p>
                </div>
                <h3>GANCHO Y ARETE </h3>
                <p>Par de gancho de pelo y arete color esmeralda</p>
                   <h4>S/. 10.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="./public/img/accesorio2.jpg" alt="">
                    <p><span>5%</span> </p>
                </div>
                <h4>GANCHO Y ARETE</h4>
                <p>Par de gancho de pelo y arete color perla</p>
                   <h4>S/. 10.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>
           
            <div class="carts">
                <div>
                    <img src="./public/img/accesorio4.jpg" alt="">
                </div>
                <h4>BOLSO DE VIAJE</h4>
                <p>Bolso color azul con puntos blancos de 50cmx45cm</p>
                   <h4>S/. 95.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="./public/img/accesorio5.jpg" alt="">
                </div>
                <h4>BOLSO DE VIAJE</h4>
                <p>Bolso con rallas azules y blancas de 50cmx45cm</p>
                   <h4>S/. 95.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="./public/img/accesorio7.jpg" alt="">
                    <p><span>5%</span> </p>
                </div>
                <h4>GANCHOS DE PELO</h4>
                <p>Par de gancho de pelo diferentes colores</p>
                   <h4>S/. 6.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div> -->
        </div>


        <div class="products">
            <div class="title">
            <br/>
                <h3> Accesorios para hombres </h3>
                <a href="#" class="vermas">ver más</a>
            <br/>
            </div>
            <br>

            <?php 
                foreach($this->accesoriosHombres as $producto) :
            ?>
            <div class="carts">
                <div>
                    <img src="<?php echo constant('URL')?><?= $producto->imagen ?>" alt="">
                    <?php 
                    if ($producto->oferta->idOferta != null) : 
                        include_once("models/ofertamodel.php");
                        $oferta = new OfertaModel();
                        $oferta = $oferta->consultarOferta($producto->oferta->idOferta);
                    ?>
                        <p><span><?= ($oferta->descuento*100) ?>%</span> </p>
                    <?php endif; ?>
                </div>
                <h3 class="producto-titulo"><?= $producto->nombre ?></h3>
                <p><?= $producto->descripcion ?></p>
                   <h4>S/<?= $producto->precio ?></h4>
                <!-- <a href="" data-id="<?= $producto->idProducto ?>" class="btn-add-cart">Añadir</a> -->
                <?php if (isset($_SESSION['idUsuario'])) : ?> <!-- Solo se muestra para los usuarios registrados -->
                <button data-id="<?= $producto->idProducto ?>" class="btn-add-cart" onclick="agregarCarrito(this)">Añadir</button>
                <?php endif; ?>
            </div>
            <?php endforeach;?> 
            
            <!-- <div class="carts">
                <div>
                    <img src="./public/img/reloj1.jpg" alt="">
                    <p><span>8%</span> </p>
                </div>
                <h3>RELOJ WELJILLER</h3>
                <p>Reloj weljleer blanco para hombres</p>
                   <h4>S/. 55.80</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="./public/img/reloj2.jpg" alt="">
                </div>
                <h4>RELOJ NANXI</h4>
                <p>Reloj color oro y correa negra para hombres</p>
                   <h4>S/. 62.90</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>
           
            <div class="carts">
                <div>
                    <img src="./public/img/correa1.png" alt="">
                </div>
                <h4>CORREA NEGRA</h4>
                <p>Correa negra para hombres</p>
                   <h4>S/. 35.00</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="./public/img/billetera1.png" alt="">
                </div>
                <h4>BILLETERA NEGRA</h4>
                <p>Billetera negra para hombres</p>
                   <h4>S/. 44.80</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div>

            <div class="carts">
                <div>
                    <img src="./public/img/billetera2.png" alt="">
                </div>
                <h4>BILLETERA MARRON</h4>
                <p>Billetera marron para hombres</p>
                   <h4>S/. 69.90</h4>
                <a href="" data-id="1" class="btn-add-cart">Añadir</a>
            </div> -->
        </div>
    </section>

    <?php if (isset($_SESSION['idUsuario'])) : ?>
    <div class="seleccion" id="seleccion">

        <div id="seleccionContainer" class="seleccion-container">
          
          <div class="producto-seleccion"> 
            <p id="nombreProducto">Lorem, ipsum dolor.</p>
            <div class="imagen-seleccion">
              <img data-id="1" src="" id="imgSeleccionada" class="producto-miniatura" alt="">
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

        <form id="btnComprar" action="<?php echo constant('URL')?>checkout/pago" method="POST">
            <input id="datosCompra" type="hidden" name="data" value="">
            <button class="boton-comprar">
            Comprar
            </button>
        </form>
        

    </div>

    <?php endif; ?>
 
    <!-- <script>
        function showCart(x){
            document.getElementById("products-id").style.display = "block";
        }
        function closeBtn(){
             document.getElementById("products-id").style.display = "none";
        }
    </script> -->

    <?php require "views/footer.php"; ?>

    <script src="<?= constant('URL') ?>public/js/carrito.js" ></script>
    <!-- js para cerrar el mensaje -->
    <script src="<?= constant('URL') ?>public/js/cerrarMensaje.js"></script>

</body>
</html>