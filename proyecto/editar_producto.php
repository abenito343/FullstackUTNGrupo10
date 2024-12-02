<?php 

require 'conexion_base.php';
require 'producto.php';

$id_producto = ((isset($_GET["id"]) ? ($_GET["id"]) : 0));

if(!empty($id_producto) && is_numeric($id_producto)){
    $conexion = conectar_base();
    $query = "SELECT * FROM productos WHERE id_producto = ".$id_producto;
    $resultado = mysqli_query($conexion, $query);
    $producto = mysqli_fetch_assoc($resultado);
    desconectar_base($conexion);

    if(isset($_POST["nombre_producto"])){
        $producto["nombre_producto"] = $_POST["nombre_producto"];

        if(isset($_FILES["imagen_producto"]) && $_FILES["imagen_producto"]["error"] == 0){
            $type = pathinfo($_FILES["imagen_producto"]["name"], PATHINFO_EXTENSION);
            $data = file_get_contents($_FILES["imagen_producto"]["tmp_name"]);
            $producto["imagen_producto"] = "data:image/".$type.";base64,".base64_encode($data);
        }

        if(isset($_FILES["imagen2_producto"]) && $_FILES["imagen2_producto"]["error"] == 0){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imagen2_producto"]["name"]);
            move_uploaded_file($_FILES["imagen2_producto"]["tmp_name"], $target_file);
            $producto["imagen2_producto"] = $target_file;
        }

        $conexion = conectar_base();
        $resultado = editar_producto($conexion, $producto);

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
} else {
    echo "Producto no encontrado.";
    echo "<br>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <label>Nombre:</label><input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>" autocomplete="off"><br>
    <label>Imagen:</label><input type="file" id="imagen_producto" name="imagen_producto"><br>
    <label>Imagen2:</label><input type="file" id="imagen2_producto" name="imagen2_producto"><br>
    <button>Editar Producto</button>
    <a href="./productos.php">Volver</a>
</form>