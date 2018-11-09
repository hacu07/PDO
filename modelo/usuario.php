<?php 
class Usuario{
	private $usuario;
	private $nombre;
	private $password;
	private $telefono;
	private $correo;
	private $genero;
	public function __construct($usu,$nom,$pass,$tel,$corr,$gen){
		$this->usuario = $usu;
		$this->nombre = $nom;
		$this->password = $pass;
		$this->telefono = $tel;
		$this->correo = $corr;
		$this->genero = $gen;
	}
	public function obtenerUsuario(){
		return $this->usuario;
	}
	public function obtenerPassword(){
		return $this->password;
	}

	public function obtenerNombre(){
		return $this->nombre;
	}

	public function obtenerTelefono(){
		return $this->telefono;
	}

	public function obtenerCorreo(){
		return $this->correo;
	}

	public function obtenerGenero(){
		return $this->genero;
	}
}

 ?>