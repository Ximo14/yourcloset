<?php
	include '../lib/seguridad.php';
	$seguridad = new seguridad();
		if ($seguridad->getUsuario()==null) {
			header("Location:login.php");
			exit;
		}
	$user=$seguridad->getUsuario();
	/*---------------------------------------*/
	include '../lib/usuariosdb.php';
	$comprobar= new usuario();
	$resultado=$comprobar->comprobarUser($user);
	$usuario=$resultado['id'];


	include '../lib/productoDB.php';
	$producto = new producto();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Prueba de banner</title>
		<link rel="stylesheet" href="../css/insertarproducto.css">
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
		<div id="dios">
		<?php

		if ((empty($_POST['nombre']))&&
			(empty($_POST['descripcion']))&&
			(empty($_POST['producto'])) &&
			(empty($_POST['precio']))&&
			(empty($_POST['sexo']))&&
			(empty($_POST['talla']))) {
		?>
		<div id="contenedor">
			<form action="insertarproducto.php" method="post" enctype="multipart/form-data">

				<div id="producto">
				Producto<br><select name="producto" id="selectproducto" required><br><br>
				<option>Elige que tipo de producto es el tuyo</option>
			</div>
				<?php

					$productos = new producto();
					$resultado1=$productos->mostrarCategoria();
					foreach($resultado1 as $fila){
						echo "<option value=".$fila['id_categoria'].">".$fila['categoria']."</option>";
					}
					echo "</select>"
				?>
				<br><br>

				<div id="tipo">
				Tipo de producto<br><select name="tipoproducto" id="selecttipo" required><br><br>
				<option>Elige que tipo de producto es el tuyo</option>
			</div>
				<?php
					$resultado2=$productos->mostrarTipoProducto();
					foreach($resultado2 as $fila){
						echo "<option value=".$fila['id_tipoproducto'].">".$fila['nombre']."</option>";
					}
					echo "</select>"
				?>
				<br><br>
				<div id="descripcion">
				Descripcion <br><input type="text" name="descripcion" placeholder="Inserta una descripción de tu producto" required><br><br>
			</div>
				<?php
				$fecha=date("Y-m-d H:i:s");
				?>
				<div id="precio">
				Precio <br><input type="text" name="precio" placeholder="Inserta un precio estimado" required><br><br>
			</div>
				<input type="hidden" name="fecha" value="<?=$fecha?>">
				<div id="sexo">
				Sexo <br><select  name="sexo" placeholder="Sexo..." required><br><br>
					<option>Elige sexo</option>
					<option value="M">Masculino</option>
					<option value="F">Femenino</option>
					<option value="ambos">Ambos</option>
				</select><br><br>
			</div>
			<div id="talla">
				Talla<br><select  name="talla" placeholder="Talla..." required><br><br>
					<option>Elige la talla de tu producto</option>
					<option value="4">4 años</option>
					<option value="6">6 años</option>
					<option value="8">8 años</option>
					<option value="10">10 años</option>
					<option value="12">12 años</option>
					<option value="14">14 años</option>
					<option value="XS">XS</option>
					<option value="S">S</option>
					<option value="M">M</option>
					<option value="L">L</option>
					<option value="XL">XL</option>
					<option value="XXL">XXL</option>
				</select><br><br>
			</div>
			<div id="prodin">
				Inserta la imagen del producto<br><br><input type="file" name="imagen[]"> -->
				<input type="hidden" name="estado" value="3">
				<input type="hidden" name="usuario" value="<?=$usuario?>">
				<input type="submit" value="Enviar">
			</form>
		</div>
		<?php
		}


		if ((isset($_POST['producto'])) && (!empty($_POST['producto'])) &&
			(isset($_POST['descripcion'])) && (!empty($_POST['descripcion'])) &&
			(isset($_POST['precio'])) && (!empty($_POST['precio'])) &&
			(isset($_POST['fecha'])) && (!empty($_POST['fecha'])) &&
			(isset($_POST['sexo'])) && (!empty($_POST['sexo'])) &&
			(isset($_POST['talla'])) && (!empty($_POST['talla'])) &&
			(isset($_POST['estado'])) && (!empty($_POST['estado'])) &&
			(isset($_POST['usuario'])) && (!empty($_POST['usuario']))){

				include '../lib/productoDB.php';
				$imagenes=[];
				//Rellenado de todas las imagenes
				$numImagenes=0;
				foreach($_FILES['imagen']["name"] as $name){
					$imagenes[$numImagenes]["name"]=$name;
					$numImagenes++;
				}
				$numImagenes=0;
				foreach($_FILES['imagen']["tmp_name"] as $tmp_name){
					$imagenes[$numImagenes]["tmp_name"]=$tmp_name;
					$numImagenes++;
				}
				var_dump($imagenes);

				foreach($imagenes as $imagen){
				$name = basename(rand(0,100).$imagen["name"]);
				$ruta="../img/productos/$name";
				$tmp_name=$imagen['tmp_name'];
				move_uploaded_file($tmp_name, $ruta);
				}
				$insertarproducto = new producto();
				$insertarproducto->insertarProducto($_POST['producto'],$_POST['tipoproducto'],$_POST['descripcion'],$_POST['precio'],$_POST['fecha'],$_POST['sexo'],$_POST['talla'],$_POST['estado'],$_POST['usuario'],$ruta);
				echo "Gracias por enviarnos tu petición!. Te responderemos lo antes posible con una respuesta!.Para ver el estado de tu petición puede consultarlo en el apartado de tus productos o haciendo click en <a href=tuproducto.php>aquí!</a><br>";
			}

		?>
	</div>
	</div>
</body>
</html>
