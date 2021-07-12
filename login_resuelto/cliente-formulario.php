
<?php

include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/provincia.entidad.php";
include_once "entidades/localidad.entidad.php";

$pg = "Edición de cliente";

$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);

if($_POST){

    if(isset($_POST["btnGuardar"])){
        if(isset($_GET["id"]) && $_GET["id"] > 0){
              //Actualizo un cliente existente
              $cliente->actualizar();
        } else {
            //Es nuevo
            $cliente->insertar();
        }
        if(isset($_POST["txtTipo"])){
            $domicilio = new Domicilio();
            $domicilio->eliminarPorCliente($cliente->idcliente);
            for($i=0; $i < count($_POST["txtTipo"]); $i++){
                $domicilio->fk_idcliente = $cliente->idcliente; 
                $domicilio->fk_tipo = $_POST["txtTipo"][$i];
                $domicilio->fk_idlocalidad =  $_POST["txtLocalidad"][$i];
                $domicilio->domicilio = $_POST["txtDomicilio"][$i];
                $domicilio->insertar();
            }
        }
    } else if(isset($_POST["btnBorrar"])){
        $domicilio = new Domicilio();
        $domicilio->eliminarPorCliente($cliente->idcliente);
        $cliente->eliminar();
        header("Location: clientes.php");
    }
} 

if(isset($_GET["do"]) && $_GET["do"] == "buscarLocalidad" && $_GET["id"] && $_GET["id"] > 0){
    $idProvincia = $_GET["id"];
    $localidad = new Localidad();
    $aLocalidad = $localidad->obtenerPorProvincia($idProvincia);
    echo json_encode($aLocalidad);
    exit;
} else if(isset($_GET["id"]) && $_GET["id"] > 0){
    $cliente->obtenerPorId();

}

 if(isset($_GET["do"]) && $_GET["do"] == "cargarGrilla"){
        $idCliente = $_GET['idCliente'];
        $request = $_REQUEST;

        $entidad = new Domicilio();
        $aDomicilio = $entidad->obtenerFiltrado($idCliente);

        $data = array();

        if (count($aDomicilio) > 0)
            $cont=0;
            for ($i=0; $i < count($aDomicilio); $i++) {
                $row = array();
                $row[] = $aDomicilio[$i]->tipo;
                $row[] = $aDomicilio[$i]->provincia;
                $row[] = $aDomicilio[$i]->localidad;
                $row[] = $aDomicilio[$i]->domicilio;
                $cont++;
                $data[] = $row;
            }

        $json_data = array(
            "draw" => isset($request['draw'])?intval($request['draw']):0,
            "recordsTotal" => count($aDomicilio), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aDomicilio),//cantidad total de registros en la paginacion
            "data" => $data
        );
        echo json_encode($json_data);
        exit;
    }


$provincia = new Provincia();
$aProvincias = $provincia->obtenerTodos();


include_once("header.php"); 
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
                        <?php for($i=1; $i <= 31; $i++): ?>
                            <?php if($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "d")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control d-inline"  name="txtMesNac" id="txtMesNac" style="width: 80px">
                        <option selected="" disabled="">MM</option>
                        <?php for($i=1; $i <= 12; $i++): ?>
                            <?php if($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "m")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control d-inline"  name="txtAnioNac" id="txtAnioNac" style="width: 100px">
                        <option selected="" disabled="">YYYY</option>
                        <?php for($i=1900; $i <= date("Y"); $i++): ?>
                         <?php if($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "Y")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif; ?>
                        <?php endfor; ?> ?>
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
$(document).ready( function () {
    var idCliente = '<?php echo isset($cliente) && $cliente->idcliente > 0? $cliente->idcliente : 0 ?>';

   var dataTable = $('#grilla').DataTable({
        "processing": true,
        "serverSide": false,
        "bFilter": false,
        "bInfo": true,
        "bSearchable": false,
        "paging": false,
        "pageLength": 25,
        "order": [[ 0, "asc" ]],
        "ajax": "cliente-formulario.php?do=cargarGrilla&idCliente=" + idCliente
    });
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
                  let opciones = "<option value='0' disabled selected>Seleccionar</option>";
                  const resultado = respuesta.reduce(function(acumulador, valor){
                        const {nombre,idlocalidad} = valor;
                        return acumulador + `<option value="${idlocalidad}">${nombre}</option>`;
                  }, opciones);
                  $("#lstLocalidad").empty().append(resultado);
                }
            });
        }

</script>
<?php include_once("footer.php"); ?>