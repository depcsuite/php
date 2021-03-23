<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hr = 23;
$min = 10;

//Sumar 60 minutos e ir informando la hora y minutos en pantalla.
for ($i=0; $i < 60; $i++) { 
    echo "La hora es $hr:$min <br>";
    $min++;
    if($min == 60){
        $min = 0;
        $hr++;
    }
    if($hr == 24){
        $hr=0;
    }
}
echo "La hora es $hr:$min <br>";

?>