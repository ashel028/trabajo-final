<!-- eliminarProducto.php -->
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Realiza la lógica para eliminar el producto en la base de datos
    $consultaEliminar = "DELETE FROM producto WHERE id = $id";
    if (mysqli_query($conn, $consultaEliminar)) {
        echo "Producto eliminado exitosamente";
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }

    // Cierra la conexión
    mysqli_close($conn);
}
?>
