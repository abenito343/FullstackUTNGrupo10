@include('navbar_admin')

<head>
    <title>Editar Categoría</title>
</head>

<div class="contenido">
    @if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
    @endif
    <div class="nav2">
        <div class="container-fluid">
            <div class="row">
                <div class="col"><h3>Editar Categoría</h3></div>
            </div>
        </div>
    </div>
    <div>
        <form class="row g-3" action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $categoria->nombre) }}">
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $categoria->descripcion) }}">
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
