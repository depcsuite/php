<?php

include_once "config.php";
include_once "entidades/usuario.php";
$pg = "Listado de usuarios";

$entidadUsuario = new Usuario();
$aUsuarios = $entidadUsuario->obtenerTodos();

include_once "header.php";
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de usuarios</h1>
          <div class="row">
                <div class="col-12 mb-3">
                    <a href="usuario-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
          <table class="table table-hover border">
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($aUsuarios as $usuario): ?>
              <tr>
                  <td><?php echo $usuario->usuario; ?></td>
                  <td><?php echo $usuario->nombre; ?></td>
                  <td><?php echo $usuario->apellido; ?></td>
                  <td><?php echo $usuario->correo; ?></td>
                  <td style="width: 110px;">
                      <a href="usuario-formulario.php?id=<?php echo $usuario->idusuario; ?>"><i class="fas fa-search"></i></a>
                  </td>
              </tr>
            <?php endforeach;?>
          </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>