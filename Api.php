<?php

require_once 'ControllerJson.php';

//función validando todos los parametros disponibles
//pasaremos los parámetros requeridos a esta función

function isTheseParametersAvailable($params){
	//suponiendo que todos los parametros estan disponibles
	$available = true;
	$missingparams = "";

	foreach ($params as $param) {
		if(!isset($_POST[$param]) || strlen($_POST[$param]) <= 0){
			$available = false;
			$missingparams = $missingparams . ", " . $param;
		}
	}

	if(!$available){ //si faltan parametros
		$response = array();
		$response['error'] = true;
		$response['message'] = 'Parametro(s)' . substr($missingparams, 1, strlen($missingparams)) . ' vacio(s)';

		echo json_encode($response); //error de visualización
		die(); //detener la ejecución adicional
	}
}

$response = array(); //una matriz para mostrar las respuestas de nuestro api

//si se trata de una llamada api
if(isset($_GET['apicall'])){

	//Aqui iran todos los llamados de nuestra api
	switch ($_GET['apicall']) {

         // USUARIOS
		case 'readusuarios':
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud Exitosa...';
		$response['contenido'] = $db->readUsuariosController();
		break;

        //CATEGORIAS
		case 'createcategoria':
		//primero haremos la verificación de parametros.
		isTheseParametersAvailable(array('categoria'));
		$db = new ControllerJson();
		$result = $db->createCategoriaController($_POST['categoria']);

		if($result){
			$response['error'] = false;
			$response['message'] = 'Categoria agregada correctamente';
			$response['contenido'] = $db->verCategoriasController();
		}else{
			$response['error'] = true;
			$response['message'] = 'Error al crear categria';
		}
		break;

		case 'verCategorias': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Listado de Categorias...';
		$response['contenido'] = $db->verCategoriasController();
		break;

		//PRODUCTOS
        case 'grabaProducto':
        isTheseParametersAvailable(array('id_categoria'));
        $db = new ControllerJson();
		$result = $db->crearProductoController(
			$_POST['id_categoria'],
			$_POST['id_unidad'],
			$_POST['idAlmacen'],
			$_POST['codigo'],
			$_POST['nombre'],
			$_POST['descripcion'],
			$_POST['stock'],
			$_POST['precio_venta']);

		if($result){
			$response['error'] = false;
			$response['message'] = 'Producto creado correctamente';
			$response['contenido'] = $db->readProductosController();
		}else{
			$response['error'] = true;
			$response['message'] = 'Error al crear categria';
		}
        break;

		case 'verproductos':
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Listado de Productos';
		$response['contenido'] = $db->readProductosController();
		break;

		// UNIDAD MEDIDA
		case 'umedida': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Listado Unidades de Medida';
		$response['contenido'] = $db->verMedidaController();
		break;

		// TIP DE GAS
		case 'tipoGas': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Listado Tipos de Gases';
		$response['contenido'] = $db->verTipoGasController();
		break;

		// PROVEEDOR
		case 'grabaProveedor':
		isTheseParametersAvailable(array('ruc_proveedor'));
        $db = new ControllerJson();
		$result = $db->crearProveedorController(
			$_POST['ruc_proveedor'],
			$_POST['razon_social'],
			$_POST['direccion_fiscal'],
			$_POST['estado_empresa'],
			$_POST['condicion_empresa']);

		if($result){
			$response['error'] = false;
			$response['message'] = 'Proveedor Creado correctamente';
			$response['contenido'] = $db->verProveedorController();
		}else{
			$response['error'] = true;
			$response['message'] = 'Error al crear proveedor';
		}
        break;
		break;

		case 'verProveedor': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Listado de Proveedores';
		$response['contenido'] = $db->verProveedorController();
		break;

		// TIPO OPERACION [entrada,salida]
		case 'tOpera': // 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Listado Tipos de Operacin';
		$response['contenido'] = $db->verOperacionController();
		break;

		// TIPO DE COMPROBANTE
		case 'tipoComprobante': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verTipoComprobanteController();
		break;

		// CLIENTES
		case 'grabaCliente':
        isTheseParametersAvailable(array('documento'));
        $db = new ControllerJson();
		$result = $db->crearClienteController(
			$_POST['documento'],
			$_POST['ruc'],
			$_POST['razon_social'],
			$_POST['direccion']);

		if($result){
			$response['error'] = false;
			$response['message'] = 'Cliente Registrado con Exito..';
			$response['contenido'] = $db->verClientesController();
		}else{
			$response['error'] = true;
			$response['message'] = 'Error al grabar cliente';
		}
        break;


		case 'verClientes': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verClientesController();
		break;

		// ALMACEN
		case 'verAlmacen': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verAlmacenController();
		break;


       // VENTAS
		case 'grabaVenta':
		break;

		case 'verVenta':
		break;






	}

}else{
	//si no es un api el que se esta invocando
	//empujar los valores apropiados en la estructura json
	$response['error'] = true;
	$response['message'] = 'Error: No existe llamado a la API...';
}

echo json_encode($response);

?>