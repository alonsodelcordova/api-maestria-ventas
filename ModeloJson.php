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

	public static function loginUsuarioModel($datosModel, $tabla){

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

	public static function createCategoriaModel($categoria, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (categoria) VALUES (:categoria)");

		$stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);

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

	public static function updateCategoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set categoria = :categoria WHERE id_categoria = :id_categoria");

		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_INT);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public static function deleteCategoriaModel($id_categoria, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :id_categoria");

		$stmt->bindParam(":id_categoria", $id_categoria, PDO::PARAM_INT);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}



	#PRODUCTOS
	//-----------------------
   public static function createProductoModel($datosModel, $tabla){

 
      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_categoria, id_unidad, idAlmacen, codigo, nombre, descripcion, stock, precio_venta) VALUES (:id_categoria, :id_unidad, :idAlmacen, :codigo, :nombre, :descripcion, :stock, :precio_venta)");
	
		$stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id_unidad", $datosModel["id_unidad"], PDO::PARAM_STR);
		$stmt->bindParam(":idAlmacen", $datosModel["idAlmacen"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datosModel["precio_venta"], PDO::PARAM_STR);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
   

   }


	public static function readProductosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_producto, id_categoria, id_unidad, idAlmacen, codigo, nombre, descripcion,stock, precio_venta FROM $tabla");
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

			array_push($productos, $pro);

		}
		return $productos;
	}


	#TIPO GAS
	//-----------------------
    public static function verTipoGasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_tipogas, codigo, descripcion FROM $tabla");
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
	public static function verMedidaModel($tabla){
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
	public static function verOperacionModel($tabla){
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
	public static function verComprobanteModel($tabla){
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
	public static function createClientesModel($datosModel, $tabla){

 
      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (documento, ruc, razon_social, direccion) VALUES (:documento, :ruc, :razon_social, :direccion)");
	
		$stmt->bindParam(":documento", $datosModel["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":ruc", $datosModel["ruc"], PDO::PARAM_STR);
		$stmt->bindParam(":razon_social", $datosModel["razon_social"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
   

   }


	public static function verClientesModel($tabla){
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

   
   # PROVEEDORES

	public static function crearProveedor($datosModel, $tabla){

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruc_proveedor, razon_social, direccion_fiscal,estado_empresa,condicion_empresa) VALUES (:ruc_proveedor, :razon_social, :direccion_fiscal, :estado_empresa, :condicion_empresa)");
	
		$stmt->bindParam(":ruc_proveedor", $datosModel["ruc_proveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":razon_social", $datosModel["razon_social"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion_fiscal", $datosModel["direccion_fiscal"], PDO::PARAM_STR);
		$stmt->bindParam(":estado_empresa", $datosModel["estado_empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":condicion_empresa", $datosModel["condicion_empresa"], PDO::PARAM_STR);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
   

   }


   public static function verProveedorModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_proveedor, ruc_proveedor,  razon_social ,direccion_fiscal,estado_empresa, condicion_empresa FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_proveedor", $id_proveedor);
		$stmt->bindColumn("ruc_proveedor", $ruc_proveedor);
		$stmt->bindColumn("razon_social", $razon_social);
		$stmt->bindColumn("direccion_fiscal", $direccion_fiscal);
		$stmt->bindColumn("estado_empresa", $estado_empresa);
		$stmt->bindColumn("condicion_empresa", $condicion_empresa);

		$provee = array();

		while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$prov = array();
			$prov['id_proveedor'] = utf8_encode($id_proveedor);
			$prov['ruc_proveedor'] = utf8_encode($ruc_proveedor);
			$prov['razon_social'] = utf8_encode($razon_social);
			$prov['direccion_fiscal'] = utf8_encode($direccion_fiscal);
			$prov['estado_empresa'] = utf8_encode($estado_empresa);
			$prov['condicion_empresa'] = utf8_encode($condicion_empresa);

			array_push($provee, $prov);
		}
		return $provee;
	}


   # VENTAS 
public static function verVentasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_detalleventa, id_comprobante,  serie ,codigo,id_cliente, id_producto, precio_venta, cantidad, subtotal, igv, total FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_detalleventa", $id_detalleventa);
		$stmt->bindColumn("id_comprobante", $id_comprobante);
		$stmt->bindColumn("serie", $serie);
		$stmt->bindColumn("codigo", $codigo);
		$stmt->bindColumn("id_cliente", $id_cliente);
		$stmt->bindColumn("id_producto", $id_producto);
		$stmt->bindColumn("precio_venta", $precio_venta);
		$stmt->bindColumn("cantidad", $cantidad);
		$stmt->bindColumn("subtotal", $subtotal);
		$stmt->bindColumn("igv", $igv);
		$stmt->bindColumn("total", $total);

		$ventas = array();

		while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
			$ven = array();
			$ven['id_detalleventa'] = utf8_encode($id_detalleventa);
			$ven['id_comprobante'] = utf8_encode($id_comprobante);
			$ven['serie'] = utf8_encode($serie);
			$ven['codigo'] = utf8_encode($codigo);
			$ven['id_cliente'] = utf8_encode($id_cliente);
			$ven['id_producto'] = utf8_encode($id_producto);
			$ven['precio_venta'] = utf8_encode($precio_venta);
			$ven['cantidad'] = utf8_encode($cantidad);
			$ven['subtotal'] = utf8_encode($subtotal);
			$ven['igv'] = utf8_encode($igv);
			$ven['total'] = utf8_encode($total);

			array_push($ventas, $ven);
		}
		return $ventas;
	}



	public static function crearVentaModel($datosModel, $tabla){

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_comprobante, serie, codigo, id_cliente, id_producto, precio_venta , cantidad, subtotal, igv, total) VALUES (:id_comprobante, :serie, :codigo, :id_cliente, :id_producto,    :precio_venta, :cantidad , :subtotal, :igv, :total)");
	
		$stmt->bindParam(":id_comprobante", $datosModel["id_comprobante"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datosModel["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cliente", $datosModel["id_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datosModel["precio_venta"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":subtotal", $datosModel["subtotal"], PDO::PARAM_STR);
		$stmt->bindParam(":igv", $datosModel["igv"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datosModel["total"], PDO::PARAM_STR);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
   
   }

}

?>