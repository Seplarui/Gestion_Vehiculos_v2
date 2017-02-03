<?php
include_once 'Marca.php';
class Model {
	protected $conexion;
	public function __construct($dbname, $dbuser, $dbpass, $dbhost) {
		$this->conexion = NULL;
		try {
			$bdconexion = new PDO ( "mysql:host=" . $dbhost . ";dbname=" . $dbname . ";charset=utf8", $dbuser, $dbpass );
			
			$this->conexion = $bdconexion;
		} catch ( PDOException $ex ) {
			echo "Error: " . $ex->getMessage ();
		}
	}
	
	// LISTADO MARCAS
	public function dameMarcas() {
		$consulta = "select * from marca";
		$resultado = $this->conexion > query ( $consulta );
		$marcas = array ();
		$cont = 0;
		
		$filas = $resultado->fetchAll ( PDO::FETCH_OBJ );
		
		foreach ($filas as $fila) {
			$marca= new Marca($fila->id, $fila->marca,$fila->modelo,$fila->motor);
			$marcas[$cont]=$marca;
			$cont++;
		}
		
		$conexion=NULL;
		return $marcas;
	}
	
	// BUSCAR MARCAS POR NOMBRE
	
	public function buscarMarcaPorMarca($marca) {
		$marca=htmlspecialchars($marca);
		$consulta= "select * from marca where marca like".$marca;
		$resultado=$this->conexion->query($consulta);
		$marcas=array();
		$cont=0;
		$filas=$resultado->fetchAll(PDO::FETCH_OBJ);
		foreach($filas as $fila) {
			$marca= new Marca($fila->id,$fila->marca,$fila->modelo,$fila->motor);
			$marcas...[POR AQUÍ]
		}
	}
	
	
}

