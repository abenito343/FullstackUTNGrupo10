@include('navbar_admin')

<head>
    <title>Gestion de usuarios</title>
</head>

<div class="contenido">
    <div class="container">

        @if (session()->has("success"))
            <div class="container">
                <div class="alert alert-success text-center">{{ session("success") }}</div>
            </div>
        @endif

        <div class="horizontal-line"></div>
        <div class="header">
            <div class="row">
                <div class="col">
                    <h1>Gestión de Usuarios</h1>
                </div>
                <div class="col">
                    <form action="/usuario/create" method="get">
                        <button>+ Nuevo Usuario</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="horizontal-line"></div>
        <form class="buscador" method="get" action="">
            <input placeholder="Búsqueda rápida" type="text" id="busqueda" name="busqueda" autocomplete="off">
            <button>Buscar</button>
        </form>
        <div class="horizontal-line"></div>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Usuario</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->dni }}</td>
                        <td>{{ $usuario->nickname }}</td>
                        <td>                        
                            <form action="/usuario/{{ $usuario->id }}/edit" method="get">
                                <button class="boton-edit"><i class="las la-edit"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="/usuario/{{ $usuario->id }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="boton-delete"><i class="las la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
</div>
