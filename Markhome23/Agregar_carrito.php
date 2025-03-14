<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_catalogo'];
    $nombre = $_POST['producto'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen']; // Ahora sí recibimos la imagen correctamente

    // Crear el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregar producto al carrito
    $_SESSION['carrito'][] = [
        'id' => $id,
        'nombre' => $nombre,
        'precio' => $precio,
        'imagen' => $imagen
    ];
}

// Redirigir de vuelta al catálogo
header("Location: catalogo.php");
exit;
?>
