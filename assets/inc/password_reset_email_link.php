<!-- sends a password reset link to the email of the username -->
<?php 
    //goes into index.php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;
     require_once './PHPMailer/src/Exception.php';
     require_once './PHPMailer/src/PHPMailer.php';
     require_once './PHPMailer/src/SMTP.php';

     $playerDB = new PlayerDB();
     
    if(isset($_POST['reset'])){
        $username = $playerDB->sanitize($_POST['username']);
        $username = strtolower($username);
        $fieldname = "email";
        // $data = $playerDB->getPlayersByFindAthleteSearch($query);
        $playerDB->insertResetToken($username);
        
        $result = $playerDB->getFieldByUsername($fieldname, $username);
        //var_dump($result);
        $recipientAddr = $result["email"];
        $recipientName = $result["name"];
        $recipientId   = $result["id"];
        $recipientCode = $result["reset"];

        $email = new PHPMailer(true); 
        $email->SMTPDebug = 2;                                 // Enable verbose debug output
        $email->isSMTP();                                      // Set mailer to use SMTP
        //header('Content-Type: text/csv; charset=utf-8');
        $email->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $email->SMTPAuth = true;                               // Enable SMTP authentication
        $email->Username = 'athleticprospects1@gmail.com';                 // SMTP username
        $email->Password = 'Webm@ster1';                           // SMTP password
        $email->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $email->Port = 465;                                    // TCP port to connect to
        $email->SMTPDebug = false; 
        //Recipients
        $email->setFrom('webmaster@athleticprospects.com', 'Athletic Prospects');
        $email->addAddress($recipientAddr, $recipientName);     // Add a recipient
        
        

        //Content
        $email->isHTML(true);                                  // Set email format to HTML
        $email->Subject = 'Reset Your Password';
        $email->Body    = "Someone has requested to reset your password. If this wasn't you, someone is trying to access your account.
                            <br>
                            <a href=\"http://www.athleticprospects.com/changepassword.php?id=".$recipientId."&uname=".$username."&reset=".$recipientCode."\">Click Here</a> to reset your password.";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        try{
            $email->send();
            //echo 'Message has been sent';
        } 
        catch (Exception $e) {
            //echo 'Message could not be sent. Mailer Error: ', $email->ErrorInfo;
        }
    }
?>