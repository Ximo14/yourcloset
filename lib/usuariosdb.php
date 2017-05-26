<?php
include_once 'db.php';
/**
 *
 */
class usuario extends db
{
	function __construct(){
		parent::__construct();
	}

	// FUNCION QUE REGISTRA UN USUARIO
	public function insertarUser($nombre,$apellido1,$apellido2,$usuario,$email,$pass,$direccion,$codigopostal,$ciudad,$poblacion,$telefono,$rol){
		if ($this->hayError()==true){
			return null;
		}else{
			$sqlInserction="INSERT INTO usuario(id,nombre,apellido1,apellido2,usuario,email,pass,direccion,codigopostal,ciudad,poblacion,telefono,rol) VALUES (NULL,'".$nombre."','".$apellido1."','".$apellido2."','".$usuario."','".$email."','".sha1($pass)."','".$direccion."',".$codigopostal.",'".$ciudad."','".$poblacion."',".$telefono.",'".$rol."')";
			$this->conexion()->query($sqlInserction);
		}
	}

	// FUNCION QUE COMPRUEBA EL USUARIO
	public function comprobarUser($usuario){
		if ($this->hayError()==true){
			return null;
		}else{
			$resultado = $this->conexion()->query("SELECT * FROM usuario WHERE usuario='".$usuario."'");
			return $resultado->fetch_assoc();
		}
	}

	// FUNCION QUE COMPRUEBA EL EMAIL
	public function comprobarEmail($email){
		if ($this->hayError()==true){
			return null;
		}else{
			$resultado = $this->conexion()->query("SELECT * FROM usuario WHERE email='".$email."'");
			return $resultado->fetch_assoc();
		}
	}

	// FUNCION QUE ACTUALIZA EL USUARIO Y LA CONTRASEÑA
	public function actualizarUser($nombre,$apellido1,$apellido2,$email,$pass,$direccion,$codigopostal,$ciudad,$poblacion,$telefono,$usuario){
		if ($this->hayError()==true){
			return null;
		}else{
			$sqlUpdate="UPDATE usuario SET nombre='".$nombre."',apellido1='".$apellido1."',apellido2='".$apellido2."',email='".$email."',pass='".sha1($pass)."',direccion='".$direccion."',codigopostal=".$codigopostal.",ciudad='".$ciudad."',poblacion='".$poblacion."',telefono=".$telefono." WHERE usuario='".$usuario."'";
			$this->conexion()->query($sqlUpdate);
		}
	}
	
	// FUNCION QUE ACTUALIZA EL USUARIO PERO SIN ACTUALIZAR LA CONTRASEÑA
	public function actualizarUserSinPass($nombre,$apellido1,$apellido2,$email,$direccion,$codigopostal,$ciudad,$poblacion,$telefono,$usuario){
		if ($this->hayError()==true){
			return null;
		}else{
			$sqlUpdate="UPDATE usuario SET nombre='".$nombre."',apellido1='".$apellido1."',apellido2='".$apellido2."',email='".$email."',direccion='".$direccion."',codigopostal=".$codigopostal.",ciudad='".$ciudad."',poblacion='".$poblacion."',telefono=".$telefono." WHERE usuario='".$usuario."'";
			$this->conexion()->query($sqlUpdate);
		}
	}
}
?>
