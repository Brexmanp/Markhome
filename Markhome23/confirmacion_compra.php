<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #4CAF50; font-family: 'Georgia', serif; }
        .container { max-width: 600px; background: white; padding: 20px; margin-top: 50px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); }
        h2 { text-align: center; color: #4CAF50; }
        .btn-primary { width: 100%; }
        footer { background-color: #28a745; color: white; text-align: center; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Compra Exitosa</h2>
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_GET['nombre']); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($_GET['correo']); ?></p>
        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($_GET['telefono']); ?></p>
        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($_GET['direccion']); ?></p>
        <p><strong>Producto:</strong> <?php echo htmlspecialchars($_GET['producto']); ?></p>
        <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($_GET['cantidad']); ?></p>
        <p><strong>Total:</strong> $<?php echo htmlspecialchars($_GET['total']); ?></p>
        <div class="text-center">
            <a href="catalogo.php" class="btn btn-primary">Volver al Catálogo</a>
        </div>
    </div>

    <footer>
        © 2024 MARKHOME. Todos los derechos reservados.
    </footer>
</body>
</html>
