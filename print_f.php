<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Definición
function print_f($variable){
    $contenido = "";
	if(is_array($variable)){
        foreach($variable as $item){
            $contenido .= $item . "\n";
        }
        file_put_contents("datos.txt", $contenido);
    } else {
        file_put_contents("datos.txt", $variable);
    }
}

//Uso
$aNotas = array(8, 5, 7, 9, 10, 9);
$msg = "Este es un mensaje";

print_f($aNotas);

echo "Archivo generado";

?>