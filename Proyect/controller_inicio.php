<?php
// Incluye el archivo que define la clase plantilla
include "'. $origen .'/config/model_plantilla.php";

// Crea una instancia de la clase plantilla
$modelo = new plantilla();

// Define cualquier otra lógica de negocio si es necesario
$origen = "."; // Por ejemplo, define $origen según tus necesidades

// Incluye la vista después de haber inicializado todas las variables necesarias
include "'. $origen .'/view_inicio.php";
?>
