@include('navbar_admin')

<head>
    <title>Mis ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ventas.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                <div class="col"><h3>Mis ventas</h3></div>
            </div>
        </div>
    </div>
    <div class="horizontal-line"></div>
    <form class="buscador" method="get" action="">
        <input placeholder="Búsqueda rápida" type="text" id="busqueda" name="busqueda" autocomplete="off">
        <button>Buscar</button>
    </form>
    <div class="horizontal-line"></div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Usuario</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->fecha }}</td>
                    <td>{{ $venta->usuario->nickname }}</td>
                    <td>${{ $venta->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if($ventas->isEmpty())
        <div class="alert alert-warning text-center">No se encontraron resultados</div>
    @endif
</div>

@php
    $ventas = \App\Models\Venta::with('usuario')->get();

    if(request()->has('busqueda')) {
        $ventas = $ventas->filter(function($venta) {
            return stripos($venta->usuario->nombre, request('busqueda')) !== false;
        });
    }
@endphp
