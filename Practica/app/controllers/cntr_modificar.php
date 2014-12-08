<?php
require '../config.php';
require ruta.'/models/modelo.php';
require ruta.'/helpers/ValidarCampos.php';
require (ruta."/views/vista_encabezado.php");

if($_POST)
{
	$errores = FiltrarCampos();
	
	/*Si hay errores, incluimos el formulario con errores.*/
	if($errores)
	{
		include (ruta.'/views/vista_modificar.php');
		echo "Campos no válidos";
	}	
	else
	{
		$nuevosDatos = array (
			'destinatario'=> $_POST['destinatario'],
			'telefono' => $_POST['telefono'],
			'direccion' => $_POST['direccion'],
			'poblacion' => $_POST['poblacion'],
			'codigo_postal' => $_POST['codigo_postal'],
			'provincia' => $_POST['provincia'],
			'email' => $_POST['email'],
			'estado' => $_POST['estado'],
			'fecha_entrega' => $_POST['fecha_entrega'],
			'observaciones' => $_POST['observaciones']
		);
		
		//ID del envio (se recoge de la ruta)
		$codigo = $_GET['id'];
		
		//modifica en la base de datos
		ModificarDatos($nuevosDatos, $codigo);
		header("location: cntr_envios.php");
	}
}
else
{
	//Muestra los campos del envío con ese código en la vista
	$datosExiste = datosEnvio($_GET['id']);
		
		$arrMod = array (
			$_POST['destinatario'] = $datosExiste['destinatario'],
			$_POST['telefono'] = $datosExiste['telefono'],
			$_POST['direccion'] = $datosExiste['direccion'],
			$_POST['poblacion'] = $datosExiste['poblacion'],
			$_POST['codigo_postal'] = $datosExiste['codigo_postal'],
			$_POST['provincia'] = $datosExiste['provincia'],
			$_POST['email'] = $datosExiste['email'],
			$_POST['estado'] = $datosExiste['estado'],
			$_POST['fecha_entrega'] = $datosExiste['fecha_entrega'],
			$_POST['observaciones'] = $datosExiste['observaciones']
		);
	
	$provincias=ListaProvincias();
	include (ruta.'/views/vista_modificar.php');
}

/**
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto, $atributos='')
{
	$html="\n".'<select name="'.$name.'" '.$atributos.'>';
		foreach($opciones as $value=>$text)
		{
			if ($value==$valorDefecto)
				$select='selected="selected"';
			else
				$select="";
			$html.= "\n\t<option value=\"$value\" $select>$text</option>";
		}
	$html.="\n</select>";

	return $html;
}