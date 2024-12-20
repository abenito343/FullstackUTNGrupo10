<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/registro_styles.css">
    <title>Login a sistema</title>
</head>
<body>
    <div class="container pantalla-registro">
        <div class="row">
            <div class="column formulario">
                <h1>Registro de usuario</h1>
                <h2>Ingrese los datos del nuevo usuario</h2>
                <form action="./mostrar_usuarios" method="get">
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="nombre">Nombre</label>
                            <input class="input-campo" type="text" id="nombre" name="nombre" placeholder="Ingrese nombre">
                        </div>
                        <div class="column col-6">
                            <label class="label-formulario" for="apellido">Apellido</label>
                            <input class="input-campo" type="text" id="apellido" name="apellido" placeholder="Ingrese apellido">
                        </div>
                    </div>
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="dni">DNI</label>
                            <input class="input-campo" type="text" id="dni" name="dni" placeholder="Ingrese DNI">
                        </div>
                        <div class="column col-6">
                            <label class="label-formulario" for="usuario">Nickname de Usuario</label>
                            <input class="input-campo" type="text" id="usuario" name="usuario" placeholder="Ingrese usuario">
                        </div>
                    </div>
                    <div class="row">
                        <div class="column col-6">
                            <label class="label-formulario" for="password">Contraseña</label>
                            <input class="input-campo" type="password" id="password" name="password" placeholder="Ingrese su contraseña">
                        </div>
                        <div class="column col-6">
                            <label class="label-formulario" for="password">Repetir Contraseña</label>
                            <input class="input-campo" type="password" id="password" name="password" placeholder="Repita la contraseña">
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
</body>
</html>