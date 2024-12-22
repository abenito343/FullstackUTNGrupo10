@include('sidebar')

<div class="container contenido">

    @if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
    @endif

    <div class="header">
        <h1>Gestión de Usuarios</h1>
        <form action="./usuario/create" method="get">
            <button class="btn-new-product">+ Nuevo Usuario</button>
        </form>
    </div>
    <div class="horizontal-line"></div>
    <form class="search-container" method="get" action="">
        <input class="search-bar" placeholder="Búsqueda rápida" type="text" id="busqueda" name="busqueda" autocomplete="off">
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
                            <button><i class="fa fa-edit"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="/usuario/{{ $usuario->id }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>