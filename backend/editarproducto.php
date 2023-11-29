<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div id="modalEdicion" style="display: none;">
            <h2>Editar Producto</h2>
            <form id="formularioEdicion">
                <!-- Campos de edición -->
                <label for="nombreEdicion">Nombre:</label>
                <input type="text" id="nombreEdicion" name="nombreEdicion">

                <label for="tipoEdicion">Tipo:</label>
                <input type="text" id="tipoEdicion" name="tipoEdicion">

                <label for="precioEdicion">Precio:</label>
                <input type="number" id="precioEdicion" name="precioEdicion">

                <!-- Botón para guardar cambios -->
                <button type="button" id="guardarCambios">Guardar Cambios</button>
            </form>
        </div>

        <script nonce="9e56987d-6db4-419b-a011-6a91c190da79">
            function editarProducto(id) {
                // Obtener la información actual del producto mediante AJAX
                $.ajax({
                    type: 'GET',
                    url: 'obtenerProducto.php', // Reemplaza con la ruta al archivo PHP que obtiene detalles del producto
                    data: { id: id },
                    success: function (producto) {
                        // Mostrar el formulario de edición y llenar los campos
                        mostrarFormularioEdicion(producto);
                    },
                    error: function (error) {
                        alert("Error al obtener detalles del producto.");
                    }
                });
            }

            function mostrarFormularioEdicion(producto) {
                // Mostrar el modal
                $('#modalEdicion').show();

                // Llenar campos del formulario con la información actual del producto
                $('#nombreEdicion').val(producto.nombre);
                $('#tipoEdicion').val(producto.tipo);
                $('#precioEdicion').val(producto.precio);

                // Manejar el evento de "Guardar cambios"
                $('#guardarCambios').click(function () {
                    // Obtener los nuevos valores del formulario
                    var nuevoNombre = $('#nombreEdicion').val();
                    var nuevoTipo = $('#tipoEdicion').val();
                    var nuevoPrecio = $('#precioEdicion').val();

                    // Enviar los cambios al servidor mediante AJAX
                    $.ajax({
                        type: 'POST',
                        url: 'guardarCambiosProducto.php', // Reemplaza con la ruta al archivo PHP que guarda los cambios
                        data: {
                            id: producto.id,
                            nuevoNombre: nuevoNombre,
                            nuevoTipo: nuevoTipo,
                            nuevoPrecio: nuevoPrecio
                        },
                        success: function (respuesta) {
                            // Manejar la respuesta del servidor después de guardar los cambios
                            alert(respuesta);
                            // Cerrar el modal
                            $('#modalEdicion').hide();
                            // Actualizar la tabla o recargar la página si es necesario
                            location.reload();
                        },
                        error: function (error) {
                            alert("Error al guardar los cambios del producto.");
                        }
                    });
                });
            }
        </script>
  </body>
</html>
