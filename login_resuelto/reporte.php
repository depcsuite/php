<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=reporte.csv');

include_once "config.php";
include_once "entidades/venta.php";
$pg = "Listado de ventas";

$ventaEntidad = new Venta();
$aVentas = $ventaEntidad->cargarGrilla();


$fp = fopen('php://output', 'w');
fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
$titulo = array("Fecha", "Cliente", "Producto", "Cantidad", "Total");
fputcsv($fp, $titulo, ";");

foreach ($aVentas as $venta) {
	$aDatos = array(
		 $venta->fecha, 
		$venta->nombre_cliente, 
		$venta->nombre_producto,
		$venta->cantidad,
		$venta->total
	);

   	fputcsv($fp, $aDatos, ";");
}

fclose($fp);

?>