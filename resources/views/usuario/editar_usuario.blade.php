@include('navbar_admin')

<head>
    <title>Editar usuario</title>
</head>

<div class="contenido">
    <div class="container">
        <a href="/usuario">< Volver al menú de Usuarios</a>
        <div class="row">
            <div class="col"><h3>Editar Usuario</h3></div>
        </div>
        <form action="/usuario/{{ $usuario->id }}" method="post">
        @csrf
        @method("PUT")
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre" class="text-muted mb-1"><small>Nombre:</small></label>
                        <input value="{{ old('nombre', $usuario->nombre) }}" type="text" class="form-control form-control-lg" id="nombre" name="nombre" autocomplete="off">
                        @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nombre" class="text-muted mb-1"><small>Apellido:</small></label>
                        <input value="{{ old('apellido', $usuario->apellido) }}" type="text" class="form-control form-control-lg" id="apellido" name="apellido" autocomplete="off">
                        @error('apellido')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dni" class="text-muted mb-1"><small>DNI:</small></label>
                        <input value="{{ old('dni', $usuario->dni) }}" type="text" class="form-control form-control-lg" id="dni" name="dni" autocomplete="off">
                        @error('dni')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nickname" class="text-muted mb-1"><small>Nickname:</small></label>
                        <input value="{{ old('nickname', $usuario->nickname) }}" type="text" class="form-control form-control-lg" id="nickname" name="nickname" autocomplete="off">
                        @error('nickname')
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

