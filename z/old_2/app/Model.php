<?php
include_once "../../app/Marca.php";
class Model {
	public function __construct($dbname, $dbusuario, $dbclave, $dbhost) {
		$this->conexion = NULL;
		try {
			$bdconexion = new PDO ( 'mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8', $dbusuario, $dbclave );
			$this->conexion = $bdconexion;
		} catch ( PDOException $ex ) {
			echo $ex->getMessage ();
		}
	}
	public function dameMarca() {
		$sql = "select * from marcas";
		$resultado = $this->conexion->query ( $sql );
		$marca = array ();
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
	public function buscarMarcasPorMarca($marca) {
		
		
		$marca=htmlspecialchars($marca);
		
		$sql="select * from marcas where marca like '".$marca;
		$resultado=$this->conexion->query($sql);
		$marcas=array();
		$cont=0;
		
		$filas=$resultado->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($filas as $fila) {
			$marca= new Marca($fila->id,$fila->marca);
			$marcas[$cont]=$marca;
			$cont++;
		}
		$conexion=false;
		return $marcas;
	}
	public function dameMarca($id) {
		$sql="select * from marcas where id=:id";
		
		$resultado=$this->conexion->prepare($sql);
		$resultado->execute(array(":id"=>$id));
		
		$marcas=array();
		$cont=0;
		
		$fila=$resultado->fetch(PDO::FETCH_OBJ);
		$marca=new Marca($fila->id, $fila->marca);
		$conexion=false;
		return $marca;
	}
	
	public function insertarMarca($id,$marca) {
		try {
			$sql="insert into marcas (id,marca) values($id.','.$marca)";
			$resultado=$this->conexion->prepare($sql);
			if(!result) {
				$this->conexion->errorInfo();
			}
			
			$count=$resultado->execute(array(
					":id"=>$id,
					":marca"=>$marca,
			));
		} catch (PDOException $ex) {
			echo "Error: ".$ex->getMessage();
			return false;
		}
		$conexion=false;
		if($count==1) {
			return true;
		}else {
			return false;
		}
	}
	
	public function validarDatos($id,$marca) {
		$valido=is_string($id) & is_string($marca);
		return $valido;
	}
}

?>