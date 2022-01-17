<?php
//Definicion de pacientes
$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.50,
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79,
);
$aPacientes[] = array(
    "dni" => "11.568.778",
    "nombre" => "Martín Perez",
    "edad" => 26,
    "peso" => 77,
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-12 py-3 text-center">
            <h1>Listado de pacientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <tr>
                    <th>DNI</th>
                    <th>Nombre y apellido</th>
                    <th>Edad</th>
                    <th>Peso</th>
                </tr>
                <?php foreach ($aPacientes as $paciente) { ?>
                <tr>
                    <td><?php echo $paciente["dni"];  ?></td>
                    <td><?php echo $paciente["nombre"];  ?></td>
                    <td><?php echo $paciente["edad"];  ?></td>
                    <td><?php echo $paciente["peso"];  ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </div>
</body>
</html>