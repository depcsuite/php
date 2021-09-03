<?php
$dia = date("d");
$mes = date("m");
$anio = date("y");
header("Content-Type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename=reporte-$anio-$mes-$dia.csv");

include_once "config.php";
include_once "entidades/venta.php";

$ventaEntidad = new Venta();
$aVentas = $ventaEntidad->cargarGrilla();


$fp = fopen('php://output', 'w');
fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
$aTitulos = array("Fecha", "Cliente", "Producto", "Cantidad", "Total");
fputcsv($fp, $aTitulos, ";");

foreach ($aVentas as $venta) {
	$aFila = array(
		$venta->fecha, 
		$venta->nombre_cliente, 
		$venta->nombre_producto,
		$venta->cantidad,
		$venta->total
	);

   	fputcsv($fp, $aFila, ";");
}

fclose($fp);

?>