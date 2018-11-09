<?php 
class Gestor{
	public function Login($user, $pass){
		$conexion = new Conexion();
		$sql = "SELECT usuario, password, nombre, id FROM usuario WHERE usuario = '$user' AND password = '$pass'";
		$conexion->buscar_query($sql);
		$existe = $conexion->obtener_filas();
		if($existe>0){
			$result = $conexion->obtener_resultado();
			$filas = $result->fetch();
			$datos = [$filas["usuario"], $filas["id"]];
			return $datos;
		}
		else{
			$sql2 = "SELECT usuario, password FROM usuario WHERE usuario = '$user'";
			$conexion->buscar_query($sql2);
			$existe2 = $conexion->obtener_filas();

			if($existe2>0){
				return 1;
			}
			else{
				return 2;
			}
		}
	}

	public function registrar($usu){
		$conexion = new Conexion();

		$user = $usu;

		$usuario = $user->obtenerUsuario();
		$password = $user->obtenerPassword();
		$nombre = $user->obtenerNombre();
		$telefono = $user->obtenerTelefono();
		$correo = $user->obtenerCorreo();
		$genero = $user->obtenerGenero();
		
		$sql1 = "SELECT usuario FROM usuario WHERE usuario = '$usuario'";
		$conexion->buscar_query($sql1);
		$result1 = $conexion->obtener_filas();

		if ($result1>0) {
			return 2;
		}
		else{
			$sql2 = "INSERT INTO usuario (usuario, password, nombre, telefono, correo, genero) VALUES ('$usuario','$password','$nombre','$telefono','$correo','$genero')";
			$result2 = $conexion->ejecutar_query($sql2);

			if ($result2>0) {
				return 1;
			}
			else{
				return 3;
			}
		}
	}

	public function frmEditar(){
		$conexion = new Conexion();
		$sql = "SELECT * FROM usuario WHERE id = '".$_SESSION['id']."'";
		$conexion->buscar_query($sql);
		$result = $conexion->obtener_resultado();
		return $result;
	}

	public function actualizar($usu){
		$conexion = new Conexion();

		$id = $_SESSION["id"];
		$user = $usu;

		$usuario = $user->obtenerUsuario();
		$password = $user->obtenerPassword();
		$nombre = $user->obtenerNombre();
		$telefono = $user->obtenerTelefono();
		$correo = $user->obtenerCorreo();
		$genero = $user->obtenerGenero();

		$sql = "UPDATE usuario SET password = '$password',nombre = '$nombre',telefono = '$telefono',correo = '$correo',genero = '$genero' WHERE id = '$id' AND usuario = '$usuario' ";
		$result = $conexion->ejecutar_query($sql);

		return $result;
	}

	public function eliminar(){
		$conexion = new Conexion();
		$usuario = $_SESSION["usuario"];
		$id = $_SESSION["id"];
		$sql = "DELETE FROM usuario WHERE id = '$id' AND usuario = '$usuario'";
		$conexion->ejecutar_query($sql);
	}

	public function consultarClientes(){
		$conexion = new Conexion();
		$sql = "SELECT * FROM cliente";
		$conexion->buscar_query($sql);
		$response =$conexion->obtener_resultado();
		return $response;
	}

	//Obtiene un objeto Cliente como parametro e inserta a la BD los datos en este.
	public function agregarCliente($vCliente){
		$conexion = new Conexion();//Objeto para realizar sentencias SQL en la BD
		$objCliente = $vCliente;//Toma los valores del parametro 
		//Se obtiene los valores del objeto
		$nomCli = $objCliente->obtenerNombre();
		$celCli = $objCliente->obtenerCelular();
		$corCli = $objCliente->obtenerCorreo();
		//Se prepara la sentencia SQL
		$sql = "INSERT INTO cliente(nombre,celular,correo) values('$nomCli','$celCli','$corCli');";
		//Se ejecuta la sentencia SQL y se retorna el resultado
		return $resultado = $conexion->ejecutar_query($sql);
	}
}

 ?>