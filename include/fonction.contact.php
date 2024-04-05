<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function sendContactEmail($nom, $prenom, $genre, $date_naissance, $fonction, $email, $sujet, $contenu) {
    try {
        // Configurez les informations d'envoi d'e-mail
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'porscheprojet@gmail.com';
        $mail->Password = 'xndugeanrokwjczx';

        // Configurez l'expéditeur de l'e-mail
        $mail->setFrom('porscheprojet@gmail.com', 'Projet Porsche');

        // Ajoutez l'adresse e-mail du destinataire et le sujet
        $mail->addAddress('porscheprojet@gmail.com');
        $mail->Subject = $sujet;

        // Configurez le corps de l'e-mail
        $mail->Body = "Nom : $nom\nPrénom : $prenom\nGenre : $genre\nDate de naissance : $date_naissance\nFonction : $fonction\nEmail : $email\n\n$contenu";

        // Envoyez l'e-mail
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
         } else {
            echo 'Un mail de validation a été envoyer';
         }
    } catch (Exception $e) {
        echo 'Mail pas envoyer' . $mail->ErrorInfo;
    }
}

?>
