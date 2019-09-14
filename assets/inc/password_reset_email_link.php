<!-- sends a password reset link to the email of the user -->
<?php 
    //goes into index.php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;
     require_once './PHPMailer/src/Exception.php';
     require_once './PHPMailer/src/PHPMailer.php';
     require_once './PHPMailer/src/SMTP.php';

     $playerDB = new PlayerDB();
     
    if(isset($_POST['reset'])){
        $email = $playerDB->sanitize($_POST['email']);        
        $email = strtolower($email);
        $fieldname = "email";
        $playerDB->insertResetToken($email);
        
        $result = $playerDB->getFieldByEmail($fieldname, $email);
        var_dump($result);
        $recipientAddr = $result["email"];
        $recipientName = $result["name"];
        $recipientId   = $result["id"];
        $recipientCode = $result["reset"];

        $mail = new PHPMailer(true); 
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        //header('Content-Type: text/csv; charset=utf-8');
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'athleticprospects1@gmail.com';                 // SMTP username
        $mail->Password = 'Webm@ster1';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        $mail->SMTPDebug = false; 
        //Recipients
        $mail->setFrom('webmaster@athleticprospects.com', 'Athletic Prospects');
        $mail->addAddress($recipientAddr, $recipientName);     // Add a recipient
        
        

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset Your Password';
        $mail->Body    = "Someone has requested to reset your password. If this wasn't you, someone is trying to access your account.
                            <br>
                            <a href=\"http://www.athleticprospects.com/changepassword.php?id=".$recipientId."&email=".$email."&reset=".$recipientCode."\">Click Here</a> to reset your password.";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        try{
            $mail->send();
            //echo 'Message has been sent';
        } 
        catch (Exception $e) {
            //echo 'Message could not be sent. Mailer Error: ', $email->ErrorInfo;
        }
    }
?>