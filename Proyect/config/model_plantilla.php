<?php
class plantilla {

    public function ObtenerCabecera($origen)
    {
        #
        return '
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyect</title>
        <link rel="stylesheet" href="'. $origen .'/css/styles.css">';
    }


    public function ObtenerEncabezado($origen)
    {
        #
        return '
        <header>

        <table border="0" style="width: 100%;" cellpadding="0" cellspacing="0">
            <tr>
                <td style="width: 150px;"><img src="'. $origen .'/img/logo.jpeg" style="width: 60px;"></td>
                <td style="text-align: left;font-size: 30px;">San Miguel Technology</td>
            </tr>
        </table>

    </header>';
    }


    public function ObtenerMenu($origen)
    {
        #
        return '
        <nav>

        <ul>
            <li><a href="'.$origen.'/controller_inicio.php">Inicio</a></li>
            <li><a href="'.$origen.'/user/controller_admin_user.php">Usuario</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Herramientas</a></li>
        </ul>

    </nav>';
    }



    public function ObtenerCuerpo($origen, $contenido)
    {
        #
        return '    
        <section>

        '.$contenido.'

    </section>';
    }



    public function ObtenerPieDePagina($origen)
    {
        #
        return '    
        <footer>
        <center>
            <h3>
                <hr style="width: 80% ;">
                Todos los derechos reservados &copy; <br>
                proyecto clase, tercero de software, 2024
            </h3>
        </center>
    </footer>';
    }
}
