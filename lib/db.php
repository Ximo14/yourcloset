<?php
/**
 * CLASE QUE NOS PERMITE LA CONEXION A LA BASE DE DATOS
 */
class db
{
	// ATRIBUTOS NECESARIOS PARA LA CONEXIÓN
	private $host="34.205.29.229";
	private $user="administrador";
	private $pass="yourcloset";
	private $db_name="yourcloset";

	// CONECTOR
	private $conexion;

	// PROPIEDADES PARA CONTROLAR LOS ERRORES
	private $error=false;

	function __construct(){
		$this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
		if ($this->conexion->connect_errno) {
			$this->error=true;
		}else{
			$this->conexion->set_charset("utf8");
		}
	}

	// FUNCION PARA SABER SI HAY UN ERROR EN LA CONEXIÓN
	function hayError(){
		return $this->error;
	}

	function conexion(){
		return $this->conexion;
	}
}
