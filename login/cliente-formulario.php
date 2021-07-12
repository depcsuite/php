
<?php
include_once "config.php";
include_once "entidades/cliente.php";

$pg = "Edición de cliente";

$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);

if ($_POST) {

    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $cliente->actualizar();
        } else {
            //Es nuevo
            $cliente->insertar();
        }
    } else if (isset($_POST["btnBorrar"])) {
        $cliente->eliminar();
        header("Location: clientes-listado.php");
    }
}

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $cliente->obtenerPorId();
}

include_once "header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Cliente</h1>
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="clientes.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $cliente->nombre ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCuit">CUIT:</label>
                    <input type="text" required class="form-control" name="txtCuit" id="txtCuit" value="<?php echo $cliente->cuit ?>" maxlength="11">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCorreo">Correo:</label>
                    <input type="" class="form-control" name="txtCorreo" id="txtCorreo" required value="<?php echo $cliente->correo ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtTelefono">Teléfono:</label>
                    <input type="number" class="form-control" name="txtTelefono" id="txtTelefono" value="<?php echo $cliente->telefono ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtFechaNac" class="d-block">Fecha de nacimiento:</label>
                    <select class="form-control d-inline"  name="txtDiaNac" id="txtDiaNac" style="width: 80px">
                        <option selected="" disabled="">DD</option>
                        <?php for ($i = 1; $i <= 31; $i++): ?>
                            <?php if ($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "d")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php endfor;?>
                    </select>
                    <select class="form-control d-inline"  name="txtMesNac" id="txtMesNac" style="width: 80px">
                        <option selected="" disabled="">MM</option>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <?php if ($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "m")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php endfor;?>
                    </select>
                    <select class="form-control d-inline"  name="txtAnioNac" id="txtAnioNac" style="width: 100px">
                        <option selected="" disabled="">YYYY</option>
                        <?php for ($i = 1900; $i <= date("Y"); $i++): ?>
                         <?php if ($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "Y")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php endfor;?> ?>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Domicilios
                    </div>
                    <div class="panel-body">
                        <div class="col-6 form-group">
                            <label for="txtTelefono">Provincia:</label>
                            <select class="form-control" name="lstProvincia" id="lstProvincia">
                        </div>
                        <div class="col-6 form-group">
                            <label for="txtTelefono">Localidad:</label>
                            <select class="form-control" name="lstLocalidad" id="lstLocalidad">
                        </div>
                        <div class="col-12 form-group">
                            <label for="txtTelefono">Dirección:</label>
                            <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" value="<?php echo $cliente->direccion ?>">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>

window.onload = function () {

    $("#txtCantidad").change(function() {
        let total = $("#txtPrecioUni").val() * $("#txtCantidad").val()
        $("#txtTotal").val(total);
    });

    $("#lstProducto").change(function(){
        idProducto = $("#lstProducto option:selected").val();
         $.ajax({
            type: "GET",
            url: "venta-formulario.php?do=buscarProducto",
            data: { id:idProducto },
            async: true,
            dataType: "json",
            success: function (respuesta) {
                strResultado = Intl.NumberFormat("es-AR", {style: 'currency', currency: 'ARS'}).format(respuesta.precio);
                $("#txtPrecioUniCurrency").val(strResultado);
                $("#txtPrecioUni").val(respuesta.precio);
            }
        });
    });
};

</script>
<?php include_once "footer.php";?>