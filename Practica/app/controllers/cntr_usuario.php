<?php
session_start();

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
	if (isset($_GET['action']) && $_GET['action'] == "cerrar") {
		session_destroy();
		echo "Se ha cerrado la sesión";
		require 'login.php';
	}
	else {
	require (ruta.'/controllers/cntr_envios.php');
	}
}
else 
{
	if($_POST)
	{
		if (ValidaUsuario($_POST['usuario'], $_POST['password']))
		{
			$_SESSION['validado'] = TRUE;
			header("location: ..\index.php");
		}
		else 
		{
			echo "INCORRECTO";
			require (ruta.'/views/form_usuario.php');
		}
	}
	else
	{
		require (ruta.'/views/form_usuario.php');
	}
}