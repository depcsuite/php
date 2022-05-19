<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$claveEncriptada = password_hash("admin123", PASSWORD_DEFAULT);

echo $claveEncriptada;
