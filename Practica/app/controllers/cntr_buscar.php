<?php
require ('..\config.php');
require (ruta.'\models\modelo.php');
require (ruta."/views/vista_encabezado.php");

if($_POST)
{
	$encontrado = $_POST['busqueda'];
	
	$resultado = BuscarEnvio($encontrado);
	include (ruta."/views/vista_buscar.php");
}
else
{
	header ("location: ../index.php");
}
