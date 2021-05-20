<?php

class Domicilio{
    private $iddomicilio;
    private $fk_idcliente;
    private $fk_tipo;
    private $fk_idlocalidad;
    private $domicilio;


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }

    public function insertar(){
        $mysql = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $mysql->query("INSERT INTO domicilios (
            fk_idcliente, 
            fk_tipo, 
            fk_idlocalidad, 
            domicilio) VALUE(
            $this->fk_idcliente, 
            $this->fk_tipo, 
            $this->fk_idlocalidad, 
            '$this->domicilio')");
    }

    public function eliminarPorCliente($idCliente){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "DELETE FROM domicilios WHERE fk_idcliente = " . $idCliente;
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

     public function obtenerFiltrado($idCliente){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $request = $_REQUEST;
        $columns = array(
           0 => 'B.nombre',
           1 => 'D.nombre',
           2 => 'C.nombre',
           3 => 'A.domicilio'
            );
        $sql = "SELECT 
                    A.iddomicilio,
                    A.fk_tipo,
                    B.nombre AS tipo,
                    A.fk_idlocalidad,
                    C.nombre AS localidad,
                    D.idprovincia,
                    D.nombre AS provincia,
                    A.domicilio
                    FROM domicilios A
                    INNER JOIN tipo_domicilios B ON A.fk_tipo = B.idtipo
                    INNER JOIN localidades C ON C.idlocalidad = A.fk_idlocalidad
                    INNER JOIN provincias D ON D.idprovincia = C.fk_idprovincia
                WHERE 1=1 AND A.fk_idcliente = $idCliente 
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) { 
            $sql.=" AND ( B.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql.=" OR D.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql.=" OR C.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql.=" OR A.domicilio LIKE '%" . $request['search']['value'] . "%' )";
        }
        if(isset($request['order']))
        $sql.=" ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];
        $resultado = $mysqli->query($sql);
        $lstRetorno = array();
        while ($fila = $resultado->fetch_assoc()) {
            $domicilio = new Domicilio();
            $domicilio->iddomicilio = $fila["iddomicilio"];
            $domicilio->fk_tipo = $fila["fk_tipo"];
            $domicilio->tipo = $fila["tipo"];
            $domicilio->fk_idlocalidad = $fila["fk_idlocalidad"];
            $domicilio->localidad = $fila["localidad"];
            $domicilio->idprovincia = $fila["idprovincia"];
            $domicilio->provincia = $fila["provincia"];
            $domicilio->domicilio = $fila["domicilio"];
            $lstRetorno[] = $domicilio;
        }

        return $lstRetorno;
    }



}


?>