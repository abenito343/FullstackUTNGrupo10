@include('navbar_admin')

<head>
    <title>Editar Usuario</title>
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
                <div class="col"><h3>Editar Usuario</h3></div>
            </div>
        </div>
    </div>
    <div>
        <form action="/usuario/{{ $usuario->id }}" method="post" class="row g-3">
            @csrf
            @method("PUT")
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input value="{{ old('nombre', $usuario->nombre) }}" type="text" class="form-control" id="nombre" name="nombre" autocomplete="off">
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Apellido</label>
                <input value="{{ old('apellido', $usuario->apellido) }}" type="text" class="form-control" id="apellido" name="apellido" autocomplete="off">
                @error('apellido')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">DNI</label>
                <input value="{{ old('dni', $usuario->dni) }}" type="text" class="form-control" id="dni" name="dni" autocomplete="off">
                @error('dni')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Nickname</label>
                <input value="{{ old('nickname', $usuario->nickname) }}" type="text" class="form-control" id="nickname" name="nickname" autocomplete="off">
                @error('nickname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Rol</label>
                <input value="{{ old('rol', $usuario->rol) }}" type="text" class="form-control" id="rol" name="rol" autocomplete="off">
                @error('rol')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
