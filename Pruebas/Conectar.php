<?php

include_once '../z/old_2/Config.php';
include_once '../z/old_2/Model.php';
include_once '../z/old_2/Marca.php';

//$conexion = new PDO('mysql:host='.Config::$bdhostname.';dbname='.Config::$bdnamebd.';charset=utf8',Config::$bduser,Config::$bspass);

//echo "Conexión correcta<br/>";

/*$consulta = "select * from marcas";

$resultado = $conexion->query ( $consulta );*/

/*foreach ($resultado as $fila) {
	echo $fila['id']." ";
	echo $fila['marca']."<br/>";
}*/


//LISTAR DESDE MODEL.PHP

$modelo=new Model(Config::$bdhostname,Config::$bduser,Config::$bdpass,Config::$bdnamebd );

echo "<br/>";
print_r(Config::$bdhostname);
echo "<br/>";
print_r(Config::$bdnamebd);
echo "<br/>";
print_r(Config::$bduser);
echo "<br/>";
print_r(Config::$bdpass);

$kk=$modelo->dameMarcas();

//print_r($kk);

/*foreach($kk as $fila) {
	//echo $fila['id']." ";
	//echo $fila['marca']."<br/>";
	echo "<br/>";
	echo $fila['id:Marca:private'];
	echo "<br/>";
	
}*/
$marca = new Marca ( $fila->id, $fila->marca );


/*$parametros=array($modelo->dameMarcas());
foreach ($parametros as $fila) {
	//print_r($fila);
	print_r( $fila[3]);
}

print_r($parametros);
*/
?>