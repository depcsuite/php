<?php
$pagina = "proyectos";
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body id="proyectos" class="d-flex flex-column h-100">
    <header>
       <?php include_once "menu.php"; ?>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5">
                <h1>Proyectos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Los siguientes son algunos de los trabajos que he realizado:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4 p-3">
               <div class="border proyecto pb-5">
                    <img src="images/abmclientes.png" alt="ABM Clientes" class="img-fluid">
                    <h2 class="p-3">ABM CLIENTES</h2>
                    <p class="p-2">Alta, baja y modificación de un registro de clientes. Realizado en HTML, CSS, PHP, Bootstrap y Json.</p>
                    <a href="http://" class="float-start btn-rojo py-1 px-3 mx-2">Ver online</a>
                    <a href="http://" class="float-end btn-blanco me-5">Código fuente</a>
                </div>
            </div>
            <div class="col-12 col-sm-4 p-3">
               <div class="border proyecto pb-5">
                    <img src="images/abmventas.png" alt="ABM Ventas" class="img-fluid">
                    <h2 class="p-3">SISTEMA DE GESTIÓN DE VENTAS</h2>
                    <p class="p-2">Sistema de gestión de clientes, productos y ventas. Realizado en HTML, CSS, PHP, MVC, Bootstrap, Js, Ajax, jQuery y
                    MySQL de base de datos.</p>
                    <a href="http://" class="float-start btn-rojo py-1 px-3 mx-2">Ver online</a>
                    <a href="http://" class="float-end btn-blanco me-5">Código fuente</a>
               </div>
            </div>
            <div class="col-12 col-sm-4 p-3">
               <div class="border proyecto pb-5">
                    <img src="images/proyecto-integrador.png" alt="Proyecto integrador" class="img-fluid">
                    <h2 class="p-3">PROYECTO INTEGRADOR</h2>
                    <p class="p-2">Proyecto Full Stack desarrollado en PHP, Laravel, Javascript, jQuery, AJAX, HTML, CSS, Mercadopago con panel
                    administrador, gestor de usuarios, módulo de permisos y funcionalidades a fines.</p>
                    <a href="http://" class="float-start btn-rojo py-1 px-3 mx-2">Ver online</a>
                    <a href="http://" class="float-end btn-blanco me-5">Código fuente</a>
               </div>
            </div>
          
        </div>
    </main>
    <footer class="container mt-auto pb-4">
        <div class="row mt-4">
            <div class="col-12 col-sm-4 text-center py-1">
                <a href="#" target="_blank" class="me-3"><i class="fa-brands fa-github"></i></a>
                <a href="https://linkedin.com" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <div class="col-12 col-sm-4 text-center py-1">
                Sponsor <a href="https://depcsuite.com" target="_blank">DePC Suite</a>
            </div>
            <div class="col-12 col-sm-4 text-center py-1">
                <a href="mailto:info@nelsontarche.com.ar">info@nelsontarche.com.ar</a>
            </div>
        </div>
        <div class="whatsapp">
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </footer>
</body>

</html>