<?php
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    
    // Manejo de imagen
    $directorio = "Img/Catalogo/"; // Asegúrate de que esta carpeta existe
    $imagenNombre = basename($_FILES["imagen"]["name"]);
    $rutaImagen = $directorio . $imagenNombre;

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen)) {
        // Insertar en la base de datos
        $sql = "INSERT INTO catalogo (nom_producto, inf_producto, precio, img_producto) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $rutaImagen);

        if ($stmt->execute()) {
            echo "<script>alert('Producto agregado correctamente'); window.location.href = 'crud_productos.php';</script>";
        } else {
            echo "Error al agregar producto: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error al subir la imagen.";
    }
}

$conn->close();
?>
