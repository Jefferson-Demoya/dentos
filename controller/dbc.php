<?php  
//configuracion de la conexion
$servidor = 'localhost';
$BD = 'bd_dentos';
$usuario = 'root';
$password = '';

//establezco la conexion con PDO 
$DB = new PDO("mysql:host=$servidor; dbname=$BD", $usuario, $password);
	
//aplico el cotejamiento	
$DB->exec("SET CHARACTER SET utf8");
?>