<?php

// Obtención del ID del producto
$id = $_GET["id"];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "prueba");

// Comprobación de la conexión
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Consulta de eliminación
$consulta = "DELETE FROM productos WHERE id = $id";

// Ejecución de la consulta
$resultado = $conexion->query($consulta);

// Cierre de la conexión
$conexion->close();

// Redirección a la página de productos
header("Location: productos.php");

?>
