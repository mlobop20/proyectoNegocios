<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Comprar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Grecia Pymes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Inicio</a>
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

  <div class="container">
    <h1>Lista de productos</h1>

    <div class="container">
      <div class="lista-productos ">
        <div class="row justify-content-center">
          <?php
          // Consulta de selección
          $conexion = new mysqli("localhost", "root", "", "prueba");

          // Comprobación de la conexión
          if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
          }
          $consulta = "SELECT id, detalle, marca, precio, cantidad as cantidadStock FROM inventarioproductos";

          // Ejecución de la consulta
          $resultado = $conexion->query($consulta);

          // Recorrido de los resultados de la consulta
          if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
              // Mostrar los datos del producto
              echo "<div class='col-md-3 p-2 m-2 border border-dark' >";
              echo "<div class='producto'>";
              echo "<h2>" . $fila["detalle"] . "</h2>";
              echo "<p>" . $fila["marca"] . "</p>";
              echo "<p id='precio-" . $fila["id"] . "' style='color: red'>" . $fila["precio"] . "€</p>";

              // Añadir el select para seleccionar la cantidad
              if ($fila["cantidadStock"] <= 0) {
                echo "<p>No hay disponibilidad</p>";
              } else {
                echo "<select name='cantidad' class='form-control'>";
                for ($i = 1; $i <= $fila["cantidadStock"]; $i++) {
                  echo "<option value='$i'>" . $i . "</option>";
                }
                echo "</select>";
                // Añadir el botón de comprar
                echo "<button class='btn btn-success' onclick='confirmarCompra(" . $fila["id"] . ", this.previousElementSibling.value, " . $fila["cantidadStock"] . ")'>Comprar</button>";
              }
              echo "</div>";
              echo "</div>";
            }
          } else {
            echo "No se encontraron productos.";
          }
          ?>
        </div>

      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>


    <script>
      function confirmarCompra(id, cantidad, stock) {
        // Obtener el precio del producto
        var precio = document.getElementById('precio-' + id).textContent;
        var precioNumero = parseInt(precio);

        // Calcular el total
        var total = cantidad * precioNumero;


        if (cantidad > stock) {
          alert("No hay suficiente stock para realizar esta compra.");
        } else {
          // Mostrar el mensaje de confirmación
          alert("Producto comprado correctamente. Total: " + total + "€");

          // Crear un objeto FormData y añadir los datos
          var formData = new FormData();
          formData.append('id', id);
          formData.append('cantidad', cantidad);

          // Enviar solicitud al servidor para actualizar la base de datos
          fetch('actualizar_cantidad.php', {
            method: 'POST',
            body: formData // Enviar los datos como FormData
          })
            .then(response => {
              // Manejar la respuesta del servidor si es necesario
              console.log(response);
            })
            .catch(error => {
              // Manejar errores
              console.error('Error:', error);
            });
        }
      }
    </script>

</body>

</html>