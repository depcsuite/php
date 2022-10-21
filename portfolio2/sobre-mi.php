<?php
$pg = "sobre-mi";

?><!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre mí</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body id="sobre-mi" class="d-flex flex-column h-100">
    <header>
        <?php include_once("menu.php"); ?>
    </header>
    <main>
        <section id="info" class="container pb-5">
            <div class="row">
                <div class="col-12 col-sm-7">
                    <h1 class="pt-3 pb-5">Sobre mí</h1>
                    <p>Apasionado por la tecnología y gestión de proyectos. Soy docente de cursos de programación Full
                        Stack y de Base de
                        datos.</p>
                </div>
                <div class="col-12 col-sm-5">
                    <img src="images/nelson.jpeg" alt="Nelson" class="img-rounded">
                </div>
            </div>
        </section>
        <section id="stack">
            <div class="container">
                <div class="row">
                    <div class="col-12 py-4">
                        <h2>Stack tecnológico</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5  text-center">
                            <h3>Javascript</h3>
                            <img src="images/javascript.jpeg" alt="Javascript">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>PHP</h3>
                            <img src="images/php.jpeg" alt="PHP">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>HTML 5</h3>
                            <img src="images/html.png" alt="HTML">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>react.js</h3>
                            <img src="images/react.png" alt="react.js">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>jQuery</h3>
                            <img src="images/jquery.png" alt="jQuery">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>Bootstrap</h3>
                            <img src="images/bootstrap.png" alt="Bootstrap">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>Laravel</h3>
                            <img src="images/laravel.png" alt="Laravel">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>MySQL</h3>
                            <img src="images/mysql.png" alt="MySQL">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>CSS</h3>
                            <img src="images/css.png" alt="CSS">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>Git</h3>
                            <img src="images/git.png" alt="Git">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>Apache</h3>
                            <img src="images/apache.png" alt="Apache">
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 mb-4">
                        <div class="tecnologia p-5 text-center">
                            <h3>Mercadopago</h3>
                            <img src="images/mp.jpeg" alt="Mercadopago">
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section id="experiencia" class="container">
            <div class="row">
                <div class="col-12 py-4">
                    <h2>Experiencia laboral</h2>
                </div>
            </div>
            <div class="shadow p-4">
                <div class="row pb-2">
                    <div class="col-2 d-none d-sm-block">
                        <img src="images/logo-depcsuite.svg" alt="DePC Suite" class="mx-auto pt-5">
                    </div>
                    <div class="col-12 col-sm-10">
                        <h3>Director- Founder</h3>
                        <h4>DEPCSUITE SA</h4>
                        <h5>2016 - presente</h5>
                        <p>Lidero el desarrollo y posicionamiento de la empresa en sus tres líneas de negocio: cloud
                            services, desarrollo de
                            sistemas y educación IT en Buenos Aires, con sedes en Puerto Madero y Belgrano. Celebración
                            de convenios estratégicos.
                            Desarrollo de nuevos productos. Coordinación del área de sistemas y educación. Docente de
                            cursos tecnológicos en:
                            Laravel, PHP, HTML, CSS, Javascript, jQuery, AJAX, React.js, Bootstrap, GitLab, HTTP
                            Apache2, SSL, MySQL, HAProxy,
                            ProFTPd, virtualización con VMware ESXi, GNU/Linux Debian.</p>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-2 d-none d-sm-block">
                        <img src="images/uba.jpeg" alt="Universidad de Buenos Aires" class="mx-auto pt-5">
                    </div>
                    <div class="col-12 col-sm-10">
                        <h3>Desarrollador Senior Full Stack</h3>
                        <h4>Universidad de Buenos Aires</h4>
                        <h5>ago 2015 - ene 2020e</h5>
                        <p>Planeamiento del proyecto, seguimiento, reuniones de avance, estimación de entregables. Trato
                            con clientes y equipos
                            internos. Desarrollo de nuevos sistemas. Capacitar y organizar el área de desarrollo.
                            Gestionar los ambientes de
                            desarrollo. Administrar repositorio. Asignar tareas al equipo. Tecnologías: Laravel, PHP,
                            HTML, CSS, Javascript, jQuery,
                            AJAX, SQL Server, IIS, Bootstrap, Microsoft Project, GitLab.</p>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-2 d-none d-sm-block">
                        <img src="images/enacom.jpeg" alt="ENACOM" class="mx-auto pt-5">
                    </div>
                    <div class="col-12 col-sm-10">
                        <h3>Desarrollador Senior Full Stack</h3>
                        <h4>ENACOM</h4>
                        <h5>jul 2012 - jun 2018</h5>
                        <p>Diseño y desarrollo de sistemas internos para el organismo. Mantenimiento de los sistemas
                            existentes. Gestión
                            de base de
                            datos y reportes. Trato con distintos clientes internos y equipos. Reuniones de avance.
                            Organización del
                            proyecto en
                            Redmine. Resolución de pedidos mediante sistema de incidencias GLPI. Tecnologías: PHP, HTML,
                            CSS, jQuery,
                            Debian, AJAX,
                            Javascript, jQuery, MySQL, PHP, Python, Mongo DB, PostgreSQL, firma electrónica, servicios
                            REST, interfaz
                            con SAP,
                            XAMPP.</p>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-2 d-none d-sm-block">
                        <img src="images/sin-logo.png" alt="Certificado Digital SA" class="mx-auto pt-5">
                    </div>
                    <div class="col-12 col-sm-10">
                        <h3>Consultor Desarrollador Freelance</h3>
                        <h4>Certificado Digital SA</h4>
                        <h5>ago 2014 - dic 2016</h5>
                        <p>Proyecto de desarrollo de sistemas web para los clientes de la consultora. Tecnologías: PHP,
                            CSS, HTML, jQuery,
                            Javascript, MySQL, WSDL.</p>
                    </div>
                </div>
            </div>
            </div>

        </section>
        <section id="idiomas">
            <div class="container">

            </div>
        </section>
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