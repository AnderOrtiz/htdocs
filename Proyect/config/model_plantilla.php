<?php
class plantilla
{

    public function ObtenerCabecera($origen)
    {
        #
        return '
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyect</title>
        <link rel="stylesheet" href="' . $origen . '/css/bootstrap.css">    
        ';
    }


    public function ObtenerEncabezado($origen)
    {
        #
        return '
        <header>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="' . $origen . '/controller_inicio.php">
                        <img src="' . $origen . '/img/logo.jpeg" alt="" width="50px" class="d-inline-block align-text-center">
                        Fofita\'s store
                    </a>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="' . $origen . '/controller_inicio.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . $origen . '/user/controller_admin_user.php">User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . $origen . '/controller_inicio.php">Client</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . $origen . '/controller_inicio.php">Product</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . $origen . '/controller_inicio.php">Tools</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </nav>
                </div>
            </nav>
        </header>
        ';
    }


    public function ObtenerMenu($origen)
    {
        #
        return '';
    }



    public function ObtenerCuerpo($origen, $contenido)
    {
        #
        return '    
        <section>

        ' . $contenido . '

    </section>';
    }



    public function ObtenerPieDePagina($origen)
    {
        #
        return '    
        <footer>
        <center>
            <h6>
            <br>
                All rights reserved &copy; <br>
                Class project, third year of software, 2024
            </h3>
        </center>
    </footer>';
    }

    public function ObtenerBootsTrap($origen)
    {
        return '
        <script src="' . $origen . '/js/bootstrap.min.js"></script> 
        <!--<script src="' . $origen . '/js/bootstrap.popper.min.js"></script>-->
        <!-- <script src="' . $origen . '/js/bootstrap.bundle.min.js"></script>-->
        ';
    }
}
