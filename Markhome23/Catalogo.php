<?php
session_start();
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php';

// Obtener productos del catálogo
$query = "SELECT * FROM catalogo";
$resultado = mysqli_query($conn, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conn));
}

// Contar productos en el carrito
$carrito_count = isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #28a745; }
        .navbar-brand, .navbar a { color: black !important; }
        .cart-icon {
            position: relative;
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
        }
        .cart-count {
            position: absolute;
            top: -5px;
            right: -10px;
            background: yellow;
            color: black;
            border-radius: 50%;
            padding: 3px 7px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .footer { background-color: #28a745; color: white; text-align: center; padding: 10px 0; margin-top: 20px; }
        .product-card { 
            border: 1px solid #ddd; 
            border-radius: 10px; 
            padding: 15px; 
            text-align: center;
            background: white;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }
        .btn-buy {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-buy:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Catálogo de Productos</a>
            <div>
                <a href="carrito.php" class="cart-icon">
                    🛒 <span class="cart-count"><?php echo $carrito_count; ?></span>
                </a>
                <a href="inicio1.php" class="btn btn-light">← Regresar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Catálogo de Productos</h2>
        <div class="row">
            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="product-card">
                        <img src="Img/Catalogo/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nom_producto']; ?>">
                        <h4><?php echo $fila['nom_producto']; ?></h4>
                        <p><?php echo $fila['inf_producto']; ?></p>
                        <p><strong>Precio:</strong> $<?php echo number_format($fila['precio'], 2); ?></p>
                        <form action="agregar_carrito.php" method="POST">
    <input type="hidden" name="id_catalogo" value="<?php echo $fila['id_catalogo']; ?>">
    <input type="hidden" name="producto" value="<?php echo htmlspecialchars($fila['nom_producto']); ?>">
    <input type="hidden" name="precio" value="<?php echo $fila['precio']; ?>">
    <input type="hidden" name="imagen" value="Img/Catalogo/<?php echo $fila['imagen']; ?>">
    <button type="submit" class="btn btn-success">Añadir al carrito</button>
</form>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="footer">
        © 2024 MARKHOME. Todos los derechos reservados.
    </footer>
</body>
</html>
