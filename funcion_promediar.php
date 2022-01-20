<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function promediar($aNumeros){
    $suma = 0;
    $resultado = 0;
    foreach($aNumeros as $numero){
        $suma += $numero;
    }
    return $suma / count($aNumeros);
}

//Definicion
function maximo($aNumeros)
{
    $maximo = 0;
    foreach ($aNumeros as $numero) {
        if ($numero > $maximo) {
            $maximo = $numero;
        }
    }
    return $maximo;
}


//Uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldo = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);

echo "La nota máxima es: " . maximo($aNotas) . "<br>";
echo "El sueldo máximo es: " . maximo($aSueldo);
