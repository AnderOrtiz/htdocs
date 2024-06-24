<!DOCTYPE html>
<html lang="es">

<head>
    <?php echo $modelo->ObtenerCabecera($origen); ?>
</head>

<body>

    <?php

    $criterio = "";

    if(isset($_GET["criterio"])){
        $criterio = $_GET["criterio"];
    }

    $user_type = "";
    $user_status = "";
    $contenido = '
    <div style="padding: 0px 50px 50px 50px;">
        <nav class="navbar navbar-light bg-white m-3">
            <div class="container-fluid justify-content-betweeng">
            <h3>Tabla Users</h3>
            <form class="d-flex  ">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="criterio" value= "'. $criterio .'" style="width: 250px;" autofocus>
                <button class="btn btn-outline-success" type="submit"  value="Buscar" >Search</button>
            </form>
            </div>
        </nav>
        
        <center>
            <table border = "" cellpadding="15" cellspacing="5"  class="table table-hover" >
                <tr style="text-align: center;">
                    <th>#</th>
                    <th>Name</th>
                    <th>User name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
                ';

    $sql = " SELECT name, user_name, type, status from user  ";

    if($criterio!=""){
        $sql .= "where user.name like '%". $criterio ."%'
            OR  user.user_name like '%". $criterio ."%'";
    }

    $query = $conexion->consultar($sql);

    if(mysqli_num_rows($query)>0){
        $counter = 1;
        while ($fila = mysqli_fetch_assoc($query)) {

            if ($fila["type"] == 1) {
                $user_type = "admin";
            } else if ($fila["type"] == 0) {
                $user_type = "operative";
            }

            if ($fila["status"] == 1) {
                $user_status = "active";
            } else if ($fila["status"] == 0) {
                $user_status = "deactive";
            }
            $contenido .= '
            <tr>
                <td style="text-align: center; ">' . $counter . '</td>
                <td style="text-align: center; ">' . $fila["name"] . '</td>
                <td style="text-align: center; ">' . $fila["user_name"] . '</td>
                <td style="text-align: center; ">' . $user_type . '</td>
                <td style="text-align: center; ">' . $user_status . '</td>
            </tr>
            ';

            $counter = $counter + 1;
        }
    } else {
        $contenido .= "
        <tr>
            <td colspan='6' style='text-align: center;'>NO SE ENCONTRARON REGISTROS</td>
        </tr>
        ";
    }

    $contenido .= "
        </table>
        </center>
        </div>
        ";
    ?>

    <?php echo $modelo->ObtenerEncabezado($origen); ?>
    <?php echo $modelo->ObtenerMenu($origen); ?>
    <?php echo $modelo->ObtenerCuerpo($origen, $contenido); ?>
    <?php echo $modelo->ObtenerPieDePagina($origen); ?>

</body>
    <?php echo $modelo->ObtenerBootsTrap($origen); ?>
</html>