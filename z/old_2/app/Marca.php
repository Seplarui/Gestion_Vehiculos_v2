<?php
class Marca {
	public function __construct($id, $marca) {
		$this->id = $id;
		$this->marca = $marca;
	}
	public function getId() {
		return $this->id;
	}
	public function getMarca() {
		return $this->marca;
	}
}