<?php
include (ruta.'/conection/conexion.php');

/**
 * Selecciona todos los envíos ordenados de forma descendente por fecha de creación.
 * @return array envios.
 */
function getEnvios($articuloInicial,$articulosPorPagina)
{
	$bd = Bd_conexion::getInstance();

	$sql = "SELECT * FROM envios order by fecha_creacion desc LIMIT ".$articuloInicial.", ".$articulosPorPagina;
	
	/*' . $articuloInicial . ', ' . $articulosPorPagina;*/
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
 * Inserta en la tabla envíos los datos pasados por parámetro.
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
 * @return Datos del envío del codigo.
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


/**
 * Modifica un envío (pasado por parámetro) con los datos pasados por parámetro
 * @param unknown $datos
 * @param unknown $cod
 */
function ModificarDatos($datos, $cod)
{
	$bd = Bd_conexion::getInstance();
	
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
	
	/*echo '<pre style="padding:.5em; background:#eee">'.$sql.'</pre>';
	 exit;*/
	
	$bd->Consulta($sql);
}


/**
 * Elimina un envío determinado.
 * @param $cod = código del envío a eliminar
 */
function EliminarEnvio($cod)
{
	$bd = Bd_conexion::getInstance();
	
	$sql = "DELETE FROM envios WHERE id='$cod'";
	$bd->Consulta($sql);
}


/**
 * Busca datos en la tabla envíos.
 * 
 * @param $busqueda = datos a buscar
 * @return array $envios = todos los envíos con esa coincidencia
 */
function BuscarEnvio($busqueda)
{
	$bd = Bd_conexion::getInstance();
	
	//$sql = "SELECT * FROM envios WHERE destinatario LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%' OR poblacion LIKE '%$busqueda%'";
	
	if(isset($_POST['destinatario']) && $_POST['destinatario']!="")
	{
		if(isset($_POST['buscaigual']) && $_POST['buscaigual']=="identico")
		{
			$where[] = "destinatario = '".$_POST['destinatario']."'";
		}
		else
		{
			$where[] = "destinatario LIKE '%{$_POST['destinatario']}%'";
		}
	}
	if(isset($_POST['poblacion']) && $_POST['poblacion']!="")
	{
		if(isset($_POST['buscaigual']) && $_POST['buscaigual']=="identico")
		{
			$where[] = "poblacion = '".$_POST['poblacion']."'";
		}
		else
		{
			$where[] = "poblacion LIKE '%".$_POST['poblacion']."%'";
		}
	}
	if(isset($_POST['codigo_postal']) && $_POST['codigo_postal']!="")
	{
		if(isset($_POST['buscaigual']) && $_POST['buscaigual']=="identico")
		{
			$where[] = "codigo_postal = '".$_POST['codigo_postal']."'";
		}
		else
		{
			$where[] = "codigo_postal LIKE '%".$_POST['codigo_postal']."%'";
		}
	}
	
	$sql = "SELECT * FROM envios WHERE ".implode(" AND ",$where);
	$bd->Consulta($sql);
	
	$envios = array();
	
	//Realizamos un bucle para ir obteniendo los resultados*/
	while ($reg=$bd->LeeRegistro())
	{
		$envios[]=$reg;
	}
	
	return $envios;
}
