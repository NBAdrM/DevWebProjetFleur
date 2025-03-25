<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

    function emailInscription($email,$pseudo,$token){
        sendemail($email,$pseudo,'Pour valider votre email cliquez ici -> <a href="localhost/DevWebProjetFleur/confirmation.php?token='.$token.'">localhost/DevWebProjetFleur/confirmation.php?token='.$token.'</a>');
    }

    function sendemail($email,$pseudo,$text){
      //TODO mettre les identifiant dans un fichier .conf et le retier du git
      try{
         $mail = new PHPMailer(true);
         $mail->isSMTP();
         $mail->SMTPDebug = SMTP::DEBUG_OFF;
         $mail->Host = 'smtp.gmail.com';
         $mail->Port = 465;
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
         $mail->SMTPAuth = true;
         $mail->Username = 'porscheprojet@gmail.com';//this account has been deleted
         $mail->Password = 'xndugeanrokwjczx ';
         $mail->setFrom('porscheprojet@gmail.com', 'Projet Porsche');
         $mail->addReplyTo('porscheprojet@gmail.com', 'Projet Porsche');
         $mail->addAddress($email, $pseudo); //adrress mail de la personne qui recois le mail
         $mail->Subject = 'Inscription Projet Porsche';
         // !! attention changer l'addresse ici si l'on met en ligne !! //
         $mail->Body = '<html><body>'.$text.'</body></html>';
         $mail->AltBody = 'There is a probleme sorry';
         if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
         } else {
            echo 'Un mail de validation vous a été envoyer';
         }
      }catch (Exception $e){
         echo 'Mail pas envoyer' . $mail->ErrorInfo;
      }
    }

?>
