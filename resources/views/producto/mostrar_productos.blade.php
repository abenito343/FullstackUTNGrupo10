    @include('navbar_admin')

    <head>
        <title>Gestion de Productos</title>
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
                            <div class="col"><h3>Gestión de Productos</h3></div>
                            <div class="col"> 
                                <form action="/producto/create" method="get">
                                <button class="btn btn-primary">+ Nuevo Producto</button>
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
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</th>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td><img src="{{ asset($producto->img) }}" alt="Imagen de {{ $producto->nombre }}" style="width: 100px; height: 100px; object-fit: cover;"></td>
                    <td>{{$producto->categoria->nombre}}</td>
                    <td>{{ $producto->proveedor->razonSocial }}</td>
                    <td>                        
                        <form action="/producto/{{ $producto->id }}/edit" method="get">
                            <button><i class="las la-edit"></i></button>
                        </form>
                    </td>
                    <td class="icono-tabla">
                        <form action="/producto/{{ $producto->id }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button><i class="las la-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @if($productos->isEmpty())
            <div class="alert alert-warning text-center">No se encontraron resultados</div>
        @endif
    </div>