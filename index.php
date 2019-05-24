<?php 
      $relpath= ""; $title="Home"; $page="main";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
      session_start();
      //test
?>
        <?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
            <div id="content">
                <section>
                    <h2>At Athletic Prospects</h2>
                    <p>
                        We strive to provide High School and JUCO athletes the tools to successfully promote themselves 
                        to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader 
                        to athletes to teach them the importance of academics and athletics while showing strong leadership 
                        characteristics to be successful on and off the field.
                    </p>
                    <hr/>
                </section>  
            
            </div><!-- end of #content -->
            <div id="center-area">
            
                <a href = "register.php"><img src = "/assets/img/mainbanner.jpg" /></a>
            </div>
            


            <?php include('assets/inc/footer.inc.php'); ?>


<!-- This handles when a person clicks a password reset link in their email -->
<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    if(isset($_POST['reset'])){
        echo "reset is set";
        $username = $playerDB->sanitize($_POST['username']);
        $username = strtolower($username);
        $fieldname = "email";
        // $data = $playerDB->getPlayersByFindAthleteSearch($query);
        $playerDB->insertResetToken($username);
        $result = $playerDB->getFieldByUsername($fieldname, $username);

        $recipientAddr = $result["email"];
        $recipientName = $result["name"];
        $recipientId   = $result["id"];
        $recipientCode = $result["reset"];

        $email = new PHPMailer(true); 
        $email->SMTPDebug = 2;                                 // Enable verbose debug output
        $email->isSMTP();                                      // Set mailer to use SMTP
        $email->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $email->SMTPAuth = true;                               // Enable SMTP authentication
        $email->Username = 'dmoore092@gmail.com';                 // SMTP username
        $email->Password = 'Google@ccess2';                           // SMTP password
        $email->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $email->Port = 465;                                    // TCP port to connect to
        $email->SMTPDebug = false; 
        //Recipients
        $email->setFrom('webmaster@athleticprospects.com', 'Athletic Prospects');
        $email->addAddress($recipientAddr, $recipientName);     // Add a recipient
        
        header('Content-Type: text/csv; charset=utf-8');

        //Content
        $email->isHTML(true);                                  // Set email format to HTML
        $email->Subject = 'Reset Your Password';
        $email->Body    = "Someone has requested to reset your password. If this wasn't you, someone is trying to access your account.
                            <br>
                            <a href=\"http://192.168.33.10/changepassword.php?id=".$recipientId."&uname=".$username."&reset=".$recipientCode."\">Click Here</a> to reset your password.";
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