<?php
include_once 'db.php';
/**
 *
 */
class producto extends db
{
	function __construct(){
		
		parent::__construct();
	}

	// FUNCION QUE INSERTA PRODUCTOS
	public function insertarProducto($producto,$tipo_producto,$descripcion,$precio,$fecha,$sexo,$talla,$estado,$usuario,$img){
		if ($this->hayError()==true){
			return null;
		}else{
			$sqlInserction="INSERT INTO producto(id_producto,id_categoria,id_tipoproducto,descripcion,precio,fecha,sexo,talla,estado,usuario,img) VALUES (NULL,".$producto.",".$tipo_producto.",'".$descripcion."',".$precio.",'".$fecha."','".$sexo."','".$talla."',".$estado.",'".$usuario."','".$img."')";
			$this->conexion()->query($sqlInserction);
		}
	}


	// FUNCION QUE MUESTRA LOS PRODUCTOS DE HOMBRES
	public function mostrarProductosHombres(){
	if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT c.id_categoria,c.categoria,p.precio,p.descripcion,p.estado,p.img,tp.nombre FROM producto p INNER JOIN categoria c INNER JOIN tipo_producto tp ON p.id_categoria=c.id_categoria AND tp.id_tipoproducto=p.id_tipoproducto WHERE p.talla NOT BETWEEN 4 AND 14 AND sexo='M'");
			return $resultado;
		}
	}

	// FUNCION QUE MUESTRA LOS PRODUCTOS DE MUJERES
	public function mostrarProductosMujeres(){
	if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT c.id_categoria,c.categoria,p.precio,p.descripcion,p.estado,p.img,tp.nombre FROM producto p INNER JOIN categoria c INNER JOIN tipo_producto tp ON p.id_categoria=c.id_categoria AND tp.id_tipoproducto=p.id_tipoproducto WHERE p.talla NOT BETWEEN 4 AND 14 AND p.sexo='F'");
			return $resultado;
		}
	}


	// FUNCION QUE MUESTRA LOS PRODUCTOS JUNIOR
	public function mostrarProductosJunior(){
	if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT c.id_categoria,c.categoria,p.precio,p.descripcion,p.estado,p.img,tp.nombre FROM producto p INNER JOIN categoria c INNER JOIN tipo_producto tp ON p.id_categoria=c.id_categoria AND tp.id_tipoproducto=p.id_tipoproducto WHERE p.talla BETWEEN 4 AND 14");
			return $resultado;
		}
	}

	// FUNCION QUE MUESTRA TODOS LOS PRODUCTOS
	public function mostrarTodosProductos(){
	if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT * FROM producto");
			return $resultado;
		}
	}



	// MOSTRAR CATEGORIA
	public function mostrarCategoria(){
	if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT id_categoria,categoria FROM categoria ");
			return $resultado;
		}
	}

	// MUESTRA EL TIPO DE PRODUCTO DEPENDIENDO DEL ID
	public function mostrarTipoProductoPorID($id){
		if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT nombre,categoria FROM tipo_producto WHERE categoria=".$id."");
			return $resultado;
		}
	}

	// FUNCION QUE UTILIZA EL ADMIN PARA CAMBIAR EL ESTADO DEL PRODUCTO
	public function actualizarEstado($estado,$id){
		if ($this->hayError()==true){
			return null;
		}else{
			$sqlUpdate="UPDATE producto SET estado=".$estado." WHERE id_producto=".$id."";
			$this->conexion()->query($sqlUpdate);
		}
	}


	// FUNCION QUE MUESTRA LOS PRODUCTOS DEPENDIENDO DEL USUARIO QUE ESTE REGISTRADO EN ESE MOMENTO
	public function mostrarTuproducto($usuario){
		if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT p.id_categoria,p.descripcion,p.precio,p.fecha,e.estado FROM producto p INNER JOIN estado e ON p.estado=e.id_estado WHERE p.usuario=".$usuario." ORDER BY p.fecha DESC");
			return $resultado;
		}
	}

	// FUNCION QUE MUESTRA LOS TIPOS DE PRODUCTO
	public function mostrarTipoProducto(){
		if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT * FROM tipo_producto");
			return $resultado;
		}
	}

	// FUNCION QUE MUESTRA TODOS LOS PRODUCTOS POR ID, TALLA Y SEXO
	public function mostrarProductosPorIDM($id){
	if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT c.id_categoria,c.categoria,p.precio,p.descripcion,p.estado,p.img,tp.nombre FROM producto p INNER JOIN categoria c INNER JOIN tipo_producto tp ON p.id_categoria=c.id_categoria AND tp.id_tipoproducto=p.id_tipoproducto WHERE p.talla NOT BETWEEN 4 AND 14 AND p.sexo='M'AND p.id_categoria=".$id."");
			return $resultado;
		}
	}

	// FUNCION QUE MUESTRA TODOS LOS PRODUCTOS POR ID, TALLA Y SEXO
	public function mostrarProductosPorIDF($id){
	if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT c.id_categoria,c.categoria,p.precio,p.descripcion,p.estado,p.img,tp.nombre FROM producto p INNER JOIN categoria c INNER JOIN tipo_producto tp ON p.id_categoria=c.id_categoria AND tp.id_tipoproducto=p.id_tipoproducto WHERE p.talla NOT BETWEEN 4 AND 14 AND p.sexo='F'AND p.id_categoria=".$id."");
			return $resultado;
		}
	}

	// FUNCION QUE MUESTRA TODOS LOS PRODUCTOS POR ID, TALLA Y SEXO
	public function mostrarProductosPorIDJ($id){
	if ($this->hayError()==true){
			return null;
		}else{
			$resultado=$this->conexion()->query("SELECT c.id_categoria,c.categoria,p.precio,p.descripcion,p.estado,p.img,tp.nombre FROM producto p INNER JOIN categoria c INNER JOIN tipo_producto tp ON p.id_categoria=c.id_categoria AND tp.id_tipoproducto=p.id_tipoproducto WHERE p.talla BETWEEN 4 AND 14 AND p.id_categoria=".$id."");
			return $resultado;
		}
	}
}
?>

