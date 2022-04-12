<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$stock = 10;

while ($stock > 0) {
    echo "El stock es $stock <br>";
    $stock--;
}
echo "Stock agotado";
