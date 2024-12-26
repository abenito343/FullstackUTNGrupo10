@include('navbar_admin')

<head>
    <link rel="stylesheet" type="text/css" href="/css/agregar_producto.css">
    <title>Agregar nuevo producto</title>
</head>
<body>
    <div class="container pantalla-registro">
        <div class="row">
            <div class="column formulario">
            <a href="/producto">< Volver al menú de Productos</a>
                <h1>Registro de producto</h1>
                <h2>Ingrese los datos del nuevo producto</h2>
                <form action="/producto" method="post">
                    @csrf
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="nombre">Nombre</label>
                            <input class="input-campo" type="text" id="nombre" name="nombre" placeholder="Ingrese nombre del producto">
                            @error('nombre')
                                <div class="div-error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="column col-6">
                            <label class="label-formulario" for="descripcion">Descripción</label>
                            <input class="input-campo" type="text" id="descripcion" name="descripcion" placeholder="Ingrese descripción del producto">
                            @error('descripcion')
                                <div class="div-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="precio">Precio</label>
                            <input class="input-campo" type="text" id="precio" name="precio" placeholder="Ingrese precio del producto">
                            @error('precio')
                                <div class="div-error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="column col-6">
                            <label class="label-formulario" for="stock">Stock</label>
                            <input class="input-campo" type="text" id="stock" name="stock" placeholder="Ingrese stock del producto">
                            @error('stock')
                                <div class="div-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="categoria">Categoría</label>
                            <select class="input-campo" id="categoria" name="categoria">
                                <option value="electronica">Electrónica</option>
                                <option value="ropa">Ropa</option>
                                <option value="alimentos">Alimentos</option>
                                <!-- Agregar más opciones según sea necesario -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <input class="boton-registro" type="submit" value="Registrar producto">
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>