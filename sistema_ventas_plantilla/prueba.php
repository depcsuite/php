<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'vendor/autoload.php';
use Mpdf;

$mpdf = new new Mpdf();
$mpdf->WriteHTML('<H1>Hola mundo!</H1>');
$mpdf->Output();

?>