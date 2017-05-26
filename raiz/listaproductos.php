<?php
	require_once '../lib/seguridad.php';
	$seguridad = new seguridad();
	$user=$seguridad->getUsuario();
    if ($seguridad->getUsuario()==null) {
		header("Location: index.php");
		exit;
	}
    
	require_once '../lib/usuariosdb.php';
    $comprobar = new usuario();
    $resultado=$comprobar->comprobarUser($user);
    if ($resultado['rol']!="admin") {
		header("Location:index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Prueba de banner</title>
	  <link rel="stylesheet" href="../css/index.css">
	  <link rel="stylesheet" type="text/css" href="../css/lista.css">
	  <link rel="stylesheet" type="text/css" href="../css/signin.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="icon" type="image/png" href="../img/logo50.png">
	</head>
	<body>
		<header>
			<a href="index.php"><img src="../img/logo.jpg"></a>
			<div id="dios">
				<div id="lista">
					<table border="1px" class="sortable">
						<tr>
							<th>ID</th>
							<th>Producto</th>
							<th>Precio</th>
							<th>Fecha</th>
							<th>Sexo</th>
							<th>Talla</th>
							<th>Estado</th>
						</tr>
					<?php
						require_once '../lib./productoDB.php';
						$producto = new producto();
						$resultado2=$producto->mostrarTodosProductos();
						foreach ($resultado2 as $fila){
							if ($fila['estado']!=2) {
								echo "<tr>";
									echo "<td>".$fila['id_producto']."</td>";
									echo "<td>".$fila['descripcion']."</td>";
									echo "<td>".$fila['precio']."</td>";
									echo "<td>".$fila['fecha']."</td>";
									echo "<td>".$fila['sexo']."</td>";
									echo "<td>".$fila['talla']."</td>";
									echo "<td>".$fila['estado']."</td>";
									?>
									<td><img onmouseover="this.width=500;this.height=400;" onmouseout="this.width=100;this.height=80;" width="100" height="80" src="<?=$fila['img']?>"></td>
									<?php
									
									echo "<td><form action=listaproductos.php method=post><input type=hidden name=aceptar value=1><input type=hidden name=id value=".$fila['id_producto']."><input type=submit value=ACEPTAR id=button></form></td>";
									echo "<td><form action=listaproductos.php method=post><input type=hidden name=rechazar value=2><input type=hidden name=id value=".$fila['id_producto']."><input type=submit value=RECHAZAR id=button></form></td>";
									echo "<td><form action=listaproductos.php method=post><input type=hidden name=proceso value=4><input type=hidden name=id value=".$fila['id_producto']."><input type=submit value=EN_PROCESO id=button></form></td>";
								echo "</tr>";
							}
						}	
					// FUNCIONES QUE CAMBIAN COMO ESTA EL ESTADO
						if (!empty($_POST['aceptar'])){
							$producto->actualizarEstado($_POST['aceptar'],$_POST['id']);?>
							<meta http-equiv="refresh" content="0.000001"/><?php
						}

						else if (!empty($_POST['rechazar'])){
							$producto->actualizarEstado($_POST['rechazar'],$_POST['id']);?>
							<meta http-equiv="refresh" content="0.000001"/><?php
						}

						else if (!empty($_POST['proceso'])){
							$producto->actualizarEstado($_POST['proceso'],$_POST['id']);?>
							<meta http-equiv="refresh" content="0.000001"/><?php
						}?>
					</table>
				</div>
		<script src="../js/sorttable.js"></script>
	</body>
</html>
