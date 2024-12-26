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
            <div class="col"><h3>Nuevo Producto</h3></div>
        </div>
    </div>
    <div>
        <form action="/producto" class="row g-3" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
              <label class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            </div>
            @error('nombre')
                    <div class="div-error">{{$message}}</div>
            @enderror
            <div class="input-group">
                <span class="input-group-text">Descripción</span>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
            </div>
            @error('descripcion')
                    <div class="div-error">{{$message}}</div>
            @enderror

            <div class="input-group mb-3">
                <span class="input-group-text">#</span>
                <input type="number" class="form-control" placeholder="Stock" aria-label="Username" name="stock" value="{{ old('stock') }}" required >
                @error('stock')
                    <div class="div-error">{{$message}}</div>
                @enderror
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" placeholder="Precio" aria-label="Server" name="precio" value="{{ old('precio') }}" required>
                @error('precio')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="img" multiple name="img" required>
                @error('img')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <select class="form-select form-select-sm" aria-label="Small select example" name="categoria" required>
                <option selected disabled>Seleccion una categoría</option>
                @foreach ($categorias as $categoria)
                <option value={{$categoria->id}}>{{$categoria->nombre}}</option>
                @endforeach
            </select>
            @error('categoria')
                    <div class="div-error">{{$message}}</div>
            @enderror
            <select class="form-select form-select-sm" aria-label="Small select example" name="proveedor" required>
                <option selected disabled>Seleccion un proveedor</option>
                @foreach ($proveedores as $proveedor)
                <option value={{$proveedor->id}}>{{$proveedor->razonSocial}}</option>
                @endforeach
            </select> 
            @error('proveedor')
                    <div class="div-error">{{$message}}</div>
            @enderror
            <div>
              <button type="submit" class="btn btn-primary">Registar nuevo producto</button>
            </div>
          </form>
    </div>
</div>