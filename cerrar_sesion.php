<?php
session_start();
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión
header("Location: index.html"); // Redirigir a la página de inicio
exit();
?>
