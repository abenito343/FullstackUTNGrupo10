<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Productos</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            display: flex;
        }
        .sidebar {
            width: 75px; 
            height: 100vh;
            background-color: #6f42c1; 
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 15px;
            text-decoration: none;
            text-align: center;
            width: 100%;
        }
        .sidebar a:hover {
            background-color: #5a32a3; 
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            flex-grow: 1;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .header h1 {
            color: #007BFF; 
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-submit {
            padding: 10px 20px; 
            background-color: rgba(16, 21, 64, 1); 
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1em;
        }
        .horizontal-line {
            width: 100%;
            height: 1px;
            background-color: #ccc;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="#tab1">P1</a>
        <a href="#tab2">P2</a>
        <a href="#tab3">P3</a>
        <a href="#tab4">P4</a>
    </div>
    <div class="container">
        <div class="header">
            <h1>Editar Producto</h1>
        </div>
        <div class="horizontal-line"></div>
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Ingrese una breve descripción del producto" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select id="categoria" name="categoria" required>
                    <option value="">Seleccione una categoría</option>
                </select>
            </div>
            <div class="form-group">
                <label for="precio_lista">Precio Lista</label>
                <input type="number" id="precio_lista" name="precio_lista" placeholder="Ingrese el precio de lista del producto" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="text" id="imagen" name="imagen" placeholder="Ingrese la URL de la imagen del producto" required>
            </div>
            <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <input type="text" id="proveedor" name="proveedor" placeholder="Ingrese el nombre del proveedor del producto" required>
            </div>
            <button type="submit" class="btn-submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
