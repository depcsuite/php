<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición
function print_f1($variable)
{
    if (is_array($variable)) {
        $contenido = "";
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        file_put_contents("datos.txt", $contenido);
    } else {
        file_put_contents("datos.txt", $variable);
    }
};
function print_f2($variable)
{
    if (is_array($variable)) {
        $datos = fopen('datos.txt', 'a+');

        foreach ($variable as $linea) {
            fwrite($datos, $linea . "\n");
        }
        fclose($datos);
    } else {
        file_put_contents("datos.txt", $variable);
    }
};

function print_f3($variable)
{
    if (is_array($variable)) {
        $contenido = "";
        $archivo = fopen('datos.txt', 'a+');
        fwrite($archivo, "\n\nDatos del array ==>\n");

        foreach ($variable as $item) {
            fwrite($archivo, $item . "\n");
        }
        fclose($archivo);

    } else {
        $contenido = "Datos de la variable ==>\n" . $variable;
        file_put_contents("datos.txt", $contenido);
    }
}

//Uso
$aNotas = array(8, 5, 7, 9, 10);
$msg = "Este es un mensaje";
print_f($aNotas);
