<?php
  include '../lib/seguridad.php';
  $seguridad = new seguridad();
  $user=$seguridad->getUsuario();
  
  include '../lib/usuariosdb.php';
  $comprobar= new usuario();
  $resultado=$comprobar->comprobarUser($user);
  $usuario=$resultado['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Prueba de banner</title>
		<link rel="stylesheet" href="../css/index.css">
		<link rel="stylesheet" href="../css/producto.css">
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
				<button class="botonav"><a href="#">Hombres</a></button>
				<div class="submenu">
					<a href="#">Link 1</a>
					<a href="#">Link 2</a>
					<a href="#">Link 3</a>
				</div>
			</div>
			<div class="navegacion">
				<button class="botonav"><a href="#">Mujeres</a></button>
				<div class="submenu">
					<a href="#">Link 1</a>
					<a href="#">Link 2</a>
					<a href="#">Link 3</a>
				</div>
			</div>
			<div class="navegacion">
				<button class="botonav"><a href="#">Junior</a></button>
				<div class="submenu">
					<a href="#">Link 1</a>
					<a href="#">Link 2</a>
					<a href="#">Link 3</a>
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
		<div id="titulo">Tus productos</div>
			<div id="productos">
				<table>
					<tr>
						<th>Producto</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Fecha</th>
						<th>Estado</th>
					</tr>
					<?php
					require_once '../lib/productoDB.php';
					$tuproducto = new producto();
					$resultado = $tuproducto->mostrarTuproducto($usuario);
					foreach ($resultado as $fila) {
						echo "<tr>";
							echo "<td>".$fila['id_categoria']."</td>";
							echo "<td>".$fila['descripcion']."</td>";
							echo "<td>".$fila['precio']."</td>";
							echo "<td>".$fila['fecha']."</td>";
							echo "<td>".$fila['estado']."</td>";
						echo "</tr>";
					}
					?>
				</table>
			</div>
	</body>
</html>
