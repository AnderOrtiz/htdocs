<!DOCTYPE html>
<html lang="es">
<head>
    <?php echo $modelo->ObtenerCabecera($origen); ?>
    <style>
        .center-content {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php echo $modelo->ObtenerEncabezado($origen); ?>
    <?php echo $modelo->ObtenerMenu($origen); ?>

    <div class="center-content">
        <br><br><br><br><br>
        <h1>Hello world</h1>
        <br><br><br><br><br>
    </div>

    <?php echo $modelo->ObtenerCuerpo($origen, $contenido); ?>
    <?php echo $modelo->ObtenerPieDePagina($origen); ?>
</body>
</html>
