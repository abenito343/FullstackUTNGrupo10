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
            <div class="row">
                <div class="col"><h3>Editar Proveedor</h3></div>
            </div>
        </div>
    </div>
    <div>
        <form action="/proveedor/{{ $proveedor->id }}" method="post" class="row g-3">
            @csrf
            @method("PUT")
            <div class="col-md-6">
              <label class="form-label">Razón Social</label>
              <input type="text" class="form-control" value="{{ old('razonSocial', $proveedor->razonSocial) }}" name="razonSocial" id="razonSocial" autocomplete="off" required>
              @error('razonSocial')
                            <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Dirección</label>
              <input value="{{ old('direccion', $proveedor->direccion) }}" type="text" class="form-control" id="direccion" name="direccion" autocomplete="off">
              @error('direccion')
                            <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Teléfono</label>
                <input  value="{{ old('telefono', $proveedor->telefono) }}" type="number" class="form-control" name="telefono" autocomplete="off" required>
                @error('telefono')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">Correo</label>
                <input value="{{ old('correo', $proveedor->correo) }}" type="email" class="form-control" required name="correo" autocomplete="off">
                @error('correo')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <div>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </form>
    </div>
</div>