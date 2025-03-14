<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Cargar PHPMailer

// Configuración de la cuenta de Gmail
$gmail_usuario = "tu_correo@gmail.com";
$gmail_contraseña = "tu_contraseña_app";  // Usa una contraseña de aplicación

// Lista de destinatarios (puedes obtenerlos de la base de datos)
$destinatarios = [
    "cliente1@gmail.com",
    "cliente2@gmail.com",
    "cliente3@gmail.com"
];

foreach ($destinatarios as $correo) {
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $gmail_usuario;
        $mail->Password = $gmail_contraseña;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurar el remitente y el destinatario
        $mail->setFrom($gmail_usuario, 'MarkHome');
        $mail->addAddress($correo);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Promoción Especial - MarkHome';
        $mail->Body = '<h3>Hola, tenemos una oferta especial para ti!</h3><p>Visita nuestro catálogo y descubre descuentos exclusivos.</p>';
        $mail->AltBody = 'Hola, tenemos una oferta especial para ti! Visita nuestro catálogo y descubre descuentos exclusivos.';

        // Enviar correo
        $mail->send();
        echo "Correo enviado a: $correo <br>";
    } catch (Exception $e) {
        echo "Error al enviar a $correo: {$mail->ErrorInfo} <br>";
    }
}
?>
