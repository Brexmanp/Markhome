<?php
include 'C:\xampp\htdocs\Markhome23\CRUD\modelo\conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nom_producto'];
    $descripcion = $_POST['inf_producto'];
    $precio = $_POST['precio'];

    // Verificar si se ha subido un archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $directorio = "C:/xampp/htdocs/Markhome23/Img/Catalogo/";
        $imagen = basename($_FILES['imagen']['name']);
        $ruta_temporal = $_FILES['imagen']['tmp_name'];

        if (move_uploaded_file($ruta_temporal, $directorio . $imagen)) {
            // Insertar datos en la base de datos
            $query = "INSERT INTO catalogo (nom_producto, inf_producto, precio, imagen) 
                      VALUES ('$nombre', '$descripcion', '$precio', '$imagen')";
            $resultado = mysqli_query($conn, $query);

            if ($resultado) {
                header("Location: catalogo.php");
                exit();
            } else {
                echo "Error al agregar el producto en la base de datos.";
            }
        } else {
            echo "Error al mover la imagen a la carpeta de destino.";
        }
    } else {
        echo "No se ha subido ninguna imagen o hubo un error en la subida.";
    }
}
?>
