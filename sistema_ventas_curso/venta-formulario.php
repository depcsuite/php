<?php

include_once "config.php";
include_once "entidades/venta.php";
include_once "entidades/cliente.php";
include_once "entidades/producto.php";

$pg = "Edición de venta";

$venta = new Venta();
$venta->cargarFormulario($_REQUEST);

if($_POST){
    if(isset($_POST["btnGuardar"])){
        if(isset($_GET["id"]) && $_GET["id"] > 0){
              //Actualizo un cliente existente
              $venta->actualizar();
        } else {
            //Es nuevo
            $producto = new Producto();
            $producto->idproducto = $venta->fk_idproducto;
            $producto->obtenerPorId();
            if($venta->cantidad <= $producto->cantidad){
                $total = $venta->cantidad * $producto->precio;
                $venta->total = $total;
                $venta->insertar();

                $producto->cantidad -= $venta->cantidad;
                $producto->actualizar();
            } else {
                $msg = "No hay stock suficiente";
            }
        }
    } else if(isset($_POST["btnBorrar"])){
        $venta->eliminar();
        header("Location: ventas.php");
    }
} 

if(isset($_GET["id"]) && $_GET["id"] > 0){
    $venta->obtenerPorId();
}

if(isset($_GET["do"]) && $_GET["do"] == "buscarProducto"){
    $aResultado = array();
    $idProducto = $_GET["id"];
    $producto = new Producto();
    $producto->idproducto = $idProducto;
    $producto->obtenerPorId();
    $aResultado["precio"] = $producto->precio;
    $aResultado["cantidad"] = $producto->cantidad;

    echo json_encode($aResultado);
    exit;
}

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

include_once("header.php"); 
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Venta</h1>
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="ventas.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <?php if(isset($msg) && $msg != ""): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                    <label for="txtFechaNac" class="d-block">Fecha y hora:</label>
                    <select class="form-control d-inline" name="txtDia" id="txtDia" style="width: 80px">
                        <option selected="" disabled="">DD</option>
                        <?php for($i=1; $i <= 31; $i++): ?>
                            <?php if($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "d")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control d-inline" name="txtMes" id="txtMes" style="width: 80px">
                        <?php for($i=1; $i <= 12; $i++): ?>
                            <?php if($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "m")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control d-inline" name="txtAnio" id="txtAnio" style="width: 100px">
                        <option selected="" disabled="">YYYY</option>
                        <?php for($i=1900; $i <= date("Y"); $i++): ?>
                         <?php if($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "Y")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif; ?>
                        <?php endfor; ?> ?>
                    </select>
                    <?php if($venta->fecha == ""): ?>
                    <input type="time" required="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora" value="00:00">
                    <?php else: ?>
                    <input type="time" required="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora" value="<?php echo date_format(date_create($venta->fecha), "H:i"); ?>">
                    <?php endif; ?>
                </div>
                <div class="col-6 form-group">
                    <label for="lstCliente">Cliente:</label>
                    <select required="" class="form-control selectpicker" data-live-search="true" name="lstCliente" id="lstCliente">
                        <option value="" disabled selected>Seleccionar</option>
                        <?php foreach($aClientes as $cliente): ?>
                            <?php if($cliente->idcliente == $venta->fk_idcliente): ?>
                                <option selected value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="lstProducto">Producto:</label>
                    <select required="" class="form-control selectpicker" data-live-search="true" name="lstProducto" id="lstProducto" onchange="fBuscarPrecio();">
                        <option value="" disabled selected>Seleccionar</option>
                        <?php foreach($aProductos as $producto): ?>
                            <?php if($producto->idproducto == $venta->fk_idproducto): ?>
                                <option selected value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecioUni">Precio unitario:</label>
                    <input type="text" class="form-control" id="txtPrecioUniCurrency" value="$ <?php echo $venta->preciounitario; ?>" disabled>
                    <input type="hidden" class="form-control" name="txtPrecioUni" id="txtPrecioUni" value="<?php echo $venta->preciounitario; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCantidad">Cantidad:</label>
                    <input type="text" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $venta->cantidad; ?>" onchange="fCalcularTotal();">
                    <span id="msgStock" class="text-danger" style="display:none;">No hay stock suficiente</span>
                </div>
                <div class="col-6 form-group">
                    <label for="txtTotal">Total:</label>
                    <input type="text" class="form-control" name="txtTotal" id="txtTotal" value="<?php echo $venta->total; ?>">
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>

function fBuscarPrecio(){
    let idProducto = $("#lstProducto option:selected").val();
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

}

function fCalcularTotal(){
    var idProducto = $("#lstProducto option:selected").val();
    var precio = parseFloat($('#txtPrecioUni').val());
    var cantidad = parseInt($('#txtCantidad').val());

     $.ajax({
        type: "GET",
        url: "venta-formulario.php?do=buscarProducto",
        data: { id:idProducto },
        async: true,
        dataType: "json",
        success: function (respuesta) {
            let resultado = 0;
            if(cantidad <= parseInt(respuesta.cantidad)){
                resultado = precio * cantidad;
                 $("#msgStock").hide();
            } else {
                $("#msgStock").show();
            }
            strResultado = Intl.NumberFormat("es-AR", {style: 'currency', currency: 'ARS'}).format(resultado);
            $("#txtTotal").val(strResultado);
        }
    });   
} 


</script>
<?php include_once("footer.php"); ?>