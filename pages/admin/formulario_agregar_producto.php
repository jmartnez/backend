<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <form action="agregar_producto.php" method="post" enctype="multipart/form-data" class="login-form">
        <h1>Agregar Producto</h1>
        <div>
            <label>Nombre:</label><input type="text" id="nombre_producto" name="nombre_producto" autocomplete="off">
            <br><br>
            <label>Descripción:</label><textarea id="descripcion_producto" name="descripcion_producto"></textarea>
            <br><br>
            <label>Precio:</label><input type="number" id="precio_producto" name="precio_producto">
            <br><br>
            <label>Imagen:</label><input type="file" id="imagen_producto" name="imagen_producto">
            <br><br>
            <button>Agregar</button>
            <button><a href="adm.php">Volver</a></button>
        </div>
    </form>
</body>
</html>