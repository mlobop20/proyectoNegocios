<?php


var_dump($_POST); // Verificar los datos que se están recibiendo

// Verificar si la solicitud es mediante el método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se reciben los datos necesarios
    if (isset($_POST['id']) && isset($_POST['cantidad'])) {
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];

        // Realizar la conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "prueba");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Actualizar la cantidad del producto en la base de datos
        $actualizar = "UPDATE inventarioproductos SET cantidad = cantidad - $cantidad WHERE id = $id";

        if ($conexion->query($actualizar) === TRUE) {
            // La actualización fue exitosa
            echo "La cantidad se ha actualizado correctamente.";
        } else {
            // En caso de error
            echo "Error al actualizar la cantidad: " . $conexion->error;
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        // Si no se reciben los datos esperados
        echo "Datos insuficientes para la actualización.";
    }
} else {
    // Si la solicitud no es mediante el método POST
    echo "Acceso denegado.";
}
?>
