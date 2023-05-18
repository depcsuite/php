<?php

//Definicion
function promedio($aVector){
    $suma = 0;
    foreach($aVector as $item){
        $suma = $suma + $item;
    }
    $resultado  = $suma / count($aVector);
    return $resultado;
}

//Uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldos = array(800, 400, 500, 3000, 900, 10000);
echo "El máximo es: " . promedio($aNotas) . "<br>";
echo "El máximo es: " . promedio($aSueldos) . "<br>";

