<?php

require_once 'ControllerJson.php';

// variables globales
$response = array();    //una matriz para mostrar las respuestas de nuestro api

/** Para trabajar con Multipart Form */
//$_POST
// para trabajar con json
$inputs = json_decode(file_get_contents('php://input'), true);


//función validando todos los parametros disponibles
//pasaremos los parámetros requeridos a esta función

function isTheseParametersAvailable($params){
	//suponiendo que todos los parametros estan disponibles
	$available = true;
	$missingparams = "";
	$inputs = json_decode(file_get_contents('php://input'), true);

	foreach ($params as $param) {
		
		if(!isset($inputs[$param]) || strlen($inputs[$param]) <= 0){
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
			$result = $db->createCategoriaController($inputs['categoria']);

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
				$inputs['id_categoria'],
				$inputs['id_unidad'],
				$inputs['idAlmacen'],
				$inputs['codigo'],
				$inputs['nombre'],
				$inputs['descripcion'],
				$inputs['stock'],
				$inputs['precio_venta']);

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
				$inputs['ruc_proveedor'],
				$inputs['razon_social'],
				$inputs['direccion_fiscal'],
				$inputs['estado_empresa'],
				$inputs['condicion_empresa']);

			if($result){
				$response['error'] = false;
				$response['message'] = 'Proveedor Creado correctamente';
				$response['contenido'] = $db->verProveedorController();
			}else{
				$response['error'] = true;
				$response['message'] = 'Error al crear proveedor';
			}
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
				$inputs['documento'],
				$inputs['ruc'],
				$inputs['razon_social'],
				$inputs['direccion']);

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
		case 'verVentas':
		$db = new ControllerJson();
		$response['error'] = false;
		$response['message'] = 'Solicitud completada correctamente';
		$response['contenido'] = $db->verVentasController();
		break;

		case 'grabarVenta':
			isTheseParametersAvailable(array('id_comprobante'));
			$db = new ControllerJson();
			$result = $db->crearVentaController(
				$inputs['id_comprobante'],
				$inputs['serie'],
				$inputs['codigo'],
				$inputs['id_cliente'],
			    $inputs['id_producto'],   
			    $inputs['precio_venta'],      
			    $inputs['cantidad'],  
			    $inputs['subtotal'],
			    $inputs['igv'],
		        $inputs['total']);

			if($result){
				$response['error'] = false;
				$response['message'] = 'Venta Registrada con Exito..';
				$response['contenido'] = $db->verVentasController();
			}else{
				$response['error'] = true;
				$response['message'] = 'Error al grabar venta';
			}
			break;
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