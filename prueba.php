<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

function retornarValorPositivo(float $numero): ?int {
    //return $numero > 0 ? $numero : null;
    return $numero + 1.50;

}

//echo retornarValorPositivo(5);
//echo retornarValorPositivo(-5);
echo retornarValorPositivo(5.80);

?>
