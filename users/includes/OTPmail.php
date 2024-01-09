<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
function sendOTP($email,$otp){
    $mail = new PHPMailer(true);
    $mail->isSMTP(); 
    $mail->Mailer     = 'smtp'; 
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth =  TRUE;                                 //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through 
    $mail->Username   = 'helpdeskcareinfo@gmail.com';                     //SMTP username
    $mail->Password   = 'Rajans123';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->setFrom('donotreply@mydomain.com', 'Society Helpdesk');
    $mail->addAddress($email);     //Add a recipient
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'OTP to Login';
    $mail->Body    = "One Time Password for Society helpdesk login authentication is:<br/><br/>" . $otp;
    if($mail->send()){
        return 1;
    }
    else{
        return 0;
    }
}
?>