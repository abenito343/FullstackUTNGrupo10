<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login_styles.css">
    <title>Login a sistema</title>
</head>
<body>
    <div class="container pantalla-login">
        <div class="row">
            <div class="column col-5 lado-izq">
                <h1>Login</h1>
                <h2>Ingrese sus credenciales para acceder al sistema</h2>

                <form class="formulario" action="./mostrar_usuarios" method="get">
                    <div class="row">
                        <div class="column">
                            <label class="label-formulario" for="usuario">Nombre de usuario</label>
                            <input class="input-login" type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label class="label-formulario" for="password">Contraseña</label>
                            <input class="input-login" type="password" id="password" name="password" placeholder="Ingrese su contraseña" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="recordacion">
                                <input class="check-recordar" type="checkbox" name="recuerdame" id="recuerdame">
                                <h3>Recuerdame</h3>
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="column">
                            <input class="boton-login" type="submit" value="Login">
                        </div>
                    </div>
                </form>
            </div>
            <div class="column lado-der">
                <img src="../img/login_img2.webp" alt="Imagen robada de login">
            </div>
        </div>
    </div>
</body>
</html>