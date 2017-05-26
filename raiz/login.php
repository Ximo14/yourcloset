<?php
  include '../lib/seguridad.php';
  $seguridad = new seguridad();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Closet</title>
		<link rel="icon" type="image/png" href="../img/logo50.png">
		<link rel="stylesheet" href="../css/login.css">
	</head>
	<body>
		<header>
			<a href="index.php"><img src="../img/logo.jpg"></a>
		</header>
		<div id="contenedor">
			<div id="contenido">
				<div id="form">
					<?php
						if ((empty($_POST['usuario'])) &&
							(empty($_POST['pass1']))) {


					?>
							<form action="login.php" method="post">
								<div id="usuario">
									Usuario
								</div>
									<input id="formu" type="text" name="usuario" placeholder="Usuario..." required>
								<div id="contraseña">
									Contraseña
								</div>
									<input id="formc" type="password" name="pass1" placeholder="Contraseña..." required><br><br>
									<input id="enviar" type="submit" value="Entra">
							</form>

					<?php
					}

					if ((isset($_POST['usuario'])) && (!empty($_POST['usuario'])) &&
					(isset($_POST['pass1'])) && (!empty($_POST['pass1']))) {

						include '../lib/usuariosdb.php';
						$seguridad = new seguridad();
						$login = new usuario();
						$resultado=$login->comprobarUser($_POST['usuario']);

						if ($resultado['usuario']==$_POST['usuario']) {
							if (($resultado['pass'])==(sha1($_POST['pass1']))) {
								echo "Registrado correctamente";
								header('Location:index.php');
								$seguridad->addUsuario($_POST['usuario']);
							}else{
								echo "La contraseña no es correcta, introducela de nuevo";
					?>
							<form action="login.php" method="post">
								<div id="usuario">
									Usuario
								</div>
									<input id="formu" type="text" name="usuario" placeholder="Usuario..." value="<?=$_POST['usuario']?>" required>
								<div id="contraseña">
									Contraseña
								</div>
									<input id="formc" type="password" name="pass1" placeholder="Contraseña..." required><br><br>
								<input id="enviar" type="submit" value="Entra">
							</form>
					<?php
							}

						}else{
							echo "Este usuario no existe, por favor registrate <a href=signin.php>aquí</a>";
						}
					}
					?>
				</div>
			</div>
		<div>
	</body>
</html>
