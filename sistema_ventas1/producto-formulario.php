<?php

include_once "config.php";
$pg = "Ventas";

include_once "header.php";
?>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Producto</h1>
             <div class="row">
                <div class="col-12 mb-3">
                    <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre"">Nombre:</label>
                    <input type="text" id="txtNombre" name="txtNombre" class="form-control" required>
                </div>
                <div class="col-6 form-group">
                    <label for="txtTotal">Tipo de producto:</label>
                    <select name="lstTipoProducto" id="lstTipoProducto"  class="form-control">
                        <option value="" selected disasbled>Seleccionar</option>
                    </select>
                </div>
                 <div class="col-6 form-group">
                    <label for="txtCantidad"">Cantidad:</label>
                    <input type="number" id="txtCantidad" name="txtCantidad" class="form-control" required>
                </div>
                 <div class="col-6 form-group">
                    <label for="txtPrecio"">Precio:</label>
                    <input type="text" id="txtPrecio" name="txtPrecio" class="form-control" required>
                </div>
                 <div class="col-12 form-group">
                    <label for="txtPrecio"">Descripción:</label>
                    <textarea name="txtDescripcion" id="txtDescripcion"></textarea> 
                    <script>
                    ClassicEditor
                        .create( document.querySelector( '#txtDescripcion' ) )
                        .catch( error => {
                        console.error( error );
                        } );
                    </script>

                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecio"">Imagen:</label>
                    <input type="file" id="archivo" name="archivo" required accept=".jpg, .jpeg, .png">
                    <small class="d-block">Archivos admitidos: *.jpg, *.jpeg, *.png</small>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>