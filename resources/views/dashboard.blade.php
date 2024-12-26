@include('navbar_admin')

<head>
    <title>Dashboard de Gestion</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>

<div class="contenido">
    <div class="container">

        @if (session()->has("success"))
            <div class="container">
                <div class="alert alert-success text-center">{{ session("success") }}</div>
            </div>
        @endif

        <div class="horizontal-line"></div>
        <div class="row">
            <h1 class="titulo-seccion"><i class="las la-user"></i> Gestion de usuarios</h1>
        </div>
        <div class="row">
            <div class="contenedor-tarjetas">
                <div class="col">
                    <form action="/usuario" method="get">
                        <button class="boton-dashboard" type="submit">Tabla de gestion de usuarios</button>
                    </form>
                </div>
                <div class="col">
                    <form action="/usuario/create" method="get">
                        <button class="boton-dashboard" type="submit">Registro de nuevo usuario</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="horizontal-line"></div>
        <div class="row">
            <h1 class="titulo-seccion"><i class="las la-gift"></i> Gestion de productos</h1>
        </div>
        <div class="row">
            <div class="contenedor-tarjetas">
                <div class="col">
                    <form action="/productos" method="get">
                        <button class="boton-dashboard" type="submit">Tabla de gestion de productos</button>
                    </form>
                </div>
                <div class="col">
                    <form action="/productos/create" method="get">
                        <button class="boton-dashboard" type="submit">Registro de nuevo producto</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="horizontal-line"></div>
        <div class="row">
            <h1 class="titulo-seccion"><i class="las la-stream"></i> Gestion de categorias</h1>
        </div>
        <div class="row">
            <div class="contenedor-tarjetas">
                <div class="col">
                    <form action="/categorias" method="get">
                        <button class="boton-dashboard" type="submit">Tabla de gestion de categorias</button>
                    </form>
                </div>
                <div class="col">
                    <form action="/categorias/create" method="get">
                        <button class="boton-dashboard" type="submit">Registro de nueva categoria</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="horizontal-line"></div>
        <div class="row">
            <h1 class="titulo-seccion"><i class="las la-shipping-fast"></i> Gestion de proveedores</h1>
        </div>
        <div class="row">
            <div class="contenedor-tarjetas">
                <div class="col">
                    <form action="/proveedor" method="get">
                        <button class="boton-dashboard" type="submit">Tabla de gestion de proveedores</button>
                    </form>
                </div>
                <div class="col">
                    <form action="/proveedor/create" method="get">
                        <button class="boton-dashboard" type="submit">Registro de nuevo proveedor</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="horizontal-line"></div>
        <div class="row">
            <h1 class="titulo-seccion"><i class="las la-dollar-sign"></i> Gestion de ventas</h1>
        </div>
        <div class="row">
            <div class="contenedor-tarjetas">
                <div class="col">
                    <form action="/ventas" method="get">
                        <button class="boton-dashboard" type="submit">Tabla de gestion de ventas</button>
                    </form>
                </div>
                <div class="col">
                    <form action="/ventas/{usuario}" method="get">
                        <button class="boton-dashboard boton-dashboard-azul" type="submit">Ventas por usuario</button>
                    </form>
                </div>
                <div class="col">
                    <form action="/ventas/{usuario}" method="get">
                        <button class="boton-dashboard boton-dashboard-azul" type="submit">Detalle de ventas</button>
                    </form>
                </div>
                <div class="col">
                    <form action="/ventas/{usuario}/create" method="get">
                        <button class="boton-dashboard boton-dashboard-azul" type="submit">Registrar nueva venta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
