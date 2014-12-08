<?php
require '../config.php';
require (ruta.'/models/modelo.php');

$provincias = ListaProvincias();

require ruta.'/helpers/ValidarCampos.php';
require (ruta."/views/vista_encabezado.php");



if($_POST)
{
	$errores = FiltrarCampos();
	
	/*Si hay errores, incluimos el formulario vacío.*/
	if($errores)
	{
		include (ruta.'../views/vista_insertar.php');
		echo "Campos no válidos";
		
	}
	/*Sino, los datos los insertamos en un array*/
	else
	{		
		$arrDatos = array (
			'destinatario' => $_POST['destinatario'],
			'telefono' => $_POST['telefono'],
			'direccion' => $_POST['direccion'],
			'poblacion' => $_POST['poblacion'],
			'codigo_postal' => $_POST['codigo_postal'],
			'provincia' => $_POST['provincia'],
			'email' => $_POST['email'],
			'estado' => 'P',
			'fec_creacion' => date('Y-m-d'),
			'observaciones' => $_POST['observaciones']
		);
		
		//Añade el envío
		añadirEnvio($arrDatos);
		header("location: cntr_envios.php");
	}
}
else
{
	include (ruta."../views/vista_insertar.php");
}



