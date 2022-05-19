<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);


//Si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
//los DNIs permitidos

//Sino el array queda como un array vacio


if($_POST){

    if(isset($_POST["btnProcesar"])){
        //Si el DNI ingresado se encuentra en la lista se mostrará un mensaje de bienvenido

        //Sino un mensaje de No se encuentra en la lista de invitados.
    }

    if(isset($_POST["btnVip"])){
        //Si el codigo es verde entonces mostrará Su código de acceso es ....

        //Sino Ud. no tiene pase VIP
    }

}



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
            <h1>Lista de invitados</h1>
        </div>
        <?php if (isset($aMensaje)): ?>
        <div class="col-12">
            <div class="alert alert-<?php echo $aMensaje["estado"]; ?>" role="alert">
                <?php echo $aMensaje["texto"]; ?>
            </div>
        </div>
        <?php endif;?>
        <div class="col-12">
            <p>Complete el siguiente formulario:</p>
        </div>
        <div class="col-6">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-12">
                        <p>Ingrese el DNI:<p><input type="text" name="txtNombre" class="form-control">
                        <input type="submit" name="btnProcesar" value="Verificar invitado" class="btn-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="12-col bm-3">
                        <p>Ingresa el código secreto para el pase VIP:<p>
                        <input type="text" name="txtPregunta" class="form-control">
                        <input type="submit" name="btnVip" value="Verificar código" class="btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
	</main>
</body>
</html>