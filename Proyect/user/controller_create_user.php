<?php
    $origen = "..";
    $contenido = "";
    include $origen."/config/model_plantilla.php";
    include $origen."/config/conexion.php";
    $modelo = new plantilla();
    $conexion = new conexionBD();


$id_usuario = "";
$nombre = "";
$usuario = "";

if (isset($_GET["idU"])) {
    $id_usuario = $_GET["idU"];

    $sqlQuery = "SELECT * FROM clientes WHERE user.id='" . $id . "'";

    $queryDatos = $conexion->consultar($sqlQuery);

    if (mysqli_num_rows($queryDatos) > 0) {
        $registro = mysqli_fetch_assoc($queryDatos);
        $name = $registro["name"];
        $user_name = $registro["user_name"];
        $email = $registro["email"];
        $type = $registro["type"];
        $status = $registro["status"];
        $password = $registro["password"];
    }
}

if ($_POST) {
    $name = $_POST["name"];
    $usuario = $_POST["user_name"];
    $nivel = $_POST["tipoU"];
    $id_usuario = $_POST["id_usuario"];

    if ($id_usuario == "") {
        $Verificar = "SELECT clientes.nombre_usuario FROM clientes WHERE clientes.nombre_usuario ='" . $usuario . "' LIMIT 1";
        $ConsultaExiste = $conexion->consultar($Verificar);

        if (mysqli_num_rows($ConsultaExiste) == 0) {
            $Agregar = "INSERT INTO user (
                                        name,
                                        user_name,
                                        email,
                                        type,
                                        status,
                                        password
                                        )
                        VALUES (
                                '$name',
                                '$user_name',
                                '$email',
                                '$type',
                                'active',
                                '$password'
                                )";

            // Ejecutar la consulta
            if ($conexion->consultar($Agregar)) {
                echo "
                <script>
                    alert('Registro exitoso');
                    window.top.location.replace('controlador_usuarios.php');
                </script>";
            } else {
                echo "
                <script>
                    alert('Error');
                    window.top.location.replace('controlador_usuarios.php');
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Usuario ya registrado');
                window.top.location.replace('controlador_usuarios.php');
            </script>";
        }
        $conexion->cerrar();


    } else if ($id_usuario != "") {//AAa


        $Modificar = "UPDATE clientes SET nombre = '$nombre',
        nombre_usuario = '$usuario',
        tipo_usuario = '$nivel' 
        
        WHERE id = '$id_usuario'";

        

            // Ejecutar la consulta
            if ($conexion->consultar($Modificar)) {
                echo "
                    <script>
                    alert('Actualización exitosa');
                    window.top.location.replace('controller_admin_user.php');
                    </script>";
                            } else {
                                echo "
                    <script>
                    alert('Error');
                    window.top.location.replace('controller_admin_user.php');
                    </script>";
        }
    }
}

$nTipos = array("1", "0");
$aLetrasNiveles = array("Administrador", "Operativo");

$cmbNiveles = "<select name='tipoU' style='width: 200px;' onChange=\"\">";
$contador = 0;

foreach ($nTipos as $item) {
    $cmbNiveles .= "<option value='" . $item . "'>" . $aLetrasNiveles[$contador] . "</option>";
    $contador++;
}

$cmbNiveles .= "</select>";

include "./view_create_user.php";