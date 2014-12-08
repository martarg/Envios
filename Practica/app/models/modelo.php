<?php
include (ruta.'/conection/conexion.php');

/**
 *
 * 
 */
function getEnvios()
{
	$bd = Bd_conexion::getInstance();

	//$sql = "SELECT destinatario, telefono, direccion, poblacion, codigo_postal, provincia, correo_elect, estado, fecha_creacion, fecha_entrega, observaciones FROM envios order by fecha_creacion desc";
	$sql = "SELECT * FROM envios order by fecha_creacion desc";
	$bd->Consulta($sql);
	
	$envios = array();
	
	//Realizamos un bucle para ir obteniendo los resultados*/
	while ($reg=$bd->LeeRegistro())
	{
		$envios[]=$reg;
	}
	
	return $envios;
}


/**
 * 
 * @param $datos:array con los datos a introducir
 */
function añadirEnvio($datos)
{
	
	$bd = Bd_conexion::getInstance();
	
	$sql = "insert into envios(destinatario, telefono, direccion, poblacion, codigo_postal, provincia, email, estado, fecha_creacion, observaciones)
			 values('".$datos['destinatario']."', '".$datos['telefono']."',
			'".$datos['direccion']."', '".$datos['poblacion']."','".$datos['codigo_postal']."',
			'".$datos['provincia']."','".$datos['email']."', '".$datos['estado']."',
			'".$datos['fec_creacion']."','".$datos['observaciones']."')";
	
	$bd->Consulta($sql);
}

/**
 * DEVUELVE LOS DATOS DE UN ENVÍO DETERMINADO
 * 
 * @param $cod = codigo de envio
 * @return Datos del envío del codigo>
 */
function datosEnvio($cod)
{
	$bd = Bd_conexion::getInstance();
	
	$sql = "select * from envios where id='$cod'";
	$bd->Consulta($sql);
	
	return $bd->LeeRegistro();	
}


/**
 * Función que devuelve los nombres de provincias.
 * @return Array de provincias <>
 */
function ListaProvincias()
{
	$bd = Bd_conexion::getInstance();

	$prov = "select * from tbl_provincias";
	$bd->Consulta($prov);

	$provincias = array();

	while($prov=$bd->LeeRegistro())
	{
		$provincias[$prov['cod']] = $prov['nombre'];
	}

	return $provincias;
}


function ModificarDatos($datos, $cod)
{
	$bd = Bd_conexion::getInstance();
	
	/*$sql ="update envios set destinatario='".$datos['destinatario']."', telefono='".$datos['telefono']."', direccion='".$datos['direccion']
			."', poblacion='".$datos['poblacion']."', codigo_postal=".$datos['codigo_postal'].", provincia=".$datos['provincia']
				.", email='".$datos['email']."', estado='".$datos['estado']."', fecha_entrega='".$datos['fecha_entrega']."', observaciones='".$datos['observaciones']."' 
						where id='$cod'";
	
	echo '<pre style="padding:.5em; background:#eee">'.$sql.'</pre>';
	exit;*/
	
	$campos = '';
	
	foreach ($datos as $clave => $valor)
	{
		if($campos!='')
		{
			$campos.=', ';
		}
		$campos.= $clave.'="'.$valor.'"';
	}
	
	$sql = "update envios set ".$campos." where id=".$cod;
	
	$bd->Consulta($sql);
}


function EliminarEnvio($cod)
{
	$bd = Bd_conexion::getInstance();
	
	$sql = "DELETE FROM envios WHERE id='$cod'";
	$bd->Consulta($sql);
}