<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aDatos = array("departamento" => 8,
    "nombredepto" => "Ventas",
    "director" => "Juan rodriguez",
    "empleados" => array(
        array("nombre" => "Pedro", "apellido" => "Fernandez"),
        array("nombre" => "Jacinto", "apellido" => "Benavente"),
    ),
);

$strJson = json_encode($aDatos);

print_r($strJson);

$aDatos = json_decode($strJson, true);

print_r($aDatos);
