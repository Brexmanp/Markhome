<?php
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $query = "INSERT INTO catalogo (nom_producto, inf_producto, precio) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssd", $nombre, $descripcion, $precio);

    if ($stmt->execute()) {
        header("Location: catalogo.php"); // Redirige al catálogo después de agregar
        exit();
    } else {
        echo "Error al agregar el producto: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #28a745; padding: 10px; }
        .navbar .container { display: flex; justify-content: space-between; align-items: center; }
        .navbar-brand { color: white !important; font-size: 1.5rem; margin: auto; }
        .navbar a { color: white !important; text-decoration: none; }
        .container-form { max-width: 400px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-top: 50px; }
        .btn-orange { background-color: #e67e22; color: white; }
        .btn-orange:hover { background-color: #d35400; }
        .footer { background-color: #28a745; color: white; text-align: center; padding: 10px 0; margin-top: 20px; }
        .form-label { font-weight: bold; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="crud_productos.php" class="btn btn-black">← Regresar</a>
            <span class="navbar-brand">Agregar Producto</span>
            <span></span> <!-- Espacio vacío para mantener el título centrado -->
        </div>
    </nav>
    <div class="container container-form">
        <h2 class="text-center">Agregar Producto</h2>
        <form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nom_producto" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="inf_producto" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto:</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required>
            </div>
            <button type="submit" class="btn btn-orange w-100">Agregar Producto</button>
        </form>
    </div>
    <footer class="footer">
        © 2024 MARKHOME. Todos los derechos reservados.
    </footer>
</body>
</html>
