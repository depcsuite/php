<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Si existe el archivo abrirlo
if(file_exists("archivo.txt")){
    //Leer el archivo y almacenar el contenido en una variable strClientes
    $strClientes = file_get_contents("archivo.txt");

    //Convertir el json a un array aClientes
    $aClientes = json_decode($strClientes, true);

} else {
    //Si no existe generar un array aClientes vacío
    $aClientes = array();
}

if($_POST){
    $dni = $_REQUEST["txtDni"];
    $nombre = $_REQUEST["txtNombre"];
    $telefono = $_REQUEST["txtTelefono"];
    $correo = $_REQUEST["txtCorreo"];

    if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
        $nombreAleatorio = date("Ymdhmsi"). rand(1000, 2000); //202210202002371010
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
        if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
            move_uploaded_file($archivo_tmp, "imagenes/$nombreAleatorio.$extension");
            $nombreImagen = "$nombreAleatorio.$extension";

            //Si estoy editando eliminar la imagen anterior si existe
            if (isset($_GET["editar"]) && $_GET["editar"] >= 0) {
                $pos = $_GET["editar"];
                $imagenAnterior = $aClientes[$pos]["imagen"];
                if( $imagenAnterior != "sin_imagen.jpeg"){
                    unlink("imagenes/$imagenAnterior");
                }
            }
        }
    } else {
        if(isset($_GET["editar"]) && $_GET["editar"] >= 0){
            $pos = $_GET["editar"];
            $nombreImagen = $aClientes[$pos]["imagen"];
        } else {
            $nombreImagen = "sin-imagen.jpeg";
        }
    }

    if(isset($_GET["editar"]) && $_GET["editar"] >= 0){
        //Actualizado
        $pos = $_GET["editar"];
        $aClientes[$pos] = array("dni" => $dni,
                        "nombre" => $nombre,
                        "telefono" => $telefono,
                        "correo" => $correo,
                        "imagen" =>  $nombreImagen);
    } else {
        //Insertando
        $aClientes[] = array("dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen);
    }
   

    //Convertir el array a json
    $strClientes = json_encode($aClientes);

    //Guardar el json en el archivo.txt
    file_put_contents("archivo.txt", $strClientes);
}

if(isset($_GET["editar"]) && $_GET["editar"] >= 0){
    $pos = $_GET["editar"];
    $cliente = $aClientes[$pos];
}

if (isset($_GET["eliminar"]) && $_GET["eliminar"] >= 0) {
    $pos = $_GET["eliminar"];
  
    $imagenAnterior = $aClientes[$pos]["imagen"];
    if ($imagenAnterior != "sin_imagen.jpeg") {
        unlink("imagenes/$imagenAnterior");
    }

    unset($aClientes[$pos]);

    //Convertir el array a json
    $strClientes = json_encode($aClientes);

    //Guardar el json en el archivo.txt
    file_put_contents("archivo.txt", $strClientes);

    header("Location: prueba.php");
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
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($cliente["dni"])? $cliente["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($cliente["nombre"])? $cliente["nombre"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Teléfono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($cliente["telefono"])? $cliente["telefono"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($cliente["correo"])? $cliente["correo"] : ""; ?>">
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
                        <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="?editar=<?php echo $pos; ?>"><i class="bi bi-zoom-in"></i></a>
                                <a href="?eliminar=<?php echo $pos; ?>"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>