<?php
    $origen = "..";
    $contenido = "";
    include $origen."/config/model_plantilla.php";
    include $origen."/config/conexion.php";
    $modelo = new plantilla();
    $conexion = new conexionBD();
    include "view_admin_user.php";
?>