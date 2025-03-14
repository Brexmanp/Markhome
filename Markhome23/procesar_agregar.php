<?php
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php'; // Incluye la conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO catalogo (nom_producto, inf_producto, precio) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $nombre, $descripcion, $precio);

    if ($stmt->execute()) {
        header("Location: crud_productos.php?mensaje=producto_agregado");
        exit();
    } else {
        echo "Error al agregar el producto: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
