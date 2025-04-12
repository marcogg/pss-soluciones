<?php
// filepath: /Users/marcogarcia/Documents/Repositories/grupo_relsa/Bizfinity-free-lite/mail/send-mail.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    // Validate required fields
    if (empty($name) || empty($phone) || empty($email)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Email configuration
    $to = "marcogarcia.gon@gmail.com"; // Replace with your email address
    $subject = "Nueva descarga de guia - Grupo Relsa";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email body
    $message = "Una nueva persona ha descargado la guia:\n\n";
    $message .= "Nombre: $name\n";
    $message .= "Teléfono: $phone\n";
    $message .= "Correo electrónico: $email\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Gracias por contactarnos. Tu mensaje ha sido enviado con éxito.";
        header("Location: ../../gracias-por-contactarnos.html");
    } else {
        echo "Lo sentimos, hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>