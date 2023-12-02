



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Agregar producto</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mi página web</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="agregarproductos.php">Agregar producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listaproductos.php">Lista de productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container m-5">
<?php

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "prueba");

// Comprobación de la conexión
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Consulta de selección
$consulta = "SELECT id, detalle, descripcion, precio FROM productos";

// Ejecución de la consulta
$resultado = $conexion->query($consulta);

// Recorrido de los resultados de la consulta
if ($resultado) {
  echo "<table>";
  echo "<thead>";
  echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Detalle</th>";
    echo "<th>Descripción</th>";
    echo "<th>Precio</th>";
    echo "<th>Acciones</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
      echo "<td>" . $fila["id"] . "</td>";
      echo "<td>" . $fila["detalle"] . "</td>";
      echo "<td>" . $fila["descripcion"] . "</td>";
      echo "<td>" . $fila["precio"] . "€</td>";
      echo "<td>";
        echo "<a href='modificarproducto.php?id=" . $fila["id"] . "' class='btn btn-primary'>Modificar</a>";
        echo "<a href='eliminarproducto.php?id=" . $fila["id"] . "' class='btn btn-danger'>Eliminar</a>";
      echo "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
} else {
  echo "No se encontraron productos.";
}

// Cierre de la conexión
$conexion->close();

?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></script>
<script>

    </script>


</body>
</html>
