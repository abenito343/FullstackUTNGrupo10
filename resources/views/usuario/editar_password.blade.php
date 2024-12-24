@include('navbar_admin')

<head>
    <link rel="stylesheet" type="text/css" href="/css/registrar_usuario.css">
    <title>Cambiar contraseña</title>
</head>

<div class="contenido">
    <div class="container">
        <a href="/usuario">< Volver al menú de Usuarios</a>
        <div class="row">
            <div class="col"><h3>Cambiar contraseña</h3></div>
        </div>
        <div class="horizontal-line"></div>
        <div class="row">
            <div class="col">
                <div class="campo-show"> Nombre: {{ $usuario->nombre }}</div>
            </div>
            <div class="col">
                <div class="campo-show"> Apellido: {{ $usuario->apellido }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="campo-show"> Nickname: {{ $usuario->nickname }}</div>
            </div>
            <div class="col">
                <div class="campo-show"> DNI: {{ $usuario->dni }}</div>
            </div>
        </div>
        <div class="horizontal-line"></div>
        <form action="/usuario/{{ $usuario->id }}/password_edit" method="post">
        @csrf            
            <div class="row">
                <div class="column col-6">
                    <label class="label-formulario" for="password">Nueva Contraseña</label>
                    <input class="input-campo" type="password" id="password" name="password" placeholder="Ingrese su contraseña" autocomplete="off">
                    @error('password')
                        <div class="div-error">{{$message}}</div>
                    @enderror
                </div>
                <div class="column col-6">
                    <label class="label-formulario" for="password">Repetir Contraseña</label>
                    <input class="input-campo" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repita la contraseña" autocomplete="off">
                    @error('password_confirmation')
                        <div class="div-error">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <br>
            <button class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>

