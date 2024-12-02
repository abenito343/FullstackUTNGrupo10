<?php 

require 'conexion_base.php';
require 'producto.php';

if(isset($_POST["nombre_producto"]) && isset($_FILES["imagen_producto"]) && isset($_FILES["imagen2_producto"])){
    $producto = array();
    $producto["nombre_producto"] = $_POST["nombre_producto"];

    // Manejo de la primera imagen
    $type = pathinfo($_FILES["imagen_producto"]["name"], PATHINFO_EXTENSION);
    $data = file_get_contents($_FILES["imagen_producto"]["tmp_name"]);
    $producto["imagen_producto"] = "data:image/".$type.";base64,".base64_encode($data);

    // Manejo de la segunda imagen
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen2_producto"]["name"]);
    move_uploaded_file($_FILES["imagen2_producto"]["tmp_name"], $target_file);
    $producto["imagen2_producto"] = $target_file;

    $conexion = conectar_base();
    $resultado = agregar_producto($conexion, $producto);

    if($resultado){
        echo "Salio bien!";
        echo "<br>";
        header('Location: productos.php');
    }
    else{
        echo "Salio mal!";
        echo "<br>";
    }

    desconectar_base($conexion);
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <label>Nombre:</label><input type="text" id="nombre_producto" name="nombre_producto" autocomplete="off"><br>
    <label>Imagen:</label><input type="file" id="imagen_producto" name="imagen_producto"><br>
    <label>Imagen2:</label><input type="file" id="imagen2_producto" name="imagen2_producto"><br>
    <button>Agregar Producto</button>
    <a href="./productos.php">Volver</a>
</form>