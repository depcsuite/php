
<?php

if ($_POST) {
    if (isset($_REQUEST['btnProcesar'])) {
        $nombre = $_REQUEST['nombre'];
        if ($nombre == "maca") {
            $mensaje = "$nombre ,bienvenida a la fiesta formidable.";
        } else if ($nombre == "cande") {
            $mensaje = "$nombre ,adelante puede pasar";
        } else if ($nombre == "nico") {
            $mensaje = "$nombre ,pase usted que es el organizador de la fiesta don";
        } else {
			$mensaje = "Usted no se encuentra en la lista.";
		}
    } else if(isset($_REQUEST['btnPregunta'])) {
        $pregunta = $_REQUEST['pregunta'];

        if ($pregunta == "verde") {
            $respuesta = " aqui tiene su pulsera";
        } else {
            $respuesta = " usted no es invitado premium";
        }
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
    <title>isset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<main class="container">
        <div class="row">
            <div class="12-col bm-3">
					<h1>La fiesta</h1>
					<p>Complete el siguiente formularo:</p>
            </div>
			<div class="col-12">
				<form method="POST" action="">
					<p>Nombre:<p><input type="text" name="nombre"><br><br>
					<input type="submit" name="btnProcesar" value="Procesar" class="btn-primary">
					<?php echo isset($mensaje) ? $mensaje : ""; ?>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="12-col bm-3">
				<form method="POST" action="">
					<p>Pregunta: tenes el pase premium?<p><input type="text" name="pregunta"><br><br>
					<input type="submit" name="btnPregunta" value="Procesar" class="btn-primary">
					<?php echo isset($respuesta) ? $respuesta : ""; ?>
				</form>
			</div>
		</div>
	</main>
</body>
</html>