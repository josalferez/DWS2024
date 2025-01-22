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
        $mail->Host = 'mail.juntadeandalucia.es';
        //$mail->Host = 'smtp-relay.brevo.com';
        $mail->SMTPAuth = true;
        //$mail->Username = '840b74001@smtp-brevo.com'; // Tu correo en Sendinblue
        $mail->Username = 'jose.alferez.edu';
        //$mail->Password = '6ch21bkvWKG4ZqrE'; // Clave API generada en Sendinblue
        $mail->Password = ''; // Con la contraseña de jose.alferez.edu funcionan los envíos de correos. 
                              // Con la cuenta de Brevo no funcionan los envíos de correos.
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        //$mail->Port = 587;


        // Configuración del correo
        $mail->setFrom('jose.alferez.edu@juntadeandalucia.es', 'Blog de Videojuegos');
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
enviarCorreoSendinblue('josealferez@gmail.com', 'Registro Ejemplo');
?>
