<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css/dashboar_administrador.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Administrador - Dashboard</title>
</head>
<body>
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
                    <a class="nav-link" href="index.html">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <header>
        <h1>Dashboard del Administrador</h1>
    </header>
    <div class="dashboard">
        <h2>Bienvenido</h2>
        <p>Selecciona la opción que quieras realizar:</p>
        <div class="button-group">
            <button class="btn-1" onclick="location.href='crud_productos.php'">Ir a CRUD de Productos</button>
            <button class="btn-2" onclick="location.href='clientes.php'">Ir a CRUD de Clientes</button>
    
        </div>
    </div>
    <div class="container">
        <img src="Img/Campesinos.jpg" alt="Acesor" title="imagen 1">
    </div>
</body>
</html>
