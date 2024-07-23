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

    if (isset($_GET["uid"])) {
        $uid = $_GET["uid"];

        if ($conexion->consultar("DELETE FROM user WHERE id = '$uid'")) {
            echo"
                <script>
                    alert('Borrado');
                    location.replace('" . $_SERVER["PHP_SELF"] . "');
                </script>
            ";
        }
    }

    if (isset($_GET["a"]) && isset($_GET["idOnOff"])) {
        if ($conexion->consultar(" UPDATE user SET status='". $_GET["a"]."' WHERE id ='".  $_GET["idOnOff"]."' ")) {
            echo"
                <script>
                    location.replace('" . $_SERVER["PHP_SELF"] . "');
                </script>
            ";
        }
    }   

    $user_type = "";
    $user_status = "";
    $contenido = '
    <script>
        function eliminar(id){
            if (confirm("¿Estás seguro?")) {
                location.replace("' . $_SERVER["PHP_SELF"] . '?uid=" + id);
            }
        }
    </script>

    <div class="container-fluid">
        <nav class="navbar navbar-light bg-white m-3">
            <div class="container-fluid justify-content-betweeng">
            <h3>Tabla Users</h3>
            <a href="./controller_create_user.php"><button class="btn btn-outline-success" value="Create" >New</button></a>
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
                    <div class="col-md-3 col-sm-3 col-3 ">
                        name
                    </div>
                    <div class="col-md-3 col-sm-2 col-4 ">
                        username
                    </div>
                    <div class="col-md-2 col-sm-3 col-4 ">
                        Type
                    </div>  
                    <div class="col-md-3 col-sm-3 col-12">
                        Tools
                    </div>
                </div>
                ';

    $sql = " SELECT id, name, user_name, type, status from user  ";

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
                    <div class="col-md-3 col-sm-3 col-3 ">
                        ' . $fila["name"] . '
                    </div>
                    <div class="col-md-3 col-sm-3 col-4 ">
                        ' . $fila["user_name"] . '
                    </div>
                    <div class="col-md-2 col-sm-2 col-4 ">
                        ' . $user_type . '
                    </div>  
                    <div class="col-md-3 col-sm-12 col-12 bg-light">

                    <a href="controller_create_user.php?idU=' .$fila["id"]. '">
                        <button type="button" class="btn btn-secondary">
                            <i class="bi bi-pencil-square"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </button>
                    </a>';

                    if($fila["status"] == 0){
                    
                        $contenido .='
                        <button type="button" class="btn btn-secondary" onclick="location.replace(\'' . $_SERVER["PHP_SELF"] . '?a=1&&idOnOff=' . $fila["id"] . '\');">
                                <i class="bi bi-toggle-off"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a5 5 0 0 0 2-4 5 5 0 0 0-2-4zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8M0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5"/>
                                </svg>
                        </button>';
        
                            } else {
        
                                $contenido .='
        
                                <button type="button" class="btn btn-secondary" onclick="location.replace(\'' . $_SERVER["PHP_SELF"] . '?a=0&&idOnOff=' . $fila["id"] . '\');"">
                                    <i class="bi bi-toggle-on"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8"/>
                                    </svg>
                                </button>';
                            }
        
                            $contenido .='
        
                            <button type="button" class="btn btn-secondary" onclick="eliminar(\''.$fila["id"].'\');">
                                <i class="bi bi-trash3"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>  
                            </button>
                        </div>
                    </div>';

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