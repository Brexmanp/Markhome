<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$database = "formularios";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensaje = "";

// Agregar cliente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $stmt = $conn->prepare("INSERT INTO cliente (nombre, telefono, correo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $telefono, $correo);
    $stmt->execute();
    $stmt->close();
    $mensaje = "Cliente agregado exitosamente";
}

// Modificar cliente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modificar'])) {
    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $stmt = $conn->prepare("UPDATE cliente SET nombre=?, telefono=?, correo=? WHERE id_cliente=?");
    $stmt->bind_param("sssi", $nombre, $telefono, $correo, $id_cliente);
    $stmt->execute();
    $stmt->close();
    $mensaje = "Cliente modificado exitosamente";
}

// Eliminar cliente
if (isset($_GET['eliminar'])) {
    $id_cliente = $_GET['eliminar'];
    $conn->query("DELETE FROM cliente WHERE id_cliente = $id_cliente");
    $mensaje = "Cliente eliminado exitosamente";
}

// Obtener clientes
$result = $conn->query("SELECT id_cliente, nombre, telefono, correo FROM cliente");

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Clientes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function mostrarMensaje(mensaje) {
            if (mensaje) {
                alert(mensaje);
            }
        }

        function llenarFormulario(id, nombre, telefono, correo) {
            console.log("ID:", id, "Nombre:", nombre, "Teléfono:", telefono, "Correo:", correo);

            document.getElementById('id_cliente').value = id;
            document.getElementById('edit_nombre').value = nombre;
            document.getElementById('edit_telefono').value = telefono;
            document.getElementById('edit_correo').value = correo;
            document.getElementById('editarModal').style.display = 'flex';
        }

        function cerrarModal() {
            document.getElementById('editarModal').style.display = 'none';
        }
    </script>
    <style>
        body {
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #2ecc71 !important;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            background-color: white;
        }
        .btn-agregar, .btn-guardar {
            background-color: #e67e22;
            border-color: #e67e22;
            color: white;
        }
        .btn-editar {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
        }
        .btn-eliminar {
            background-color: #c0392b;
            border-color: #c0392b;
            color: white;
        }
        footer {
            background-color: #27ae60;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            text-align: center;
        }
        .close {
            color: red;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover {
            color: darkred;
            cursor: pointer;
        }
    </style>
</head>
<body onload="mostrarMensaje('<?php echo $mensaje; ?>')">

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="dashboard_administrador.php">
        <button class="btn btn-regresar">⬅ Regresar</button>
    </a>
</nav>

<div class="container">
    <h2 class="text-center my-4">Gestión de Clientes</h2>

    <form method="POST" class="mb-4">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="telefono" placeholder="Teléfono" required>
            </div>
            <div class="col">
                <input type="email" class="form-control" name="correo" placeholder="Correo" required>
            </div>
            <div class="col">
                <button type="submit" name="agregar" class="btn btn-agregar btn-block">Agregar Cliente</button>
            </div>
        </div>
    </form>

    <table class="table table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_cliente']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td>
                        <button class="btn btn-editar btn-sm" onclick="llenarFormulario('<?php echo $row['id_cliente']; ?>', '<?php echo $row['nombre']; ?>', '<?php echo $row['telefono']; ?>', '<?php echo $row['correo']; ?>')">Editar</button>
                        <a href="clientes.php?eliminar=<?php echo $row['id_cliente']; ?>" class="btn btn-eliminar btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Modal de Edición -->
<div id="editarModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <h2>Editar Cliente</h2>
        <form method="POST" action="">
            <input type="hidden" id="id_cliente" name="id_cliente">
            <input type="text" id="edit_nombre" name="nombre" placeholder="Nombre" required>
            <input type="text" id="edit_telefono" name="telefono" placeholder="Teléfono" required>
            <input type="email" id="edit_correo" name="correo" placeholder="Correo" required>
            <button type="submit" name="modificar" class="btn btn-guardar">Guardar Cambios</button>
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2024 MARKHOME. Todos los derechos reservados.</p>
</footer>

</body>
</html>
