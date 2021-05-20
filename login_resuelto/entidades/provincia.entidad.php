<?php

class Provincia{
    private $idprovincia;
    private $nombre;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }

    public function obtenerTodos(){
        $aProvincias = null;
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $resultado = $mysqli->query("SELECT 
            idprovincia,
            nombre
            FROM provincias ORDER BY nombre ASC");

        while ($fila = $resultado->fetch_assoc()) {
            $entidad = new Provincia();
            $entidad->idprovincia = $fila["idprovincia"];
            $entidad->nombre = $fila["nombre"];
            $aProvincias[] = $entidad;
        }
        return $aProvincias;
    }

}


?>