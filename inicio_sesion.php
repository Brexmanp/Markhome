<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$clave = "";
$BaseDeDatos = "Formularios";

$enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = htmlspecialchars($_POST['correo']);
    $contraseña = htmlspecialchars($_POST['contraseña']);

    

    $query = "SELECT * FROM cliente WHERE correo = '$correo' AND contraseña = '$contraseña'";
    $resultado = mysqli_query($enlace, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['cliente'] = $correo;
        header("Location: inicio1.php");
        exit();
    } else {
        $mensaje = "Nombre o correo incorrectos. Por favor, regístrate si aún no tienes cuenta.";
    }
}

mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Cliente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .inicio{
            text-decoration: none;
            padding-right: 20px;
            color: white;
            font-family: "Anta", sans-serif;
            text-shadow: 2px 2px 2px black;
            font-weight: bold;
            font-size: 1.2vw;
        }
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
    <a class="inicio" href="Index.html">Inicio</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin_login.php">Iniciar sesión (Administrador)</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white text-center">
            <h3>Iniciar Sesión</h3>
        </div>
        <div class="card-body">
            <?php if (isset($mensaje)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>
            <form action="inicio_sesion.php" method="post">
                
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo electrónico" required>
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </form>
            <p class="mt-4 text-center">
                ¿No tienes una cuenta? <a href="index.php" style="color: #2ecc71;">Regístrate aquí</a>.
            </p>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 MARKHOME. Todos los derechos reservados.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>