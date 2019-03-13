<?php

require_once __DIR__ . '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP; 

function($to, $subject, $message, $replyTo='') { 
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->CharSet="UTF-8";
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.sendgrid.net';
  $mail->Port = 587;
  $mail->Username = 'euphotel@gmail.com';
  $mail->Password = '[2QpY9^7Dc';
  $mail->SMTPAuth = true;
  $mail->From = 'euphotel@gmail.com';
  $mail->FromName = "EuphoTel";
  $mail->AddAddress($to);
  if( $replyTo != '') {
    $mail->AddReplyTo($replyTo, "EuphoTel");
  }
  $mail->IsHTML(true);
  $mail->Subject = $subject;
  $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
  $mail->Body    = $message;
  if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else {
    echo "Message sent!";
  }   
}

?>
