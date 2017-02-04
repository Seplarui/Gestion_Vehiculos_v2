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
			$marcas[$cont]=$marca;
			$cont++;
		}
		$conexion=false;
		return $marcas;
	}
	
	public function buscarMarcaporId($id) {
		$consulta="select * from marca where id=:id;";
		$resultado=$this->conexion->prepare($consulta);
		$resultado->execute(array(":id"=>id));
		$marcas=array();
		$cont=0;
		
		$fila=$resultado->fetchAll(PDO::FETCH_OBJ);
		$marca= new Marca($fila->id,$fila->marca,$fila->modelo,$fila->motor);
		$conexion=false;
		return $marca;
		
	}
	
	public function insertarMarca($marca,$modelo,$motor) {
		try {
			$consulta="insert into marca(marca,modelo,motor) values ($marca,$modelo,$motor)";
			
			$resultado=$this->conexion->prepare($consulta);
			
			if(!$resultado) {
				echo "Error al insertar.";
			}
			
			$cont=$resultado->execute(array(":marca"=>$marca,
					":modelo"=>$modelo,
					":motor"=>$motor,
					
			));
		} catch (PDOException $ex) {
			echo "Error: ".$ex->getMessage();
			return false;
		}
		$conexion=false;
		if($cont==1) {
			return true;
		} else {
			return false;
		}
	}
		
		public function validarDatos($marca,$modelo,$motor) {
			$valido= is_string($marca) & is_string($modelo) & is_string($motor);
		}
	}
	
	?>
	
	
	
	
}

