<?php
require '../config.php';
include (ruta.'/models/modelo.php');

$envios = getEnvios();

require (ruta."/views/vista_encabezado.php");
require (ruta."/views/vista_lista.php");
