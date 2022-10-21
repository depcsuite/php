<?php
$pg = "proyectos";

?><!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body id="proyectos" class="d-flex flex-column h-100">
    <header>
        <?php include_once("menu.php"); ?>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="pt-3 pb-5">Proyectos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pb-4">
                <p>Los siguientes son algunos de los trabajos que he realizado:</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 col-sm-4 pb-3">
                <div class="bloque-proyecto">
                    <div class="row">
                        <div class="col-12">
                            <img src="images/abmclientes.png" alt="">
                            <h2 class="p-3">ABM CLIENTES</h2>
                            <p class="px-3">Alta, baja y modificación de un registro de clientes. Realizado en HTML, CSS, PHP, Bootstrap y Json.</p>
                        </div>
                        <div class="col-6 ps-4 mb-5">
                            <a href="#" class="btn-rojo">Ver online</a>
                        </div>
                        <div class="col-6 mb-5">
                            <a href="#" class="link-rojo">Código fuente</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 pb-3">
                <div class="bloque-proyecto">
                    <div class="row">
                        <div class="col-12">
                            <img src="images/abmventas.png" alt="">
                            <h2 class="p-3">SISTEMA DE GESTIÓN DE VENTAS</h2>
                            <p class="px-3">Sistema de gestión de clientes, productos y ventas. Realizado en HTML, CSS, PHP, MVC, Bootstrap, Js, Ajax, jQuery y
                            MySQL de base de datos.</p>
                        </div>
                        <div class="col-6 ps-4 mb-5">
                            <a href="#" class="btn-rojo">Ver online</a>
                        </div>
                        <div class="col-6 mb-5">
                            <a href="#" class="link-rojo">Código fuente</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 pb-3">
                <div class="bloque-proyecto">
                    <div class="row">
                        <div class="col-12">
                            <img src="images/proyecto-integrador.png" alt="">
                            <h2 class="p-3">PROYECTO INTEGRADOR</h2>
                            <p class="px-3">Proyecto Full Stack desarrollado en PHP, Laravel, Javascript, jQuery, AJAX, HTML, CSS, Mercadopago con panel
                            administrador, gestor de usuarios, módulo de permisos y funcionalidades a fines.</p>
                        </div>
                        <div class="col-6 ps-4 mb-5">
                            <a href="#" class="btn-rojo">Ver online</a>
                        </div>
                        <div class="col-6 mb-5">
                            <a href="#" class="link-rojo">Código fuente</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="container mt-auto pb-4">
        <div class="row text-center text-sm-start">
            <div class="col-12 col-sm-3 pb-3">
                <a href="https://github.com" target="_blank" title="Github"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/nelson-daniel-tarche/" target="_blank" title="Linkedin"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-12 col-sm-3 pb-3">
                Sponsor <a href="https://depcsuite.com" target="_blank">DePC Suite</a>
            </div>
            <div class="col-12 col-sm-3 pb-3">
                <a href="mailto:info@nelsontarche.com.ar">info@nelsontarche.com.ar</a>
            </div>
        </div>
    </footer>
</body>

</html>