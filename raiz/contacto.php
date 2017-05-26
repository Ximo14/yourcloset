<?php
	include '../lib/seguridad.php';
	$seguridad = new seguridad();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>YourCloset</title>
			<link rel="stylesheet" href="../css/contacto.css">
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
				if ($seguridad->getUsuario()== null){
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
			</div>
    <!-- FIN BARRA DE NAVEGACION -->
    <!-- FIN BANNER -->
	<?php
	
      	if ((empty($_POST['nombre']))&&
      		(empty($_POST['apellido1']))&&
      		(empty($_POST['apellido2']))&&
      		(empty($_POST['telefono']))&&
      		(empty($_POST['email']))&&
      		(empty($_POST['comentario']))){


      	?>
		
       
            <div id="info">
                <h3>Contacto</h3>
                <p>
					Catarroja<br>Valencia,España<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone"></abbr>: 0</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email"></abbr>: <a href="mailto:yourclosetinfo@gmail.com">yourclosetinfo@gmail.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours"></abbr>: Lunes - Viernes: 8:15 AM to 13:15 PM</p>
				
					<a href="https://twitter.com/YourClosetInfo" class="fa fa-twitter" id="twitter"></a>
				<a href="https://www.instagram.com/your_closet_info/" class="fa fa-instagram" id="instagram"></a>
				<a href="https://www.facebook.com/Your-Closet-138967713314598/?hc_ref=NEWSFEED&fref=nf" class="fa fa-facebook" id="facebook"></a>
				<a href="https://github.com/Ximo14/yourcloset" class="fa fa-github" id="github"></a>
            </div>
          
            <div class="mapa">
                
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6165.893499104145!2d-0.40812172176294326!3d39.40271076798352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604c281cde90e3%3A0xc07903b4053cd6c!2s46470+Catarroja%2C+Valencia%2C+Spain!5e0!3m2!1sen!2sus!4v1490104530693"></iframe>
            </div>
            
      
       
		            <div id="comentario">
                <h3>Envianos un mensaje!</h3>
                <form action="contacto.php" method="post">
                    <div>
                        
                            <label>Nombre completo:</label>
                            <input type="text" class="form-control" name="nombre" required>
                            <p class="help-block"></p>
                        
                    </div>
                    <div>
                        
                            <label>Numero de telefono:</label>
                            <input type="tel" class="form-control" name="telefono" required>
                        
                    </div>
                    <div>
                        
                            <label>Correo electrónico:</label>
                            <input type="email" class="form-control" name="email" required>
                        
                    </div>
                    <div>
                        
                            <label>Mensaje:</label><br>
                            <textarea rows="10" cols="100"  name="comentario" required  maxlength="999" style="resize:none"></textarea>
                        
                    </div>
                
                    <!-- For success/fail messages -->
                    <button type="submit">Enviar mensaje</button>
                </form>
            </div>
    <?php
			}

		include '../lib/comentariodb.php';
    	// COMPROBACION ANTES DE INSERTAR UN COMENTARIO
    	if	((isset($_POST['nombre'])) && (!empty($_POST['nombre'])) &&
			(isset($_POST['telefono'])) && (!empty($_POST['telefono'])) &&
			(isset($_POST['email'])) && (!empty($_POST['email'])) &&
			(isset($_POST['comentario'])) && (!empty($_POST['comentario']))) {

				$comentario = new comentario();
				$comentario->insertarComentario($_POST['nombre'],$_POST['telefono'],$_POST['email'],$_POST['comentario']);
				echo "Comentario enviado correctamente, le responderemos lo antes posible. Gracias!";
			}
	?>

    
    <!-- FIN FOOTER -->
	</body>
</html>
