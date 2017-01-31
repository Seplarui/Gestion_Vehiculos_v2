<?php

include_once '../app/Config.php';

$conexion = new PDO('mysql:host='.Config::$bdhostname.';dbname='.Config::$bdnamebd.';charset=utf8',Config::$bduser,Config::$bspass);

echo "Conexión correcta<br/>";

$consulta = "select * from marcas";

$resultado = $conexion->query ( $consulta );

foreach ($resultado as $fila) {
	echo $fila['id']." ";
	echo $fila['marca']."<br/>";
}



?>