<?php
$nombre = "Nelson";
$edad = 34;
$fecha = date("d/m/Y");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Ficha personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tbody>
                        <tr>
                            <th>Fecha:</th>
                            <td><?php echo $fecha; ?></td>
                        </tr>
                        <tr>
                            <th>Nombre y apellido:</th>
                            <td><?php echo $nombre; ?></td>
                        </tr>
                        <tr>
                            <th>Edad:</th>
                            <td><?php echo $edad; ?></td>
                        </tr>
                        <tr>
                            <th>Películas favoritas</th>
                            <td>Volver al futuro<br>
                                Titanic<br>
                                El despues de mañana
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>