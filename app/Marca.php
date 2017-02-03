<?php
class Marca {
	private $marca;
	private $modelo;
	private $motor;
	public function __construct($marca, $modelo, $motor) {
		$this->marca = $marca;
		$this->modelo = $modelo;
		$this->motor = $motor;
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