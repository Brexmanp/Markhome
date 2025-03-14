<?php
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM catalogo WHERE id_catalogo = $id";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        echo "<script>alert('Producto eliminado correctamente.'); window.location='crud_productos.php';</script>";
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }
} else {
    echo "ID de producto no proporcionado.";
}
?>
