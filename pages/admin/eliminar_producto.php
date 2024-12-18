<?php 

if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(!empty($id)){
        $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "backend");

        if (!$conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        $query = "DELETE FROM producto WHERE id_producto = ".$id;
        $resultado = mysqli_query($conexion, $query);

        mysqli_close($conexion);

        if($resultado){
            header('Location: adm.php'); // Redirigir a adm.php
        }
        else{          
            echo "Error al borrar el producto!";
            echo "<br>";
        }
    }
    else{            
        echo "Error al borrar el producto!";
        echo "<br>";
    }
}
else{
    echo "Error al borrar el producto!";
    echo "<br>";
}

?>
