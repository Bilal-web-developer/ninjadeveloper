<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';



if (isset($_POST['send_btn'])){
    // code...
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $temp='Name:'.$name.'<br>Email:'.$email.'<br>Message:'.$message;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bilalwebdeveloper86@gmail.com';                     //SMTP username
    $mail->Password   = 'ltinglmcswltwnxb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('bilalwebdeveloper86@gmail.com');
    $mail->addAddress('bilalwebdeveloper86@gmail.com');

   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Client Message';
    $mail->Body    = $temp;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    header('location:index.html');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
?>
