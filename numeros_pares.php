<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Imprimir un listado de números consecutivos del 1 a 100.
for ($i = 1; $i <= 100; $i++) {
    echo $i . "<br>";
}

//Luego sobre el mismo listado, modificarlo para que sólo muestre los números pares.
for ($i = 2; $i <= 100; $i += 2) {
    echo $i . "<br>";
}

//Cuando el número llegue a 60 mostrarlo e interrumpir la ejecución del código con un break.
for ($i = 2; $i <= 100; $i += 2) {
    echo $i . "<br>";
    if ($i == 60) {
        break;
    }
}

?>