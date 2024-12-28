@include('navbar_admin')

<head>
    <title>Detalle de la venta</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.56/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.56/vfs_fonts.js"></script>
</head>

<div class="contenido">
    <div class="horizontal-line"></div>
	<div class="nav2">
		<div class="container-fluid">
			<div class="row">
				<div class="col"><h3>Detalle de la venta</h3></div>
			</div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Factura #{{$detalles[0]->factura}} - Fecha: {{$detalles[0]->fecha}} </span>
            </div>
		</div>
	</div>

    <div class="horizontal-line"></div>
    <table class="table">
        <thead>
          <tr>
			<th scope="col">Nombre del producto</th>
			<th scope="col">Cantidad</th>
			<th scope="col">Precio Unidad</th>
			<th scope="col">Sub Total</th>
          </tr>
        </thead>
        <tbody>          
			@foreach($detalles as $detalle)
			<tr>
				<td>{{ $detalle->nombre }}</td>
				<td>{{ $detalle->cantidad }}</td>
				<td>{{ $detalle->precio }}</td>
				<td>{{ $detalle->subtotal }}</td>
			</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td class="total_factura">Total</td>
				<td class="total_factura">${{$detalles[0]->total}}</td>
			</tr>
			
        </tbody>
    </table>
</div>

<script src="/js/exportarPDF.js" type="text/javascript"></script>
