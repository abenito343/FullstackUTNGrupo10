@include('navbar_admin')

<head>
    <title>Gestion de Proveedores</title>
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
                    <div class="col"><h3>Gestión de Proveedores</h3></div>
                    <div class="col">
                        <button class="btn btn-primary" type="button" onclick="convertirTablaACSV('Proveedores.csv')">Guardar CSV</button>
                    </div>
                    <div class="col"> 
                        <form action="/proveedor/create" method="get">
                        <button class="btn btn-primary">+ Nuevo Proveedor</button>
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
            <th scope="col">Razón social</th>
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proveedores as $proveedor)
            <tr>
            <td>{{ $proveedor->razonSocial }}</th>
            <td>{{ $proveedor->direccion }}</td>
            <td>{{ $proveedor->telefono }}</td>
            <td>{{ $proveedor->correo }}</td>
            <td>                        
                <form action="/proveedor/{{ $proveedor->id }}/edit" method="get">
                    <button><i class="las la-edit"></i></button>
                </form>
            </td>
            <td class="icono-tabla">
                <form action="/proveedor/{{ $proveedor->id }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button><i class="las la-trash"></i></button>
                </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($proveedores->isEmpty())
        <div class="alert alert-warning text-center">No se encontraron resultados</div>
    @endif
</div>
<script type="text/javascript" src="/js/exportarCSV.js"></script>
