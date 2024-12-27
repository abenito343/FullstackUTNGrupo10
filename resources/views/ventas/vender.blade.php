@include('navbar_vendedor')

<head>
    <title>Vender</title>
</head>

<div class="contenido">
    <div class="vender">
        <form action="" method="POST" class="vender">
            @csrf
            <div class="datosProducto">
                <div class="horizontal-line"></div>
                <h3 style="color: rgb(56, 125, 235);">Vender</h3>
                <div class="horizontal-line"></div>
                
                <label for="producto" class="form-label">Producto</label>
                <select class="form-select" aria-label="Seleccionar producto" name="producto" id="producto" onchange="actualizarDatos()">
                    <option selected value="" disabled>Seleccione un producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select><br>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="descripcion" placeholder="Descripción" disabled>
                    <label for="descripcion">Descripción</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" id="cantidad" required>
                    <label for="cantidad">Cantidad</label>
                </div>

                <div>
                    <label for="precio" class="form-label">Precio: $<span id="precio">0</span></label>
                </div>

                <div class="duplaBoton">
                    <button type="button" class="btn btn-primary" id="agregarProducto">Agregar</button>
                    <button type="button" class="btn btn-danger" id="vaciarTabla">Vaciar tabla</button>
                </div>
            </div>
        </form>
        <div class="carrito">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="carritoBody">
                    <!-- Aquí se agregarán los productos seleccionados -->
                </tbody>
            </table>
            <div class="duplaBoton2">
                <button type="submit" class="btn btn-success">Realizar Venta</button>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><h6>Total: $ <span id="total">0</span></h6></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let carrito = [];
    let total = 0;
    let imagenProducto;

    // Función para actualizar la descripción y precio según el producto seleccionado
    function actualizarDatos() {
        const productoId = document.getElementById('producto').value;

        if (productoId) {
            $.ajax({
                url: '/producto/' + productoId, // Ruta para obtener detalles del producto
                method: 'GET',
                success: function(data) {
                    // Actualizar la descripción y el precio
                    console.log(data);
                    
                    $('#descripcion').val(data.descripcion);
                    $('#precio').text(data.precio);
                    imagenProducto=data.img
                },
                error: function() {
                    alert('Error al obtener los detalles del producto.');
                }
            });
        }
    }

    // Función para agregar el producto al carrito
    document.getElementById('agregarProducto').addEventListener('click', function() {
        const select = document.getElementById('producto');
        const cantidad = document.getElementById('cantidad').value;
        
        if (select.value && cantidad > 0) {
            const selectedOption = select.options[select.selectedIndex];
            const productoId = selectedOption.value;
            const nombreProducto = selectedOption.text;
            const precio = parseFloat($('#precio').text());
            const descripcion = $('#descripcion').val();
            const subtotal = precio * cantidad;
            // Agregar al carrito
            carrito.push({ nombre: nombreProducto, descripcion, precio, cantidad, subtotal, imagenProducto });
            actualizarCarrito();
        } else {
            alert('Selecciona un producto y una cantidad');
        }
    });

    // Función para actualizar el carrito
    function actualizarCarrito() {
        let carritoBody = document.getElementById('carritoBody');
        carritoBody.innerHTML = '';

        total = 0;

        carrito.forEach((item, index) => {
            total += item.subtotal; 
            
            let row = `<tr>
                        <td>${item.nombre}</td>
                        <td>${item.descripcion}</td>
                        <td><img src="${item.imagenProducto}" alt="${item.nombre}" style="width: 50px; height: 50px;"></td>
                        <td>$${item.precio}</td>
                        <td>${item.cantidad}</td>
                        <td>$${item.subtotal}</td>
                        <td><button type="button" class="btn btn-danger" onclick="eliminarProducto(${index})"><i class="las la-trash"></i></button></td>
                    </tr>`;
            carritoBody.innerHTML += row;
        });

        document.getElementById('total').innerText = total.toFixed(2);
    }

    // Función para eliminar un producto del carrito
    function eliminarProducto(index) {
        carrito.splice(index, 1);
        actualizarCarrito();
    }

    // Función para vaciar el carrito
    document.getElementById('vaciarTabla').addEventListener('click', function() {
        carrito = [];
        actualizarCarrito();
    });
</script>
