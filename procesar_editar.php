<?php
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php'; // Asegúrate de que esta ruta es correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $query = "UPDATE catalogo SET nom_producto = ?, inf_producto = ?, precio = ? WHERE id_catalogo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $id);

    if ($stmt->execute()) {
        header("Location: crud_productos.php"); // Redirige al CRUD después de editar
        exit();
    } else {
        echo "Error al actualizar el producto: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>
