<?php
  include '../lib/seguridad.php';
  $seguridad = new seguridad();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Closet</title>
		<link rel="stylesheet" href="../css/signin.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" type="image/png" href="../img/logo50.png">
	</head>
	<body>
		<?php
		if ((empty($_POST['nombre']))&&
			(empty($_POST['apellido1']))&&
			(empty($_POST['apellido2']))&&
			(empty($_POST['usuario']))&&
			(empty($_POST['email']))&&
			(empty($_POST['pass1']))&&
			(empty($_POST['pass2']))) {


		?>
				<header>
					<a href="index.php"><img src="../img/logo.jpg"></a>
					<div id="dios">
						<div id="contenedor">
							<h1>Registro</h1>
							<form action="signin.php" method="post">
								<div id="personal">
									Nombre <br><input type="text" name="nombre" placeholder="Nombre..." required><br><br>

									Primer apellido <br><input type="text" name="apellido1" placeholder="Primer apellido..." required><br><br>

									Segundo apellido <br><input type="text" name="apellido2" placeholder="Segundo apellido" required><br><br>

									Teléfono <br><input type="number" name="telefono" placeholder="Teléfono..." required><br><br>

								</div>
								<div id="cuenta">
									Usuario <br><input type="text" name="usuario" placeholder="Usuario..." required><br><br>

									Correo electrónico <br><input type="email" name="email" placeholder="Correo electrónico..." required><br><br>

									Contraseña <br><input type="password" name="pass1" placeholder="Contraseña..." required><br><br>

									Reescribe tu contraseña <br><input type="password" name="pass2" placeholder="Reeinscribe tu contraseña..." required><br><br>
								</div>
								<div id="direc">

									Dirección <br><input type="text" name="direccion" placeholder="Dirección..." required><br><br>

									Código Postal <br><input type="text" name="codigopostal" placeholder="Codigo postal..." required><br><br>

									Ciudad <br><input type="text" name="ciudad" placeholder="Ciudad..." required><br><br>

									Población <br><input type="text" name="poblacion" placeholder="Población..." required><br><br>
								</div>

								<input type="hidden" name="rol" value="usuario">
								<input id="enviar" type="submit" value="Registrate">
							</form>
							</div>
							</div>
					</header>

					<?php
							}
							if ((isset($_POST['nombre'])) && (!empty($_POST['nombre'])) &&
								(isset($_POST['apellido1'])) && (!empty($_POST['apellido1'])) &&
								(isset($_POST['apellido2'])) && (!empty($_POST['apellido2'])) &&
								(isset($_POST['usuario'])) && (!empty($_POST['usuario'])) &&
								(isset($_POST['email'])) && (!empty($_POST['email'])) &&
								(isset($_POST['usuario'])) && (!empty($_POST['usuario'])) &&
								(isset($_POST['pass1'])) && (!empty($_POST['pass1'])) &&
								(isset($_POST['pass2'])) && (!empty($_POST['pass2'])) &&
								(isset($_POST['direccion'])) && (!empty($_POST['direccion'])) &&
								(isset($_POST['codigopostal'])) && (!empty($_POST['codigopostal'])) &&
								(isset($_POST['ciudad'])) && (!empty($_POST['ciudad'])) &&
								(isset($_POST['poblacion'])) && (!empty($_POST['poblacion'])) &&
								(isset($_POST['telefono'])) && (!empty($_POST['telefono']))) {

									include '../lib/usuariosdb.php';
									$usuario = new usuario();
									$resultado1=$usuario->comprobarUser($_POST['usuario']);
									$resultado2=$usuario->comprobarEmail($_POST['email']);

									if (($_POST['usuario']==$resultado1['usuario']) && ($_POST['email']==$resultado2['email'])) {
										?>
										<header>
											<a href="index.php"><img src="../img/logo.jpg"></a>
											<div id="dios">
												<div id="contenedor">
													Este usuario y email ya existen, por favor inserte otros
													<h1>Registro</h1>
													<form action="signin.php" method="post">
														<div id="personal">
															Nombre <br><input type="text" name="nombre" placeholder="Nombre..."  value="<?=$_POST['nombre']?>" required><br><br>

															Primer apellido <br><input type="text" name="apellido1" placeholder="Primer apellido..." value="<?=$_POST['apellido1']?>" required><br><br>

															Segundo apellido <br><input type="text" name="apellido2" placeholder="Segundo apellido" value="<?=$_POST['apellido2']?>"  required><br><br>

															Teléfono <br><input type="number" name="telefono" placeholder="Teléfono..." value="<?=$_POST['telefono']?>" required><br><br>

														</div>
														<div id="cuenta">
															Usuario <br><input type="text" name="usuario" placeholder="Usuario..." required><br><br>

															Correo electrónico <br><input type="email" name="email" placeholder="Correo electrónico..." required><br><br>

															Contraseña <br><input type="password" name="pass1" placeholder="Contraseña..." required><br><br>

															Reescribe tu contraseña <br><input type="password" name="pass2" placeholder="Reeinscribe tu contraseña..." required><br><br>
														</div>
														<div id="direc">

															Dirección <br><input type="text" name="direccion" placeholder="Dirección..." value="<?=$_POST['direccion']?>"  required><br><br>

															Código Postal <br><input type="text" name="codigopostal" placeholder="Codigo postal..." value="<?=$_POST['codigopostal']?>" required><br><br>

															Ciudad <br><input type="text" name="ciudad" placeholder="Ciudad..." value="<?=$_POST['ciudad']?>" required><br><br>

															Población <br><input type="text" name="poblacion" placeholder="Población..."  value="<?=$_POST['poblacion']?>" required><br><br>
														</div>

														<input type="hidden" name="rol" value="usuario">
														<input id="enviar" type="submit" value="Registrate">
													</form>
													</div>
													</div>
											</header>
										<?php
								
									}else if ($resultado2['email']==$_POST['email']) {
										
										?>
										<header>
											<a href="index.php"><img src="../img/logo.jpg"></a>
											<div id="dios">
												<div id="contenedor">
													Este email ya existe, por favor inserte otro
													<h1>Registro</h1>
													<form action="signin.php" method="post">
														<div id="personal">
															Nombre <br><input type="text" name="nombre" placeholder="Nombre..."  value="<?=$_POST['nombre']?>" required><br><br>

															Primer apellido <br><input type="text" name="apellido1" placeholder="Primer apellido..." value="<?=$_POST['apellido1']?>" required><br><br>

															Segundo apellido <br><input type="text" name="apellido2" placeholder="Segundo apellido" value="<?=$_POST['apellido2']?>"  required><br><br>

															Teléfono <br><input type="number" name="telefono" placeholder="Teléfono..." value="<?=$_POST['telefono']?>" required><br><br>

														</div>
														<div id="cuenta">
															Usuario <br><input type="text" name="usuario" placeholder="Usuario..." value="<?=$_POST['usuario']?>"  required><br><br>

															Correo electrónico <br><input type="email" name="email" placeholder="Correo electrónico..." required><br><br>

															Contraseña <br><input type="password" name="pass1" placeholder="Contraseña..." required><br><br>

															Reescribe tu contraseña <br><input type="password" name="pass2" placeholder="Reeinscribe tu contraseña..." required><br><br>
														</div>
														<div id="direc">

															Dirección <br><input type="text" name="direccion" placeholder="Dirección..." value="<?=$_POST['direccion']?>"  required><br><br>

															Código Postal <br><input type="text" name="codigopostal" placeholder="Codigo postal..." value="<?=$_POST['codigopostal']?>" required><br><br>

															Ciudad <br><input type="text" name="ciudad" placeholder="Ciudad..." value="<?=$_POST['ciudad']?>" required><br><br>

															Población <br><input type="text" name="poblacion" placeholder="Población..."  value="<?=$_POST['poblacion']?>" required><br><br>
														</div>

														<input type="hidden" name="rol" value="usuario">
														<input id="enviar" type="submit" value="Registrate">
													</form>
													</div>
													</div>
											</header>
										<?php
								
									}else if($_POST['usuario']==$resultado1['usuario']){
										?>				
										<header>
											<a href="index.php"><img src="../img/logo.jpg"></a>
											<div id="dios">
												<div id="contenedor">
													Este usuario ya existe, por favor inserte otro
													<h1>Registro</h1>
													<form action="signin.php" method="post">
														<div id="personal">
															Nombre <br><input type="text" name="nombre" placeholder="Nombre..."  value="<?=$_POST['nombre']?>" required><br><br>

															Primer apellido <br><input type="text" name="apellido1" placeholder="Primer apellido..." value="<?=$_POST['apellido1']?>" required><br><br>

															Segundo apellido <br><input type="text" name="apellido2" placeholder="Segundo apellido" value="<?=$_POST['apellido2']?>"  required><br><br>

															Teléfono <br><input type="number" name="telefono" placeholder="Teléfono..." value="<?=$_POST['telefono']?>" required><br><br>

														</div>
														<div id="cuenta">
															Usuario <br><input type="text" name="usuario" placeholder="Usuario..." required><br><br>

															Correo electrónico <br><input type="email" name="email" placeholder="Correo electrónico..." value="<?=$_POST['email']?>" required><br><br>

															Contraseña <br><input type="password" name="pass1" placeholder="Contraseña..." required><br><br>

															Reescribe tu contraseña <br><input type="password" name="pass2" placeholder="Reeinscribe tu contraseña..." required><br><br>
														</div>
														<div id="direc">

															Dirección <br><input type="text" name="direccion" placeholder="Dirección..." value="<?=$_POST['direccion']?>"  required><br><br>

															Código Postal <br><input type="text" name="codigopostal" placeholder="Codigo postal..." value="<?=$_POST['codigopostal']?>" required><br><br>

															Ciudad <br><input type="text" name="ciudad" placeholder="Ciudad..." value="<?=$_POST['ciudad']?>" required><br><br>

															Población <br><input type="text" name="poblacion" placeholder="Población..."  value="<?=$_POST['poblacion']?>" required><br><br>
														</div>

														<input type="hidden" name="rol" value="usuario">
														<input id="enviar" type="submit" value="Registrate">
													</form>
													</div>
													</div>
											</header>
										<?php
									}else{
										if (($_POST['pass1'])==($_POST['pass2'])) {

										$usuario->insertarUser($_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['usuario'],$_POST['email'],$_POST['pass1'],$_POST['direccion'],$_POST['codigopostal'],$_POST['ciudad'],$_POST['poblacion'],$_POST['telefono'],$_POST['rol']);
										echo "Usuario registrado correctamente. Entra <a href=login.php>aquí</a>";

										}else{
					?>
											<header>
											<a href="index.php"><img src="../img/logo.jpg"></a>
											<div id="dios">
												<div id="contenedor">
													Las contraseñas no coinciden
													<h1>Registro</h1>
													<form action="signin.php" method="post">
														<div id="personal">
															Nombre <br><input type="text" name="nombre" placeholder="Nombre..."  value="<?=$_POST['nombre']?>" required><br><br>

															Primer apellido <br><input type="text" name="apellido1" placeholder="Primer apellido..." value="<?=$_POST['apellido1']?>" required><br><br>

															Segundo apellido <br><input type="text" name="apellido2" placeholder="Segundo apellido" value="<?=$_POST['apellido2']?>"  required><br><br>

															Teléfono <br><input type="number" name="telefono" placeholder="Teléfono..." value="<?=$_POST['telefono']?>" required><br><br>

														</div>
														<div id="cuenta">
															Usuario <br><input type="text" name="usuario" placeholder="Usuario..." value="<?=$_POST['usuario']?>" required><br><br>

															Correo electrónico <br><input type="email" name="email" placeholder="Correo electrónico..." value="<?=$_POST['email']?>" required><br><br>

															Contraseña <br><input type="password" name="pass1" placeholder="Contraseña..." required><br><br>

															Reescribe tu contraseña <br><input type="password" name="pass2" placeholder="Reeinscribe tu contraseña..." required><br><br>
														</div>
														<div id="direc">

															Dirección <br><input type="text" name="direccion" placeholder="Dirección..." value="<?=$_POST['direccion']?>"  required><br><br>

															Código Postal <br><input type="text" name="codigopostal" placeholder="Codigo postal..." value="<?=$_POST['codigopostal']?>" required><br><br>

															Ciudad <br><input type="text" name="ciudad" placeholder="Ciudad..." value="<?=$_POST['ciudad']?>" required><br><br>

															Población <br><input type="text" name="poblacion" placeholder="Población..."  value="<?=$_POST['poblacion']?>" required><br><br>
														</div>

														<input type="hidden" name="rol" value="usuario">
														<input id="enviar" type="submit" value="Registrate">
													</form>
													</div>
													</div>
											</header>
											<?php
										}
									}
							}

												?>
						</div>
					</div>
	</body>
</html>
