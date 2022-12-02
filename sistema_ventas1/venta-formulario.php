<?php

use PhpParser\Node\Stmt\TryCatch;

include_once "config.php";
include_once "entidades/venta.php";
include_once "entidades/producto.php";
include_once "entidades/cliente.php";

$pg = "Ventas";

$venta = new Venta();
$venta->cargarFormulario($_REQUEST);

if ($_POST) {
    if (isset($_REQUEST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $venta->actualizar();
            $msg["texto"] = "Actualizado correctamente.";
        } else {
            try{
                $venta->insertar();
                $msg["texto"] = "Insertado correctamente.";
            } catch(Exception $ex) {
                echo $ex->getMessage();
            }
        }

        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        $venta->eliminar();
        header("Location: venta-listado.php");
    }
}

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $venta->obtenerPorId();
}

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

include_once "header.php";
?>
<style>
.select-chico{
    width: 100px;
}
.input-mediano{
    width: 150px;
}

</style>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Venta</h1>
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
                    <a href="venta-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="lstDia" class="d-block">Fecha y hora:</label>
                    <select name="lstDia" id="lstDia" class="form-control d-inline select-chico" required>
                        <option value="" option selected>DD</option>
                        <?php for($i=1; $i <= 31; $i++){ ?>
                            <?php if($i == date_format(date_create($venta->fecha), "d")): ?>
                                <option selected value="<?php echo $i;?>"><?php echo $i; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                            <?php endif; ?>
                        <?php } ?>
                    </select>
                    <select name="lstMes" id="lstMes" class="form-control d-inline select-chico" required>
                        <option value="" option selected>MM</option>
                        <?php for ($i = 1; $i <= 12; $i++) {?>
                            <?php if ($i == date_format(date_create($venta->fecha), "m")): ?>
                                <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php }?>
                    </select>
                    <select name="lstAnio" id="lstAnio" class="form-control d-inline select-chico" required>
                        <option value="" option selected>YYYY</option>
                        <?php for ($i = 2022; $i <= date("Y")+1; $i++) {?>
                            <?php if ($i == date_format(date_create($venta->fecha), "Y")): ?>
                                <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php }?>
                    </select>
                    <input type="time" name="txtHora" id="txtHora" class="form-control d-inline input-mediano" required value="<?php echo date_format(date_create($venta->fecha), "H:m"); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="lstCliente" class="d-block">Cliente:</label>
                    <select name="lstCliente" id="lstCliente" class="form-control" required>
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
                    <label for="lstProducto" class="d-block">Producto:</label>
                    <select name="lstProducto" id="lstProducto" class="form-control" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <?php foreach ($aProductos as $producto): ?>
                            <?php if ($producto->idproducto == $venta->fk_idproducto): ?>
                                <option selected value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                            <?php else: ?>
                                  <option value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecioUni" class="d-block">Precio unitario:</label>
                    <input type="text" id="txtPrecioUni" name="txtPrecioUni" class="form-control" required value="<?php echo $venta->preciounitario; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCantidad" class="d-block">Cantidad:</label>
                    <input type="number" id="txtCantidad" name="txtCantidad" class="form-control" required value="<?php echo $venta->cantidad; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtTotal" class="d-block">Total:</label>
                    <input type="text" id="txtTotal" name="txtTotal" class="form-control" required value="<?php echo $venta->total; ?>">
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>