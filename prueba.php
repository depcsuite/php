<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$strFecha = "2020-03-16";


echo "La fecha es 2020-03-16" . date_format(date_create($strFecha), 'd/m/Y'); 





?>