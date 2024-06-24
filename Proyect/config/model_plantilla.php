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
        <link rel="stylesheet" href="' . $origen . '/css/styles.css">
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
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="' . $origen . '/controller_inicio.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="' . $origen . '/user/controller_admin_user.php">User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Client</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Tools</a>
                            </li>
                        </ul>
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
                <hr style="width: 80% ;">
                All rights reserved &copy; <br>
                Class project, third year of software, 2024
            </h3>
        </center>
    </footer>';
    }

    public function ObtenerBootsTrap($origen)
    {
        return '
        <!--<script src="../js/bootstrap.popper.min.js"></script>-->
        <script src="../js/bootstrap.min.js"></script>
        <!-- <script src="../js/bootstrap.bundle.min.js"></script>-->
        ';
    }
}
