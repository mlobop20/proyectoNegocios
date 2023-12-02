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
  <a class="navbar-brand" href="#">Grecia Pymes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

<div class="container m-5">
  <form action="envioform.php" method="POST">
    <input type="text" name="detalle" placeholder="Detalle">
    <input type="text" name="marca" placeholder="Marca">
    <input type="number" name="precio" placeholder="Precio">
    <input type="number" name="cantidad" placeholder="Cantidad">
    <input type="submit" value="Enviar" onclick='productoAgregado()'>
  </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></script>
<script>
    function productoAgregado() {
      // Mostrar el mensaje de confirmación
      alert("Producto agregado correctamente");
    }
    </script>


</body>
</html>
