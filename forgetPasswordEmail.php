<?php
session_start();



require "sendMail/PHPMailer.php";
require "sendMail/SMTP.php";
require "sendMail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$id = $_SESSION['id'];
$code = $_SESSION['code'];
$email = $_SESSION['email'];

try {
    
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "vipinshrivastava375@gmail.com";                     // SMTP username
    $mail->Password   = "Vipin#59";                               // SMTP password
    $mail->SMTPSecure = "tls";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = "587";                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@coder.com', 'CoderX420');
    $mail->addAddress("$email"," ");     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // // Attachments
    // // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $link = "localhost/Task3/vaildresetcode.php?id=".$id."&code=".$code;
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Request for Password Reset';
    $mail->Body    = "<html> <head> 
        <title>Welcome to Coder</title> 
    </head> 
    <body> 
        <h1>Thanks you for requesting reset password!</h1> 
        <table cellspacing='0' style='border: 2px dashed #FB4314; width: 100%;'> 
            <tr> 
                <th>Name:</th><td>Vipin Shrivastava</td> 
                
            </tr> 
            <tr>
            <th>link:</th><td><a href='$link'>Click Me</a></td> 
            </tr>
            <tr style='background-color: #e0e0e0;'> 
                <th>Email:</th><td>contact@coder.com</td> 
            </tr> 
            <tr> 
                <th>Website:</th><td><a href='http://www.codexworld.com'>www.codexworld.com</a></td> 
            </tr> 
        </table> 
    </body> 
    </html> ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
     
      ?>
      <html><body><h2 id="alert"></h2></body></html>
      <script>
          document.getElementById("alert").innerHTML = "Mail Send Successfully !!!";
          setTimeout(function() {
             window.location.replace("login.php");
            }, 2000);
      </script>
      <?php
    }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




?>