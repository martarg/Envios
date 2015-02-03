<?php
require ('..\config.php');
require (ruta.'\models\modelo.php');
require (ruta."/views/vista_encabezado.php");


//include (ruta."/views/form_buscar.php");

/*if($_POST)
{
	$encontrado = $_POST['busqueda'];
	
	$resultado = BuscarEnvio($encontrado);
	include (ruta."/views/vista_buscar.php");
}
else
{
	header ("location: ../index.php");
}*/

if($_POST)
{
	//$nom = $_POST['destinatario'];
	
	$encontrado = array (
		'nombre' => $_POST['destinatario'],
		'poblacion' => $_POST['poblacion'],
		'codigo_postal' => $_POST['codigo_postal']
	);
	
	$resultado = BuscarEnvio($encontrado);
	
	include (ruta."/views/vista_buscar.php");
}
else
{
	//header ("location: ../index.php");
	include (ruta."/views/form_buscar.php");
}
