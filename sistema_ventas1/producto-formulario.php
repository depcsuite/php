<?php

include_once "config.php";
include_once "header.php";
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Productos</h1>
           <div class="row">
                <div class="col-12 mb-3">
                    <a href="productos.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="">
                </div>
                <div class="col-6 form-group">
                    <label for="txtNombre">Tipo de producto:</label>
                    <select name="lstTipoProducto" id="lstTipoProducto" class="form-control selectpicker" data-live-search="true" required>
                        <option value="" disabled selected>Seleccionar</option>
                    </select>
                </div>

                <div class="col-6 form-group">
                    <label for="txtCantidad">Cantidad:</label>
                    <input type="number" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="">
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" value="">
                </div>
                <div class="col-12 form-group">
                    <label for="txtCorreo">Descripción:</label>
                    <textarea type="text" name="txtDescripcion" id="txtDescripcion"></textarea>
                </div>
                <div class="col-6 form-group">
                    <label for="fileImagen">Imagen:</label>
                    <input type="file" class="form-control-file" name="imagen" id="imagen">
                    <img src="files/" class="img-thumbnail">
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
        <script>
        ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
<?php include_once "footer.php";?>