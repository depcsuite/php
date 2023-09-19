<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "config.php";
include_once "entidades/usuario.php";

$usuario = new Usuario();
$usuario->usuario = "consultas";
$usuario->clave = password_hash("admin123", PASSWORD_DEFAULT);
$usuario->nombre = "Consultas";
$usuario->apellido = "";
$usuario->correo = "consultas@correo.com";
$usuario->insertar();

echo "Usuario insertado.";
?>