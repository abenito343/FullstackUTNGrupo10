@include('navbar_vendedor')

<head>
    <title>Detalle de la venta</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<div class="contenido">
    <div class="nav2">
        <div class="container-fluid">
            <div class="row">
                <div class="col"><h3>Detalle de la venta</h3></div>
            </div>
        </div>
    </div>
    <div class="buscador">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Número: #{{ $venta->id }}</span>
        </div>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unidad</th>
                    <th scope="col">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalles as $detalle)
                    <tr>
                        <td></td>
                        <td>{{ $detalle->producto->nombre }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>${{ $detalle->producto->precio }}</td>
                        <td>${{ $detalle->cantidad * $detalle->producto->precio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="input-group flex-nowrap total">
        <span class="input-group-text" id="addon-wrapping">Total: ${{ $venta->total }}</span>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>