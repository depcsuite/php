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

    public function setDocumento($documento){ $this->documento = $documento; }
    public function getDocumento(){ return $this->documento; }

    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setEdad($edad){ $this->edad = $edad; }
    public function getEdad(){ return $this->edad; }

    public function setNacionalidad($nacionalidad){ $this->nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }

    public function __construct($documento, $nombre, $edad, $nacionalidad) {
        $this->documento = $documento;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->nacionalidad = $nacionalidad;
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    function imprimir() {
    echo "PERSONA <br>";
    echo "Nombre: " . $this->nombre . "<br>";
    echo "Documento: " . $this->documento . "<br>";
    echo "Edad: " . $this->edad . "<br>";
    echo "Nacionalidad: " . $this->nacionalidad . "<br>";
}

    
}

class Alumno extends Persona
{
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function imprimir(){
        echo "Alumno:  " . $this->nombre . "<br>";
        echo "Documento:  " . $this->documento . "<br>";
        echo "Nota del porfolio:  " . $this->notaPortfolio . "<br>";
        echo "Promedio:  " . number_format($this->calcularPromedio(), 2, ",", ".");
    }

    public function calcularPromedio (){ 
        return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }
}

class Docente extends Persona {
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

    public function __construct()
    {
        
    }
    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function imprimir(){
        echo "DOCENTE <br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Documento: " . $this->documento . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br>";
    }
    
    public function imprimirEspecialidadesHabilitadas() {
        echo "Las especialidades habilitadas son:<br>";
        echo self::ESPECIALIDAD_WP . ", " . self::ESPECIALIDAD_ECO . ", " . self::ESPECIALIDAD_BBDD;
    }

}

$alumno1 = new Alumno();
$alumno1->setNombre("Ana Valle");
$alumno1->setEdad(42);
$alumno1->setDocumento("8767876567");

exit;
$alumno1->notaPhp = 8;
$alumno1->notaPortfolio = 9;
$alumno1->notaProyecto = 8;
$alumno1->imprimir();

$persona1 = new Persona("5765456", "Bernabe", 27, "Mexicano");
$persona1->imprimir();

$docente1 = new Docente();
$docente1->nombre = "Mario";
$docente1->imprimir();
$docente1->imprimirEspecialidadesHabilitadas();
