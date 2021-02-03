<?php

require "sendMail/PHPMAiler.php";
require "sendMail/SMTP.php";
require "sendMail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

// try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    // $mail->isSMTP();                                            // Send using SMTP
    // $mail->Host       = "smtp.gmail.com";                    // Set the SMTP server to send through
    // $mail->SMTPAuth   = "true";                                   // Enable SMTP authentication
    // $mail->Username   = "vipinshrivastava375@gmail.com";                     // SMTP username
    // $mail->Password   = "Vipin#59";                               // SMTP password
    // $mail->SMTPSecure = "tls";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    // $mail->Port       = "587";                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // //Recipients
    // $mail->setFrom("vipinshrivastava375@gmail.com", 'Mailer');
    // $mail->addAddress("vipinshrivastava92@gmail.com");     // Add a recipient
    // // $mail->addAddress('ellen@example.com');               // Name is optional
    // // $mail->addReplyTo('info@example.com', 'Information');
    // // $mail->addCC('cc@example.com');
    // // $mail->addBCC('bcc@example.com');

    // // Attachments
    // // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // // Content
    // $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = 'Here is the subject';
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // if($mail->send()){
    //     echo 'Message has been sent';
    // }else{
    //     echo "message not send!!!";
    // }
    
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }


echo "hello world !!!";

?>