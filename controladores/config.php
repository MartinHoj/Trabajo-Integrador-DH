<?php
// Hago session_start para no tener que hacerlo en cada archivo
session_start();
// Declaro la funcion de autocarga para que se ejecute cada vez que se hace new de una instancia y se cargue el archivo que corresponda
function miAutocarga($nClase)
{
  require_once("$nClase" . ".php");
}
spl_autoload_register("miAutocarga");


?>