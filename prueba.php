<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$valor = rand(1, 5);

//Si el valor es 1 o el valor es 3 o el valor es 5 entonces
if($valor == 1 || $valor == 3 || $valor == 5){
    echo "El número $valor es impar";
} else {
    echo "El número $valor es par";
}


echo $valor == 1 || $valor == 3 || $valor == 5 ? "El número $valor es impar" : "El número $valor es par";

if($valor %2  ==  0){ //Analiza el resto de dividir por 2, todo numero divisible por 2 es par
	echo "El número $valor es par";
} else {
	echo "El número $valor es impar";
}

// Un =, es el operador de asignacion
// Doble ==, es el operador de comparacion por contenido
// Triple ===, es el operador de comparacion por tipo de variable y por contenido 
