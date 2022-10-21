<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definicion
function maximo($aVector)
{
    $maximo = 0;
    $primeraVez = true;
    foreach ($aVector as $item) {
        //Si es la primera vez
        if ($primeraVez) {
            $maximo = $item;
            $primeraVez = false;
        } else {
            //Sino pregunto $item > $maximo?
            if ($item > $maximo) {
                $maximo = $item;
            }
        }
    }
    return $maximo;
}

//Definicion
function maximo1($aVector)
{
    $maximo = "";
    //Si el vector tiene elementos
    if (count($aVector) > 0) {
        $maximo = $aVector[0];
        foreach ($aVector as $item) {
            if ($item > $maximo) {
                $maximo = $item;
            }
        }
    }
    return $maximo;
}

//Uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldo = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);

echo "La nota máxima es: " . maximo($aNotas) . "<br>";
echo "El sueldo máximo es: " . maximo($aSueldo);
