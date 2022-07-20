<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){ /*Pregunta si el usuario envió datos en el formulario, es el evento postback*/

    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];

    if($usuario == "admin" && $clave == "123456"){
        header("Location: https://google.com");
    } else {
        $msg = "Usuario o clave incorrecto";
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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de ingreso</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?php if(isset($msg)){
                    echo $msg;
                }
                ?>
                <form method="POST" action="">
                    <div class="pb-3">
                        <label for="">Usuario</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Clave</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control">
                    </div>
                    <div class="pb-3">
                        <button type="submit" name="btnIngresar" class="btn btn-primary">INGRESAR</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
    
</body>
</html>