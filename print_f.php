<?php

//Definición
function print_f($variable){
    $contenido = "";
	if(is_array($variable)){
        foreach($variable as $item){
            $contenido .= $item . "\n";
        }
    } else {
        $contenido = $variable;
    }
    file_put_contents("datos.txt", $contenido);
}

//Uso
$aNotas = array(8,5,7,9,10);
$msg = "Error al enviar el correo electrónico";
print_f($aNotas);
print_f($msg);

?>