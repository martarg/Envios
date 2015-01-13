<!-- Controla opción de listar envíos -->

<?php
//Llama al modelo
include (ruta.'/models/modelo.php');

/*Guarda los datos de un envío que devuelve la función*/
$envios = getEnvios();

//Llama a la vista de listar
require (ruta."/views/vista_lista.php");
