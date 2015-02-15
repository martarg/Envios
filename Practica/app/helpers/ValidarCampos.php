<?php
/**
 * Filtra los campos de los formularios
 * @return boolean
 */
function FiltrarCampos()
{
	if ($_POST['destinatario']=='' || $_POST['telefono']=='' || $_POST['direccion']=='' ||
			$_POST['poblacion']=='' || $_POST['provincia']=='' || $_POST['email']=='')
	{
		echo '<div class="container"><div class="alert alert-danger"><strong>Atención </strong>los campos con (*) son obligatorios.</div></div>';
		return true;
	}

	//Comprueba si el correo electrónico es válido.
	else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		echo '<div class="container"><div class="alert alert-danger"><strong>Email </strong>no válido.</div></div>';
		return true;
	}

	/* Expresiones regulares:
	 **Comprueba si es un teléfono válido.
	**El primer nº que sea 9,6 o 7
	**Que sean nº entre 0 y 9
	**Que tenga 8 dígitos(+ el primero)*/
	else if (!preg_match('/^[9|6|7][0-9]{8}$/', $_POST['telefono']))
	{
		echo '<div class="container"><div class="alert alert-danger"><strong>Teléfono </strong>no válido.</div></div>';
		return true;
	}

	/*Validar que el código postal es válido
	 **Que sean números entre 0-9 y tamaño máximo 5.*/
	if (!preg_match('/^[0-9]{5}$/', $_POST['codigo_postal']))
	{
		echo '<div class="container"><div class="alert alert-danger">El <strong>código postal </strong>debe tener 5 cifras.</div></div>';
		return true;
	}

	//Devuelve que NO hay errores.
	else
	{
		return false;
	}
}

/**
 * Valida los campos del formulario de búsqueda
 * Comprueba que haya al menos algún campo escrito.
 * 
 * @return boolean
 */
function ValidarBusqueda()
{
	if($_POST['destinatario'] == "" && $_POST['poblacion'] == "" && $_POST['codigo_postal'] == "")
	{
		echo '<div class="container"><div class="alert alert-danger">No ha seleccionado ninguna búsqueda.</div></div>';
		return true;
	}
	else 
		return false;
}
