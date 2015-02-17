<?php
require ('config.php');

if (!session_id()) session_start();

/**
 * Función que comprueba si el usuario es correcto.
 * 	Usuario: usuario
 * 	Contraseña: usuario
 * @param unknown $usuario
 * @param unknown $clave
 * @return boolean
 */
function ValidaUsuario($usuario, $clave)
{
	if ($usuario == "usuario" && $clave == "usuario")
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}



if(isset($_SESSION['validado']))
{
	//Si se ha enviado Cerrar sesión:
	if (isset($_GET['action']) && $_GET['action'] == "cerrar")
	{
		//destruye la sesión y vuelve a mostrar logueo.
		session_destroy();
		header("location: index.php");
	}
	else
	{
		//Muestra el contenido de la página.
		require (ruta."/views/vista_encabezado.php");
		require (ruta.'/controllers/cntr_envios.php');
	}
}
else
{
	if($_POST)
	{
		if (ValidaUsuario($_POST['usuario'], $_POST['password']))
		{
			//Guardamos variables de sesión.
			$_SESSION['validado'] = TRUE;
			$_SESSION['usuario'] = $_POST['usuario'];
			//Guarda la hora de inicio de sesión
			$_SESSION['tiempo'] = date("H:i:s");
			header("location: index.php");
		}
		else
		{
			//Muestra error y carga logueo.
			echo '<div class="alert alert-danger" role="alert"><strong>Usuario o contraseña incorrectos.</strong> Vuelva a intentarlo.</div>';
			require (ruta.'/views/form_usuario.php');
		}
	}
	else
	{
		require (ruta.'/views/form_usuario.php');
	}
}