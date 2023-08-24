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

//una matriz para mostrar las respuestas de nuestro api
$response = array();

//si se trata de una llamada api
//que significa que un parametro get llamado se establece un la URL
//y con estos parametros estamos concluyendo que es una llamada api

if(isset($_GET['apicall'])){

	//Aqui iran todos los llamados de nuestra api
	switch ($_GET['apicall']) {
		case 'readusuarios':
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud Exitosa...';
		$response['contenido'] = $db->readUsuariosController();
		break;

        //CATEGORIAS
		case 'createcategoria':
		//primero haremos la verificación de parametros.
		isTheseParametersAvailable(array('titulo'));

		$db = new ControllerJson();
		$result = $db->createCategoriaController($_POST['titulo']);

		if($result){
			//esto significa que no hay ningun error
			$response['error'] = false;
			//mensaje que se ejecuto correctamente
			$response['message'] = 'Categoria agregada correctamente';
			$response['contenido'] = $db->readCategoriasController();
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

		case 'updatecategoria':
			//primero haremos la verificación de parametros.
		isTheseParametersAvailable(array('id','titulo'));

		$db = new ControllerJson();
		$result = $db->updateCategoriaController(
			$_POST['id'],
			$_POST['titulo']);

		if($result){
			//esto significa que no hay ningun error
			$response['error'] = false;
			//mensaje que se ejecuto correctamente
			$response['message'] = 'Edicion de Categoria exitosa...';
			$response['contenido'] = $db->readCategoriasController();
		}else{
			$response['error'] = true;
			$response['message'] = 'Ocurrio un error, intenta nuevamente';
		}
		break;

        //PRODUCTOS
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

		// TIPO DE COOMPROBANTE
		case 'tipoComprobante': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verTipoComprobanteController();
		break;

		// CLIENTES
		case 'verClientes': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verClientesController();
		break;

		// CILINDROS
		case 'verCilindros': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verCilindrosController();
		break;

		// ALMACEN
		case 'verAlmacen': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verAlmacenController();
		break;

		// KARDEX
		case 'verKardex': 
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verKardexController();
		break;

       // VENTAS




	}

}else{
	//si no es un api el que se esta invocando
	//empujar los valores apropiados en la estructura json
	$response['error'] = true;
	$response['message'] = 'Error: No existe llamado a la API...';
}

echo json_encode($response);

?>