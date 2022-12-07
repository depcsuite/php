<?php
$pagina = "inicio";
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body id="inicio" class="d-flex flex-column h-100">
    <header>
       <?php include_once "menu.php"; ?>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-12 div-cohete mt-5 mb-3">
                <a href="proyectos.php"><img src="images/cohete.svg" alt="" class="cohete"></a>
            </div>
            <div class="offset-sm-3 col-sm-6 col-12 text-center div-parrafo">
                <p class="m-0 py-1">Bienvenid@ a mi sitio web sobre docencia en sistemas.</p>
            </div>
            <div class="col-12 text-center mt-4 pb-3">
                <a href="proyectos.php" class="btn">Conocé mis proyectos</a>
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