<?php

require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$comment = $_POST['comment'];


$mail = new PHPMailer();
$mail->isSMTP();
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.sendgrid.net';
$mail->Port = 587;
$mail->Username = 'contact@engineersera.in';
$mail->Password = '6J55K2LmSt8ycp8c';
$mail->SMTPAuth = true;

$mail->From = 'noreply@engineersera.in';
$mail->FromName = "Engineer's Era";
$mail->AddAddress('contact@engineersera.in');
$mail->AddReplyTo($email, "Engineer's Era");

$mail->IsHTML(true);
date_default_timezone_set('Asia/Kolkata');
$mail->Subject    = " Engineer's Era Contact Us Form Enquiry ".date('d F, Y h:i:s a');
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->Body    = "<table> <tr> <td> First Name: </td> <td> $firstname </td> </tr> <tr> <td> Last Name: </td> <td> $lastname </td> </tr>
<tr> <td> Email: </td> <td> $email </td> </tr> <tr> <td> Contact: </td> <td> $phone </td> </tr> 
<tr> <td> comment: </td> <td> $comment</td> </tr> </table>";

if(!$mail->Send())
{
  echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
  echo "Message sent!";
}
?>

