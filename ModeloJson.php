<?php


require_once "Conexion.php";

/**
 * 
 */
class Datos extends Conexion
{
	
	#USUARIOS
	//----------------------------------------------------------------------------------

	public static function readUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT nombre, usuario, password, perfil FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("nombre", $nombre);
		$stmt->bindColumn("usuario", $usuario);
		$stmt->bindColumn("password", $password);
		$stmt->bindColumn("perfil", $perfil);

		$usuarios = array();

		while ($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$user = array();
			$user["nombre"] = utf8_encode($nombre);
			$user["usuario"] = utf8_encode($usuario);
			$user["password"] = utf8_encode($password);
			$user["perfil"] = utf8_encode($perfil);

			array_push($usuarios, $user);
		}

		return $usuarios;
	}

	public function loginUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT nombre, usuario, password, perfil FROM $tabla WHERE usuario = :usuario AND password = :password");

		$stmt->bindParam(":usuario", $datosModel["usuario"]);
		$stmt->bindParam("password", $datosModel["password"]);

		$stmt->execute();

		$stmt->bindColumn("nombre", $nombre);
		$stmt->bindColumn("usuario", $usuario);
		$stmt->bindColumn("password", $password);
		$stmt->bindColumn("perfil", $perfil);
	
		while ($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$user = array();
			$user["nombre"] = utf8_encode($nombre);
			$user["usuario"] = utf8_encode($usuario);
			$user["password"] = utf8_encode($password);
			$user["perfil"] = utf8_encode($perfil);		
		}

		if(!empty($user)){
			return $user;
		}else{
			return false;
		}
	}

	#CATEGORIAS
	//----------------------------------------------------------------------------------

	public static function createCategoriaModel($titulo, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo) VALUES (:titulo)");

		$stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public static function verCategoriasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_categoria, categoria FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_categoria", $id_categoria);
		$stmt->bindColumn("categoria", $categoria);

		$categorias = array();

		while ($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$cat = array();
			$cat["id_categoria"] = utf8_encode($id_categoria);
			$cat["categoria"] = utf8_encode($categoria);

			array_push($categorias, $cat);
		}

		return $categorias;
	}

	public function updateCategoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set titulo = :titulo WHERE id = :id");

		$stmt->bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}


	#PRODUCTOS
	//-----------------------
	public function readProductosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_producto, id_categoria, id_unidad, idAlmacen, codigo, nombre, descripcion,stock, precio_venta, fecha_registro FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_producto", $id_producto);
		$stmt->bindColumn("id_categoria", $id_categoria);
		$stmt->bindColumn("id_unidad", $id_unidad);
		$stmt->bindColumn("idAlmacen", $idAlmacen);
		$stmt->bindColumn("codigo", $codigo);
		$stmt->bindColumn("nombre", $nombre);
		$stmt->bindColumn("descripcion", $descripcion);
		$stmt->bindColumn("stock", $stock);
		$stmt->bindColumn("precio_venta", $precio_venta);
		$stmt->bindColumn("fecha_registro", $fecha_registro);

		$productos = array();

		while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$pro = array();
			$pro['id_producto'] = utf8_encode($id_producto);
			$pro['id_categoria'] = utf8_encode($id_categoria);
			$pro['id_unidad'] = utf8_encode($id_unidad);
			$pro['idAlmacen'] = utf8_encode($idAlmacen);
			$pro['codigo'] = utf8_encode($codigo);
			$pro['nombre'] = utf8_encode($nombre);
			$pro['descripcion'] = utf8_encode($descripcion);
			$pro['stock'] = utf8_encode($stock);
			$pro['precio_venta'] = utf8_encode($precio_venta);
			$pro['fecha_registro'] = utf8_encode($fecha_registro);

			array_push($productos, $pro);

		}

		return $productos;
	}


	#TIPO GAS
	//-----------------------
       public static function verTipoGasModel($tabla){
		$stmt = (new Conexion)->conectar()->prepare("SELECT id_tipogas, codigo, descripcion FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_tipogas", $id_tipogas);
		$stmt->bindColumn("codigo", $codigo);
		$stmt->bindColumn("descripcion", $descripcion);


		$tipogas = array();

		while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$gas = array();
			$gas['id_tipogas'] = utf8_encode($id_tipogas);
			$gas['codigo'] = utf8_encode($codigo);
			$gas['descripcion'] = utf8_encode($descripcion);

			array_push($tipogas, $gas);

		}

		return $tipogas;
	}

	#UNIDAD MEDIDA
	public function verMedidaModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_unidad, unidad FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_unidad", $id_unidad);
		$stmt->bindColumn("unidad", $unidad);

		$umedida = array();

		while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$mide = array();
			$mide['id_unidad'] = utf8_encode($id_unidad);
			$mide['unidad'] = utf8_encode($unidad);

			array_push($umedida, $mide);
		}
		return $umedida;
	}

	#TIPO OPERACION
	public function verOperacionModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_operacion, operacion FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_operacion", $id_operacion);
		$stmt->bindColumn("operacion", $operacion);

		$operaciones = array();

		while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$ope = array();
			$ope['id_operacion'] = utf8_encode($id_operacion);
			$ope['operacion'] = utf8_encode($operacion);

			array_push($operaciones, $ope);
		}
		return $operaciones;
	}

	
	#TIPO COMPROBANTE
	public function verComprobanteModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_comprobante, comprobante FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_comprobante", $id_comprobante);
		$stmt->bindColumn("comprobante", $comprobante);

		$comprobantes = array();

		while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$comp = array();
			$comp['id_comprobante'] = utf8_encode($id_comprobante);
			$comp['comprobante'] = utf8_encode($comprobante);

			array_push($comprobantes, $comp);
		}
		return $comprobantes;
	}


   # CLIENTES
	public function verClientesModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_cliente, documento, ruc, razon_social ,direccion FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_cliente", $id_cliente);
		$stmt->bindColumn("documento", $documento);
		$stmt->bindColumn("ruc", $ruc);
		$stmt->bindColumn("razon_social", $razon_social);
		$stmt->bindColumn("direccion", $direccion);

		$clientes = array();

		while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$cli = array();
			$cli['id_cliente'] = utf8_encode($id_cliente);
			$cli['documento'] = utf8_encode($documento);
			$cli['ruc'] = utf8_encode($ruc);
			$cli['razon_social'] = utf8_encode($razon_social);
			$cli['direccion'] = utf8_encode($direccion);

			array_push($clientes, $cli);
		}
		return $clientes;
	}













}

?>