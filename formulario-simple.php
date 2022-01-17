<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){
    $nombre = $_REQUEST["txtNombre"];
    $correo = $_REQUEST["txtCorreo"];
    $mensaje = "Su nombre es $nombre y su correo es $correo";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Ejemplo de formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="">
                    <div>
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div>
                        <label for="txtCorreo">Correo</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary my-3">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if(isset($mensaje)){ ?>
        <div class="row">
            <div class="col-12">
                <?php echo $mensaje; ?>
            </div>
        </div>
        <?php } ?>
    </main>
</body>
</html>