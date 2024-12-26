@include('navbar_admin')

<head>
    <title>Gestion de Productos</title>
</head>

<div class="contenido">
    @if (session()->has("success"))
            <div class="container">
                <div class="alert alert-success text-center">{{ session("success") }}</div>
            </div>
        @endif
    <div class="nav2">
        <div class="container-fluid">
            <div class="col"><h3>Editar Producto</h3></div>
        </div>
    </div>
    <div>
        <form action="/producto/{{ $producto->id }}" class="row g-3" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="col-md-6">
              <label class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}">
            </div>
            @error('nombre')
                    <div class="div-error">{{$message}}</div>
            @enderror
            <div class="input-group">
                <span class="input-group-text">Descripción</span>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion', $producto->descripcion) }}">
            </div>
            @error('descripcion')
                    <div class="div-error">{{$message}}</div>
            @enderror

            <div class="input-group mb-3">
                <span class="input-group-text">#</span>
                <input type="number" class="form-control" placeholder="Stock" aria-label="Username" name="stock" value="{{ old('stock', $producto->stock) }}">
                @error('stock')
                    <div class="div-error">{{$message}}</div>
                @enderror
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" placeholder="Precio" aria-label="Server" name="precio" value="{{ old('precio', $producto->precio) }}">
                @error('precio')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="img" multiple name="img" value="{{ old('img', $producto->img) }}">
                @error('img')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <select class="form-select form-select-sm" name="categoria" id="categoria">
                <option selected disabled>Selecciona una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        @if(old('categoria', $producto->categoria_id) == $categoria->id) selected @endif>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria')
                    <div class="div-error">{{$message}}</div>
            @enderror
            <select class="form-select form-select-sm" name="proveedor" id="proveedor">
                <option selected disabled>Selecciona un proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}"
                        @if(old('proveedor', $producto->proveedor_id) == $proveedor->id) selected @endif>
                        {{ $proveedor->razonSocial }}
                    </option>
                @endforeach
            </select>
            @error('proveedor')
                    <div class="div-error">{{$message}}</div>
            @enderror
            <div>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </form>
          
    </div>
    
</div>
