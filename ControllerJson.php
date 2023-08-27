<?php

require_once "ModeloJson.php";

/**
 * 
 */
class ControllerJson
{
	
//**********************************
//  INICIO DE USUARIOS
// **********************************
	public static function createUsuarioController($usuario, $password, $role, $mail){ // Nuevo Usuario

		$encriptar = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
		//$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

		$datosController = array("usuario"=>$usuario,
			                     //"password"=>crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'),
								 "password" => $encriptar,
			                     "role"=>$role,
			                     "mail"=>$mail);

		$respuesta = Datos::createUsuarioModel($datosController, "usuarios");
		return $respuesta;
	}

	public static function readUsuariosController(){ // Mostrar Usuarios
        $tabla = "usuarios";
		$respuesta = Datos::readUsuariosModel($tabla);
		return $respuesta;
	}

	public static function loginUsuarioController($usuario, $password){ // Login
        
        $tabla = "usuarios";
		$datosController = array(
			"usuario" => $usuario,
			"password"=>$password);

		$respuesta = Datos::loginUsuarioModel($datosController, $tabla);
		return $respuesta;
	}

	//**********************************
	//   INICIO DE CATEGORIA
	//**********************************
	public static function createCategoriaController($categoria){
		$respuesta = Datos::createCategoriaModel($categoria, "categorias");
		return $respuesta;
	}

	public static function verCategoriasController(){
		$tabla = "categorias";
		$respuesta = Datos::verCategoriasModel($tabla);
		return $respuesta;
	}

	public static function updateCategoriaController($id_categoria, $categoria){

		$datosController = 
		array(
			"id_categoria"=>$id_categoria,
			"categoria"=>$categoria);

		$respuesta = Datos::updateCategoriaModel($datosController, "categorias");
		return $respuesta;
	}

	public static function deleteCategoria($id){
		$respuesta = Datos::deleteCategoriaModel($id, "categorias");
		return $respuesta;
	}


	//**********************************
	//   INICIO DE PRODUCTOS
	//**********************************
	public static function crearProductoController($id_categoria,$id_unidad,$idAlmacen,$codigo,$nombre,$descripcion,$stock,$precio_venta){

        $tabla = "productos";
        $datosController = 
        
        array(
        	"id_categoria"=> $id_categoria,
			"id_unidad"=> $id_unidad,
			"idAlmacen"=> $idAlmacen,
			"codigo"=> $codigo,
            "nombre"=> $nombre,
            "descripcion"=>$descripcion,
            "stock"=>$stock,
            "precio_venta"=>$precio_venta);

		$respuesta = Datos::createProductoModel($datosController, $tabla);
		return $respuesta;
	}

	public function readProductosController(){
		$tabla = "productos";
		$respuesta = Datos::readProductosModel($tabla);
		return $respuesta;
	}
	//**********************************
	//   INICIO TIPO DE GAS
	//**********************************
	public static function verTipoGasController(){ 
        $tabla = "tipo_gases";
		$respuesta = Datos::verTipoGasModel($tabla);
		return $respuesta;
	}

//**********************************
 //  INICIO DE UNIDAD DE MEDIDA
//**********************************
	
	public static function verMedidaController(){ 
        $tabla = "unidad";
		$respuesta = Datos::verMedidaModel($tabla);
		return $respuesta;
	}

//**********************************
 //  INICIO TIPO OPERACION
//**********************************	
	public static function verOperacionController(){ 
        $tabla = "operaciones";
		$respuesta = Datos::verOperacionModel($tabla);
		return $respuesta;
	}

 //*********************************
 //  INICIO DE TIPO COMPROBANTE
//**********************************   
	public static function verTipoComprobanteController(){ 
        $tabla = "comprobante";
		$respuesta = Datos::verComprobanteModel($tabla);
		return $respuesta;
	}
   
 //**********************************
 //  INICIO DE CLIENTES  
//********************************** 
    public static function crearClienteController($documento,$ruc,$razon_social,$direccion){
        $tabla = "clientes";
        $datosController = array(
        	"documento"=> $documento,
			"ruc"=> $ruc,
			"razon_social"=> $razon_social,
			"direccion"=> $direccion);

		$respuesta = Datos::createClientesModel($datosController, $tabla);
		return $respuesta;
	}


	public static function verClientesController(){ 
        $tabla = "clientes";
		$respuesta = Datos::verClientesModel($tabla);
		return $respuesta;
	}

	public static function deleteCliente($id){
		$tabla = "clientes";
		$respuesta = Datos::deleteClienteModel($id, $tabla);
		return $respuesta;
	}

 	//*********************************
 	//  INICIO DE PROVEEDOR
	//**********************************
 	public static function crearProveedorController($ruc_proveedor,$razon_social,$direccion_fiscal,$estado_empresa,$condicion_empresa){

        $tabla = "proveedor";
        $datosController = 
        
        array(
        	"ruc_proveedor"=> $ruc_proveedor,
			"razon_social"=> $razon_social,
			"direccion_fiscal"=> $direccion_fiscal,
            "estado_empresa"=> $estado_empresa,
            "condicion_empresa"=> $condicion_empresa);

		$respuesta = Datos::crearProveedor($datosController, $tabla);
		return $respuesta;
	}

	public static function verProveedorController(){ 
        $tabla = "proveedor";
		$respuesta = Datos::verProveedorModel($tabla);
		return $respuesta;
	}

	//**********************************
 	//  INICIO DE CILINDROS
	//**********************************  
   	public static function verCilindrosController(){ 
        $tabla = "cilidros";
		$respuesta = Datos::verCilindroModel($tabla);
		return $respuesta;
	}  
	//**********************************
 	//  INICIO DE ALMACEN
	//**********************************
	# ALMACEN
	public static function verAlmacenController(){ 
        $tabla = "almacen";
		$respuesta = Datos::verAlmacenModel($tabla);
		return $respuesta;
	}
   
   //**********************************
 	//  INICIO DE VENTAS
	//**********************************
   public static function verVentasController(){ 
        $tabla = "detalle_ventas";
		$respuesta = Datos::verVentasModel($tabla);
		return $respuesta;
	}

	public static function crearVentaController($id_comprobante,$serie,$codigo,$id_cliente,$id_producto,$precio_venta,$cantidad,$subtotal,$igv,$total){ 
        
        $tabla = "detalle_ventas";
		$datosController = 
        
        array(
        	"id_comprobante"=> $id_comprobante,
			"serie"=> $serie,
			"codigo"=> $codigo,
            "id_cliente"=> $id_cliente,
            "id_producto"=> $id_producto,
            "precio_venta"=> $precio_venta,
            "cantidad"=> $cantidad,
            "subtotal"=> $subtotal,
            "igv"=> $igv,
            "total"=> $total);

		$respuesta = Datos::crearVentaModel($datosController, $tabla);
		return $respuesta;
	}



}

?>