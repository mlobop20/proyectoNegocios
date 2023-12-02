<?php

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "prueba");

// Comprobación de la conexión
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Obtención de los datos del formulario
$detalle = $_POST["detalle"];
$marca = $_POST["marca"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];

// Consulta de inserción
$consulta = "INSERT INTO inventarioproductos (detalle, marca, precio, cantidad) VALUES ('$detalle', '$marca', $precio, $cantidad)";

// Ejecución de la consulta
$resultado = $conexion->query($consulta);



// Cierre de la conexión
$conexion->close();
?>
