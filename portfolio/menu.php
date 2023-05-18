<nav class="navbar navbar-expand-md ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $pagina == "inicio"? "active" : ""?> px-4" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 <?php echo $pagina == "sobre-mi"? "active" : ""?> " href="sobre-mi.php">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 <?php echo $pagina == "proyectos"? "active" : ""?> " href="proyectos.php">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 <?php echo $pagina == "contacto"? "active" : ""?> " href="contacto.php">Contacto</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="float-sm-end">
                            <a class="btn btn-rojo" href="contacto.php">Descargar mi CV <i
                                    class="fa-solid fa-download"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>