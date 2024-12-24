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
    <div class="nav2">
        <div class="container-fluid">
            <div class="col"><h3>Nuevo proveedor</h3></div>
        </div>
    </div>
    <div>
        <form action="/proveedor" class="row g-3" method="POST">
            @csrf
            <div class="col-md-6">
              <label class="form-label">Razón Social</label>
              <input type="text" class="form-control" name="razonSocial" id="razonSocial">
              @error('razonSocial')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Dirección</label>
              <input type="text" class="form-control" name="direccion" id="direccion">
              @error('direccion')
                    <div class="div-error">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Teléfono</label>
                <input type="number" class="form-control" required name="telefono" id="telefono">
                @error('telefono')
                    <div class="div-error">{{$message}}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">Correo</label>
                <input type="email" class="form-control" required name="correo" id="correo">
                @error('correo')
                    <div class="div-error">{{$message}}</div>
                @enderror
              </div>
            <div>
              <button type="submit" class="btn btn-primary">Registar nuevo proveedor</button>
            </div>
          </form>
    </div>
</div>