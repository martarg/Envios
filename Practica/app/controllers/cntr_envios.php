<?php
include (ruta.'/models/modelo.php');

$envios = getEnvios();

require (ruta."/views/vista_lista.php");
