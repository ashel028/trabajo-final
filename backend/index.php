<!DOCTYPE html>
<html>

<head>
    <title>Tabla de Gestión de Productos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .edit-form {
            display: none;
        }
    </style>
</head>

<body>

    <form class="create" action="creacionDeProductos.php" method="post">
        <label for="nombre">Nombre del producto</label>
        <input type="text" name="nombre">

        <label for="tipo">Nombre del tipo</label>
        <input type="text" name="tipo">

        <label for="precio">precio</label>
        <input type="number" name="precio">

        <button type="submit" name="button">cargar producto</button>
    </form>

    <?php
    include("conexion.php");
    $consultaGET = "SELECT id, nombre, tipo, precio FROM producto";
    $resultado = mysqli_query($conn, $consultaGET);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<table align='middle'>
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>opciones</th>
            </tr>";

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['tipo'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            // Agrega botones de edición y eliminación con funciones onclick
            echo "<td>
                    <button onclick='editarProducto(" . $row['id'] . ")'>Editar</button>
                    <button onclick='eliminarProducto(" . $row['id'] . ")'>Eliminar</button>
                    </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron productos.";
    }
    ?>


    <div class="edit-form">
        <h2>Editar Producto</h2>
        <form id="formularioEdicion">
            <label for="editNombre">Nombre del producto</label>
            <input type="text" id="editNombre" name="editNombre">

            <label for="editTipo">Nombre del tipo</label>
            <input type="text" id="editTipo" name="editTipo">

            <label for="editPrecio">Precio</label>
            <input type="number" id="editPrecio" name="editPrecio">

            <button type="button" onclick="guardarEdicion()">Guardar</button>
            <button type="button" onclick="cancelarEdicion()">Cancelar</button>
        </form>
    </div>

    <script nonce="9e56987d-6db4-419b-a011-6a91c190da79">
        function editarProducto(id) {
            $.ajax({
                url: 'editarProducto.php?id=' + id,
                type: 'GET',
                success: function (productoActual) {

                    $('#editNombre').val(productoActual.nombre);
                    $('#editTipo').val(productoActual.tipo);
                    $('#editPrecio').val(productoActual.precio);
                    $('.edit-form').show();
                },
                error: function () {
                    alert("Error al obtener la información del producto");
                }
            });
        }

        function guardarEdicion() {

            var id = obtenerIdSeleccionado();
            var nuevoNombre = $('#editNombre').val();
            var nuevoTipo = $('#editTipo').val();
            var nuevoPrecio = $('#editPrecio').val();


            $.ajax({
                url: 'conexion.php',
                type: 'POST',
                data: {
                    id: id,
                    nombre: nuevoNombre,
                    tipo: nuevoTipo,
                    precio: nuevoPrecio
                },
                success: function () {
                    // Cerrar el formulario de edición y recargar la página o actualizar la tabla
                    alert("Producto editado con éxito");
                    $('.edit-form').hide();
                    location.reload("");
                },
                error: function () {
                    alert("Error al actualizar el producto");
                }
            });
        }

        function cancelarEdicion() {
            // Ocultar el formulario de edición
            $('.edit-form').hide();
        }

        function obtenerIdSeleccionado() {
            // Implementa la lógica para obtener el ID del producto seleccionado
            // Puede ser a través de un atributo en el botón de editar o de alguna otra manera
            // En este ejemplo, simplemente se retorna 0
            return 0;
        }

        function eliminarProducto(id) {
            var confirmacion = confirm("¿Estás seguro de que deseas eliminar el producto con ID " + id + "?");

            if (confirmacion) {
                // Utiliza AJAX para enviar la solicitud al servidor para eliminar el producto
                $.ajax({
                    type: 'POST',
                    url: 'eliminarProducto.php',
                    data: { id: id },
                    success: function (response) {
                        // Maneja la respuesta del servidor después de eliminar el producto
                        alert(response);
                        // Puedes recargar la página o actualizar la tabla de productos si es necesario
                        location.reload();
                    },
                    error: function (error) {
                        alert("Error al eliminar el producto.");
                    }
                });
            }
        }
    </script>

</body>

</html>
