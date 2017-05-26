<?php
include '../lib/seguridad.php';
$seguridad = new seguridad();
	if ($seguridad->getUsuario()== false){
		header('Location: index.php');
		exit;
	}
	if ($seguridad->getUsuario()== true){
		$seguridad->logout();
		header('Location: index.php');	
	}

?>