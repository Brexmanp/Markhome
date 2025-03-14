<?php
session_start();
$nombre = $_SESSION['nombre'];
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            position: relative;
            min-height: 100vh;
            margin: 0;
            padding-bottom: 100px; /* Altura del pie de página */
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .jumbotron {
            background-color: #ffffff;
            padding: 2rem 1rem;
            margin-top: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .jumbotron h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .jumbotron p {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .productos {
            margin-top: 30px;
        }

        .producto {
            text-align: center;
            margin-bottom: 30px;
        }

        .producto img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .producto h3 {
            margin-top: 10px;
            font-size: 1.8rem;
        }

        .producto p {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        /* Estilos para el pie de página */
        footer {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            height: 100px; /* Altura del pie de página */
        }
        .navbar-brand img {
            max-height: 40px; /* Altura máxima de la imagen */
            margin-right: 10px; /* Espacio entre la imagen y el texto */
        }
    </style>
    <script>
function confirmarCierre() {
    let confirmacion = confirm("¿Estás seguro de que deseas cerrar sesión?");
    if (confirmacion) {
        window.location.href = "cerrar_sesion.php";
    }
}
</script>

</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="Img/Mark.jpg" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                    <a class="nav-link" href="catalogo.php">Catalogo</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" onclick="confirmarCierre()">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron text-center">
                    <h2 class="display-4">¡Bienvenid@, <?php echo htmlspecialchars($nombre); ?>!</h2>
                    <p class="lead">Gracias por visitar nuestra plataforma. Explora nuestros productos frescos y de calidad.</p>
                </div>
            </div>
        </div>

        <!-- Sección de productos -->
        <div class="productos">
            <div class="row">
                <div class="col-md-4">
                    <div class="producto">
                        <img src="Img/Catalogo/Papa.jpg" alt="Producto 1" class="img-fluid">
                        <h3>Papa</h3>
                        <p>Descubre el ingrediente esencial que no puede faltar en tu cocina: nuestras papas frescas,
                            cultivadas con dedicación y cuidado en nuestras tierras fértiles.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="producto">
                        <img src="Img/Catalogo/Yuca.jpg" alt="Producto 2" class="img-fluid">
                        <h3>Yuca</h3>
                        <p>En nuestra finca, nos enorgullece ofrecerte yuca fresca de la más alta calidad, cultivada de
                            manera sostenible y respetuosa con el medio ambiente.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="producto">
                        <img src="Img/Catalogo/Tomate.jpg" alt="Producto 3" class="img-fluid">
                        <h3>Tomate</h3>
                        <p>Nuestra lechuga fresca se distingue por su textura crujiente y sus hojas verdes exuberantes,
                            llenas de vitalidad y sabor.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="producto">
                        <img src="Img/Catalogo/Platano.jpg" alt="Producto 4" class="img-fluid">
                        <h3>Plátano</h3>
                        <p>Nuestros plátanos frescos están cuidadosamente seleccionados para garantizar su madurez óptima y
                            su sabor dulce y delicioso.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="producto">
                        <img src="Img/Catalogo/Naranjas.jpg" alt="Producto 5" class="img-fluid">
                        <h3>Naranjas</h3>
                        <p>Nuestras naranjas frescas se distinguen por su color vibrante, su aroma tentador y su textura
                            jugosa que se deshace en tu boca con cada mordida.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="producto">
                        <img src="Img/Catalogo/Mandarina.jpg" alt="Producto 6" class="img-fluid">
                        <h3>Mandarinas</h3>
                        <p>Nuestras mandarinas frescas son un regalo de la naturaleza, cargadas de nutrientes esenciales y
                            beneficios para la salud.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> MARKHOME. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>