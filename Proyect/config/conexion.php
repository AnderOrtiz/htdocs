<?php

class conexionBD {
    public $conexion;

    public function __construct() {
        $this->conexion = mysqli_connect("localhost", "root", "", "fofita");

        if (!$this->conexion) {
            die("Error de conexion: " . mysqli_connect_error());
        }
    }

    public function consultar($sql) {
        $resultado = mysqli_query($this->conexion, $sql);

        if (!$resultado) {
            die("Error de consulta: " . mysqli_error($this->conexion));
        }
        return $resultado;
    }

    public function cerrar() {
        mysqli_close($this->conexion);
    }
}

?>