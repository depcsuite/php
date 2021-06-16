<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

//Lista de invitados admitidos
$aInvitados = array("pepe", "ana", "maca", "juan");

if ($_POST) {
    if (isset($_REQUEST['btnProcesar'])) {
        $nombre = $_REQUEST['txtNombre'];
        if (in_array($nombre, $aInvitados)) {

            //Si viene la imagen la almacenamos en la carpeta imagenes
            if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
                $nombreAleatorio = date("Ymdhmsi") . rand(1000, 5000); //2021010420453710
                $archivo_tmp = $_FILES["archivo"]["tmp_name"];
                $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
                $nuevoNombre = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/".$nuevoNombre);
            }

            $aMensaje = array("texto" => "¡Bienvenid@ $nombre a la fiesta!", 
                              "estado" => "success");
        } else {
            $aMensaje = array("texto" => "No se encuentra en la lista de invitados.", 
                              "estado" => "danger");
        }
    } else if (isset($_REQUEST['btnVip'])) {
        $respuesta = $_REQUEST['txtPregunta'];
        if ($respuesta == "verde") {
            $aMensaje = array("texto" => "Aquí tiene su pulsera", "estado" => "success");

        } else {
            $aMensaje = array("texto" => "Ud. no tiene pase VIP", "estado" => "danger");
        }
    }
}

//Carga la variable con las imagenes de la carpeta
$aImagenes = scandir("imagenes");
unset($aImagenes[0]);
unset($aImagenes[1]);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
    <title>Listado de invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<main class="container">
    <div class="row">
        <div class="col-12 py-3">
            <h1>Listado de ingreso</h1>
        </div>
        <?php if(isset($aMensaje)): ?>
        <div class="col-12">
            <div class="alert alert-<?php echo $aMensaje["estado"]; ?>" role="alert">
                <?php echo $aMensaje["texto"]; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-12">
            <p>Complete el siguiente formulario:</p>
        </div>
        <div class="col-6">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <p>Nombre:<p><input type="text" name="txtNombre" class="form-control">
                          <input type="file" name="archivo" class="form-control">
                        <input type="submit" name="btnProcesar" value="Procesar invitado" class="btn-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="12-col bm-3">
                        <p>Ingresa el código secreto para el pase VIP:<p>
                        <input type="text" name="txtPregunta" class="form-control">
                        <input type="submit" name="btnVip" value="Procesar código" class="btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-2">
            <table class="table table-hover border">
                <tr>
                    <th>Imágenes</th>
                </tr>
                <?php foreach ($aImagenes as $imagen): ?>
                    <tr>
                        <td><img src="imagenes/<?php echo $imagen; ?>" class="img-thumbnail"></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
	</main>
</body>
</html>