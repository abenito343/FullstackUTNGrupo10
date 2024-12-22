@include("sidebar")
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href="css/registro.css">
    <link rel="stylesheet" type="text/css" href="/css/registrar_usuario.css">
    <title>Registrar nuevo usuario</title>
</head>
<body>
    <div class="container pantalla-registro">
        <div class="row">
            <div class="column formulario">
            <a href="/usuario">< Volver al menú de Usuarios</a>
                <h1>Registro de usuario</h1>
                <h2>Ingrese los datos del nuevo usuario</h2>
                <form action="/usuario" method="post">
                    @csrf
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="nombre">Nombre</label>
                            <input class="input-campo" type="text" id="nombre" name="nombre" placeholder="Ingrese nombre">
                            @error('nombre')
                                <div class="div-error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="column col-6">
                            <label class="label-formulario" for="apellido">Apellido</label>
                            <input class="input-campo" type="text" id="apellido" name="apellido" placeholder="Ingrese apellido">
                            @error('apellido')
                                <div class="div-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="dni">DNI</label>
                            <input class="input-campo" type="text" id="dni" name="dni" placeholder="Ingrese DNI">
                            @error('dni')
                                <div class="div-error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="column col-6">
                            <label class="label-formulario" for="usuario">Nickname de Usuario</label>
                            <input class="input-campo" type="text" id="nickname" name="nickname" placeholder="Ingrese nickname" autocomplete="off">
                            @error('nickname')
                                <div class="div-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="password">Contraseña</label>
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
                    <div class="row">
                        <div class="column">
                            <input class="boton-registro" type="submit" value="Registrar usuario">
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