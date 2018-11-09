<?php 
session_start();
require_once("controlador/controlador.php");
require_once("modelo/conexion.php");
require_once("modelo/gestor.php");
require_once("modelo/usuario.php");
require_once("modelo/cliente.php");

$controlador = new Controlador();

//Verifica si se ha definido antes la variable SESSION - Si hay una sesion iniciada
if (isset($_SESSION["usuario"]) && isset($_SESSION["id"])) {
	if (isset($_GET["accion"])) { //Si hay parametro 'accion'
		switch ($_GET["accion"]) {//segun lo enviado por el parametro accion
			case 'logout':
				$controlador->Logout();
				break;

			case 'editar':
				$controlador->editar();
				break;

			case 'actualizar':
				$controlador->actualizar($_POST["usuario"], $_POST["nombre"], $_POST["password"], $_POST["telefono"], $_POST["correo"], $_POST["genero"]);
				break;

			case 'eliminar':
				$controlador->eliminar();
				break;
			
			//Presenta VISTA para cargar desde excel y ver los clientes
			case 'importar':
				$controlador->importar();
				break;

			/*
				Obtiene el archivo excel enviado por el metodo POST
				Se envia al metodo del controlador para manejarlo alli
			*/
			case 'cargarclientes':
				$controlador->cargarClientes($_FILES['excel']['name'],$_FILES['excel']['type'],$_FILES['excel']['tmp_name']);
				break;

			default:
				$controlador->verPagina("vista/html/admin.php");
				break;
		}
	}
	else{ //Si ha iniciado sesion y el parametro accion no se encuentra entre las opciones anteriores
			//lo envia a la interfaz 'admin'
		$controlador->verPagina("vista/html/admin.php");
	}
}
else{ //Si no se ha iniciado sesion
	if (isset($_GET["accion"])) {//Si se ha enviado algo por metodo GET
		switch ($_GET["accion"]) {
			case 'login':
				$controlador->login($_POST["user"],$_POST["pass"]);
				break;

			case 'registro':
				$controlador->verPagina("vista/html/registro.php");
				break;

			case 'registrar':
				$controlador->registrar($_POST["usuario"], $_POST["nombre"], $_POST["password"], $_POST["telefono"], $_POST["correo"], $_POST["genero"]);
				break;

			default:
				$controlador->verPagina("vista/html/login.php");
				break;
		}
	}//Si no se ha enviado nada como parametro le muestra la interfaz de login
	else{
		$controlador->verPagina("vista/html/login.php");
	}
}

 ?>
 