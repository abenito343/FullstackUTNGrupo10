<!doctype html>
<html lang="es">
    <head>
        <title>Tabla</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-4">
                        <h2 class="heading-section">Productos</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="./agregar_producto.php">Agregar Producto</a>
                        <div class="table-wrap">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Rubro</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "full_stack");

                                        $query = "SELECT * FROM productos";
                                        $resultado = mysqli_query($conexion, $query);

                                        while($unaFila = mysqli_fetch_assoc($resultado)){
                                            echo '<tr class="alert" role="alert">
                                                    <td class="contenedor-imagen-producto">
                                                        <img class="imagen-producto" src="'.$unaFila["imagen_producto"].'">
                                                    </td>
                                                    <td>
                                                        <div class="email">
                                                            <span>'.$unaFila["nombre_producto"].'</span>
                                                            <span>Descripción 1</span>
                                                        </div>
                                                    </td>
                                                    <td>$'.$unaFila["precio_producto"].'</td>
                                                    <td>'.$unaFila["stock_producto"].'</td>
                                                    <td>'.$unaFila["rubro_producto"].'</td>
                                                    <td>
                                                        <a href="eliminar_producto.php?id='.$unaFila["id_producto"].'" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                                        </a>
                                                        <a href="editar_producto.php?id='.$unaFila["id_producto"].'" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fa fa-edit"></i></span>
                                                        </a>
                                                    </td>
                                                </tr>';
                                        }

                                        mysqli_close($conexion);
                                    ?>                                
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"81e64de6db471a92","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
    </body>
</html>