<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Iniciamos la session
session_start();

class Config {
    const BBDD_HOST = "167.114.86.211:3310"; //127.0.0.1;
    const BBDD_USUARIO = "abmventas"; //root
    const BBDD_CLAVE = "C8R50.6988";
    const BBDD_NOMBRE = "abmventas";
}

?>