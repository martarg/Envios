<?php
require '../config.php';
require ruta.'/models/modelo.php';
require (ruta."/views/vista_encabezado.php");

//ID del envio (se recoge de la ruta)
$codigo = $_GET['id'];
$confirmado=isset($_GET['confirmado']) && $_GET['confirmado'];

if ($confirmado)
{
	// Borramos
	EliminarEnvio($codigo);
	include ruta."/views/vista_borrado.php";
	
}
else
{
	// Preguntamos para borrar
	$datos = datosEnvio($codigo);

	$_POST['destinatario'] = $datos['destinatario'];
	$_POST['telefono'] = $datos['telefono'];
	$_POST['direccion'] = $datos['direccion'];
	$_POST['poblacion'] = $datos['poblacion'];
	$_POST['codigo_postal'] = $datos['codigo_postal'];
	$_POST['provincia'] = $datos['provincia'];
	$_POST['email'] = $datos['email'];
	$_POST['estado'] = $datos['estado'];
	$_POST['fecha_entrega'] = $datos['fecha_entrega'];
	$_POST['observaciones'] = $datos['observaciones'];

	include(ruta."/views/vista_eliminar.php");
}