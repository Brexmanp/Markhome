<?php
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php'; // Asegúrate de que la ruta es correcta

$query = "SELECT * FROM catalogo";
$resultado = mysqli_query($conn, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #28a745; }
        .navbar-brand, .navbar a { color: black !important; }
        .btn-orange { background-color: #e67e22; color: white; }
        .btn-orange:hover { background-color: #d35400; }
        .footer { background-color: #28a745; color: white; text-align: center; padding: 10px 0; margin-top: 20px; }
        .table-dark { background-color: #343a40; color: white; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD de Productos</a>
            <a href="dashboard_administrador.php" class="btn btn-light">← Regresar</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2 class="text-center">Gestión de Productos</h2>
        <div class="text-end mb-3">
            <a href="agregar_productos.php" class="btn btn-orange">Agregar Producto</a>
        </div>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Información</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $fila['id_catalogo']; ?></td>
                        <td><?php echo $fila['nom_producto']; ?></td>
                        <td><?php echo $fila['inf_producto']; ?></td>
                        <td>$<?php echo $fila['precio']; ?></td>
                        <td>
                            <a href="editar_producto.php?id=<?php echo $fila['id_catalogo']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar_producto.php?id=<?php echo $fila['id_catalogo']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <footer class="footer">
        © 2024 MARKHOME. Todos los derechos reservados.
    </footer>
</body>
</html>
