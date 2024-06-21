<!DOCTYPE html>
<html lang="es">
<head>
    <? echo $modelo->ObtenerCabecera($origen); ?>
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

    <? echo $modelo->ObtenerEncabezado($origen); ?>
    <? echo $modelo->ObtenerMenu($origen); ?>
    <? echo $modelo->ObtenerCuerpo($origen, $contenido); ?>
    <? echo $modelo->ObtenerPieDePagina($origen); ?>

</body>
</html>