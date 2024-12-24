<!-- filepath: /c:/xampp/htdocs/curso/FullstackUTNGrupo10/FullstackUTNGrupo10/resources/views/categoria/index.blade.php -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categorias.css') }}">
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
                        <li><a href="">Contacto</a></li>
                        <li><a href="">¿Quiénes somos?</a></li>
                        <li>UserName</li>
                        <li><a href="">LogOut</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="main">
        <div class="menu">
            <ul>
                <li><a href="{{ route('categorias.index') }}"><i class="las la-stream"></i><p>Categorías</p></a></li>
                <li><a href="{{ route('productos.index') }}"><i class="las la-gift"></i><p>Productos</p></a></li>
                <li><a href="{{ route('usuarios.index') }}"><i class="las la-user"></i><p>Usuarios</p></a></li>
                <li><a href="{{ route('proveedores.index') }}"><i class="las la-shipping-fast"></i><p>Proveedores</p></a></li>
            </ul>
        </div>
        <div class="contenido">
            <div class="nav2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col"><h3>Categorías</h3></div>
                        <div class="col boton"><a href="{{ route('categorias.create') }}" class="btn btn-primary">+ Agregar nueva categoría</a></div>
                    </div>
                </div>
            </div>
            <div class="buscador">
                <div class="input-group flex-nowrap">
                    <input type="text" class="form-control" placeholder="Buscar categoría" aria-describedby="addon-wrapping">
                </div>
                <button type="button" class="btn btn-primary">Buscar</button>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            <td><a href="{{ route('categorias.edit', $categoria) }}"><i class="las la-pen"></i></a></td>
                            <td class="iconoTabla">
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button><i class="las la-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>