<?php

include_once "config.php";
$pg = "Listado de tipo de productos";

include_once "header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de tipo de productos</h1>
          <div class="row">
                <div class="col-12 mb-3">
                    <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
          <table class="table table-hover border">
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
          </table>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>