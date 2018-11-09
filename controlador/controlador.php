<?php 
class Controlador{

	public function verPagina($url){
		require_once($url);
	}

	public function Login($user, $pass){
		$gestor = new Gestor();
		$result = $gestor->Login($user, $pass);
		if ($result!=1 && $result!=2) {
			//Una vez validado el usuario se agregan valores al array $_session para saber a quien le pertenece
			//SESSION es una variable super global puede ser obtenida desde cualquier lado del script
			$_SESSION["usuario"] = $result[0];
			$_SESSION["id"] = $result[1];
			require_once("vista/html/admin.php");
		}
		if ($result==1) {
			header("Location:index.php?error=1");
		}
		if ($result==2) {
			header("Location:index.php?error=2");
		}
	}

	public function Logout(){
		if (isset($_SESSION["usuario"])) {
			unset($_SESSION["usuario"]);
		}
		session_destroy();
		header("Location:index.php");
	}

	public function registrar($usu,$nom,$pass,$tel,$corr,$gen){
		$usuario = new Usuario($usu,$nom,$pass,$tel,$corr,$gen);
		$gestor = new Gestor();
		$result = $gestor->registrar($usuario);

		if ($result==1) {
			/***   Registro satisfactorio    ***/
			header("Location:index.php?succes");
		}
		elseif ($result==2) {
			/***   Usuario Repetido    ***/
			header("Location:index.php?accion=registro&error=1");
		}
		elseif ($result==3) {
			/***   Error en registro    ***/
			header("Location:index.php?accion=registro&error=2");
		}
	}

	public function editar(){
		$gestor = new Gestor();
		$result = $gestor->frmEditar();
		require_once("vista/html/editar.php");
	}

	public function actualizar($usu,$nom,$pass,$tel,$corr,$gen){
		$usuario = new Usuario($usu,$nom,$pass,$tel,$corr,$gen);
		$gestor = new Gestor();
		$result = $gestor->actualizar($usuario);
		if ($result > 0) {
			header("Location:index.php?actualizar=succes");	
		}
		else{
			header("Location:index.php?actualizar=succes");
		}
	}

	public function eliminar(){
		$gestor = new Gestor();
		$gestor->eliminar();
		$this->Logout();
	}

	/*Presenta la interfaz para realizar importacion de clientes*/
	public function importar()
	{
		//cargar los clientes importados y los muestra en una tabla
		$gestor =  new Gestor();
		$resultado = $gestor->consultarClientes();//Consulta y retorna los clientes 
		require_once("vista/html/importar.php");//Agrega los clientes a la tabla
	}

	/*Obtiene el archivo, tipo y nombre temporal para poder almacenarlo en la BD*/
	public function cargarClientes($archivo,$tipo,$tmpName)
	{
		$destino = 'cop_'.$archivo;//Se agrega un prefijo para identificarlo del archivo cargado
		if (copy($tmpName, $destino)) {//Se crea un archivo temporal para uso de la plataforma
			echo "<h2>Archivo cargado con exito</h2>";
		}else{
			echo "ERROR AL CARGAR ARCHIVO";
		}
		if (file_exists($destino)) {
			/*Llamamos las clases necesarias PHPExcel*/
			require_once('vista/librerias/PHPExcel.php');
			require_once('vista/librerias/PHPExcel/Reader/Excel2007.php');
			//Cargando la hoja de excel
			$objReader = new PHPExcel_Reader_Excel2007();
			$objPHPExcel = $objReader->load($destino);
			$objFecha = new PHPExcel_Shared_Date();
			// Asignamon la hoja de excel activa
			$objPHPExcel->setActiveSheetIndex(0);

			$columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
			$filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

			//Creamos un array con todos los datos del Excel importado
			//Inicia desde la fila 2 para no tomar los encabezados del excel
			for ($i=2;$i<=$filas;$i++){
				$_DATOS_EXCEL[$i]['nombre'] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['celular'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['correo']= $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			}		
			$errores=0;

			$cliente = null;//objeto de la clase cliente no instanciado
			//Arreglo con todas las filas y columnas del excel importado (menos las cabeceras)
			foreach($_DATOS_EXCEL as $campo => $valor){
				//En la fila que se encuentre del arreglo $_DATOS_EXCEL
				//Se instancia el objeto de la clase CLIENTE 
				$cliente = new Cliente();
				foreach ($valor as $campo2 => $valor2){
					switch ($campo2) {//Segun el nombre de la clave o indice donde se cuentre asigna el valor al objeto
						case 'nombre':
							$cliente->asignarNombre($valor2);
							break;
						case 'celular':
							$cliente->asignarCelular($valor2);
							break;
						case 'correo':
							$cliente->asignarCorreo($valor2);
							break;
					}
				}
				$gestor = new Gestor();//Instancia un objeto Gestor para realizar la insercion
				$result = $gestor->agregarCliente($cliente);//Envia el objeto al metodo del gestor para insertar en la BD
				if (!$result){ echo "Error al insertar registro ".$campo;$errores+=1;}
			}	
			/////////////////////////////////////////////////////////////////////////	
			echo "<hr> <div class='col-xs-12'>
			    	<div class='form-group'>";
				      echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $errores ERRORES</center></strong>";
			echo "</div>
			</div>  ";
			//Borramos el archivo temporal que esta en el servidor con el prefijo cop_
			unlink($destino);
		}
		header("Location:index.php?accion=importar");
	}
}

 ?>