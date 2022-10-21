<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (count($_SESSION) == 0) {
    $_SESSION["listadoClientes"] = array();
}

if($_POST){
    if(isset($_REQUEST["btnEnviar"])){
        $nombre = $_REQUEST["txtNombre"];
        $dni = $_REQUEST["txtDni"];
        $telefono = $_REQUEST["txtTelefono"];
        $edad = $_REQUEST["txtEdad"];

        $aCliente = array(
                            "nombre" => $nombre, 
                            "dni" => $dni,
                            "telefono" => $telefono,
                            "edad" => $edad
                        );
    
        $_SESSION["listadoClientes"][] = $aCliente;
        header("Location: clientes_session2.php");


    } else if(isset($_REQUEST["btnEliminar"])){
        $_SESSION["listadoClientes"] = array();
    }

}

if(isset($_GET["pos"]) && $_GET["pos"] >= 0){
    $pos = $_GET["pos"];
    unset($_SESSION["listadoClientes"][$pos]);
    header("Location: clientes_session2.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre"  class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI</label>
                        <input type="text" name="txtDni" id="txtDni"  class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Teléfono</label>
                        <input type="text" name="txtTelefono" id="txtTelefono"  class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad</label>
                        <input type="text" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="pb-3">
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary">ENVIAR</button>
                        <button type="submit" name="btnEliminar" id="btnEliminar" class="btn btn-danger">ELIMINAR</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Teléfono</th>
                            <th>Edad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($_SESSION["listadoClientes"] as $pos => $cliente): ?>
                        <tr>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["telefono"]; ?></td>
                            <td><?php echo $cliente["edad"]; ?></td>
                            <td><a href="?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
                           
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>