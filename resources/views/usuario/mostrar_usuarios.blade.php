@include('navbar_admin')

<head>
    <title>Gestion de usuarios</title>
</head>

<div class="contenido">
    @if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
    @endif

    <div class="horizontal-line"></div>
    <div class="nav2">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3>Gestión de Usuarios</h3>
                </div>
                <div class="col">
                    <button class="btn btn-primary" type="button" onclick="convertirUsuariosACSV()">Guardar CSV</button>
                </div>
                <div class="col">
                    <form action="/usuario/create" method="get">
                        <button class="btn btn-primary">+ Nuevo Usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line"></div>
    <form class="buscador" method="get" action="">
        <input placeholder="Búsqueda rápida" type="text" id="busqueda" name="busqueda" autocomplete="off">
        <button>Buscar</button>
    </form>
    <div class="horizontal-line"></div>

    @if(request()->has('busqueda'))
        @php
            $usuarios = $usuarios->filter(function($usuario) {
                return stripos($usuario->nombre, request('busqueda')) !== false || 
                       stripos($usuario->apellido, request('busqueda')) !== false || 
                       stripos($usuario->dni, request('busqueda')) !== false || 
                       stripos($usuario->nickname, request('busqueda')) !== false;
            });
        @endphp
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Editar datos de usuario</th>
                <th scope="col">Cambiar contraseña</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->dni }}</td>
                    <td>{{ $usuario->nickname }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>                        
                        <form action="/usuario/{{ $usuario->id }}/edit" method="get">
                            <button><i class="las la-edit"></i></button>
                        </form>
                    </td>
                    <td>                        
                        <form action="/usuario/{{ $usuario->id }}/password_edit" method="get">
                            <button><i class="las la-edit"></i></button>
                        </form>
                    </td>
                    <td class="icono-tabla">
                        <form action="/usuario/{{ $usuario->id }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button><i class="las la-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($usuarios->isEmpty())
        <div class="alert alert-warning text-center">No se encontraron resultados</div>
    @endif
</div>

<script type="text/javascript" src="/js/exportarCSV.js"></script>
</html>