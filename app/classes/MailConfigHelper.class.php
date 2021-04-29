<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Above lines is used to tell which classes would be used by us

require_once 'vendor\autoload.php';
//This line will bring the classes specified by us


class MailConfigHelper{
    public static function getMailer():PHPMailer{
        $mail = new PHPMailer();
        //$mail->SMTPDebug = 2; //It is used to print the whole developer level error
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = "931341cd5bf3c9";
        $mail->Password = "ce71a8849909b9";
        $mail->Port = 2525;
        $mail->SMTPSecure = 'tls';
        $mail->setFrom("ridz12032001@gmail.com","Admin SL Team");

        return $mail;
    }
}


?>