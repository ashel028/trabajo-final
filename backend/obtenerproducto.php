<?php
// conexión a la base de datos (asegúrate de ajustar estos datos según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "potrero";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

// Obtener el ID del producto de la solicitud AJAX
$id = $_GET['id'];

// Consulta SQL para obtener detalles del producto con el ID proporcionado
$consulta = "SELECT id, nombre, tipo, precio FROM producto WHERE id = $id";
$resultado = $conn->query($consulta);

// Verificar si se encontró el producto
if ($resultado->num_rows > 0) {
    // Obtener los datos del producto como un array asociativo
    $producto = $resultado->fetch_assoc();

    // Devolver los datos del producto en formato JSON
    echo json_encode($producto);
} else {
    // Si no se encuentra el producto, devolver un mensaje de error
    echo json_encode(array('error' => 'Producto no encontrado'));
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
