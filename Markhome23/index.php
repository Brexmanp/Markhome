<?php
ob_start();
session_start();

$servidor = "localhost";
$usuario = "root";
$clave = "";
$BaseDeDatos = "Formularios";

$enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
    $nombre = mysqli_real_escape_string($enlace, $_POST['nombre']);
    $telefono = mysqli_real_escape_string($enlace, $_POST['telefono']);
    $correo = mysqli_real_escape_string($enlace, $_POST['correo']);
    $contraseña = mysqli_real_escape_string($enlace, $_POST['contraseña']);

    $insertarDatos = "INSERT INTO cliente (nombre, telefono, correo, contraseña) VALUES ('$nombre', '$telefono', '$correo', '$contraseña')";

    if (mysqli_query($enlace, $insertarDatos)) {
        $_SESSION['nombre'] = $nombre;

        // Depuración: Verifica si llega hasta aquí
        echo "Redirigiendo...";
        header("Location: inicio_sesion.php");
        die();
    } else {
        echo "Error en la consulta: " . mysqli_error($enlace);
    }
}

mysqli_close($enlace);
ob_end_flush();
?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .card-header.bg-primary {
            background-color: #2ecc71 !important; 
        }
        .btn.btn-primary {
            background-color: #2ecc71 !important;
            border-color: #2ecc71 !important;
        }
        .navbar-dark .navbar-brand img {
            width: 40px;
        }
        .form-control {
            border: 2px solid #2ecc71; 
            border-radius: 10px; 
        }
        .form-control:focus {
            border-color: #27ae60; 
            box-shadow: none; 
        }
        .card {
            border-radius: 15px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        footer {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            height: 100px; 
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Mi Tienda</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin_login.php">Iniciar sesión (Administrador)</a>
            </li>
            <li>
                <a class="nav-link" href="inicio_sesion.php">Iniciar sesión</a>
            </li>
        </ul>
    </div>
</nav>



    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Iniciar</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($mensaje)): ?>
                            <div class="alert <?php echo $mensajeClase; ?>" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                            </div>
                           
                            <div class="form-group">
                                <label for="Correo">Telefono</label>
                                <input type="varchar" class="form-control" id="telefono" name="telefono" placeholder="telefono" required>
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo Electronico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="correo" required>
                            </div>

                            <div class="form-group">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="contraseña" required>
                            </div>
                            <button type="submit" name="registro" class="btn btn-primary btn-block">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white mt-5 p-4 text-center">
        <p>&copy; MARKHOME</p>
        <div>
            <a href="https://www.facebook.com" class="text-white mr-2">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.twitter.com" class="text-white mr-2">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" class="text-white mr-2">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>