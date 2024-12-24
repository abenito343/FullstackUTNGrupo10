<!-- filepath: /c:/xampp/htdocs/curso/FullstackUTNGrupo10/FullstackUTNGrupo10/resources/views/categoria/edit.blade.php -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoría</title>
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
                        <div class="col"><h3>Editar categoría</h3></div>
                    </div>
                </div>
            </div>
            <div>
                <form class="row g-3" action="{{ route('categorias.update', $categoria) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="{{ $categoria->descripcion }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>