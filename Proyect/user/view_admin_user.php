<!DOCTYPE html>
<html lang="es">
<head>
    <?php echo $modelo->ObtenerCabecera($origen); ?>
</head>
<body>

    <?php
    $contenido = "
    <center>
        <br><br><br><br><br>
        <h1>Hello user</h1>
        <br><br><br><br><br>
    </center>";
    ?>

    <?php echo $modelo->ObtenerEncabezado($origen); ?>
    <?php echo $modelo->ObtenerMenu($origen); ?>
    <?php echo $modelo->ObtenerCuerpo($origen, $contenido); ?>
    <?php echo $modelo->ObtenerPieDePagina($origen); ?>

</body>
</html>