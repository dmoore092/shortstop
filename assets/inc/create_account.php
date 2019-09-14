<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once './PHPMailer/src/Exception.php';
require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/SMTP.php';

    if(isset($_POST["btnCreate"])){
        //$uniqueEmail = true;
        $passwordsMatch = true;
        //block cross-site scripting, html entities(apersand etc), trim white space
        $email  = htmlentities(strip_tags(trim(strtolower($_POST["email"]))));
        $password  = htmlentities(strip_tags(trim($_POST["retypepassword"])));
        if(strtolower($_POST["registrationcode"]) == "elite prospects"){
            if($_POST["password"] == $password){
                $hashed_password = password_hash($_POST["retypepassword"], PASSWORD_DEFAULT);
                
                $player = new PlayerDB();
                $persontype = 'player';
                $registered = $player->register($email, $hashed_password, $persontype);
                
                // if(!isset($_POST["persontype"])){
                //     echo "<p style='color:red';>Please select whether you are a player or coach.</p>";
                // }
                // else 
                if($registered){
                    echo "<script>window.location.href = 'myinfo.php';</script>";
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
                        $mail->addAddress('kprestano@athleticprospects.com', 'Keith'); // Name is optional
                        
                        //$mail->addReplyTo('info@example.com', 'Information');
                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');
                    
                        //Attachments
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'A new player has registered';
                        $mail->Body    = "<a href='https://www.athleticprospects.com/profile.php?id=".$_SESSION['id']."'>Click Here.</a> to see the player's profile.";
                    
                        $mail->send();
                        //echo 'Message has been sent';
                    } catch (Exception $e) {
                        //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                    } 
                    
                    
                }
                else{
                    $uniqueEmail = false;
                    echo "<script>
                            document.getElementById('email-error').style='color:red;display:block;';
                            document.getElementById('email').style='border:2px solid red;';
                          </script>";
                }
            }
        }       
    }
?>
