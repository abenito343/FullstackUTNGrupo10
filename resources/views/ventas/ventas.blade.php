@include('navbar_vendedor')

<head>
    <title>Mis ventas</title>
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
                <div class="col"><h3>Mis Ventas</h3></div>
                <div class="col boton"><button type="button" class="btn btn-primary" onclick="convertirVentasACSV()">Descargar CSV</button></div>
            </div>
        </div>
    </div>
    <div class="horizontal-line"></div>
    <div class="buscador">
        <form action="{{ route('ventas.index') }}" method="GET">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Fecha</span>
                <input type="date" name="fecha" class="form-control" aria-label="Fecha" aria-describedby="addon-wrapping">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>
    <div class="horizontal-line"></div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">ID</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Ver Detalle</th>
            <th scope="col">Imprimir Factura</th>
          </tr>
        </thead>
        <tbody>
          @foreach($ventas as $venta)
              <tr>
                  <td></td>
                  <td>{{ $venta->id }}</td>
                  <td>{{ $venta->fecha }}</td>
                  <td>${{ $venta->total }}</td>
                  <td><a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info">Ver Detalle</a></td>
                  <td><a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-secondary">Imprimir Factura</a></td>
              </tr>
          @endforeach
      </tbody>
    </table>
    @if($ventas->isEmpty())
        <div class="alert alert-warning text-center">No se encontraron resultados</div>
    @endif
</div>

<script type="text/javascript" src="/js/exportarCSV.js"></script>
