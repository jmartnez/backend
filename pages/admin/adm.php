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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Panel de Administracion</h1>
        <p class="lead text-body-secondary">Desde aca podes agregar, eliminar, editar productos</p>
        <p>
          <a href="formulario_agregar_producto.php" class="btn btn-primary my-2">Agregar Nuevo Producto</a>
          <a href="../../index.php" class="btn btn-danger">Salir</a>
        </p>
      </div>
    </div>     
    </header>
    <main>
    <section>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = mysqli_fetch_assoc($resultado)) { 
                echo "<tr>";
                echo "<td>" . $fila['id_producto'] . "</td>";
                #echo "<td><img style='max-width:80px; height: auto;' src='" . $fila['imagen_producto'] . "' /></td>";
                echo "<td><img style='width:80px; height:80px;' src='" . $fila['imagen_producto'] . "' /></td>";

                echo "<td>" . $fila['nombre_producto'] . "</td>";
                echo "<td>" . $fila['descripcion_producto'] . "</td>";
                echo "<td>" . $fila['precio_producto'] . "</td>";
                echo "<td class='botones'>";
                echo "<a href='formulario_editar_producto.php?id=" . $fila['id_producto'] . "' class='btn btn-warning'>Editar</a>";
                echo "<a href='eliminar_producto.php?id=" . $fila['id_producto'] . "' class='btn btn-danger'>Eliminar</a>";
                echo "</td>";
                echo "</tr>"; }
            mysqli_free_result($resultado);
            mysqli_close($conexion);
            ?>
        </tbody>
    </table>
    </section>    

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>