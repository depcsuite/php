<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');

echo "Fecha y hora actual " . date("d/m/Y H:i") . "<br><br>";

$hr = date("H");
$min = date("i");

$hr = "21";
$min = "10";

//Sumar 60 minutos e ir informando la hora y minutos en pantalla.
for ($i=0; $i < 60; $i++) { 
    echo "La hora es " . (($hr >= 0 && $hr <= 9) ? "0$hr" : $hr) . ":" . (($min >= 0 && $min <= 9) ? "0$min" : $min) . "<br>";
    $min++;
    if($min == 60){
        $min = 0;
        $hr++;
    }
    if($hr == 24){
        $hr=0;
    }
}

echo "La hora es ". (($hr >= 0 && $hr <= 9)? "0$hr" : $hr)  .":" . (($min >= 0 && $min <= 9)? "0$min" : $min) . "<br>";

?>