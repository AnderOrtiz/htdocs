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
    <div class="container-fluid">
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
                
                <div class="row d-flex flex-wrap container-fluid">
                    <div class=" col-md-1 col-sm-1 col-1">
                        #
                    </div>
                    <div class="col-md-2 col-sm-3 col-3 ">
                        name
                    </div>
                    <div class="col-md-2 col-sm-2 col-4 ">
                        username
                    </div>
                    <div class="col-md-2 col-sm-3 col-4 ">
                        Type
                    </div>  
                    <div class="col-md-2 col-sm-3 col-6">
                        Status
                    </div>
                    <div class="col-md-3 col-sm-3 col-6">
                        Tools
                    </div>
                </div>
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
            
                <div class="row d-flex flex-wrap container-fluid" style=" padding:;">
                    <div class="col-md-1 col-sm-1 col-1 bg-dark" style="color: white;">
                        ' . $counter . '
                    </div>
                    <div class="col-md-2 col-sm-3 col-3 ">
                        ' . $fila["name"] . '
                    </div>
                    <div class="col-md-2 col-sm-2 col-4 ">
                        ' . $fila["user_name"] . '
                    </div>
                    <div class="col-md-2 col-sm-3 col-4 ">
                        ' . $user_type . '
                    </div>  
                    <div class="col-md-2 col-sm-3 col-6 ">
                    ' . $user_status . '
                    </div>
                    <div class="col-md-3 col-sm-12 col-6 bg-light">
                    Tool
                    </div>
                </div>

            ';

            $counter = $counter + 1;
        }
    } else {
        $contenido .= "
        <tr>
            <td colspan='6' style='text-align: left;'>NO SE ENCONTRARON REGISTROS</td>
        </tr>
        ";
    }

    $contenido .= "
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