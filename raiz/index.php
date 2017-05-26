<?php
	include '../lib/seguridad.php';
	$seguridad = new seguridad();
	$user=$seguridad->getUsuario();
	/*-----------------------------------------*/
	include '../lib/usuariosdb.php';
	$comprobar = new usuario();
	$resultado=$comprobar->comprobarUser($user);
	/*-----------------------------------------*/
	include '../lib/productoDB.php';
	$producto = new producto();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Your Closet</title>
		<link rel="stylesheet" href="../css/index.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="../img/logo50.png">
	</head>
	<body>
		<!-- BANNER -->
		<header>
			<div id="logo">
				<a href="index.php"><img src="../img/logo.jpg"></a>
			</div>
			<?php
				if ($user == null){
			?>
					<div id="acceso">
						<div id="entrar">
							<a href="login.php">Entrar</a>
						</div>
						<div id="registro">
							<a href="signin.php">Registro</a>
						</div>
					</div>
			<?php
				}else{
			?>
					<div id="acceso">
						<div id="salir">
							<a href="logout.php">Cerrar sesión</a>
						</div>
						<div class="perfilbtn">
							<a href="perfil.php">Perfil</a>
						</div>
					</div>
			<?php
				}
			?>
		</header>
		<!-- BARRA DE NAVEGACION -->
		<div class="menu">
			<div class="home">
				<a href="index.php"><div class="fa fa-home" id="fahome"></div></a>
			</div>
			<div class="navegacion">
				<button class="botonav"><a href="hombres.php">Hombres</a></button>
				<div class="submenu">
				<?php
					$resultado1=$producto->mostrarCategoria();
					foreach ($resultado1 as $link) {
						echo "<a href=hombres.php?id=".$link['id_categoria'].">".$link['categoria']."</a>";
					} 
				?>
				</div>
			</div>
			<div class="navegacion">
				<button class="botonav"><a href="mujeres.php">Mujeres</a></button>
				<div class="submenu">
				<?php
					$resultado1=$producto->mostrarCategoria();
					foreach ($resultado1 as $link) {
						echo "<a href=mujeres.php?id=".$link['id_categoria'].">".$link['categoria']."</a>";
					} 
				?>
				</div>
			</div>
			<div class="navegacion">
				<button class="botonav"><a href="junior.php">Junior</a></button>
				<div class="submenu">
				<?php
          
					$resultado1=$producto->mostrarCategoria();
					foreach ($resultado1 as $link) {
						echo "<a href=mujeres.php?id=".$link['id_categoria'].">".$link['categoria']."</a>";
					} 
				?>
				</div>
			</div>
			<div class="contacto">
				<a href="contacto.php">Contacto</a>
			</div>
			<?php
				if ($resultado['rol']=="usuario"){
			?>
			<div class="contacto">
				<a href="insertarproducto.php">Vender</a>
			</div>
			<div class="contacto">
				<a href="tuproducto.php">Tus productos</a>
			</div>
		
			<?php
			}
			if($resultado['rol']=="admin"){
			?>
				<div class="contacto">
					<a href="listaproductos.php">Lista productos</a>
				</div>
			<?php
			}
			?>
		</div>
		<!-- FIN BARRA DE NAVEGACION -->
		<!-- FIN BANNER -->

		<div id="contenedor">

			<div id="descuento">
				<img src="../img/descuentobn.png" alt="">
			</div>

			<div id="generos">
				<div id="hombre">
					<a href="hombres.php"><img src="../img/hombrefinal.jpg" alt=""></a>
				</div>
				<div id="mujer">
					<a href="mujeres.php"><img src="../img/mujeroriginal.jpg" alt=""></a>
				</div>
				<div id="junior">
					<a href="junior.php"><img src="../img/juniororiginal.jpg" alt=""></a>
				</div>
			</div>
		</div>

  <!-- FOOTER -->
	<footer>
		<div id="nosotros">
			Sobre nosotros:
			<ul>
				<li><a href="contacto.php">Donde estamos ubicados</a>
			</ul>
		</div>
		<div id="social">Puedes seguirnos en:
			<a href="https://twitter.com/YourClosetInfo" class="fa fa-twitter" id="twitter"></a>
			<a href="https://www.instagram.com/your_closet_info/" class="fa fa-instagram" id="instagram"></a>
			<a href="https://www.facebook.com/Your-Closet-138967713314598/?hc_ref=NEWSFEED&fref=nf" class="fa fa-facebook" id="facebook"></a>
			<a href="https://github.com/Ximo14/yourcloset" class="fa fa-github" id="github"></a>
		</div>
	</footer>
      <!-- FIN FOOTER -->
	</body>
</html>

