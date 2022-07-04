<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aAuto = array();
$aAuto["color"] = array("Negro", "Verde");
$aAuto["marca"] = "Ford";
$aAuto["anio"] = 1908;
$aAuto["precio"] = 800;

echo $aAuto["color"][0];
print_r($aAuto);



?>