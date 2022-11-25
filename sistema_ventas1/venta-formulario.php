<?php

include_once "config.php";
$pg = "Ventas";

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
                            <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="lstMes" id="lstDia" class="form-control d-inline select-chico" required>
                        <option value="" option selected>MM</option>
                        <?php for ($i = 1; $i <= 12; $i++) {?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }?>
                    </select>
                    <select name="lstAnio" id="lstAnio" class="form-control d-inline select-chico" required>
                        <option value="" option selected>YYYY</option>
                        <?php for ($i = 2022; $i <= date("Y")+1; $i++) {?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }?>
                    </select>
                    <input type="time" name="txtHora" id="txtHora" class="form-control d-inline input-mediano" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="lstCliente" class="d-block">Cliente:</label>
                    <select name="lstCliente" id="lstCliente" class="form-control" required>
                        <option value="" disabled selected>Seleccionar</option>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="lstProducto" class="d-block">Producto:</label>
                    <select name="lstProducto" id="lstProducto" class="form-control" required>
                        <option value="" disabled selected>Seleccionar</option>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecioUni" class="d-block">Precio unitario:</label>
                    <input type="text" id="txtPrecioUni" name="txtPrecioUni" class="form-control" required>
                </div>
                <div class="col-6 form-group">
                    <label for="txtCantidad" class="d-block">Cantidad:</label>
                    <input type="number" id="txtCantidad" name="txtCantidad" class="form-control" required>
                </div>
                <div class="col-6 form-group">
                    <label for="txtTotal" class="d-block">Total:</label>
                    <input type="text" id="txtTotal" name="txtTotal" class="form-control" required>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>