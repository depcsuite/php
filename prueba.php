<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aClientes = array(
    array("dni" => "33300012", "nombre" => "Ana Valle"), //Posición 0
    array("dni" => "33300013", "nombre" => "Bernabe"), //Posición 1
);

foreach ($aClientes as $pos => $cliente) {
    echo "El cliente $pos es ". $cliente["nombre"];

}
