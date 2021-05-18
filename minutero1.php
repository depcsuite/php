<?php
/*

//Sumar 60 minutos e ir informando la hora y minutos en pantalla.

//Modificar el ejercicio para que la variable $hr sea 23

//Probar que el ejercicio muestre las 0:10

*/

$hr = 21;
$min = 10;

echo "La hora es $hr:$min hs. <br>";

for($i=0; $i < 60;$i++){
    $min++;
    echo "La hora es $hr:$min hs. <br>";

}

?>