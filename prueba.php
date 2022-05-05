<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$aPersonas = array();
$aPersonas[] = array("nombre" => "Nelson", 
                    "dni" => "33300012",
                    "telefono" => "1167891234",
                    "edad" => 34);

$aPersonas[] = array("nombre" => "Ana Valle", 
                    "dni" => "15678345",
                    "telefono" => "1167812334",
                    "edad" => 42);


$_SESSION["listadoDePersonas"] = $aPersonas;

//session_destroy();
print_r($_SESSION);

echo "El nombre de la persona 1 es: " . $_SESSION["listadoDePersonas"][0]["nombre"];