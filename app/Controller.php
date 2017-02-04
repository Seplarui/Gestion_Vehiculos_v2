<?php
class Controller {
	public function inicio() {
		$parametros = array (
				'mensaje' => 'Bienvenido a Gestión de Vehículos',
				'fecha' => date ( 'd-m-yyy' ) 
		);
		require __DIR__ . '/templates/inicio.php';
	}
	public function listar() {
		$m = new Model ( Config::$bd_name, Config::$bd_user, Config::$bd_pass, Config::$bd_hostname );
		
		$parametros = array (
				'marcas' => $m->dameMarca () 
		);
		
		require __DIR__ . '/templates/mostrarMarcas.php';
	}
	public function insertar() {
		$parametros = array (
				'marca' => '',
				'modelo' => '',
				'motor' => '' 
		);
		
		$m = new Model ( Config::$bd_name, Config::$bd_user, Config::$bd_pass, Config::$bd_hostname );
		
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			if ($m->validarDatos ( $marca, $modelo, $motor )) {
				$m->insertarMarca ( $_POST ['marca'], $_POST ['modelo'], $_POST ['motor'] );
				header ( 'Location:index.php?ctl=listar' );
			} else {
				
				$parametros = array (
						'marca' => $_POST ['marca'],
						'modelo' => $_POST ['modelo'],
						'motor' => $_POST ['motor'] 
				);
				$parametros ['mensaje'] = 'No se ha podido insertar marca del vehículo.';
			}
		}
		require __DIR__ . '/templates/formInsertar.php';
	}
	public function buscarPorMarca() {
		$parametros = array (
				'marca' => '',
				'resultado' => '' 
		);
		
		$m = new Model ( Config::$bd_name, Config::$bd_user, Config::$bd_pass, Config::$bd_hostname );
		
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			$parametros ['marca'] = $_POST ['marca'];
			$parametros ['resultado'] = $m->buscarMarcaPorMarca ( $_POST ['marca'] );
		}
		require __DIR__ . '/templates/buscarPorMarca.php';
	}
	public function ver() {
		if (! isset ( $_GET ['id'] )) {
			throw new Exception ( 'Página no encontrada' );
		}
		
		$id = $_GET ['id'];
		$m = new Model ( Config::$bd_name, Config::$bd_user, Config::$bd_pass, Config::$bd_hostname );
		
		$marca = $m->dameMarca ();
		$parametros = $marca;
		require __DIR__ . '/templates/verMarca.php';
	}
}

?>