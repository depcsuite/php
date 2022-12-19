<?php
//Definicion
function maximo($aVector){
    $maximo = 0;
    foreach ($aVector as $item) {
        if($maximo < $item){
            $maximo = $item;
        }
    }
    return $maximo;
}
//Uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldos = array(800, 400, 500, 3000, 900, 10000);
echo "El máximo es: " . maximo($aNotas) . "<br>";
echo "El máximo es: " . maximo($aSueldos) . "<br>";
