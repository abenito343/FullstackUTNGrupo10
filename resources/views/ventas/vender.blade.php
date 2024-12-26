@include('navbar_vendedor')

<head>
    <title>Vender</title>
</head>

<div class="contenido">
    <div class="vender">
        
        <div class="datosProducto">
            <div class="horizontal-line"></div>
            <h3 style="color: rgb(56, 125, 235);">Vender</h3>
            <div class="horizontal-line"></div>
            <label for="basic-url" class="form-label">Producto</label>
            <select class="form-select" aria-label="Default select example">
                <option selected value="">Selecione un producto</option>
                <option value="1">Vasos</option>
                <option value="2">Tenedor</option>
                <option value="3">Cuchara</option>
                </select><br>
            <div class="form-floating mb-3">
                <input type="Descripcion" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled>
                <label for="floatingInputDisabled">Descripción</label>
            </div>
            <div>
                <input type="number" class="form-control" placeholder="Cantidad">
            </div>
            <div>
                <label for="basic-url" class="form-label">Precio: $133</label>
            </div>
            <div class="duplaBoton">
                <button type="button" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-danger">Vaciar tabla</button>
            </div>
            
        </div>
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
                <tbody>
                    <tr>
                    <th scope="row">Super Platos</th>
                    <td>Platos para comer</td>
                    <td>plato.jgp</td>
                    <td>$123</td>
                    <td>3</td>
                    <td>$ 369</td>
                    <td><a href=""><i class="las la-trash"></i></a></td>
                    </tr>
                    <tr>
                    <th scope="row">Super Platos</th>
                    <td>Platos para comer</td>
                    <td>plato.jgp</td>
                    <td>$123</td>
                    <td>3</td>
                    <td>$ 369</td>
                    <td><a href=""><i class="las la-trash"></i></a></td>
                    </tr>
                    <tr>
                    <th scope="row">Super Platos</th>
                    <td>Platos para comer</td>
                    <td>plato.jgp</td>
                    <td>$123</td>
                    <td>3</td>
                    <td>$ 369</td>
                    <td><a href=""><i class="las la-trash"></i></a></td>
                    </tr>
                </tbody>
                </table>
                <div class="duplaBoton2">
                <button type="button" class="btn btn-success">Realizar Venta</button>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><h6>Total: $ 123123</h6></span>
                </div>
            </div>
        </div>
    </div>
</div>