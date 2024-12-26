@include('navbar_admin')

<head>
    <title>Gestion de Categorías</title>
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
                <div class="col"><h3>Gestión de Categorías</h3></div>
                <div class="col">
                    <form action="{{ route('categorias.create') }}" method="get">
                        <button class="btn btn-primary">+ Nueva Categoría</button>
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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <form action="{{ route('categorias.edit', $categoria) }}" method="get">
                            <button><i class="las la-edit"></i></button>
                        </form>
                    </td>
                    <td class="icono-tabla">
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button><i class="las la-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if(request()->has('busqueda'))
        @php
            $categorias = $categorias->filter(function($categoria) {
                return stripos($categoria->nombre, request('busqueda')) !== false || 
                       stripos($categoria->descripcion, request('busqueda')) !== false;
            });
        @endphp
    @endif
    @if($categorias->isEmpty())
        <div class="alert alert-warning text-center">No se encontraron resultados</div>
    @endif
</div>