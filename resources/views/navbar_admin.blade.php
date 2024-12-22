<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar_admin.css">
</head>
<body>
    <nav class="nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <a href=""><h5>Inventario</h1></a>
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
                    <a href="categorias"><i class="las la-stream"></i><p>Categorías</p></a>
                </li>
                <li>
                    <a href="productos"><i class="las la-gift"></i><p>Productos</p></a>
                </li>
                <li>
                    <a href="usuario"><i class="las la-user"></i><p>Usuarios</p></a>
                </li>
                <li>
                    <a href="proveedores"><i class="las la-shipping-fast"></i><p>Proveedores</p></a>
                </li>
            </ul>
        </div>
</html>