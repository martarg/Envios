<?php

function FiltrarCampos()
{
	//$errores = false;

	if ($_POST['destinatario']=='' || $_POST['telefono']=='' || $_POST['direccion']=='' ||
			$_POST['poblacion']=='' || $_POST['provincia']=='' || $_POST['email']=='')
	{
		return true;
	}

	//Comprueba si el correo electrónico es válido.
	else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		return true;
	}

	/* Expresiones regulares:
	 **Comprueba si es un teléfono válido.
	**El primer nº que sea 9,6 o 7
	**Que sean nº entre 0 y 9
	**Que tenga 8 dígitos(+ el primero)*/
	else if (!preg_match('/^[9|6|7][0-9]{8}$/', $_POST['telefono']))
	{
		return true;
	}

	/*Validar que el código postal es válido
	 **Que sean números entre 0-9 y tamaño máximo 5.*/
	if (!preg_match('/^[0-9]{5}$/', $_POST['codigo_postal']))
	{
		return true;
	}

	//Devuelve que NO hay errores.
	else
	{
		return false;
	}
}
