

@include('sidebar');
<div class="container">
    <div class="header">
        <h1>Gestión de Usuarios</h1>
        <form action="./registrar_usuario" method="get">
            <button class="btn-new-product">+ Nuevo Usuario</button>
        </form>
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
                <th>Apellido</th>
                <th>DNI</th>
                <th>Usuario</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se agregarán las filas de productos -->
        </tbody>
    </table>
</div>