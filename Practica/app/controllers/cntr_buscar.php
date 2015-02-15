<?php
session_start();
require ('..\config.php');
require (ruta.'\models\modelo.php');
require (ruta."/views/vista_encabezado.php");
require (ruta.'/helpers/ValidarCampos.php');

if($_POST)
{
	//Filtra los campos. Devuelve true si hay errores.
	$error = ValidarBusqueda();
	
	if($error)
	{
		//Si hay error, muestra el formulario.
		include (ruta.'/views/form_buscar.php');
	}
	else
	{
		//Guardamos los campos en un array.
		$encontrado = array (
			'nombre' => $_POST['destinatario'],
			'poblacion' => $_POST['poblacion'],
			'codigo_postal' => $_POST['codigo_postal']
		);
		
		//Guardamos el resultado de la búsqueda.
		$resultado = BuscarEnvio($encontrado);
		
		//Si no encuentra resultado, muestra mensaje y carga el index.
		if(!$resultado)
		{
			echo '<div class="container"><div class="alert alert-success" role="alert">
				<strong>No se han encontrado coincicencias.</strong>
			</div></div>';
			header ( 'Refresh: 3; URL= ../index.php');
		}
		else 
		{
			//Muestra resultados de la búsqueda.
			include (ruta."/views/vista_buscar.php");
		}
	}
	
}
else
{
	//Incluye el formulario.
	include (ruta."/views/form_buscar.php");
}
