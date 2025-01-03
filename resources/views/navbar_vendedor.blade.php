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
    <link rel="stylesheet" href="{{ asset('css/navbar_vendedor.css') }}">
</head>
<body>
    <nav class="nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <a href="/ventas"><h5>Inventario</h5></a>
                </div>
                <div class="col">
                    <ul>
                        <li>
                        {{ Auth::user()->nickname }}
                        </li>
                        <li>
                            <a href="/logout">Cerrar sesión</a>
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
                    <a href="/vender"><i class="las la-shipping-fast"></i><p>Vender</p></a>
                </li>
                <li>
                    <a href="/ventas"><i class="las la-dollar-sign"></i><p>Mis Ventas</p></a>
                </li>
            </ul>
        </div>
</html>