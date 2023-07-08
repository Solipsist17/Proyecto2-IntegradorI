<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/resumen_compra.css">
    <title>Pago</title>
</head>
<body>
    <?php require 'views/header.php';?>

    <!-- <h1 style="color: red;"><?php echo $this->mensaje; ?></h1>
    <p><?php echo $this->prueba; ?></p> -->

    <h1>Pago</h1>
    <!-- El comprobante de pago por defecto será la boleta -->
    <!-- <form action="">
        <label for="">¿Qué tipo de comprobante desea?</label>
        <label for="boleta">Boleta</label>
        <input type="radio" name="comprobante" id="boleta">
        <label for="factura">Factura</label>
        <input type="radio" name="comprobante" id="factura">
    </form> -->
    <h3>Resumen de la compra: </h3>
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

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZ6j9jFfDVqT9j9qLg37aFMk7s19s0xl7XWkpD8eGjVeZ02W2FHDBmqdj6fLQLSO92IY8EeVLd46iz_R&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
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
                            value: 100
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                actions.order.capture().then(function (detalles){
                    console.log(detalles);
                    window.location.href = "completado.html";
                });
            },
            onCancel: function(data) {
                alert("pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
        /* paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder() {
          return fetch("/my-server/create-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            // use the "body" param to optionally pass additional order information
            // like product skus and quantities
            body: JSON.stringify({
              cart: [
                {
                  sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                  quantity: "YOUR_PRODUCT_QUANTITY",
                },
              ],
            }),
          })
          .then((response) => response.json())
          .then((order) => order.id);
        },
        // Finalize the transaction on the server after payer approval
        onApprove(data) {
          return fetch("/my-server/capture-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              orderID: data.orderID
            })
          })
          .then((response) => response.json())
          .then((orderData) => {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  window.location.href = 'thank_you.html';
          });
        }
      }).render('#paypal-button-container'); */
    </script>

    <p>Datos de la dirección guardados en sesión: <?php var_dump($_SESSION['direccion']); ?></p>
  
    
    <?php require 'views/footer.php';?>
</body>
</html>