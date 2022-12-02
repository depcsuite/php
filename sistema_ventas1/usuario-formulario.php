<?php

include_once "config.php";
include_once "entidades/usuario.php";
$pg = "Usuario";


$usuario = new Usuario();
$usuario->cargarFormulario($_REQUEST);

if ($_POST) {
    if (isset($_REQUEST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $usuario->actualizar();
            $msg["texto"] = "Actualizado correctamente.";
        } else {
            try{
                $usuario->insertar();
                $msg["texto"] = "Insertado correctamente.";
            } catch(Exception $ex) {
                echo $ex->getMessage();
            }
        }

        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        $usuario->eliminar();
        header("Location: venta-listado.php");
    }
}

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $usuario->obtenerPorId();
}

include_once "header.php";
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Usuario</h1>
             <div class="row">
                <div class="col-12 mb-3">
                    <a href="usuario-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="usuario-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtUsuario">Usuario:</label>
                    <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" required value="<?php echo $usuario->usuario; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtNombre"">Nombre:</label>
                    <input type="text" id="txtNombre" name="txtNombre" class="form-control" required value="<?php echo $usuario->nombre; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtTotal">Apellido:</label>
                    <input type="text" id="txtApellido" name="txtApellido" class="form-control" required value="<?php echo $usuario->apellido; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtTotal">Correo:</label>
                    <input type="email" id="txtCorreo" name="txtCorreo" class="form-control" required value="<?php echo $usuario->correo; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtTotal">Clave:</label>
                    <input type="password" id="txtClave" name="txtClave" class="form-control">
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>