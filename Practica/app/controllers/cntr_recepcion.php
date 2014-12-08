<?php
require '../config.php';
include (ruta.'/models/modelo.php');
require (ruta."/views/vista_encabezado.php");



if($_POST)
{
	$campos = array (
		'estado' => 'E',
		'fecha_entrega' => date('Y-m-d'),
		'observaciones' => $_POST['observaciones']
	);
	
	$cod = $_GET['id'];
	$prueba=ModificarDatos($campos, $cod);
	header("location: cntr_envios.php");
}
else 
{
	//Muestra los campos del envío con ese código en la vista
	$datosExiste = datosEnvio($_GET['id']);
	
	$_POST['observaciones'] = $datosExiste['observaciones'];
	include (ruta.'/views/vista_recepcion.php');
}