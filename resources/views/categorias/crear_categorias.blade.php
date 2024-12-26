@include('navbar_admin')

<head>
    <title>Gestion de Categorías</title>
</head>

<div class="contenido">
    @if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
    @endif
    <div class="nav2">
        <div class="container-fluid">
            <div class="col"><h3>Nueva categoría de producto</h3></div>
        </div>
    </div>
    <div>
        <form action="{{ route('categorias.store') }}" class="row g-3" method="POST">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
                @error('descripcion')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Registrar nueva categoría</button>
            </div>
        </form>
    </div>
</div>
