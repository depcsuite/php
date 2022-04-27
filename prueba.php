<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){ /* si es postback */
    $nombre = $_POST["txtNombre"];
    $clave = $_POST["txtClave"];

    if($nombre != "" && $clave != ""){
        header("Location: acceso-confirmado.php");
    } else {
        $mensaje = "Valido para usuarios registrados.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if(isset($mensaje)){ ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo  $mensaje; ?>
                    </div>
                <?php } ?>

                <?php if(isset($mensaje)){ 
                    echo '<div class="alert alert-danger" role="alert">';
                    echo  $mensaje;
                    echo '</div>';
                } ?>
                <form method="POST" action="">
                    <div>
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre"  class="form-control">
                    </div>
                    <div>
                        <label for="txtCorreo">Clave:</label>
                        <input type="password" name="txtClave" id="txtClave"  class="form-control">
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>