<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición de array de alumnos
$aAlumnos = array();
$aAlumnos[] = array("nombre" => "Juan Perez", "aNotas" => array(9, 8));
$aAlumnos[] = array("nombre" => "Ana Valle", "aNotas" => array(4, 9));
$aAlumnos[] = array("nombre" => "Gonzalo Roldán", "aNotas" => array(7, 6));

function promediar($aNumeros){
    $suma = 0;
    $resultado = 0;
    foreach($aNumeros as $numero){
        $suma += $numero;
    }
    return $suma / count($aNumeros);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 my-3 text-center">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $pos = 0;
                    $sumPromedios = 0;
                    foreach ($aAlumnos as $alumno): 
                        $pos++;
                        $promedio = promediar($alumno["aNotas"]);
                        $sumPromedios += $promedio;
                    ?>
                        <tr>
                            <td><?php echo $pos; ?></td>
                            <td><?php echo $alumno["nombre"]; ?></td>
                            <td><?php echo $alumno["aNotas"][0]; ?></td>
                            <td><?php echo $alumno["aNotas"][1]; ?></td>
                            <td><?php echo number_format($promedio, 2, ",", "."); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-3">
                <h5>Promedio de la cursada: <?php echo number_format($sumPromedios / count($aAlumnos), 2, ",", "."); ?></h5>
            </div>
        </div>
    </main>
</body>
</html>