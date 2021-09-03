<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{

    private $dni;
    private $nombre;
    private $edad;
    private $nacionalidad;

    public function getDni(){ return $this->dni; }
    public function setDni($dni){ $this->dni = $dni; }

    public function getNombre(){ return $this->nombre; }
    public function setNombre($nombre){ $this->nombre = $nombre; }

    public function getEdad(){ return $this->edad; }
    public function setEdad($edad){ $this->edad = $edad; }
   
    public function getNacionalidad(){ return $this->nacionalidad; }
    public function setNacionalidad($nacionalidad){ $this->nacionalidad = $nacionalidad; }
 

    public function imprimir(){
        echo "DNI: $this->dni<br>";
        echo "Nombre: $this->nombre<br>";
        echo "Edad: $this->edad<br>";
        echo "Nacionalidad: $this->nacionalidad<br><br>";
    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

}

class Alumno extends Persona
{
    private $legajo;

    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPHP = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Legajo:" . $this->legajo . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota PHP: " . $this->notaPHP . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "Promedio: ". number_format($this->calcularPromedio(), 2, ',', '.') . "<br><br>";
    }

    public function calcularPromedio(){
        $promedio = ($this->notaPortfolio + $this->notaPHP + $this->notaProyecto) / 3;
        return $promedio;
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

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br><br>";
    }
    public function imprimirEspecialidadesHabilitadas(){
        echo "Las especialidades habilitadas son:<br>";
        echo self::ESPECIALIDAD_BBDD . "<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_WP . "<br>";
    }

    public function __destruct() {
      echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

//Programa
$persona1 = new Persona();
$persona1->setDni("35678321");
echo $persona1->getDni();
$persona1->setNombre("Juan Perez");
$persona1->setEdad(30);
$persona1->setNacionalidad("Argentina");
$persona1->imprimir();

$alumno1 = new Alumno();
$alumno1->nombre = "Julia Lopez";
$alumno1->dni = "38979977";
$alumno1->nacionalidad = "Argentina";
$alumno1->legajo = 7898;
$alumno1->notaPhp = 8.5;
$alumno1->notaPortfolio = 7.5;
$alumno1->notaProyecto = 8;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->nombre = "Matías Diaz";
$alumno2->nacionalidad = "Colombiano";
$alumno2->notaPortfolio = 9;
$alumno2->notaPhp = 9;
$alumno2->notaProyecto = 8;
$alumno2->imprimir();

$docente1 = new Docente();
$docente1->nombre = "Juan Carlos Rosales";
$docente1->especialidad = Docente::ESPECIALIDAD_ECO;
$docente1->imprimir();


?>
