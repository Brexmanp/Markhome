<?php
session_start();

$adminCorreo = "EstebanMoraHerrera82@gmail.com";
$adminContrasena = "3242303314";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = htmlspecialchars($_POST['correo']);
    $contrasena = htmlspecialchars($_POST['contrasena']);

    if ($correo == $adminCorreo && $contrasena == $adminContrasena) {
        $_SESSION['admin'] = true;
        $_SESSION['correo'] = $correo;
        header("Location: dashboard_administrador.php");
        exit();
    } else {
        $mensaje = "Correo o contraseña incorrectos.";
        $mensajeClase = "alert-danger";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Administrador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        nav a{
            text-decoration: none;
            padding-right: 20px;
            color: white;
            font-family: "Anta", sans-serif;
            text-shadow: 2px 2px 2px black;
            font-weight: bold;
            /* display: block; */
            font-size: 1.2vw;
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
        <a class="navbar-brand" href="#">Admin Login</a>
        <a href="Index.html">Inicio</a>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Iniciar sesión como Administrador</h4>
                    </div>
                    <div class="card-body">
                        <!-- Mostrar mensaje de error si existe -->
                        <?php if (isset($mensaje)): ?>
                            <div class="alert <?php echo $mensajeClase; ?>" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </form>
                    </div>
                </div>
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