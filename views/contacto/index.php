<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/header.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_contacto.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/tarjeta2.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/estilo_pregunta.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/footer.css">


    <title>Contáctenos</title>
</head>
<body>

    <?php require "views/header.php"; ?>

<div class="contenedor-form">

    <div class="img-formu">
        <img src="public/img/contac1.png">
    </div>

    <div class="login-box">
        <h1>Contactenos</h1>
                <form action="<?php echo constant('URL'); ?>usuario/registrarUsuario" method="POST">

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Escribe sus nombres"/>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos"/>

            <label for="email" />Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required />

            <label for="Sexo">Sexo 
                    <input type="radio" name="sexo" value="h"> Hombre 
                    <input type="radio" name="sexo" value="m"> Mujer
            </label>

            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" for="mensaje" placeholder="Describe brevemente en menos de 300 carácteres" maxlength="300"></textarea>
        
            <input type="submit" name="enviar" value="Enviar datos"/>
            <br>
            <input type="reset"  value="Borrar datos">
        </form>   
    </div>
</div>

<br>

<div class="hd-FaQ">
        <h1 class="titulo1"><center><b>¿Necesitas ayuda?</b></center></h1>      
    <hr size="2.5px" color="grey">  
    
    <div class="container_menu" id="container">
    <nav class="menu" id="menu">
    <ul>
        
          <li class="list">
        <section id="menu1">
            <a href="#menu1" class="link a1"> <span>¿Los productos son de buena calidad?</span> <i class="fas fa-chevron-down"></i> </a>
            <p>Si, todos los productos son importados y a base de algodón.</p>
        </section>
        </li>

        <li class="list">
        <section id="menu2">
            <a href="#menu2" class="link a1"> <span>¿Cuál es el tiempo de espera del pedido al realizar la compra por web?</span> <i class="fas fa-chevron-down"></i> </a>
            <p>Tiene un tiempo de espera máximo de 10min, en su correo podrá verificar el día de entrega.</p>
        </section>
        </li>

        <li class="list">
        <section id="menu3">
            <a href="#menu3" class="link a1"> <span>¿Cuál es la forma de pago?</span> <i class="fas fa-chevron-down"></i> </a>
            <p>A través de paypal por la pagina web, y de manera presencial por yape, plin o efectivo.</p>
        </section>
        </li>

       <li class="list">
        <section id="menu4">
            <a href="#menu4"  class="link a1"><span>¿Hacen envíos a nivel nacional?</span> <i class="fas fa-chevron-down"></i></a>
            <p>Sí, envíos a todo el Perú.</p>
        </section>  
        </li>

         <li class="list">
        <section id="menu5">
            <a href="#menu5"  class="link a1"><span>¿Hacen cambios o devoluciones?</span> <i class="fas fa-chevron-down"></i></a>
            <p>Para solicitar cambio: Dirigete a la tienda y menciona a la encargada de a tienda que deseas realizar un cambio.Escoge el nuevo producto que quieres y dirigete a la caja.Y por utlimo, entrega el producto a cambiar  y el nuevo producto al persona de la tienda.</p>
            <p>Para solicitar devolución: Ingresa una solictud de devolcuion presónando el siguiente boton y sigue los pasos que se indican.
            <a href="../index.php#FormInd">AQUI</a></p>
        </section>  
        </li>

        <li class="list">
        <section id="menu10">
            <a href="#menu10"  class="link a1 menuf"><span>¿Necesitas más información?</span> <i class="fas fa-chevron-down"></i></a>
            <p>Puede contactarnos a través de nuestras plataformas como facebook, instagram, whatsapp o rellenando el formulario que esta en la parte superior.
            </p>
        </section>
        </li>


    </ul>
    </nav>
    </div>

    
    <script>
        const container = document.getElementById('container')
const list = document.querySelectorAll('.list')
container.addEventListener('click', (e) => {
  if (e.target.classList.contains('link')) {
    RemoveAll();
    e.target.children[1].classList.toggle('rotate')
    let value = e.target.parentElement
    value.classList.toggle('scale')
  }
  e.stopPropagation()
})

const RemoveAll=()=>{
  for(let index of list){
    index.classList.remove('scale')
  }
}
    </script>
</div>   

<br>

<br>

<div class="contenedor2">

        <div class="video-container">
            <video muted autoplay loop><source src="public/vid/polotex.mp4" type="video/mp4"></video> 
        </div>


        <div class="redes-container">
            <h1 class="head-target2">Enlaces a Plataformas</h1>

            <div class="redes">
            <img src="public/img/facebook.png" usemap="#facebook">
                <map name="#facebook">
                <area target="_blank" alt="" title="" href="https://www.facebook.com/polotex" coords="3,0,597,599" shape="rect">
                </map>
            <br>

            <img src="public/img/imstagram.png" usemap="#imstagram">
                <map name="#imstagram">
                <area target="_blank" alt="" title="" href="https://www.instagram.com/polotex_plt/?hl=es" coords="1,8,1024,1022" shape="rect">
                </map>
            <br>

            <img src="public/img/tiktok.png" usemap="#tiktoks">
                <map name="#tiktoks">
                <area target="_blank" alt="" title="" href="https://www.tiktok.com/@polotex1" coords="1,8,1024,1022" shape="rect">
                </map>
            <br>

            <img src="public/img/whatsapp.png" usemap="#whatsapp">
                <map name="#whatsapp">
                <area target="_blank" alt="" title="" href="https://wa.link/c1mjag" coords="1,8,1024,1022" shape="rect">
                </map>
            <br>
            </div>
        </div>

      </td>
        </div>    
   
    </div>


    <?php require "views/footer.php"; ?>
</body>
</html>