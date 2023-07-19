<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/pago.css">
    <title>Pago</title>
</head>
<body>
    <?php require 'views/header.php';?>

    <!-- <h1 style="color: red;"><?php echo $this->mensaje; ?></h1>
    <p><?php echo $this->prueba; ?></p> -->
    <!-- El comprobante de pago por defecto será la boleta -->
    <!-- <form action="">
        <label for="">¿Qué tipo de comprobante desea?</label>
        <label for="boleta">Boleta</label>
        <input type="radio" name="comprobante" id="boleta">
        <label for="factura">Factura</label>
        <input type="radio" name="comprobante" id="factura">
    </form> -->
    <h3>Resumen de la compra: </h3>
    <p><?php  
      if (isset($_SESSION['mensaje'])) {
        //header('Location: ' . constant('URL') . 'checkout/pago');
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
      }
      
      
    ?></p>
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
                <!-- <div class="producto-eliminar">
                <img src="<?php echo constant('URL')?>public/img/eliminar.png" onclick="quitarCarrito(this)" alt="">
                </div> -->
                <p class="precio-unitario">S/50.00</p>
            </div>
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
                <!-- <div class="producto-eliminar">
                <img src="<?php echo constant('URL')?>public/img/eliminar.png" onclick="quitarCarrito(this)" alt="">
                </div> -->
                <p class="precio-unitario">S/50.00</p>
            </div>
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
                <!-- <div class="producto-eliminar">
                <img src="<?php echo constant('URL')?>public/img/eliminar.png" onclick="quitarCarrito(this)" alt="">
                </div> -->
                <p class="precio-unitario">S/50.00</p>
            </div>

        </div>
        
        <div class="calculo-precio">
          <span class="subtotal">
            Subtotal
            <!-- <p id="subtotal">90</p> -->
          </span>
          <span class="envio">
            Envío: S/20.00
            <!-- Envío: Calculado en el próximo paso -->
          </span>
        </div>

        <!-- <div class="carrito">
          <img src="<?php echo constant('URL')?>public/img/carrito-de-compras.png" alt="">
        </div> -->

        <!-- <div class="cerrar" id="cerrar" onclick="cerrar()">
          &#x2715
        </div> -->

        <!-- <form id="btnComprar" action="<?php echo constant('URL')?>checkout/direccion" method="POST">
            <input id="datosCompra" type="hidden" name="data" value="">
            <button class="boton-comprar">
            Comprar
            </button>
        </form>  -->
    </div>

    <!-- Set up a container element for the button -->
    <div class="paypal-btn">
      <div id="paypal-button-container"></div>
    </div>
    

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?=constant('CLIENT_ID')?>&currency=<?=constant('CURRENCY')?>"></script>
    
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?= $_SESSION['datosCompra']['subtotal']?>
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                actions.order.capture().then(function (detalles){
                    console.log(detalles);
                    //window.location.href = "completado.html";
                    return fetch('procesarPago', {
                      method: 'POST',
                      headers: {
                        'content-type' : 'application/json'
                      },
                      body: JSON.stringify({
                        detalles: detalles
                      })
                    })
                    .then(response => {
                      /* if (!response.ok){
                          throw new Error('Error en la solicitud: ' + response.status);
                      }
                      return  */response.json();
                    })
                    .then(data => {
                      console.log(data);
                      
                    })
                });
            },
            onCancel: function(data) {
                alert("pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>

    <!-- <?php 
        session_write_close();
        include_once 'models/productomodel.php';
        include_once 'models/categoriamodel.php';
        include_once 'models/ofertamodel.php';
        
        //session_start();
    ?>
    <p>Datos de la compra guardados en sesión: <?php var_dump($_SESSION['datosCompra']['productosCarrito']); ?></p> -->

    <script src="<?= constant('URL') ?>public/js/pago.js"></script>
    
    <?php require 'views/footer.php';?>
</body>
</html>