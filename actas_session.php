<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

function promediar($aNotas){
    $suma=0;
    foreach ($aNotas as $nota){
       $suma+=$nota;
    }
    return $suma/count($aNotas);
}


if (isset($_SESSION["listadoAlumnos"]) && count($_SESSION["listadoAlumnos"]) > 0 ){
    $aAlumnos = $_SESSION["listadoAlumnos"];
}   else{
    $aAlumnos= array();
}

if ($_POST) {
    if (isset($_POST["btnEnviar"])) {
        $nombre = trim($_POST["txtNombre"]);
        $nota1 = trim($_POST["txtNota1"]);
        $nota2 = trim($_POST["txtNota2"]);
        $aAlumnos[] = ["nombre" => $nombre, "aNotas" => [$nota1, $nota2]];
        $_SESSION["listadoAlumnos"] = $aAlumnos;
    }
}

if (isset($_GET["pos"]) && $_GET["pos"]>= 0) {
    $pos = $_GET["pos"];
    unset($aAlumnos[$pos]);
    $_SESSION["listadoAlumnos"] = $aAlumnos;
    header("Location: actas_session.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Acta de Notas</title>
</head>
<body>
    <main class="container my-5">
        <div class="row">
            <div class="mb-5 text-center col-12">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table border table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Alumno </th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Promedio</th>
                        <th>Acciones</th>
                    </tr>
                    <?php 
                    $sumaPromedios = 0;
                    foreach ($aAlumnos as $pos=>$alumno){
                        $promedio = promediar($alumno["aNotas"]);?>
                        <tr> 
                            <td> <?php echo $pos +1; ?> </td>
                            <td> <?php echo $alumno["nombre"]; ?> </td>
                            <td> <?php echo $alumno["aNotas"][0]; ?> </td>
                            <td> <?php echo $alumno["aNotas"][1]; ?> </td>
                            <td> <?php echo $promedio;?> </td>
                            <td> <a href="?pos=<?php echo $pos; ?>" >Eliminar</a></td>
                        </tr>
                    <?php $sumaPromedios += $promedio;
                    } ?>
                </table>
            </div>
            <div class="col-12">
                <form action="" method="post">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" placeholder="Nombre y Apellido" name="txtNombre" id="txtNombre">
                    <label for="txtNota1">Nota 1: </label>
                    <input type="num" placeholder="9.99" name="txtNota1" id="txtNota1">
                    <label for="txtNota2">Nota 2: </label>
                    <input type="num" placeholder="9.99" name="txtNota2" id="txtNota2">
                    <button class="btn btn-primary" name=btnEnviar type="submit">Añadir</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-6 my-5">
                <h5>El promedio de la clase es: <?php echo count($aAlumnos) > 0? number_format($sumaPromedios/count($aAlumnos)+1,2,".",","): 0; ?> </h5>
            </div>
        </div>
    </main>
</body>
</html>