<?php

if ($_POST) { /* Es postback? */
    //print_r($_POST); //Imprime los datos del submit del formulario
    //print_r($_GET); //Imprime los datos de la query string
    //print_r($_REQUEST);

    $usuario = $_REQUEST["txtUsuario"];
    $clave = $_REQUEST["txtClave"];

    header("Location: https://google.com.ar");

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    <div>
                        <label>Usuario: <input type="text" name="txtUsuario" id="txtUsuario" class="form-control"></label>
                    </div>
                    <div>
                        <label>Clave: <input type="password" name="txtClave" id="txtClave" class="form-control"></label>
                    </div>
                    <div>
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
