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
    $contenido = "
    <center>
        <br><br><br><br><br>
        
        <table border = '1' cellpadding='10' cellspacing='0' >
        <tr>
            <td colspan='6'>
                <form name='searchuser' action='". $_SERVER['PHP_SELF'] ."' method='GET'>
                    <table border='0' style='width: 100%;' cellpadding = '15'>
                        <tr>
                            <td>
                                <img src='". $origen ."/img/search.png' alt=''>
                                Criterio de busqueda: <input type='text' name='criterio' value= '". $criterio ."' style='width: 250px;' autofocus>
                            </td>
                            <td>
                                <input type='submit' value='Buscar' style='width: 150px;'>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>

        <tr>
            <th>#</th>
            <th>Name</th>
            <th>User name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Options</th>
            </tr>";

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
                <td style="text-align: center; width: 50px;">' . $counter . '</td>
                <td style="text-align: center; width: 250px;">' . $fila["name"] . '</td>
                <td style="text-align: center; width: 150px;">' . $fila["user_name"] . '</td>
                <td style="text-align: center; width: 150px;">' . $user_type . '</td>
                <td style="text-align: center; width: 100px;">' . $user_status . '</td>
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
        <br><br><br><br><br>";
    ?>

    <?php echo $modelo->ObtenerEncabezado($origen); ?>
    <?php echo $modelo->ObtenerMenu($origen); ?>
    <?php echo $modelo->ObtenerCuerpo($origen, $contenido); ?>
    <?php echo $modelo->ObtenerPieDePagina($origen); ?>

</body>

</html>