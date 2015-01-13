<!-- Controla opción de modificar un envío -->

<?php
require ('..\config.php');
require (ruta.'\models\modelo.php');
require (ruta.'\helpers\ValidarCampos.php');
require (ruta.'\helpers\select_provincias.php');
require (ruta."/views/vista_encabezado.php");

//Si se ha enviado:
if($_POST)
{
	//Comprueba si hay errores.
	$errores = FiltrarCampos();
	
	/*Si hay errores, incluimos el formulario con errores.*/
	if($errores)
	{
		include (ruta.'/views/vista_modificar.php');
		echo "Campos no válidos";
	}
	/*Sino, insertamos los datos en un array*/
	else
	{
		$nuevosDatos = array (
			'destinatario'=> $_POST['destinatario'],
			'telefono' => $_POST['telefono'],
			'direccion' => $_POST['direccion'],
			'poblacion' => $_POST['poblacion'],
			'codigo_postal' => $_POST['codigo_postal'],
			'provincia' => $_POST['provincia'],
			'email' => $_POST['email'],
			'estado' => $_POST['estado'],
			'fecha_entrega' => $_POST['fecha_entrega'],
			'observaciones' => $_POST['observaciones']
		);
		
		//ID del envio (se recoge de la ruta)
		$codigo = $_GET['id'];
		
		//modifica en la base de datos con los nuevos datos de un envío determinado.
		ModificarDatos($nuevosDatos, $codigo);
		header("location: ..\index.php");
	}
}
/*Si no se ha enviado: */
else
{
	//Muestra los campos en la vista de un envío determinado.
	$datosExiste = datosEnvio($_GET['id']);
		
		$arrMod = array (
			$_POST['destinatario'] = $datosExiste['destinatario'],
			$_POST['telefono'] = $datosExiste['telefono'],
			$_POST['direccion'] = $datosExiste['direccion'],
			$_POST['poblacion'] = $datosExiste['poblacion'],
			$_POST['codigo_postal'] = $datosExiste['codigo_postal'],
			$_POST['provincia'] = $datosExiste['provincia'],
			$_POST['email'] = $datosExiste['email'],
			$_POST['estado'] = $datosExiste['estado'],
			$_POST['fecha_entrega'] = $datosExiste['fecha_entrega'],
			$_POST['observaciones'] = $datosExiste['observaciones']
		);
	
	/*Muestra la lista de los nombres de provincias.*/
	$provincias=ListaProvincias();
	include (ruta.'/views/vista_modificar.php');
}