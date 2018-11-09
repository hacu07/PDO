<?php
/**
 * Clase que representa en php a la tabla CLIENTE de la BD.
 */
class Cliente
{
	/*Campos de la tabla CLIENTE*/
	private $id;
	private $nombre;
	private $celular;
	private $correo;

	public function __construct()
	{
		
	}

	/*
	function __construct($vId,$vNombre,$vCelular,$vCorreo)
	{
		//Se inicializan las variables globales de la clase con las obtenidas de los parametros del constructor
		$this->id = $vId;;
		$this->nombre = $vNombre;
		$this->celular = $vCelular;
		$this->correo = $vCorreo;
	}
	*/

	//Metodos para asignar los valores a las variables globales
	public function asignarId($vId){
		$this->id = $vId;
	}

	public function asignarNombre($vNombre){
		$this->nombre = $vNombre;
	}

	public function asignarCelular($vCelular){
		$this->celular = $vCelular;
	}

	public function asignarCorreo($vCorreo){
		$this->correo = $vCorreo;
	}

	/*Metodos para obtener los valores de cada variable*/
	public function obtenerId(){
		return $this->id;
	}

	public function obtenerNombre(){
		return $this->nombre;
	}

	public function obtenerCelular(){
		return $this->celular;
	}

	public function obtenerCorreo(){
		return $this->correo;
	}
}

?>