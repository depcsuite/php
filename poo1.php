<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición de clases

 class Persona {
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getNombre(){ return $this->nombre; }
    
    public function setDni($dni){ $this->dni; }
    public function getDni(){ return $this->dni; }
    
    public function setEdad($edad){ $this->edad; }
    public function getEdad(){ return $this->edad; }
    
    public function setNacionalidad($nacionalidad){ $this->nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }
    
    public function imprimir(){

    }

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
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "El promedio es: " . $this->calcularPromedio() . "<br>";
    }

    public function calcularPromedio(){
        return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}

class Docente extends Persona {
    private $especialidad;

    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";


    public function __construct($dni, $nombre, $especialidad){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->especialidad = $especialidad;
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
        echo "Especialidad: " . $this->especialidad . "<br>";
    }

    public function imprimirEspecialidadesHabilitadas(){
        echo "Las especialidades habilitadas para un docente son:<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_WP . "<br>";
        echo self::ESPECIALIDAD_BBDD . "<br>";
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

}

//Programa
$alumno1 = new Alumno();
$alumno1->setNombre("Juan Gonzalez");
$alumno1->setEdad(25);
$alumno1->setNacionalidad("Argentino");
$alumno1->notaPhp = 5;
$alumno1->notaPortfolio = 7;
$alumno1->notaProyecto = 9;
echo "El nombre es " . $alumno1->getNombre();;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->setNombre("Belen Perez");
$alumno2->setEdad(30);
$alumno2->notaPortfolio = 9;
$alumno2->notaPhp = 8;
$alumno2->notaProyecto = 7;
$alumno2->imprimir();

$docente1 = new Docente("35987123", "Cristian Paz", Docente::ESPECIALIDAD_ECO);
print_r($docente1);

?>