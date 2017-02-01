<?php
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';

// ENRUTAMIENTO

$map = array (
		'inicio' => array (
				'controller' => 'Controller',
				'action' => 'inicio' 
		),
		'listar' => array (
				'controller' => 'Controller',
				'action' => 'listar' 
		),
		'insertar' => array (
				'controller' => 'Controller',
				'action' => 'insertar' 
		),
		'buscarPorNombre' => array (
				'controller' => 'Controller',
				'action' => 'bucarPorNombre' 
		),
		'ver' => array (
				'controller' => 'Controller',
				'action' => 'ver' 
		) 
);

// PARSEO DE LA RUTA
if (isset ( $_GET ['ctl'] )) {
	
	if (isset ( $map [$_GET ['ctl']] )) {
		$ruta = $_GET ['ctl'];
	} else {
		// SI LA OPCIÓN SELECCIONADA NO EXISTE EN EL ARRAY DE MAPEO, MOSTRAMOS PANTALLA DE ERROR
		
		header('Status: 404 Not Found');
		echo '<html><body><h1>Error 404: No existe la ruta<i>'.$_GET['ctl'].'</i></body></html>';
		exit;
	}
} else {
	$ruta='inicio';
}

$controlador=$map[$ruta];

if(method_exists($controlador['controller'], $controlador['action'])) {
	call_user_func(array(new $controllador['controller'],$controlador['action']));
} else {
	header('Status: 404 Not Found');
	echo '<html><body><h1>Error 404: El controlador <i>'.$controlador['controller'].'->'.$controlador['action'].'</i> no existe</h1></body></html>';
}
