<?php

/**
 * 
 */
class Conexion
{
	
	public static function conectar(){

		$localhost = "localhost";
		$database = "api_maestria";
		$user = "root";
		$password = "";

		$link = new PDO("mysql:host=$localhost;dbname=$database",$user,$password);

		return $link;
	}
}

?>