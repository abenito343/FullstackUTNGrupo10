@include('navbar_admin')

<head>
    <title>Editar producto</title>
</head>

<div class="contenido">
    <div class="container">
        <a href="/producto">< Volver al menú de Productos</a>
        <div class="row">
            <div class="col"><h3>Editar Producto</h3></div>
        </div>
        <form action="/producto/{{ $producto->id }}" method="post">
        @csrf
        @method("PUT")
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre" class="text-muted mb-1">Nombre:</label>
                        <input value="{{ old('nombre', $producto->nombre) }}" type="text" class="form-control form-control-lg" id="nombre" name="nombre" autocomplete="off">
                        @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="descripcion" class="text-muted mb-1">Descripción:</label>
                        <input value="{{ old('descripcion', $producto->descripcion) }}" type="text" class="form-control form-control-lg" id="descripcion" name="descripcion" autocomplete="off">
                        @error('descripcion')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="precio" class="text-muted mb-1">Precio:</label>
                        <input value="{{ old('precio', $producto->precio) }}" type="text" class="form-control form-control-lg" id="precio" name="precio" autocomplete="off">
                        @error('precio')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="stock" class="text-muted mb-1">Stock:</label>
                        <input value="{{ old('stock', $producto->stock) }}" type="text" class="form-control form-control-lg" id="stock" name="stock" autocomplete="off">
                        @error('stock')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <button class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>