<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

class Persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;
    public function imprimir(){
        echo "Es una persona";
    }
    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

}
class Alumno extends Persona{
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.1;
        $this->notaProyecto = 0.0;
    }
    public function imprimir(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Documento: " . $this->dni . "<br>";
        echo "Legajo: " . $this->legajo . "<br>";
        echo "Promedio: " . number_format($this->calcularPromedio(),2, ",", ".") . "<br>";
    }
    public function calcularPromedio(){
        return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }
    
    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

class Docente extends Persona{
    public $especialidad;
    public function imprimir(){

    }
    public function imprimirEspecialidadesHabilitadas(){

    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

//Programa
$alumno1 = new Alumno();
$alumno1->nombre = "Juan Paz";
$alumno1->legajo = 800;
$alumno1->notaPortfolio = 8;
$alumno1->notaPhp = 9;
$alumno1->notaProyecto = 8.50;



$alumno2 = new Alumno();
$alumno2->nombre = "Micaela Ledesma";
$alumno2->legajo = 801;
$alumno2->notaPortfolio = 9;


?>
