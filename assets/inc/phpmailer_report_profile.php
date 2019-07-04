
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

//someone reports a profile
//goes into profile.php
if(isset($_POST['report'])){
    //PHPMailer
    $mail = new PHPMailer(); 
    
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP(); 
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'athleticprospects1@gmail.com';     // SMTP username
        $mail->Password = 'Webm@ster1';                       // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        $mail->SMTPDebug = false;
        //Recipients
        $mail->setFrom('webmaster@athleticprospects.com', 'Athletic Prospects');
        $mail->addAddress('dmoore092@gmail.com', 'Dale');     // Add a recipient
        $mail->addAddress('kjprestano@gmail.com', 'Keith'); // Name is optional
        
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Inappropriate Profile report';
        $mail->Body    = "A user has reported a profile for inappropriate images, video, or content. <a href='https://www.athleticprospects.com/profile.php?id=".$_GET['id']."'>Click Here.</a>";
        //$mail->AltBody = "A user has reported a profile for inappropriate images, video, or content. https://www.athleticprospects.com/profile.php?id=".$_GET['id'].". Copy and paste that address into the browser bar";
    
        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }        
};
?>