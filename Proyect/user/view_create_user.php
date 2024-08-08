<!DOCTYPE html>
<html lang="es">

<head>
    <?php echo $modelo->ObtenerCabecera($origen); ?>
</head>

<body>

    <?php
    $contenido = '
    <style>
        body {
            background-color: #f0f0f0; /* Blanco oscuro */
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff; /* Blanco */
            border: 1px solid;
            border-image: linear-gradient(to right, grey, lightgrey);
            border-image-slice: 1;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 0.5rem;
        }
        .form-control {
            padding: 0.25rem 0.5rem;
        }
        .btn {
            padding: 0.25rem 0.75rem;
        }
        .text-right {
            text-align: right;
        }
    </style>

    <div class="container mt-3">
        <div class="form-container">
            <h2 class="mb-3">Formulario de Usuario</h2>
            <form method="POST" action="' . $_SERVER['PHP_SELF'] . '" enctype="multipart/form-data" onsubmit="" class="formulario">
            <input type="hidden" name="id_usuario" value="'.$id_usuario.'"> 
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" maxlength="50" value="'.$nombre.'" required>
                </div>
                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" maxlength="50" value="'.$usuario.'" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="30" value="'.$correo.'" required>
                </div>
                <div class="mb-3">
                    <label for="tipoU" class="form-label" id="type" name="type">Type</label>
                    ' .$cmbNiveles. '
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" maxlength="64" value="'.$contrasena.'" required>
                </div>
                <div class="form-group text-right">
                <a href="controller_admin_user.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>

    '
    ?>

    <?php echo $modelo->ObtenerEncabezado($origen); ?>
    <?php echo $modelo->ObtenerMenu($origen); ?>
    <?php echo $modelo->ObtenerCuerpo($origen, $contenido); ?>
    <?php echo $modelo->ObtenerPieDePagina($origen); ?>

</body>
    <?php echo $modelo->ObtenerBootsTrap($origen); ?>
</html>