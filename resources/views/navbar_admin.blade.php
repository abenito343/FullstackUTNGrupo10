<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/css/navbar_admin.css">
</head>
<body>
    <nav class="nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <a href="/dashboard"><h5>Inventario</h1></a>
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
                            
                        {{ Auth::user()->nickname }}
                        </li>
                        <li>
                            <a href="/logout">LogOut</a>
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
                    <a href="/usuario"><i class="las la-user"></i><p>Usuarios</p></a>
                </li>
                <li>
                    <a href="/productos"><i class="las la-gift"></i><p>Productos</p></a>
                </li>
                <li>
                    <a href="/categorias"><i class="las la-stream"></i><p>Categorías</p></a>
                </li>
                <li>
                    <a href="/proveedor"><i class="las la-shipping-fast"></i><p>Proveedores</p></a>
                </li>
                <li>
                    <a href="/ventas"><i class="las la-dollar-sign"></i><p>Ventas</p></a>
                </li>
            </ul>
        </div>
</html>