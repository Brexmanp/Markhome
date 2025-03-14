<?php
session_start();

// Verifica si hay productos en el carrito
if (empty($_SESSION['carrito'])) {
    header("Location: catalogo.php");
    exit;
}

// Simulamos el proceso de compra (aquí podrías guardar en una base de datos)
$_SESSION['carrito'] = []; // Vaciamos el carrito después de la compra

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Exitosa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
            text-align: center;
        }
        .mensaje {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }
        .mensaje h2 {
            color: #28a745;
        }
        .mensaje p {
            font-size: 18px;
            color: #333;
        }
        .btn-success {
            border-radius: 10px;
            padding: 10px 20px;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
    <script>
        // Redirigir automáticamente al catálogo después de 3 segundos
        setTimeout(function() {
            window.location.href = 'catalogo.php';
        }, 3000);
    </script>
</head>
<body>

    <div class="mensaje">
        <h2>¡Compra Exitosa! 🎉</h2>
        <p>Gracias por tu compra. En breve serás redirigido al catálogo.</p>
        <a href="catalogo.php" class="btn btn-success">Volver al Catálogo</a>
    </div>

</body>
</html>
