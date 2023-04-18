<?php
$aClientes = array(
    array("dni" => "33300012", "nombre" => "Ana Valle"), //Posición 0
    array("dni" => "33300013", "nombre" => "Bernabe"), //Posición 1
);


foreach ($aClientes as $pos => $cliente) {
    print_r($cliente);

}
