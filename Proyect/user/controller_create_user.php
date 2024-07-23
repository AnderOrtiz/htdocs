<?php
$origen = "..";
$contenido = "";
include $origen . "/config/model_plantilla.php";
include $origen . "/config/conexion.php";
$modelo = new plantilla();
$conexion = new conexionBD();

$id_usuario = "";
$nombre = "";
$usuario = "";
$correo = "";
$tipo = "";
$estado = "1";
$contrasena = "";

if (isset($_GET["idU"])) {
    $id_usuario = $_GET["idU"];

    $sqlQuery = "SELECT * FROM user WHERE user.id='" . $id_usuario . "'";
    $queryDatos = $conexion->consultar($sqlQuery);

    if (mysqli_num_rows($queryDatos) > 0) {
        $registro = mysqli_fetch_assoc($queryDatos);
        $nombre = $registro["name"];
        $usuario = $registro["user_name"];
        $correo = $registro["email"];
        $tipo = $registro["type"];
        $contrasena = $registro["password"];
    }
}

if ($_POST) {
    $id_usuario = $_POST["id"] ?? "";  // Usar operador de fusión null
    $nombre = $_POST["name"] ?? "";
    $usuario = $_POST["user_name"] ?? "";
    $correo = $_POST["email"] ?? ""; // Añadir esto si el correo es parte del formulario
    $tipo = $_POST["type"] ?? "";
    $contrasena = $_POST["password"] ?? ""; // Añadir esto si la contraseña es parte del formulario

    if ($id_usuario == "") {
        $Verificar = "SELECT user_name FROM user WHERE user_name ='" . $usuario . "' LIMIT 1";
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
                                '$nombre',
                                '$usuario',
                                '$correo',
                                '$tipo',
                                '$estado',
                                '$contrasena'
                                )";

            if ($conexion->consultar($Agregar)) {
                echo "
                <script>
                    alert('Registro exitoso');
                    window.top.location.replace('controller_admin_user.php');
                </script>";
            } else {
                echo "
                <script>
                    alert('Error');
                    window.top.location.replace('controller_admin_user.php');
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Usuario ya registrado');
                window.top.location.replace('controller_admin_user.php');
            </script>";
        }
        $conexion->cerrar();


    } else if ($id_usuario != "") {//AAa


        $Modificar = "UPDATE clientes SET name = '$nombre',
        user_name = '$usuario',
        email = '$correo',
        type = '$tipo',
        password = '$contrasena'
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