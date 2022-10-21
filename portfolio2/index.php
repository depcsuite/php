<?php
$pg = "inicio";

?><!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body id="inicio" class="d-flex flex-column h-100">
    <header>
        <?php include_once("menu.php"); ?>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-12 pt-4 pb-5">
                <div class="div-cohete">
                    <img src="images/cohete.svg" alt="" class="cohete mx-auto">
                </div>
            </div>
            <div class="col-12 col-sm-6 offset-sm-3 text-center">
                <p class="parrafo p-1">Bienvenid@ a mi sitio web sobre docencia en sistemas.</p>
            </div>
            <div class="col-12 pt-3 pb-5 text-center">
                <a href="proyectos.html" class="btn-blanco">Conocé mis proyectos</a>
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