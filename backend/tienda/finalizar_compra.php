<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a1a; /* Fondo oscuro */
            margin: 0;
            padding: 0;
            text-align: center;
            color: #ffffff;
        }

        .confirmation {
            margin: 50px;
            padding: 20px;
            background-color: #333; /* Casillero oscuro */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .confirmation img {
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
    </style>
</head>
<body>

<?php
// Simular la obtención de detalles del producto desde la base de datos
// En una aplicación real, esto debería ser obtenido de la base de datos
$productId = isset($_GET['product_id']) ? $_GET['product_id'] : 0;

$products = [
    ['id' => 1, 'name' => 'Camiseta Nike', 'price' => 25.00, 'image' => 'nike-shirt.jpg'],
    ['id' => 2, 'name' => 'Pantalones Nike', 'price' => 40.00, 'image' => 'nike-pants.jpg'],
    ['id' => 3, 'name' => 'Zapatillas Nike', 'price' => 150.00, 'image' => 'nike-shoes.jpg'],
    ['id' => 4, 'name' => 'Sudadera Nike', 'price' => 80.00, 'image' => 'nike-sweatshirt.jpg'],
    ['id' => 5, 'name' => 'Calcetines Nike', 'price' => 5.00, 'image' => 'nike-socks.jpg'],
    ['id' => 6, 'name' => 'Chaqueta Nike', 'price' => 120.00, 'image' => 'nike-jacket.jpg'],
];

$selectedProduct = null;

foreach ($products as $product) {
    if ($product['id'] == $productId) {
        $selectedProduct = $product;
        break;
    }
}

if ($selectedProduct) {
    echo "<div class='confirmation'>";
    echo "<img src='images/{$selectedProduct['image']}' alt='{$selectedProduct['name']}'><br>";
    echo "<h3>{$selectedProduct['name']}</h3>";
    echo "<p>Precio: $ {$selectedProduct['price']}</p>";
    echo "<p>Gracias por tu compra. El producto ha sido agregado a tu carrito.</p>";
    echo "<a href='#' class='btn'>Ir al Carrito</a>";
    echo "</div>";
} else {
    echo "<p>No se encontró el producto.</p>";
}
?>

</body>
</html>
