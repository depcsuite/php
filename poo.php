<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Definicion de clases

class Persona{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function __construct(){
    
    }

    public function setDni($dni){ $this->dni = $dni; }
    public function getDni(){ return $this->dni; }

    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setEdad($edad){ $this->edad = $edad; }
    public function getEdad(){ return $this->edad; }

    public function setNacionalidad($nacionalidad){ $this->nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }

    public function imprimir(){
        //definicion de la funcion
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }


}

class Docente extends Persona
{
    private $especialidad;
    const ESPECILIADAD_WP = "Wordpress";
    const ESPECILIADAD_ECO = "Economía aplicada";
    const ESPECILIADAD_BBDD = "Base de datos";

    public function __construct(){
    
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }


    public function imprimir(){

    }
    public function imprimirEspecialidadesHabilitadas(){
        echo "Las especialidades habilitadas para un docente son: <br>";
        echo self::ESPECILIADAD_WP . "<br>";
        echo self::ESPECILIADAD_ECO . "<br>";
        echo self::ESPECILIADAD_BBDD . "<br>";
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

class Alumno extends Persona
{
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
        echo "Alumno:  " . $this->$nombre . "<br>";
        echo "Documento:  " . $this->dni . "<br>";
        echo "Nota del portfolio:  " . $this->notaPortfolio . "<br>";
        echo "Nota PHP:  " . $this->notaPhp . "<br>";
        echo "Nota Proyecto:  " . $this->notaProyecto . "<br>";
        echo "Promedio:  " . $this->calcularPromedio() . "<br><br>";
    }

    public function calcularPromedio(){
        return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

//Desarrollo del programa
$alumno1 = new Alumno();
$alumno1->setNombre("Julia Lopez");
$alumno1->setDni(38979977);
$alumno1->setNacionalidad("Argentina");
$alumno1->legajo = 7898;
$alumno1->notaPhp = 8.5;
$alumno1->notaPortfolio = 7.5;
$alumno1->notaProyecto = 8;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->setNombre("Matías Diaz");
$alumno2->setNacionalidad("Colombiano");
$alumno2->notaPortfolio = 9;
$alumno2->notaPhp = 9;
$alumno1->notaProyecto = 8;
$alumno2->imprimir();

$docente1 = new Docente();
$docente1->nombre = "Juan Carlos Rosales";
$docente1->especialidad = Docente::ESPECILIADAD_BBDD;



?>