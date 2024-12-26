@include('navbar_admin')

<head>
    <title>Cambiar contraseña</title>
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
                <div class="col"><h3>Cambiar contraseña</h3></div>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="/usuario">< Volver al menú de Usuarios</a>
        <div class="row">
            <div class="col"><div class="campo-show">Nombre: {{ $usuario->nombre }}</div></div>
            <div class="col"><div class="campo-show">Apellido: {{ $usuario->apellido }}</div></div>
        </div>
        <div class="row">
            <div class="col"><div class="campo-show">Nickname: {{ $usuario->nickname }}</div></div>
            <div class="col"><div class="campo-show">DNI: {{ $usuario->dni }}</div></div>
        </div>
        <form action="/usuario/{{ $usuario->id }}/password_edit" method="post" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label" for="password">Nueva Contraseña</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese su contraseña" autocomplete="off">
                @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="password_confirmation">Repetir Contraseña</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repita la contraseña" autocomplete="off">
                @error('password_confirmation')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>
