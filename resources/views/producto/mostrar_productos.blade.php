@include('navbar_admin')

<head>
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/productos.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<div class="contenido">
    <div class="container">

        @if (session()->has("success"))
            <div class="container">
                <div class="alert alert-success text-center">{{ session("success") }}</div>
            </div>
        @endif

        <div class="horizontal-line"></div>
        <div class="header">
            <div class="row">
                <div class="col">
                    <h1>Gestión de Productos</h1>
                </div>
                <div class="col">
                    <form action="{{ route('productos.create') }}" method="get">
                        <button>+ Agregar nuevo producto</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="horizontal-line"></div>
        <form class="buscador" method="get" action="">
            <input placeholder="Buscar producto" type="text" id="busqueda" name="busqueda" autocomplete="off">
            <button>Buscar</button>
        </form>
        <div class="horizontal-line"></div>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>
                            <form action="{{ route('productos.edit', $producto) }}" method="get">
                                <button class="boton-edit"><i class="las la-pen"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('productos.destroy', $producto) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="boton-delete"><i class="las la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
