<?php
session_start();
if (empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit;
}

// Calcular el total
$total = 0;
foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['precio'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
        }
        .navbar { background-color: #28a745; }
        .navbar-brand, .navbar a { color: white !important; }
        .footer { background-color: #28a745; color: white; text-align: center; padding: 10px 0; margin-top: auto; }

        /* Centrado del formulario */
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin: auto; /* Centra horizontalmente */
            margin-top: 20px;
        }
        .form-container h2 {
            text-align: center;
            color: #28a745;
            margin-bottom: 20px;
        }
        .form-control, .btn-success {
            border-radius: 10px;
        }
        .productos-lista {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Catálogo de Productos</a>
            <a href="carrito.php" class="btn btn-light">← Volver al Carrito</a>
        </div>
    </nav>

    <!-- Formulario centrado -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="form-container">
            <h2>Finalizar Compra</h2>
            <form action="procesar_compra.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre Completo:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección:</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Modo de Pago:</label>
                    <select name="modo_pago" class="form-control" required>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Transferencia">Transferencia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Productos Seleccionados:</label>
                    <div class="productos-lista">
                        <ul>
                            <?php foreach ($_SESSION['carrito'] as $producto) { ?>
                                <li><?php echo $producto['nombre']; ?> - $<?php echo number_format($producto['precio'], 2); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <strong>Total a pagar: $<?php echo number_format($total, 2); ?></strong>
                </div>
                <button type="submit" class="btn btn-success">Confirmar Compra</button>
            </form>
        </div>
    </div>

</body>
</html>
