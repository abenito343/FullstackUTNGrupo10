<?php 

//CONEXION A LA BASE DATOS (servidor:puerto, usuario, password, esquema de base datos)
//127.0.0.1 === localhost
$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "full_stack");

if($conexion === false){ //if(empty($conexion)) { 
    echo "Hubo un error en la conexion a la base de datos";
    echo "<br>";
}
else{
    echo "Se conecto correctamente a la base de datos";
    echo "<br>";
}

/*
//AGREGAR UN NUEVO PRODUCTO
$query = "INSERT INTO productos (nombre_producto, precio_producto, stock_producto, rubro_producto) VALUES ('Pepsi 2.25lt', 2000, 60, 'Gaseosas')";
$resultado = mysqli_query($conexion, $query);

if($resultado === false){
    echo "Algo salio mal, no se ejecuta la query!";
    echo "<br>";
}
else{
    echo "La query se ejecuto correctamente!";
    echo "<br>";
}
*/

//OBTENER LOS PRODUCTOS DE LA BASE DE DATOS
$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);

while($unaFila = mysqli_fetch_assoc($resultado)){
    echo "<h2>".$unaFila["nombre_producto"]."</h2>";
    echo "<br>";
    echo $unaFila["precio_producto"];
    echo "<br>";
    echo "<br>";
}

//DESCONEXION A LA BASE DE DATOS
mysqli_close($conexion);

?>