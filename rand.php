<?php

$valor = rand(1, 5);

//Si el valor es 1 o el valor es 3 o el valor es 5 entonces
if($valor == 1 || $valor == 3 || $valor == 5){
    echo "El número $valor es impar.";
} else {
    echo "El número $valor es par.";
}


?>