@include('navbar_admin')

<head>
    <title>Tabla de gestion de ventas</title>
</head>

<div class="contenido">
    <div class="horizontal-line"></div>
    <div class="nav2">
        <div class="container-fluid">
            <div class="row">
                <div class="col"><h3>Tabla de gestion de Ventas</h3></div>
                <div class="col boton"><button type="button" class="btn btn-primary" onclick="convertirTablaACSV('ventas.csv')">Descargar CSV</button></div>
            </div>
        </div>
    </div>
    <div class="horizontal-line"></div>
    <div class="buscador">
        <div class="input-group flex-nowrap">
          <form class="buscador" method="get" action="">
            <label for="busqueda" class="input-group-text">Fecha:</label>
            <input type="date" class="form-control" id="busqueda" name="busqueda">
            <button type="submit" class="btn btn-primary">Buscar</button>
          </form>
        </div>
        
    </div>
    <div class="horizontal-line"></div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre Vendedor</th>
            <th scope="col">Nickname</th>
            <th scope="col">ID venta</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Ver Detalle</th>
            <th scope="col">Imprimir Factura</th>
          </tr>
        </thead>
        <tbody>          
          @foreach($ventas as $venta)
          <tr>
            <td>{{ $venta->nombre }} {{ $venta->apellido }}</td>
            <td>{{ $venta->nickname }}</td>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>{{ $venta->total }}</td>
            <td><a href="/detalle_venta_admin/{{ $venta->id }}"><i class="las la-file-alt"></i></a></td>
            <td><a href="/detalle_venta_admin/{{ $venta->id }}/pdf"><i class="las la-print"></i></a></td>
          </tr>
          @endforeach
        </tbody>
    </table>
    @if($ventas->isEmpty())
        <div class="alert alert-warning text-center">No se encontraron resultados</div>
    @endif
</div>

<script type="text/javascript" src="/js/exportarCSV.js"></script>
<script src="/js/exportarPDF.js" type="text/javascript"></script>
