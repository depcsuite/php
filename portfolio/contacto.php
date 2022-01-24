<?php

$pg = "contacto";

if($_POST){
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $telefono = $_POST["txtTelefono"];
    $mensaje = $_POST["txtMensaje"];

    // Varios destinatarios
    $para = "nelson.tarche@gmail.com";
    $titulo = 'Recibiste un mensaje desde tu Web';

    // mensaje
    $cuerpo = "
    Nombre: $nombre <br>
    Correo: $correo <br>
    Telefono: $telefono <br>
    Mensaje: $mensaje
    ";

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'To: nelson.tarche@gmail.com' . "\r\n";
    $cabeceras .= 'From: contacto@nelsontarche.com.ar' . "\r\n";

    // Enviarlo
    mail($para, $titulo, $cuerpo, $cabeceras);
    header("Location: confirmacion-envio.php");
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Contacto</title>
</head>

<body id="contacto">
    <?php include_once "header.php"; ?>
    <main class="container">
        <div class="row">
            <div class="col-12 mt-3 mb-5">
                <h1>Contacto</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-12">
                <p>Te invito a que te contactes enviándome un mensaje o bien por whatsapp.</p>
            </div>
            <div class="col-sm-6 col-12">
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre"
                            class="form-control shadow">
                    </div>
                    <div class="mb-3">
                        <input type="email" id="txtCorreo" name="txtCorreo" placeholder="Correo"
                            class="form-control shadow">
                    </div>
                    <div class="mb-3">
                        <input type="tel" name="txtTelefono" id="txtTelefono" placeholder="Teléfono/Whatsapp"
                            class="form-control shadow">
                    </div>
                    <div class="mb-3">
                        <textarea name="txtMensaje" id="txtMensaje" placeholder="Escribe aquí tu mensaje"
                            class="form-control shadow"></textarea>
                    </div>
                    <div class="me-auto text-right">
                        <button id="btnEnviar" name="btnEnviar" class="btn px-4">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include_once "footer.php";?>
</body>

</html>