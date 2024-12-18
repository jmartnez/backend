<?php
$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "backend");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$id_producto = $_POST["id_producto"];
$nombre_producto = $_POST["nombre_producto"];
$descripcion_producto = $_POST["descripcion_producto"];
$precio_producto = $_POST["precio_producto"];
$imagen_producto = $_FILES["imagen_producto"];

if ($imagen_producto["size"] > 0) {
    // OBTENER LA EXTENSION DEL ARCHIVO SUBIDO
    $type = pathinfo($imagen_producto["name"], PATHINFO_EXTENSION);

    // LEER EL CONTENIDO DE LA IMAGEN EN FORMATO STRING
    $data = file_get_contents($imagen_producto["tmp_name"]);

    // OBTENER LA CODIFICACION EN BASE64 DEL CONTENIDO DE LA IMAGEN
    $imagen_base64 = "data:image/".$type.";base64,".base64_encode($data);

    $query = "UPDATE producto SET nombre_producto='$nombre_producto', descripcion_producto='$descripcion_producto', precio_producto='$precio_producto', imagen_producto='$imagen_base64' WHERE id_producto='$id_producto'";
} else {
    $query = "UPDATE producto SET nombre_producto='$nombre_producto', descripcion_producto='$descripcion_producto', precio_producto='$precio_producto' WHERE id_producto='$id_producto'";
}

$resultado = mysqli_query($conexion, $query);

if($resultado){
    // Salió todo bien!
    header('Location: adm.php');
}
else{
    // Mensaje de error!
    echo "Error al actualizar el producto.";
}

mysqli_close($conexion);
?>
