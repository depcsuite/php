<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){

    //Recuperar el usuario y clave y almacenarlo en variables
    $usuario = $_REQUEST["txtUsuario"];
    $clave = $_REQUEST["txtClave"];

    //Si usuario es distinto de vacio Y clave es distinto de vacio, entonces:
    if($usuario != "" && $clave != ""){
        //Redireccionar a acceso confirmado
        header("Location: acceso-confirmado.php");
    } else {
        //Mostrar un mensaje de error: Válido para usuarios registrados
        $error = 'Solo válido para usuarios registrados';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12"> 
           <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
                <form method="POST" action="">
                    <div class="my-3">
                        <label for="">Usuario: <input type="text" id="txtUsuario" name="txtUsuario" class="form-control"></label>
                    </div>
                    <div class="my-3">
                        <label for="">Clave: <input type="password" id="txtClave" name="txtClave" class="form-control"></label>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-primary" type="submit">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
