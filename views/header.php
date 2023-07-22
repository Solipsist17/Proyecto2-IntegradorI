<link rel="stylesheet" type="text/css" href="public/css/header.css">

<header class="header">


		<div class="logo"><div><img src="<?php echo constant('URL')?>public/img/Logo.png" id="Peg"></div>POLOTEX</div>

		

		<input type="checkbox" id="toggle">
		<label for="toggle"><img src="<?php echo constant('URL')?>public/img/menu.svg" alt="menu"></label>

		<nav class="navigation"> 
				
			<ul>
				<li><span><a href="<?php echo constant('URL')?>main">Inicio</a></span></li>
				<li><span><a href="<?php echo constant('URL')?>producto">Catálogo</a></span></li>
				<li><span><a href="<?php echo constant('URL')?>contacto">Contáctenos</a></span></li>
				<li><span><a href="<?php echo constant('URL')?>pedido">Mis pedidos</a></span></li>
				<li><span><a href="<?php echo constant('URL')?><?= isset($_SESSION['idUsuario']) ? "cuenta" : "login"?>">Mi cuenta</a></span></li>
				<?php if (isset($_SESSION['idUsuario'])) : ?> <li><span class="carrito-header"><a onclick="cargar(this)"><img src="<?php echo constant('URL')?>public/img/shopping-cart-outline.png" alt="" ></a></span></li> <?php endif; ?>
			</ul>

		</nav>

</header>