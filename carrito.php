<?php
session_start();

// Eliminar producto individual
if (isset($_GET['eliminar'])) {
    $index = $_GET['eliminar'];
    unset($_SESSION['carrito'][$index]);
    $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
    header("Location: carrito.php");
    exit;
}

// Vaciar todo el carrito
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
    exit;
}

// Calcular el total del carrito
$total = 0;
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto) {
        $total += $producto['precio'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #28a745; }
        .navbar-brand, .navbar a { color: black !important; }
        .cart-item { display: flex; align-items: center; gap: 15px; padding: 10px; border-bottom: 1px solid #ddd; }
        .cart-item img { width: 80px; height: 80px; object-fit: cover; border-radius: 5px; }
        .cart-item p { margin: 0; flex-grow: 1; }
        .btn-danger, .btn-success, .btn-warning { font-size: 14px; padding: 5px 10px; }
        .footer { background-color: #28a745; color: white; text-align: center; padding: 10px 0; margin-top: 20px; }
        .total-container { text-align: center; font-size: 18px; font-weight: bold; margin-top: 15px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Carrito de Compras</a>
            <a href="catalogo.php" class="btn btn-light">← Regresar</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Productos en tu Carrito</h2>
        <?php if (!empty($_SESSION['carrito'])) { ?>
            <div class="list-group">
                <?php foreach ($_SESSION['carrito'] as $index => $producto) { ?>
                    <div class="cart-item">
                        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <p><strong><?php echo $producto['nombre']; ?></strong></p>
                        <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                        <a href="carrito.php?eliminar=<?php echo $index; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                <?php } ?>
            </div>

            <div class="total-container">
                Total a pagar: $<?php echo number_format($total, 2); ?>
            </div>

            <div class="text-center mt-4">
                <a href="carrito.php?vaciar=1" class="btn btn-warning">Vaciar Carrito</a>
                <a href="formulario_compra.php" class="btn btn-primary">Comprar Todo</a>
            </div>
        <?php } else { ?>
            <p class="text-center">No hay productos en el carrito.</p>
        <?php } ?>
    </div>

    <footer class="footer">
        © 2024 MARKHOME. Todos los derechos reservados.
    </footer>
</body>
</html>
