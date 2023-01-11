<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Persona
{
    protected $documento;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function __construct()
    {

    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function setDocumento($documento){ $this->documento = $documento; }
    public function getDocumento(){ return $this->documento; }

    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setEdad($edad){ $this->edad = $edad; }
    public function getEdad(){ return $this->edad; }

    public function setNacionalidad($nacionalidad){ $this->nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }


    public function imprimir()
    {
        echo "Documento: " . $this->documento . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br><br>";
    }

}
class Alumno extends Persona
{
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __construct()
    {
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

     public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir()
    {
        echo "Documento: " . $this->documento . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "Promedio: " . $this->calcularPromedio() . "<br><br>";
    }

    private function calcularPromedio()
    {
        $resultado = ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
        return $resultado;
    }
}
class Docente extends Persona
{
    private $especialidad;

    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";

    public function __construct($documento, $nombre, $especialidad)
    {
        $this->documento = $documento;
        $this->nombre = $nombre;
        $this->especialidad = $especialidad;
    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir()
    {
        echo "Documento: " . $this->documento . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br><br>";

    }

    public function imprimirEspecialidadesHabilitadas()
    {
        echo "Las especialidades posibles son:<br>";
        echo self::ESPECIALIDAD_BBDD . "<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_WP . "<br><br>";
    }

}

$alumno1 = new Alumno();
$alumno1->setNombre("Ana María Paz");
$alumno1->setDocumento("767876788");
//echo $alumno1->getNombre();
$alumno1->notaPhp = 8;
$alumno1->notaPortfolio = 10;
$alumno1->notaProyecto = 9;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->nombre = "Mario Gimenez";
$alumno2->documento = "5678765";
$alumno2->notaPhp = 9;
$alumno2->imprimir();

$docente1 = new Docente("45678765", "Andres Garcia", Docente::ESPECIALIDAD_ECO);
$docente1->imprimir();
$docente1->imprimirEspecialidadesHabilitadas();