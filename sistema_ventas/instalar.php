<?php

include_once "config.php";
include_once "entidades/usuario.php";

$usuario = new Usuario();
$usuario->usuario = "ntarche";
$usuario->clave = $usuario->encriptarClave("admin123");
$usuario->nombre = "Nelson Daniel";
$usuario->apellido = "Tarche";
$usuario->correo = "nelson.tarche@gmail.com";
$usuario->insertar();
echo "Usuario insertado.";
?>