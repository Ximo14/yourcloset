<?php
include '../lib/db.php';
/**
 *
 */
class comentario extends db
{

private $conexion;
private $resultado;


	function __construct(){
		parent::__construct();
	}

	// FUNCION QUE INSERTA UN COMENTARIO
	public function insertarComentario($nombre,$telefono,$email,$comentario){
		if ($this->hayError()==true){
			return null;
		}else{
			$sqlInserction="INSERT INTO comentario(id_comentario,nombre,telefono,email,comentario) VALUES (NULL,'".$nombre."',".$telefono.",'".$email."','".$comentario."')";
			echo $sqlInserction;
			$this->conexion()->query($sqlInserction);
		}
	}
}
 ?>
