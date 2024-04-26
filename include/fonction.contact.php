<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Fonction pour envoyer l'e-mail
function sendContactEmail($nom, $prenom, $genre, $date_naissance, $fonction, $email, $sujet, $contenu) {
    try {
        // Configuration de PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'porscheprojet@gmail.com';
        $mail->Password = 'xndugeanrokwjczx';
        $mail->setFrom('porscheprojet@gmail.com', 'Projet Porsche');
        $mail->addAddress('porscheprojet@gmail.com');
        $mail->Subject = $sujet;

        // Configuration du corps de l'e-mail avec du HTML pour formater les données
        $mail->isHTML(true);
        $mail->Body = "
            <h2>Formulaire de contact</h2>
            <p><strong>Nom :</strong> $nom</p>
            <p><strong>Prénom :</strong> $prenom</p>
            <p><strong>Genre :</strong> $genre</p>
            <p><strong>Date de naissance :</strong> $date_naissance</p>
            <p><strong>Fonction :</strong> $fonction</p>
            <p><strong>Email :</strong> $email</p>
            <p><strong>Contenu :</strong> $contenu</p>
        ";

        // Envoi de l'e-mail
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Un mail de validation a été envoyé';
        }
    } catch (Exception $e) {
        echo 'Mail pas envoyé' . $mail->ErrorInfo;
    }
}
?>
