<?php
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php';

if (!isset($_GET['id'])) {
    die("ID de producto no proporcionado.");
}
$id = $_GET['id'];

$query = "SELECT * FROM catalogo WHERE id_catalogo = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
    die("Producto no encontrado.");
}
$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #28a745; }
        .navbar-brand, .navbar a { color: oranje !important; }
        .container { max-width: 600px; }
        .btn-orange { background-color: #e67e22; color: white; }
        .btn-orange:hover { background-color: #d35400; }
        .footer { background-color: #28a745; color: white; text-align: center; padding: 10px 0; margin-top: 20px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Editar Producto</a>
            <a href="crud_productos.php" class="btn btn-light">← Regresar</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2 class="text-center">Editar Producto</h2>
        <form action="procesar_editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto['id_catalogo']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto['nom_producto']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Información</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo $producto['inf_producto']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo $producto['precio']; ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-orange">Guardar Cambios</button>
            </div>
        </form>
    </div>
    <footer class="footer">
        © 2024 MARKHOME. Todos los derechos reservados.
    </footer>
</body>
</html>
