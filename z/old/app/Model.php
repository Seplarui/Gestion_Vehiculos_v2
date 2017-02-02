<?php
include_once '../../old/app/Marca.php';
class Model {
	public $conexion;
	public function __construct( $dbhost, $dbuser, $dbpass,$dbname) {
		$this->conexion = NULL;
		
		try {
			$bdconexion = new PDO('mysql:dbname=' . $dbname . ';dbhost='
					. $dbhost . ';charset=utf8', $dbuser, $dbpass);
			
			$this->conexion = $bdconexion;
		} catch ( PDOException $ex ) {
			
			echo 'Error: ' . $ex->getMessage ();
		}
	}
	public function dameMarcas() {
		$consulta = "select * from marcas";
		
		$resultado=$this->conexion->query($consulta);
		
		$marcas = array ();
		$cont = 0;
		
		$filas = $resultado->fetchAll ( PDO::FETCH_OBJ );
		
		foreach ( $filas as $fila ) {
			$marca = new Marca ( $fila->id, $fila->marca );
			$marcas [$cont] = $marca;
			$cont ++;
		}
		
		$conexion = false;
		return $marcas;
	}
}
