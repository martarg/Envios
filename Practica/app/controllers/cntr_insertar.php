<!-- Controla opción de insertar un envío -->

<?php
require ('../config.php');
require (ruta.'/models/modelo.php');
require (ruta.'\helpers\select_provincias.php');

//Muestra las provincias devueltas por la función
$provincias = ListaProvincias();

require ruta.'/helpers/ValidarCampos.php';
require (ruta."/views/vista_encabezado.php");


//Si se ha enviado:
if($_POST)
{
	//Comprueba que los campos son válidos.
	$errores = FiltrarCampos();
	
	/*Si hay errores, incluimos el formulario con errores.*/
	if($errores)
	{
		include (ruta.'/views/vista_insertar.php');
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
		header("location: ../index.php");
	}
}
//Si no se ha enviado nada, muestra el formulario vacío.
else
{
	include (ruta."/views/vista_insertar.php");
}
