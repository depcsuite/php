<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Si existe el archivo.txt lo abro y genero el array aTareas
if (file_exists("archivo.txt")) {
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else {
    //Crear el array aTareas como un array vacío
    $aTareas = array();
}

$id = isset($_GET["id"]) && $_GET["id"] >= 0 ? $_GET["id"] : "";

if ($_POST) {
    //Recupero los datos del formulario y alamceno en variables
    $titulo = trim($_POST["txtTitulo"]);
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $descripcion = trim($_POST["txtDescripcion"]);

    //Si viene el ID y es >= que 0 estoy actualizando, entonces
    //sobreescribo la posición correspondiente en el aTareas
    if ($id >= 0) {
        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion,
        );
    } else {
        //Sino es una nueva tarea
        //Almaceno los datos en el array aTareas
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion,
        );
    }

    //Convertir aTareas en json
    $strJson = json_encode($aTareas);

    //Almacenar el json en el archivo.txt
    file_put_contents("archivo.txt", $strJson);

}

if (isset($_GET["eliminar"]) && $_GET["eliminar"] >= 0) {
    //Eliminar de aTareas la posicion indicada en la url, es decir en get
    $id = $_GET["eliminar"];

    unset($aTareas[$id]);

    //Convertir el array de aTareas en json
    $strjson = json_encode($aTareas);

    //Almacenar el json en el archivo.txt
    file_put_contents("archivo.txt", $strjson);

    //Redireccionar a index.php para limpiar la URL
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <form action="" method="POST">
        <div class="row">
            <div class="col-4 pb-2">
                <label for="lstPrioridad">Prioridad</label>
                <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : ""; ?> value="Alta">Alta</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["prioridad"] == "Media" ? "selected" : ""; ?>value="Media">Media</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["prioridad"] == "Baja" ? "selected" : ""; ?>value="Baja">Baja</option>
                </select>
            </div>
            <div class="col-4">
                <label for="lstUsuario">Usuario</label>
                <select name="lstUsuario" id="lstUsuario" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["usuario"] == "Ana" ? "selected" : ""; ?> value="Ana">Ana</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["usuario"] == "Bernabe" ? "selected" : ""; ?> value="Bernabe">Bernabe</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["usuario"] == "Daniela" ? "selected" : ""; ?> value="Daniela">Daniela</option>
                </select>
            </div>
            <div class="col-4">
                <label for="lstEstado">Estado</label>
                <select name="lstEstado" id="lstEstado" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["estado"] == "Asignado" ? "selected" : "" ?> value="Asignado">Asignado</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["estado"] == "Sin asignar" ? "selected" : "" ?> value="Sin asignar">Sin asignar</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["estado"] == "En proceso" ? "selected" : "" ?> value="En proceso">En proceso</option>
                    <option <?php echo $id >= 0 && $aTareas[$id]["estado"] == "Terminado" ? "selected" : "" ?> value="Terminado">Terminado</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pb-2">
                <label for="txtTitulo">Título</label>
                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?php echo $id >= 0 ? $aTareas[$id]["titulo"] : ""; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-12 pb-2">
                <label for="">Descripción</label>
                <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"><?php echo $id >= 0 ? $aTareas[$id]["descripcion"] : ""; ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary">ENVIAR</button>
                <a href="index.php" class="btn btn-secondary">CANCELAR</a>
            </div>
        </div>
        </form>
        <?php if (count($aTareas) > 0): ?>
        <div class="row">
            <div class="col-12 pt-4">
                <table class="table table-hover border">
                    <tr>
                        <th>ID</th>
                        <th>Fecha de inserción</th>
                        <th>Título</th>
                        <th>Prioridad</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach ($aTareas as $id => $tarea) {?>
                        <tr>
                            <td><?php echo ($id + 1) ?></td>
                            <td><?php echo $tarea["fecha"]; ?></td>
                            <td><?php echo $tarea["titulo"]; ?></td>
                            <td><?php echo $tarea["prioridad"]; ?></td>
                            <td><?php echo $tarea["usuario"]; ?></td>
                            <td><?php echo $tarea["estado"]; ?></td>
                            <td>
                                <a href="?id=<?php echo $id; ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="?eliminar=<?php echo $id; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php }?>
                </table>
            </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif;?>
    </main>
</body>
</html>