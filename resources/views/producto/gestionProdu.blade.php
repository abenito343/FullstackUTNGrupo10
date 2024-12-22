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
        .search-container {
            margin-bottom: 20px;
        }
        .search-bar {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-new-product {
            padding: 12.5px 25px; 
            background-color: #007BFF; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.25em;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .product-table th {
            background-color: #f2f2f2;
        }
        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-edit {
            background-color: #2196F3;
            color: white;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
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
            <h1>Gestión de Productos</h1>
            <button class="btn-new-product">+ Nuevo Producto</button>
        </div>
        <div class="horizontal-line"></div>
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Búsqueda rápida">
        </div>
        <div class="horizontal-line"></div>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio Lista</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Proveedor</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td><img src="{{ $producto->img }}" alt="{{ $producto->nombre }}" width="50"></td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->proveedor->razonSocial }}</td>
                    <td><button class="btn-edit">Editar</button></td>
                    <td><button class="btn-delete">Eliminar</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>