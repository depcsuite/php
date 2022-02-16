<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Iniciamos la session
session_start();

class Config {
    const BBDD_HOST = "127.0.0.1";
    const BBDD_PORT= "3306";
    const BBDD_USUARIO = "root";
    const BBDD_CLAVE = "";
    const BBDD_NOMBRE = "abmventas";
}

?>