<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Si existe el archivo.txt
if (file_exists("archivo.txt")) {
    //Leer todo el contenido y almacenarlo en $strJson
    $strJson = file_get_contents("archivo.txt");

    //Decodificar la variable $strJson y que se almacene en el array $aClientes
    $aClientes = json_decode($strJson, true);
} else {
    //Crear el array $aClientes vacio
    $aClientes = array();
}

if ($_POST) {
    $dni = $_POST["txtDni"];
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $correo = $_POST["txtCorreo"];
    $nombreImagen = "";

    if (isset($_GET["editar"]) && $_GET["editar"] >= 0) {
        //Estoy editando
        $pos = $_GET["editar"];

        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi") . rand(1000, 2000); //202210202002371010
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");

                //Eliminar la imagen anterior
                if (file_exists("imagenes/" . $aClientes[$pos]["imagen"])) {
                    unlink("imagenes/" . $aClientes[$pos]["imagen"]);
                }
            }
        } else {
            //Si no se sube ninuna imagen, recuperamos el nombre de la imagen actual
            $nombreImagen = $aClientes[$pos]["imagen"];
        }

        //Edito uno existente
        $aClientes[$pos] = array("dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen,
        );
    } else {

        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi") . rand(1000, 2000); //202210202002371010
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }

        //Inserto uno nuevo
        $aClientes[] = array("dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen,
        );

    }
    //Convertir el array $aClientes a json $strJson
    $strJson = json_encode($aClientes);

    //Almacenar $strJson en archivo.txt
    file_put_contents("archivo.txt", $strJson);
}

if (isset($_GET["eliminar"]) && $_GET["eliminar"] >= 0) {
    //iguale el pos, elimine, converti, almacene y redireccione

    $pos = $_GET["eliminar"];

    //elimina la posicion marcada
    unset($aClientes[$pos]);

    //Convertir el array de clientes en json
    $strJson = json_encode($aClientes);

    //Almacenar el json en el archivo.txt
    file_put_contents("archivo.txt", $strJson);
    //redirecciono a la pantalla principal
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">DNI: *</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aClientes[$_GET["editar"]]["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aClientes[$_GET["editar"]]["nombre"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Teléfono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aClientes[$_GET["editar"]]["telefono"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aClientes[$_GET["editar"]]["correo"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php" class="btn btn-danger my-2">NUEVO</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $pos => $cliente): ?>
                            <tr>
                                <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" alt="" class="img-thumbnail"></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["correo"]; ?></td>
                                <td>
                                    <a href="?editar=<?php echo $pos; ?>" class="btn btn-secnodary">Editar</a>
                                    <a href="?eliminar=<?php echo $pos; ?>" class="btn btn-secnodary">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>