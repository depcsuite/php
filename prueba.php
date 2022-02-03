<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Cliente{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;
    
    public function __construct(){
        $this->descuento = 0.0;
    }
    
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "Cliente:  " . $this->nombre . "<br>";
        echo "Documento:  " . $this->dni . "<br>";
        echo "Correo:  " . $this->correo . "<br>";
        echo "Telefono:  " . $this->telefono . "<br>";
        echo "Descuento:  " . $this->descuento . "<br>";
    }

}

class Producto {
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __construct(){
        $this->precio = 0.0;
        $this->iva = 0.0;
    }
    
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "Producto:  " . $this->nombre . "<br>";
        echo "Codigo:  " . $this->cod . "<br>";
        echo "Precio:  " . $this->precio . "<br>";
        echo "Descripcion:  " . $this->descripcion . "<br>";
        echo "IVA:  " . $this->iva . "<br>";
    }
}

class Carrito {
    private $cliente;
    private $aProductos;
    private $subTotal;
    private $total;

    public function __construct(){
        $this->aProductos = array();
        $this->subTotal = 0.0;
        $this->total = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function cargarProducto($producto){
        $this->aProductos[] = $producto;

    }

    public function imprimirTicket(){
        echo '<table class="table table-hover border">';
        echo '<tr><td>'. $this->cliente->nombre.'</td></tr>';

        echo '</table>';

    }
}

//Programa
$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.05;
//$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 21;
//$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirlpool";
$producto2->descripcion = "Esta es una heladera no froze";
$producto2->precio = 76000;
$producto2->iva = 10.5;
//$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Carrito</title>
</head>
<body>
    <?php $carrito1->imprimirTicket(); ?>
</body>
</html>