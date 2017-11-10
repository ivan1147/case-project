<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
	$mail->isSMTP();
   // $mail->SMTPDebug = 1;    
	$mail->SMTPAuth = true;	
	$mail->AuthType = 'LOGIN';	
	$mail->SMTPSecure = 'tls';                  // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;						
	$mail->IsHTML(true);						// Specify main and backup SMTP servers                             
    $mail->Username = 'projack1147@gmail.com';                 // SMTP username
    $mail->Password = '0164284673';                           // SMTP password
                                       

    //Recipients
    $mail->setFrom('projack@gmail.com', 'Ivan Low');
    //$mail->addAddress('ellen@example.com');               // Name is optional

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content              
	$_SESSION['activation'] = "True";
    $mail->Subject = 'Emax Account Activation';
    $mail->Body    = "<div id='jumbotronHome' class='jumbotron' style='background-color: #343a40 color: #ffffff'>
					<h1>Thank you for registering your account</h1> 
					<p>Dear ".$_SESSION['fullName']."</p>
					<p>Please click on the follwing linstudent.kdupg.edu.my/emax/scripts/home.php?username=".$_SESSION['username']."&activation=".$_SESSION['activationk</p>
					<p>https://']."</p></div>";
					
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	//$mail->addAddress($_SESSION['emailAddress'], $_SESSION['fullname']);
	$mail->addAddress($_SESSION['emailAddress'], $_SESSION['fullname']);
	
    $mail->send();
    echo 'Message has been sent';
	
	header("Location: home.php");
} 
catch (Exception $e) 
{
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
}