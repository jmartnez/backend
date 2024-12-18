<?php
$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "backend");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$query = "SELECT * FROM producto";
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dmora2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Dmora2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
          </ul>
          <form class="d-flex" action="pages/login/login.php">
            <button class="btn btn-outline-success" type="submit">Iniciar Sesion</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <section>
      <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
        <div class="col-md-6 p-lg-5 mx-auto my-5">
          <h1 class="display-3 fw-bold">Dmora2</h1>
          <h3 class="fw-normal text-muted mb-3">Tienda online de venta de productos de alimentos, bebidas y mas...</h3>
          <div class="d-flex gap-3 justify-content-center lead fw-normal">
          </div>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
      </div>
    </section>
    <section>
      <div class="container marketing">
        <hr class="featurette-divider">
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">Quienes somos</h2>
            <p class="lead">
              Bienvenidos a Dmora2, tu destino de confianza para todas tus necesidades. Desde nuestra creacion, hemos tenido el compromiso de ofrecerte productos de calidad, un servicio al cliente excepcional y las últimas novedades en ofertas para tu bolsillo.
              Nos esforzamos por ofrecerte una amplia gama de productos, para que siempre encuentres exactamente lo que necesitas y a un buen precio.
            </p>
          </div>
          <div class="col-md-5">
            <img src="img/img.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" alt="Descripción de la imagen">
            <p class="lead"></p>
          </div>
        </div>
        <hr class="featurette-divider">
        <div class="row">
          <div class="col-lg-4">
            <img src="img/asesoria.png" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Asesoría">
            <h2 class="fw-normal">Asesoría</h2>
            <p>Nuestro equipo de expertos está siempre listo para ayudarte a encontrar el producto que buscas y resolver todas tus dudas.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img src="img/precios.png" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Precios">
            <h2 class="fw-normal">Precios</h2>
            <p>Trabajamos para ofrecerte los mejores productos a calidad-precio del mercado.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img src="img/envios.png" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Envios">
            <h2 class="fw-normal">Envios</h2>
            <p>Nos aseguramos de que tus compras lleguen a tu puerta de manera rápida y segura.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <hr class="featurette-divider">
      </div><!-- /.container -->
    </section>
    <section>
      <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
        <div class="col-md-6 p-lg-5 mx-auto my-5">
          <h1 class="display-3 fw-bold">Mira estos productos...</h1>
          <div class="d-flex gap-3 justify-content-center lead fw-normal">
          </div>
        </div>
        <div class="product-device shadow-sm d-none d-md-block">
        </div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block">
        </div>
      </div>
    </section>
    <section class="container text-center">
      <div class="row justify-content-center">
        <?php
        while ($fila = mysqli_fetch_assoc($resultado)) { 
          ?>
          <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;"> <!-- Aumenté el tamaño de la carta -->
              <img src="<?php echo $fila['imagen_producto']; ?>" class="card-img-top" alt="Imagen de <?php echo $fila['nombre_producto']; ?>" style="width: 100%; height: 200px; object-fit: cover;"> <!-- Ajuste la imagen para que tenga el mismo tamaño -->
              <div class="card-body" style="height: 150px;"> <!-- Establecí un alto fijo para la tarjeta -->
                <p class="card-title"><?php echo $fila['nombre_producto']; ?></p>
                <p class="card-text" style="height: 50px; overflow: hidden;"><?php echo $fila['descripcion_producto']; ?></p> <!-- Limité la descripción para que no se desborde -->
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Precio: $<?php echo $fila['precio_producto']; ?></li>
              </ul>
            </div>
          </div>
          <?php
        }
        mysqli_free_result($resultado);
        mysqli_close($conexion);
        ?>
      </div>
    </section>
  </main>
    <footer class="text-center text-body-secondary py-5 bg-dark">
        <div class="container">
            <p class="mb-1 text-white">&copy; Juan Martinez - Potrero Digital 2024</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>