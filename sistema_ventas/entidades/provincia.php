<?php

class Provincia
{
    private $idprovincia;
    private $nombre;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function obtenerTodos()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT
                    idprovincia,
                    nombre
                FROM provincias
                ORDER BY nombre ASC";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if ($resultado) {
            //Convierte el resultado en un array asociativo

            while ($fila = $resultado->fetch_assoc()) {
                $entidad = new Provincia();
                $entidad->idprovincia = $fila["idprovincia"];
                $entidad->nombre = $fila["nombre"];
                $aResultado[] = $entidad;

            }
        }
        return $aResultado;
    }

}
