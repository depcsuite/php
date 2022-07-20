<?php
//Definicion
function maximo($aVector){
    $valorMaximo = 0;
    foreach ($aVector as $valor) {
        if($valorMaximo < $valor){
            $valorMaximo = $valor;
        }
    }
    return $valorMaximo;
}
//Uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldos = array(800, 400, 500, 3000, 900, 10000);
echo "El promedio es: " . maximo($aNotas) . "<br>";
echo "El promedio es: " . maximo($aSueldos) . "<br>";
