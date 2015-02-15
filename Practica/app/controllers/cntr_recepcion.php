<!-- Controla la opción de anotar la recepción de un envío -->

<?php
session_start();
require ('../config.php');
include (ruta.'/models/modelo.php');
require (ruta."/views/vista_encabezado.php");


if($_POST)
{
	/*	Guardamos en un array
	 * 		- Estado = entregado
	 * 		- Fecha actual
	 *		- Observaciones existentes
	 */
	$campos = array (
		'estado' => 'E',
		'fecha_entrega' => date('Y-m-d'),
		'observaciones' => $_POST['observaciones']
	);
	
	//Código del envío (de la url).
	$cod = $_GET['id'];
	
	//Modifica el estado, fecha y observaciones del envío.
	$prueba=ModificarDatos($campos, $cod);
	header("location: ../index.php");
}
else 
{
	//Muestra los campos del envío con ese código en la vista
	$datosExiste = datosEnvio($_GET['id']);
	
	$_POST['observaciones'] = $datosExiste['observaciones'];
	include (ruta.'/views/vista_recepcion.php');
}