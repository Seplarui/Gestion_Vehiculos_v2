<?php
class Controller {
	public function listar() {
		$modelo = new Model ( Config::$bdhostname, Config::$bduser, Config::$bdpass, Config::$bdnamebd );
		
		$parametros = array (
				'marcas' => $modelo->dameMarcas () 
		);
	}
}