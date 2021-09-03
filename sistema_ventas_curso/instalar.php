<?php

include_once "config.php";
include_once "entidades/usuario.php";

$usuario = new Usuario();
$usuario->usuario = "admin";
$usuario->clave = $usuario->encriptarClave("admin123");
$usuario->nombre = "Administrador";
$usuario->apellido = "";
$usuario->correo = "admin@correo.com";
$usuario->insertar();

echo "Usuario insertado.";
?>