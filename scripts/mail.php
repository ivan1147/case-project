<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              
try {
    //Server settings
	$mail->isSMTP();
   // $mail->SMTPDebug = 1;    
	$mail->SMTPAuth = true;	
	$mail->AuthType = 'LOGIN';	
	$mail->SMTPSecure = 'tls';                 
    $mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;						
	$mail->IsHTML(true);						                        
    $mail->Username = 'projack1147@gmail.com';              
    $mail->Password = '0164284673';                          
                                       

    //Recipients
    $mail->setFrom('projack@gmail.com', 'Ivan Low');
    //$mail->addAddress('ellen@example.com');              

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');        
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content              
	$_SESSION['activation'] = "True";
    $mail->Subject = 'Emax Account Activation';
    $mail->Body    = "<div id='jumbotronHome' class='jumbotron' style='background-color: #343a40 color: #ffffff'>
					<h1>Thank you for registering your account</h1> 
					<p>Dear ".$_SESSION['fullName']."</p>
					<p>Please click on the follwing link ro activate and login your account</p>
					<p>https://student.kdupg.edu.my/emax/scripts/index.php?username=".$_SESSION['username']."&activationCode=".$_SESSION['activationCode']."</p></div>";
					
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	//$mail->addAddress($_SESSION['emailAddress'], $_SESSION['fullname']);
	$mail->addAddress($_SESSION['emailAddress'], $_SESSION['fullname']);
	
    $mail->send();
    echo 'Message has been sent';
	
	header("Location: index.php");
	
} 
catch (Exception $e) 
{
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
}