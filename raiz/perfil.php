<?php
	include '../lib/seguridad.php';
	$seguridad = new seguridad();
	if ($seguridad->getUsuario() == null){
	header('Location: login.php');
	exit;
	}
	$user=$seguridad->getUsuario();
	include '../lib/usuariosdb.php';
	$usuario = new usuario();
	$resultado=$usuario->comprobarUser($user);

include '../lib/productoDB.php';
	$producto = new producto();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Prueba de banner</title>
		<link rel="stylesheet" href="../css/perfil.css">
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
			<h1>Bienvenido a tu perfil</h1>
			<div id="formularios">
				<div id="personal">
					<h2>Datos personales</h2>
					<form action="perfil.php" method="post" id="datospersonales">
						Nombre<br><input type="text" id="nombre" name="nombre" value="<?=$resultado['nombre']?>" readonly required><br><br>
						Primer apellido<br><input type="text" id="apellido1" name="apellido1" value="<?=$resultado['apellido1']?>" readonly required><br><br>
						Segundo apellido<br><input type="text" id="apellido2" name="apellido2" value="<?=$resultado['apellido2']?>" readonly required><br><br>
				</div>

				<div id="cuenta">
					<h2>Datos Cuenta</h2>
					<input type="hidden" name="usuario" value="<?=$resultado['usuario']?>">
					Correo electrónico<br><input type="text" id="email" name="email" value="<?=$resultado['email']?>" readonly required><br><br>
					Teléfono<br><input type="text" id="telefono" name="telefono" value="<?=$resultado['telefono']?>" readonly required><br><br>
					Contraseña<br><input type="text" id="pass" name="pass" value="" readonly><br><br>
					<input type="hidden" name="datoscuenta">
				</div>


				<div id="direc">
					<h2>Dirección</h2>
					Dirección<br><input type="text" id="direccion" name="direccion" value="<?=$resultado['direccion']?>" readonly required><br><br>
					Codigo Postal<br><input type="text" id="codigopostal" name="codigopostal" value="<?=$resultado['codigopostal']?>" readonly required><br><br>
					Ciudad<br><input type="text" id="ciudad" name="ciudad" value="<?=$resultado['ciudad']?>" readonly required><br><br>
					Población<br><input type="text" id="poblacion" name="poblacion" value="<?=$resultado['poblacion']?>" readonly required><br><br>
				</div>
			</div>
			<div id="botones">
				<div id="botonedit">
					<button type="button" id="editar">  Editar</button>
				</div>
				<div id="botonact">
					<input type="submit" id="enviar" value="Actualizar" disabled>
				</div>
			</div>
					</form>
		</div>
		<?php



 		if ((isset($_POST['nombre'])) && (!empty($_POST['nombre'])) &&
 			(isset($_POST['apellido1'])) && (!empty($_POST['apellido1'])) &&
 			(isset($_POST['apellido1'])) && (!empty($_POST['apellido1'])) &&
 			(isset($_POST['email'])) && (!empty($_POST['email'])) &&
 			(isset($_POST['direccion'])) && (!empty($_POST['direccion'])) &&
 			(isset($_POST['codigopostal'])) && (!empty($_POST['codigopostal'])) &&
 			(isset($_POST['ciudad'])) && (!empty($_POST['ciudad'])) &&
 			(isset($_POST['poblacion'])) && (!empty($_POST['poblacion']))) {

 			$resultado2=$usuario->comprobarEmail($_POST['email']);
			if ($resultado['email']==$_POST['email']) {
				//echo "El usuario no quiere cambiar el correo electrónico";
				if ($_POST['pass']==null){

					//echo "El usuario no quiere cambiar la contraseña";
					$resultado2=$usuario->actualizarUserSinPass($_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['email'],$_POST['direccion'],$_POST['codigopostal'],$_POST['ciudad'],$_POST['poblacion'],$_POST['telefono'],$_POST['usuario']);
				?><meta http-equiv="refresh" content="0.000001"/><?php
				}else{
					//echo "El usuario quiere cambiar la contraseña";
					$resultado2=$usuario->actualizarUser($_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['email'],$_POST['pass'],$_POST['direccion'],$_POST['codigopostal'],$_POST['ciudad'],$_POST['poblacion'],$_POST['telefono'],$_POST['usuario']);
					?><meta http-equiv="refresh" content="0.000001"/><?php
				}
			}else{
				if ($_POST['email']==$resultado2['email']) {
					echo "El nuevo correo que ha introducio esta ocupado";

				}else{
					//echo "El correo electrónico que ha introducido esta disponible";
						if ($_POST['pass']==null) {
							//echo "El usuario no quiere cambiar la contraseña";
							$resultado2=$usuario->actualizarUserSinPass($_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['email'],$_POST['direccion'],$_POST['codigopostal'],$_POST['ciudad'],$_POST['poblacion'],$_POST['telefono'],$_POST['usuario']);
							?><meta http-equiv="refresh" content="0.000001"/><?php
						}else{
							//echo "El usuario quiere cambiar la contrasña";
							$resultado2=$usuario->actualizarUser($_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['email'],$_POST['pass'],$_POST['direccion'],$_POST['codigopostal'],$_POST['ciudad'],$_POST['poblacion'],$_POST['telefono'],$_POST['usuario']);
							?><meta http-equiv="refresh" content="0.000001"/><?php
						}
				}
			}
		}
	?>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script type="text/javascript" src="../js/accion.js"></script>
	<!-- FIN BARRA DE NAVEGACION --!>
	<!-- FIN BANNER -->

	<!-- FOOTER -->
	<footer>
		<div id="nosotros">
			Sobre nosotros:
			<ul>
				<li><a href="#">Donde estamos ubicados</a>
				<li><a href="#">Nuestras politicas</a>
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
