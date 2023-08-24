<?php

require_once "ModeloJson.php";

/**
 * 
 */
class ControllerJson
{
	
	#usuarios
	public function createUsuarioController($usuario, $password, $role, $mail){ // Nuevo Usuario

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

	public function readUsuariosController(){ // Mostrar Usuarios
        $tabla = "usuarios";
		$respuesta = Datos::readUsuariosModel($tabla);
		return $respuesta;
	}

	public function loginUsuarioController($usuario, $password){ // Login
        
        $tabla = "usuarios";
		$datosController = array(
			"usuario" => $usuario,
			"password"=>$password);

		$respuesta = Datos::loginUsuarioModel($datosController, $tabla);
		return $respuesta;
	}

	#categoria
	public function createCategoriaController($titulo){
		$respuesta = Datos::createCategoriaModel($titulo, "categorias");
		return $respuesta;
	}

	public function verCategoriasController(){
		$tabla = "categorias";
		$respuesta = Datos::verCategoriasModel($tabla);
		return $respuesta;
	}

	public function updateCategoriaController($id, $titulo){

		$datosController = array(
			"id"=>$id,
			"titulo"=>$titulo);

		$respuesta = Datos::updateCategoriaModel($datosController, "categorias");
		return $respuesta;
	}



	#productos
	public function readProductosController(){
		$tabla = "productos";
		$respuesta = Datos::readProductosModel($tabla);
		return $respuesta;
	}

	#tipo gas
	public function verTipoGasController(){ 
        $tabla = "tipo_gases";
		$respuesta = Datos::verTipoGasModel($tabla);
		return $respuesta;
	}

	#unidad de medida
	public function verMedidaController(){ 
        $tabla = "unidad";
		$respuesta = Datos::verMedidaModel($tabla);
		return $respuesta;
	}

	#tipo de operacioon
	public function verOperacionController(){ 
        $tabla = "operaciones";
		$respuesta = Datos::verOperacionModel($tabla);
		return $respuesta;
	}

    #tipo de comprobante
	public function verTipoComprobanteController(){ 
        $tabla = "comprobante";
		$respuesta = Datos::verComprobanteModel($tabla);
		return $respuesta;
	}
   
   #CLIENTES
	public function verClientesController(){ 
        $tabla = "clientes";
		$respuesta = Datos::verClientesModel($tabla);
		return $respuesta;
	}

   # PROVEEDOR
	public function verProveedorController(){ 
        $tabla = "proveedor";
		$respuesta = Datos::verProveedorModel($tabla);
		return $respuesta;
	}

   # CILINDROS
   public function verCilindrosController(){ 
        $tabla = "cilidros";
		$respuesta = Datos::verCilindroModel($tabla);
		return $respuesta;
	}  

	# ALMACEN
	public function verAlmacenController(){ 
        $tabla = "almacen";
		$respuesta = Datos::verAlmacenModel($tabla);
		return $respuesta;
	}



}

?>