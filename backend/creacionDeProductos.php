<?php

$nombreProducto = $_POST['nombre'];
$tipoProducto = $_POST['tipo'];
$precioProducto = $_POST['precio'];
$opcionesProducto = $_POST['opciones'];

include('conexion.php');

$consulta = "INSERT INTO producto (nombre, tipo, precio) VALUES ('$nombreProducto', '$tipoProducto', $precioProducto)";


mysqli_query($conn, $consulta);

header("location: index.php");

// Consulta para obtener todos los productos


// Cerrar la conexión
mysqli_close($conn);
 ?>
