<?php

class Cliente {
    private $idcliente;
    private $nombre;
    private $cuit;
    private $telefono;
    private $correo;
    private $fecha_nac;

    public function __construct(){

    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request){
        $this->idcliente = isset($request["id"])? $request["id"] : "";
        $this->nombre = isset($request["txtNombre"])? $request["txtNombre"] : "";
        $this->cuit = isset($request["txtCuit"])? $request["txtCuit"]: "";
        $this->telefono = isset($request["txtTelefono"])? $request["txtTelefono"]: "";
        $this->correo = isset($request["txtCorreo"])? $request["txtCorreo"] : "";
        if(isset($request["txtAnioNac"]) && isset($request["txtMesNac"]) && isset($request["txtDiaNac"])){
            $this->fecha_nac = $request["txtAnioNac"] . "-" .  $request["txtMesNac"] . "-" .  $request["txtDiaNac"];
        }
    }

    public function insertar(){
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        //Arma la query
        $sql = "INSERT INTO clientes (
                    nombre, 
                    cuit, 
                    telefono, 
                    correo, 
                    fecha_nac
                ) VALUES (
                    '" . $this->nombre ."', 
                    '" . $this->cuit ."', 
                    '" . $this->telefono ."', 
                    '" . $this->correo ."', 
                    '" . $this->fecha_nac ."'
                );";
               // print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idcliente = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar(){

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "UPDATE clientes SET
                nombre = '".$this->nombre."',
                cuit = '".$this->cuit."',
                telefono = '".$this->telefono."',
                correo = '".$this->correo."',
                fecha_nac =  '".$this->fecha_nac."'
                WHERE idcliente = " . $this->idcliente;
          
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "DELETE FROM clientes WHERE idcliente = " . $this->idcliente;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "SELECT idcliente, 
                        nombre, 
                        cuit, 
                        telefono, 
                        correo, 
                        fecha_nac 
                FROM clientes 
                WHERE idcliente = $this->idcliente";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if($fila = $resultado->fetch_assoc()){
            $this->idcliente = $fila["idcliente"];
            $this->nombre = $fila["nombre"];
            $this->cuit = $fila["cuit"];
            $this->telefono = $fila["telefono"];
            $this->correo = $fila["correo"];
            $this->fecha_nac = $fila["fecha_nac"];
        }  
        $mysqli->close();

    }

  public function obtenerTodos(){
        $aClientes = array();
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "SELECT
    A.idcliente,
    A.cuit,
    A.nombre,
    A.telefono,
    A.correo,
    A.fecha_nac,
    (SELECT GROUP_CONCAT('(', C.nombre, ') ', B.domicilio, ', ', D.nombre, ', ', E.nombre SEPARATOR '<br>') 
        FROM domicilios B 
        INNER JOIN tipo_domicilios C ON C.idtipo = B.fk_tipo
        INNER JOIN localidades D ON D.idlocalidad = B.fk_idlocalidad
        INNER JOIN provincias E ON E.idprovincia = D.fk_idprovincia
        WHERE B.fk_idcliente = A.idcliente
        ) as domicilio
	FROM
	    clientes A
	ORDER BY idcliente DESC";

        $resultado = $mysqli->query($sql);

        if($resultado){
            while ($fila = $resultado->fetch_assoc()) {
                $obj = new Cliente();
                $obj->idcliente = $fila["idcliente"];
                $obj->cuit = $fila["cuit"];
                $obj->nombre = $fila["nombre"];
                $obj->telefono = $fila["telefono"];
                $obj->correo = $fila["correo"];
                $obj->domicilio = $fila["domicilio"];
                $obj->fecha_nac = $fila["fecha_nac"];
                $aClientes[] = $obj;

            }
            return $aClientes;
        }
    }

}


?>