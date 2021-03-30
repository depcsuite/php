<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definicion
function calcularSueldo($bruto){
    return 45000; 
}

$aEmpleados = array();

$aEmpleados[] = array("dni" => "11.643.765", 
                     "nombre" => "Alejandro Perez",
                     "sueldo" => calcularSueldo(50000)
                    );
                    
print_r($aEmpleados);