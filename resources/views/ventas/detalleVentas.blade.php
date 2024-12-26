<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mis ventas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/ventas.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    <body>
        <nav class="nav">
                <div class="container-fluid">
                        <div class="row">
                                <div class="col">
                                        <a href=""><h5>Inventario</h5></a>
                                </div>
                                <div class="col">
                                        <ul>
                                                <li>
                                                     <a href="">Contacto</a>     
                                                </li>
                                                <li>
                                                        <a href="">¿Quiénes somos?</a>      
                                                </li>
                                                <li>
                                                        UserName      
                                                </li>
                                                <li>
                                                        <a href="">LogOut</a>      
                                                </li>
                                        </ul>
                                </div>
                        </div>
                </div>
        </nav>
        <div class="main">
                <div class="menu">
                        <ul>
                                <li>
                                        <a href="misVentas"><i class="las la-calculator"></i><p>Mis Ventas</p></a>
                                </li>
                                <li>
                                        <a href="vender"><i class="las la-chart-area"></i><p>Vender</p></a>
                                </li>
                        </ul>
                </div>
                <div class="contenido">
                        <div class="nav2">
                                <div class="container-fluid">
                                        <div class="row">
                                                <div class="col"><h3>Detalle de la venta</h3></div>
                                        </div>
                                </div>
                        </div>
                        <div class="buscador">
                                <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Número de Venta: #1231</span>
                                </div>
                        </div>
                        <div>
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nombre del producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio Unidad</th>
                                                <th scope="col">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>Platos</td>
                                                <td>3</td>
                                                <td>$ 44</td>
                                                <td>3333</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Platos</td>
                                                <td>3</td>
                                                <td>$ 44</td>
                                                <td>3333</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Platos</td>
                                                <td>3</td>
                                                <td>$ 44</td>
                                                <td>3333</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Platos</td>
                                                <td>3</td>
                                                <td>$ 44</td>
                                                <td>3333</td>
                                            </tr>
                                        </tbody>
                                </table>
                        </div>
                        <div class="input-group flex-nowrap total">
                                <span class="input-group-text" id="addon-wrapping">Total: $ 123123</span>
                        </div>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>