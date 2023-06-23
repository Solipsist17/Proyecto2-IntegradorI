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
    <center><p class="subt">Preguntas Frecuentes</p></center>
    <hr size="2.5px" color="grey">  
    
    <div class="container_menu" id="container">
    <nav class="menu" id="menu">
    <ul>
        
          <li class="list">
        <section id="menu1">
            <a href="#menu1" class="link a1"> <span>¿Los jabones curan el acné?</span> <i class="fas fa-chevron-down"></i> </a>
            <p>No, los jabones no son curativos, sino parte de una rutina de limpieza.</p>
        </section>
        </li>

        <li class="list">
        <section id="menu2">
            <a href="#menu2" class="link a1"> <span>¿Son productos naturales?</span> <i class="fas fa-chevron-down"></i> </a>
            <p>Por supuesto, trabajamos con aceites esenciales, hierbas, flores, extractos naturales, entre otros productos de los cuales sabemos su procedencia.</p>
        </section>
        </li>

        <li class="list">
        <section id="menu3">
            <a href="#menu3" class="link a1"> <span>¿El precio del jabón puede variar?</span> <i class="fas fa-chevron-down"></i> </a>
            <p>Sí, dependiendo de los productos y el peso que lleve.</p>
        </section>
        </li>

        <li class="list">
        <section id="menu4">
            <a href="#menu4" class="link a1"> <span>¿Cuál es el tiempo del pedido?</span> <i class="fas fa-chevron-down"></i> </a>
            <p>De entre 7 a 10 días de anticipación conforme hagas el pedido.</p>
        </section>
        </li>

        <li class="list">
        <section id="menu5">
            <a href="#menu5" class="link a1"> <span>¿Cuál es la forma de pago?</span> <i class="fas fa-chevron-down"></i> </a>
            <p>Transferencia, yape, plin o efectivo.</p>
        </section>
        </li>

        <li class="list">
        <section id="menu6">
            <a href="#menu6" class="link a1"><span>¿Cuentan con tienda fisica?</span> <i class="fas fa-chevron-down"></i></a>
            <p>No, somos una tienda 100% virtual.</p>
        </section>
        </li>

        <li class="list">   
        <section id="menu7">
            <a href="#menu7" class="link a1"><span>¿Por qué debemos usar productos Brisa Natural™?</span> <i class="fas fa-chevron-down"></i></a>
            <p>Nuestros productos son artesanales, lo que permite conocer los ingredientes que se usan para elaborarlos, además son personalizados según tus necesidades, siendo respetuosos con tu piel y el medio ambiente.</p>
        </section>
        </li>

        <li class="list">
        <section id="menu8">
            <a href="#menu8"  class="link a1"><span>¿Cómo separo mi pedido?</span> <i class="fas fa-chevron-down"></i></a>
            <p>Al momento de la compra se debe abonar el 50% del total y el otro 50% en la fecha de entrega.</p>
        </section>  
        </li>

        <li class="list">
        <section id="menu9">
            <a href="#menu9"  class="link a1"><span>¿Hacen envíos a nivel nacional?</span> <i class="fas fa-chevron-down"></i></a>
            <p>Sí, envíos a todo el Perú.</p>
        </section>  
        </li>

        <li class="list">
        <section id="menu10">
            <a href="#menu10"  class="link a1 menuf"><span>¿Necesitas más información? ¿Puedo hacer un pedido personalizado?</span> <i class="fas fa-chevron-down"></i></a>
            <p>Puede contactarnos de manera empresarial al 961-749-664. Para reclamos y/o sugerencias sírvase utilizar nuestro formulario dando click <a href="../index.php#FormInd">AQUI</a></p>
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