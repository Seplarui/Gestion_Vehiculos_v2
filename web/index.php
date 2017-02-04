<?php
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';

//ENRUTAMIENTO

$map=array(
		'inicio'=>array('controller'=>'Controller','action'=>'inicio'),
		'listar'=>array('controller'=>'Controller','action'=>'listar'),
		'insertar'=>array('controller'=>'Controller','action'=>'insertar'),
		'buscar'=>array('controller'=>'Controller','action'=>'buscarPorMarca'),
		'ver'=>array('controller'=>'Controller','action'=>'ver'),
);

//PARSEO DE LA RUTA

if(isset($_GET['ctl'])) {
	if(isset($map[$_GET['ctl']])) {
		$ruta=$_GET['ctl'];
	} else {
		header ('Status: 404 Not Found');
		echo '<html><body><h1>Error 404: No existe la ruta'. $_GET['ctl']."</body></html>";
		exit;
		
	}
	
} else  {
	$ruta='inicio';
}

$controlador=$map[$ruta];

if(method_exists($controlador['controller'], $controlador['action'])) {
	call_user_func(array(new $controlador['controller'],$controlador['action']));
} else {
	header ('Status: 404 Not Found');
	
	echo '<html><body><h1>Error 404: El controlador '. $controlador['controller'].'->'.$controlador['action'].'no existe</h1></body></html>';
}
