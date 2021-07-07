<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición de clases

abstract class Persona {
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function setDni($dni){ $this->dni = $dni; }
    public function getDni(){ return $this->dni; }

    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setEdad($edad){ $this->edad = $edad; }
    public function getEdad(){ return $this->edad; }
    
    public function setNacionalidad($nacionalidad){ $this->nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }

    abstract public function imprimir();
}

class Alumno extends Persona {
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "DNI = " . $this->dni . "<br>"; 
        echo "Nombre = " . $this->nombre . "<br>"; 
        echo "Edad = " . $this->edad . "<br>";
        echo "Legajo = " . $this->legajo . "<br>";
        echo "Nota Portfolio = " . $this->notaPortfolio . "<br>";
        echo "Nota PHP = " . $this->notaPhp . "<br>";
        echo "Nota Proyecto = " . $this->notaProyecto . "<br>";
        echo "Promedio = " . $this->calcularPromedio() . "<br><br>";
    }

    public function calcularPromedio($num1){
        $promedio = ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto)/3;
        return $promedio;
    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }


}

class Docente extends Persona {
    private $especialidad;
    const ESPECILIADAD_WP = "Wordpress";
    const ESPECILIADAD_ECO = "Economía aplicada";
    const ESPECILIADAD_BBDD = "Base de datos";

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "Nombre = " . $this->nombre . "<br>";
        echo "Edad = " . $this->edad . "<br>";
        echo "Especialidad = " . $this->especialidad . "<br><br>";
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

//Programa
$alumno1 = new Alumno();
$alumno1->setDni("30123654");
$alumno1->setNombre("Juan");
$alumno1->setEdad(28);
$alumno1->legajo = "123";
echo "El alumno " . $alumno1->getNombre() . " tiene " . $alumno1->getEdad() . " años y su legajo es $alumno1->legajo";
$alumno1->imprimir();

$docente = new Docente();
$docente->nombre = "Miguel Paz";
$docente->dni = "30987123";
$docente->especialidad = Docente::ESPECILIADAD_BBDD;
$docente->imprimir();






?>