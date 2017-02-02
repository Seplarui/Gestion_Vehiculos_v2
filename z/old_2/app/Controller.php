<?php
class Controller {
	public function listar() {
		$modelo = new Model ( Config::$bdnombre, Config::$bdusuario, Config::$bdclave, Config::$bdhostname );
		
		$parametros = array (
				'mensaje' => 'Gestión de Vehículos',
				'fecha' => date ( 'd-m-y' ) 
		);
	}
	public function listar() {
		$modelo = new Model ( Config::$bdnombre, Config::$bduser, Config::$bdclave, Config::$bdhostname );
		
		$parametros = array (
				'marcas' => $model->dameMarca () 
		);
		
		require __DIR__ . '/templates/mostrarMarcas.php';
	}
	public function insertar() {
		$parametros = array (
				'marca' => '' 
		);
		
		$modelo = new Model ( Config::$bdnombre, Config::$bduser, Config::$bdclave, Config::$bdhostname );
		
		if (isset ( $_POST ['insertar'] )) {
			
			if($modelo->validarDatos($_POST['id'], $_POST['marca'])) {
				if($modelo->insertarMarca($_POST['id'], $_POST['marca'])) {
					header('Location: index.php?ctl=listar');
				} else {
					$parametros=array(
							'marca'=>$_POST['marca'],
					);
					$parametros['mensaje']="No se ha podido insertar la marca";
				}
			} else {
				$parametros=array(
						'marca'=>$_POST['marca'],
				);
				$parametros['mensaje']="Hay datos que no son correctos";
				
			}
			
		}
			require __DIR__.'/templates/formInsertar.php';
		
	
	}
	
	public function buscarPorNombre() {
		
	}
	
	public function ver() {
		
	}
}