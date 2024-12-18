<?php
$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "backend");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$id_producto = $_GET["id"];
$query = "SELECT * FROM producto WHERE id_producto='$id_producto'";
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$producto = mysqli_fetch_assoc($resultado);
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <form action="editar_producto.php" method="post" enctype="multipart/form-data" class="login-form">
        <h1>Editar Producto</h1>
        
        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
        <label>Nombre:</label><input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>" autocomplete="off">
        <br>
        <label>Descripción:</label><textarea id="descripcion_producto" name="descripcion_producto"><?php echo $producto['descripcion_producto']; ?></textarea>
        <br>
        <label>Precio:</label><input type="number" id="precio_producto" name="precio_producto" value="<?php echo $producto['precio_producto']; ?>">
        <br>
        <label>Imagen:</label><input type="file" id="imagen_producto" name="imagen_producto">
        <br>
        <button>Actualizar</button>
        <button><a href="adm.php">Volver</a></button>
    </form>
</body>
</html>
