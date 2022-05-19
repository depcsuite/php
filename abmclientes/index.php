<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo.txt")){
    //Si el archivo existe, cargo los clientes en la variable aClientes
    $strJson = file_get_contents("archivo.txt");
    $aClientes = json_decode($strJson, true);
} else {
    //Si el archivo no existe es porque no hay clientes
    $aClientes = array();
}

if(isset($_GET["id"])){
    $id = $_GET["id"];
} else {
    $id="";
}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    unset($aClientes[$id]);

    //Convertir aClientes en json
    $strJson = json_encode($aClientes);

    //Almacenar el json en el archivo
    file_put_contents("archivo.txt", $strJson);

    header("Location: index.php");

}

if($_POST){
    $dni = $_POST["txtDni"];
    $nombre = $_POST["txtNombre"]; 
    $telefono = $_POST["txtTelefono"];
    $correo = $_POST["txtCorreo"];
    $nombreImagen = "";

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi") . rand(1000, 2000); //202205171842371010
        $archivo_tmp = $_FILES["archivo"]["tmp_name"]; //C:\tmp\ghjuy6788765
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
        }
    }

    if($id >= 0){
        // Si no se subio una imagen y estoy editando conservar en $nombreImagen el nombre
        // de la imagen anterior que esta asociada al cliente que estamos editando
         if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $nombreImagen = $aClientes[$id]["imagen"];
         } else {
            //Si viene una imagen Y hay una imagen anterior, eliminar la anterior
            if(file_exists("imagenes/". $aClientes[$id]["imagen"])){
                unlink("imagenes/". $aClientes[$id]["imagen"]);
            }
         }

        //Estoy editando
        $aClientes[$id] = array("dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen,
        );
    } else{
        //Estoy insertando un nuevo cliente
        $aClientes[] = array("dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen,
        );

    }

   

    //Convertir el array de clientes en json
    $strJson = json_encode($aClientes);

    //Almacenar en un archivo.txt el json con file_put_contents
    file_put_contents("archivo.txt", $strJson);

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
   <link rel="stylesheet" href="css/fontawesome6/css/all.min.css">
   <link rel="stylesheet" href="css/fontawesome6/css/fontawesome.min.css">
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
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($aClientes[$id])? $aClientes[$id]["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["nombre"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Teléfono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["telefono"] : "";?>">
                    </div>
                    <div>
                        <label for="">Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["correo"] : "";?>">
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
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php 

                    foreach($aClientes as $pos => $cliente): ?>
                    <tr>
                        <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                        <td><?php echo $cliente["dni"]; ?></td>
                        <td><?php echo $cliente["nombre"]; ?></td>
                        <td><?php echo $cliente["correo"]; ?></td>
                        <td>
                            <a href="?id=<?php echo $pos; ?>"><i class="fa-solid fa-pen-to-square"></a></i>
                            <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>

</body>
</html>