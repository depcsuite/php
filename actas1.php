<?php

$aAlumnos = array();
$aAlumnos[] = array("nombre" => "Ana Valle", "notas" => array(7, 8));
$aAlumnos[] = array("nombre" => "Bernabe Paz", "notas" => array(5, 7));
$aAlumnos[] = array("nombre" => "Sebastian Aguirre", "notas" => array(6, 9));
$aAlumnos[] = array("nombre" => "Monica Ledesma", "notas" => array(8, 9));

function promediar($aNumeros)
{
    $sumatoria = 0;
    foreach ($aNumeros as $numero) {
        $sumatoria = $sumatoria + $numero;
    }
    return $sumatoria / count($aNumeros);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="py-5">Actas</h1>
            </div>            
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>Alumno</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Promedio</th>
                    </tr>
                    <?php 
                    $promedioCursada = 0;
                    $sumatoria = 0;

                    foreach ($aAlumnos as $alumno): 
                        $promedio = promediar($alumno["notas"]);
                        $sumatoria = $sumatoria + $promedio;
                    ?>
                        <tr>
                            <td><?php echo $alumno["nombre"]; ?></td>
                            <td><?php echo $alumno["notas"][0]; ?></td>
                            <td><?php echo $alumno["notas"][1]; ?></td>
                            <td><?php echo number_format($promedio, 2, ",", "."); ?></td>
                        </tr>
                    <?php 
                         
                    endforeach; 
                    $promedioCursada = $sumatoria / count($aAlumnos);
                    ?>
                </table>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Promedio de la cursada: <?php echo number_format($promedioCursada, 2, ",", "."); ?> </p>
                </div>
            </div>

        </div>
    </main>
    
</body>
</html>