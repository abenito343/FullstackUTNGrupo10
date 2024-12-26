@include('navbar_admin')

<head>
    <title>Registrar nuevo usuario</title>
</head>

<div class="contenido">
    @if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
    @endif
    <div class="nav2">
        <div class="container-fluid">
            <div class="col"><h3>Registro de usuario</h3></div>
        </div>
    </div>
    <div>
        <form action="/usuario" method="post" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese nombre">
                @error('nombre')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="apellido">Apellido</label>
                <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Ingrese apellido">
                @error('apellido')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="dni">DNI</label>
                <input class="form-control" type="text" id="dni" name="dni" placeholder="Ingrese DNI">
                @error('dni')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="nickname">Nickname de Usuario</label>
                <input class="form-control" type="text" id="nickname" name="nickname" placeholder="Ingrese nickname" autocomplete="off">
                @error('nickname')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="password">Contraseña</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese su contraseña" autocomplete="off">
                @error('password')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="password_confirmation">Repetir Contraseña</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repita la contraseña" autocomplete="off">
                @error('password_confirmation')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="rol">Rol</label>
                <select class="form-select" id="rol" name="rol">
                    <option value="admin">Admin</option>
                    <option value="vendedor">Vendedor</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Registrar usuario</button>
            </div>
        </form>
    </div>
</div>
