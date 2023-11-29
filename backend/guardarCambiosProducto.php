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

// Obtener los datos del formulario de la solicitud POST
$id = $_POST['id'];
$nuevoNombre = $_POST['nuevoNombre'];
$nuevoTipo = $_POST['nuevoTipo'];
$nuevoPrecio = $_POST['nuevoPrecio'];

// Consulta SQL para actualizar los datos del producto con el ID proporcionado
$consulta = "UPDATE producto SET nombre = '$nuevoNombre', tipo = '$nuevoTipo', precio = $nuevoPrecio WHERE id = $id";

// Ejecutar la consulta y verificar si se realizó correctamente
if ($conn->query($consulta) === TRUE) {
    echo json_encode(array('mensaje' => 'Cambios guardados con éxito'));
} else {
    echo json_encode(array('error' => 'Error al guardar los cambios: ' . $conn->error));
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
