<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Nike en PHP</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a1a; /* Fondo oscuro */
            margin: 0;
            padding: 0;
            text-align: center;
            color: #ffffff;
        }

        .product {
            display: inline-block;
            margin: 20px;
            padding: 20px;
            background-color: #333; /* Casillero oscuro */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-buy {
            background-color: #28a745;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "potrero";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recuperar productos de la base de datos
$sql = "SELECT * FROM producto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Guardar los productos en un array
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Mostrar los productos
    foreach ($products as $product) {
        $productId = $conn->real_escape_string($product['id']);
        $productName = $conn->real_escape_string($product['nombre']);
        $productName = $conn->real_escape_string($product['tipo']);
        $productPrice = $conn->real_escape_string($product['precio']);

        echo "<div class='product'>";
        echo "<h3>{$product['nombre']}</h3>";
        echo "<p>Tipo: {$product['tipo']}</p>";
        echo "<p>Precio: $ {$product['precio']}</p>";
        echo "<a href='#' class='btn' onclick='addToCart({$productId})'>Agregar al carrito</a>";
        echo "<a href='finalizar_compra.php?product_id={$productId}' class='btn btn-buy'>Comprar</a>";
        echo "</div>";
    }
} else {
    echo "No hay productos en la base de datos.";
}

$conn->close();
?>
<script>
    function addToCart(productId) {
        alert("Producto agregado al carrito: " + productId);
        // Aquí puedes agregar lógica para manejar la adición al carrito
    }
</script>

</body>
</html>
