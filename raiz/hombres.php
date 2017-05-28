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
		<title>Prueba de banner</title>
		<link rel="stylesheet" href="../css/hombre.css">
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
		<!--<div id="objeto1">-->
		<?php
		if (empty($_GET['id'])) {
			$resultado=$producto->mostrarProductosHombres();
			if ($resultado->num_rows==0) {
				echo "<div id=errorM>Ooooops!Lo sentimos, no tenemos productos en este apartado, ¡pronto obtendremos más productos!.</div>";
			}else{
				foreach ($resultado as $tabla) {
					if (($tabla['estado']!=2) &&
					($tabla['estado']!=3) &&
					($tabla['estado']!=4)) {
						echo "<div id=objeto1>";
							echo "<div id=imagen>";
								echo "<img src=".$tabla['img']."><br>";
							echo "</div>";
							echo "<div id=precio>";
								echo "<b>".$tabla['precio']."€<br></b>";
							echo "</div>";
							echo "<div id=informacion>";
								echo $tabla['nombre']."<br>";
								echo $tabla['descripcion'];
						echo "</div>";
						echo "</div>";
					}
				}
			}



		}else{
			$resultado=$producto->mostrarProductosPorIDM($_GET['id']);
			foreach ($resultado as $tabla) {
				if (($tabla['estado']!=2) &&
				($tabla['estado']!=3) &&
				($tabla['estado']!=4)) {
					echo "<div id=objeto1>";
						echo "<div id=imagen>";
							echo "<img src=".$tabla['img']."><br>";
						echo "</div>";
						echo "<div id=precio>";
							echo "<b>".$tabla['precio']."€<br></b>";
						echo "</div>";
						echo "<div id=informacion>";
							echo $tabla['nombre']."<br>";
							echo $tabla['descripcion'];
					echo "</div>";
					echo "</div>";
				}
			}
		}

  ?>
<!--</div>-->
	</body>
</html>
