<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


file_put_contents("datos.txt", json_encode($_REQUEST));

Header("Location: http://localhost:3000/")
?>