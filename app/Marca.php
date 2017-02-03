<?php
class Marca {
	private $marca;
	private $modelo;
	private $motor;
	public function __construct($id, $marca, $modelo, $motor) {
		$this->id = $id;
		$this->marca = $marca;
		$this->modelo = $modelo;
		$this->motor = $motor;
	}
	function getId() {
		return $this->id;
	}
	function getMarca() {
		return $this->marca;
	}
	function getModelo() {
		return $this->modelo;
	}
	function getMotor() {
		return $this->motor;
	}
}