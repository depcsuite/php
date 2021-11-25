<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
$aAsuntos = array(
    array("value" => "0", "nombre" => "Ventas"),
    array("value" => "1", "nombre" => "Soporte"),
    array("value" => "2", "nombre" => "Webmaster"),

);
echo json_encode($aAsuntos);

?>