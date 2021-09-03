<?php

include_once "config.php";
include_once "entidades/tipoproducto.php";
$pg = "Listado de tipo de productos";

$tipoproducto = new Tipoproducto();
$aTipoProductos = $tipoproducto->obtenerTodos();

include_once("header.php"); 
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
            <?php foreach ($aTipoProductos as $tipo): ?>
              <tr>
                  <td><?php echo $tipo->nombre; ?></td>
                  <td style="width: 110px;">
                      <a href="tipoproducto-formulario.php?id=<?php echo $tipo->idtipoproducto; ?>"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once("footer.php"); ?>