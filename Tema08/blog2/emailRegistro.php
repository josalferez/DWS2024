<?php

    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de que esta ruta sea correcta

function enviarCorreoSendinblue($destinatario, $nombreUsuario) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Sendinblue
        $mail->isSMTP();
        $mail->Host = 'live.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'smtp@mailtrap.io';
        $mail->Password = '**********e6523'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        // Configuración del correo
        $mail->setFrom('no-reply@demomailtrap.com', 'Pruebas Mailtrap');
        $mail->addAddress($destinatario); // Destinatario
        $mail->isHTML(true);
        $mail->Subject = 'Confirmación de registro';

        // Cuerpo del correo
        $mail->Body = "
            <h1>¡Hola, $nombreUsuario!</h1>
            <p>Gracias por registrarte en nuestro sitio web.</p>
            <p>Por favor, haz clic en el siguiente enlace para confirmar tu registro:</p>
            <a href='https://tu-sitio-web.com/confirmar?email=$destinatario'>Confirmar registro</a>
            <p>Si no solicitaste este registro, ignora este correo.</p>
        ";

        // Enviar el correo
        $mail->send();
        $_SESSION['emailEnviado'] = "Correo enviado a $destinatario.";
    } catch (Exception $e) {
        $_SESSION['emailEnviado'] = "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}

// Ejemplo de uso
enviarCorreoSendinblue('jalfpin474@g.educaand.es', 'Registro Ejemplo');
?>
