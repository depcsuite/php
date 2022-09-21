
<?php

include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/venta.php";
include_once "entidades/provincia.php";
include_once "entidades/localidad.php";

$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);

$pg = "Listado de clientes";

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $cliente->actualizar();
        } else {
            //Es nuevo
            $cliente->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        //Si existen ventas asociadas al cliente que se intenta eliminar, muestra mensaje de alerta
        $venta = new Venta();
        if ($venta->obtenerVentasPorCliente($cliente->idcliente)) {
            $msg["texto"] = "No se puede eliminar un cliente con ventas asociadas.";
            $msg["codigo"] = "alert-danger";
        } else {
            $cliente->eliminar();
            header("Location: cliente-listado.php");
        }
    }
}

if (isset($_GET["do"]) && $_GET["do"] == "buscarLocalidad" && $_GET["id"] && $_GET["id"] > 0) {
    $idProvincia = $_GET["id"];
    $localidad = new Localidad();
    $aLocalidad = $localidad->obtenerPorProvincia($idProvincia);
    echo json_encode($aLocalidad);
    exit;
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $cliente->obtenerPorId();
}

$provincia = new Provincia();
$aProvincias = $provincia->obtenerTodos();

include_once "header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Cliente</h1>
          <?php if (isset($msg)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="cliente-listado.php" class="btn btn-primary mr-2">Listado</a>
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
            <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Domicilios
                    </div>
                    <div class="row panel-body p-3">
                        <div class="col-6 form-group">
                            <label for="txtTelefono">Provincia:</label>
                            <select class="form-control" name="lstProvincia" id="lstProvincia" onchange="fBuscarLocalidad()" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <?php foreach ($aProvincias as $provincia): ?>
                                    <?php if ($cliente->fk_idprovincia == $provincia->idprovincia): ?>
                                        <option selected value="<?php echo $provincia->idprovincia; ?>"><?php echo $provincia->nombre; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $provincia->idprovincia; ?>"><?php echo $provincia->nombre; ?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-6 form-group">
                            <label for="txtTelefono">Localidad:</label>
                            <select class="form-control" name="lstLocalidad" id="lstLocalidad" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="1">CABA</option>
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <label for="txtTelefono">Dirección:</label>
                            <input type="text" class="form-control" name="txtDomicilio" id="txtDomicilio" value="<?php echo $cliente->domicilio ?>">
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>
$(document).ready( function () {
    var idCliente = '<?php echo isset($cliente) && $cliente->idcliente > 0 ? $cliente->idcliente : 0 ?>';

} );

 function fBuscarLocalidad(){
            idProvincia = $("#lstProvincia option:selected").val();
            $.ajax({
                type: "GET",
                url: "cliente-formulario.php?do=buscarLocalidad",
                data: { id:idProvincia },
                async: true,
                dataType: "json",
                success: function (respuesta) {
                    let resultado = "<option value='0' disabled selected>Seleccionar</option>";
                    respuesta.forEach(function(valor, indice){
                        resultado += `<option value="${valor.idlocalidad}">${valor.nombre}</option>`;
                    });
                  $("#lstLocalidad").empty().append(resultado);
                }
            });
        }

</script>
<?php include_once "footer.php";?>