<!-- Controla opción de listar envíos -->

<?php
//Llama al modelo
include (ruta.'/models/modelo.php');


$bd = Bd_conexion::getInstance();

$sql = "SELECT COUNT(*) AS total FROM envios";

$bd->Consulta($sql);
$fila=$bd->LeeRegistro();

//Busca cuántos artículos hay en la base de datos
$articulosTotales = $fila['total'];

//Busca cuántas páginas hay en total
$articulosPorPagina = 3;
$paginasTotales = ceil($articulosTotales / $articulosPorPagina);


$paginaActual = 0;

if(isset($_GET['pagina']))
{
	// en caso que haya datos, los casteamos a int
	$paginaActual = (int)$_GET['pagina'];
}

// el número de la página actual no puede ser menor a 0
if($paginaActual < 1)
{
	$paginaActual = 1;
}
// tampoco mayor la cantidad de páginas totales
else if($paginaActual > $paginasTotales)
{
	$paginaActual = $paginasTotales;
}

// obtenemos cuál es el artículo inicial para la consulta
$articuloInicial = ($paginaActual - 1) * $articulosPorPagina;

//llamamos a la función que nos lista los envios.
$envios = getEnvios($articuloInicial, $articulosPorPagina);

//Creamos variables que contengan la pagina siguiente y anterior.
$PagSiguiente = $paginaActual+1;
$PagAnterior = $paginaActual-1;

$PagPrimera = 1;
$PagUltima = $paginasTotales;

//Llama a la vista de listar
require (ruta."/views/vista_lista.php");
