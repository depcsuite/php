<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    protected $documento;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function __construct($documento, $nombre, $edad, $nacionalidad)
    {
        $this->documento = $documento;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->nacionalidad = $nacionalidad;
    }

    public function setDocumento($documento){ $this->documento = $documento; }
    public function getDocumento(){ return $this->documento; }
    
    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getNombre(){ return $this->nombre; }
    
    public function setEdad($edad){ $this->edad = $edad; }
    public function getEdad(){ return $this->edad; }

    public function setNacionalidad($nacionalidad){ $this->nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }

    public function imprimir(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Documento: " . $this->documento . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

}

class Alumno extends Persona{
    
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __construct(){
        $this->notaPortfolio = 0;
        $this->notaPhp = 0;
        $this->notaProyecto = 0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "Nombre: " .  $this->nombre . "<br>";
        echo "Documento: " .  $this->documento . "<br>";
        echo "Edad: " .  $this->edad . "<br>";
        echo "Nacionalidad: " .  $this->nacionalidad . "<br>";
        echo "Nota de portfolio: " .  $this->notaPortfolio . "<br>";
        echo "Nota de PHP: " .  $this->notaPhp . "<br>";
        echo "Nota de proyecto: " .  $this->notaProyecto . "<br>";
        echo "Promedio: " .  $this->calcularPromedio() . "<br><br>";
    }

    public function calcularPromedio(){
        $notasTotales = $this->notaPortfolio + $this->notaPhp + $this->notaProyecto;
        return $notasTotales / 3;
    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

class Docente extends Persona{
    private $especialidad;
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";


    public function imprimirEspecialidadesHabilitadas(){
        echo "Las especialidades habilitadas para un docente son: <br>";
        echo self::ESPECIALIDAD_WP . "<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_BBDD . "<br><br>";
    }
    public function __construct(){
  
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Documento: " . $this->documento . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br><br>";
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

//Programa
$alumno1 = new Alumno(); // Se instancia la clase persona
$alumno1->setNombre("Ana Valle");
$alumno1->setEdad(24);
$alumno1->setDocumento("39789671");
$alumno1->setNacionalidad("Argentina");
$alumno1->imprimir();

$alumno1->notaPortfolio = 9;
$alumno1->notaPhp= 7;
$alumno1->notaProyecto = 8;

$alumno2 = new Alumno(); //Es un objeto del tipo persona
$alumno2->nombre = "Dante";
$alumno2->edad = 24;
$alumno2->notaPortfolio = 7;
$alumno2->notaPhp = 5;
$alumno2->notaProyecto = 9;

$docente1 = new Docente();
$docente1->nombre = "Pedro Mendoza";
$docente1->edad = 41;
$docente1->nacionalidad = "Colombia";
$docente1->especialidad = Docente::ESPECIALIDAD_ECO;

$persona1 = new Persona("75678678", "Julia Paz", 63, "Brasil");
$persona2 = new Persona("86558868", "Miguel Perez", 27, "Uruguay");

$alumno1->imprimir();
$alumno2->imprimir();
$docente1->imprimir();
$docente1->imprimirEspecialidadesHabilitadas();
$persona1->imprimir();
$persona2->imprimir();

