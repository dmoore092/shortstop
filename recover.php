<?php 
    session_start();
    $relpath= ""; $title="Login"; $page="login";
    $imgpath="";
    $linkpath = "";
    $templinkpath = "";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';


    include("classes/Player.PDO.Class.php");
    $_SESSION['logged_in'] = 'false';
    if(isset($_POST["login"])){
        //echo "login called";
        $username = htmlentities(strip_tags(trim($_POST["username"])));//$_POST["username"];
        $password = htmlentities(strip_tags(trim($_POST["password"])));//$_POST["password"];

        $player = new PlayerDB();
        //user will equals (0 || false) || (1 || true)
        $isLoggedIn = $player->login($username, $password);
    }
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        echo "<h1>Logged in</h1>";
        //var_dump($_SESSION['id']);
        //$id = $_SESSION['id'];
        header("Location: http://".$_SERVER["HTTP_HOST"] . "/profile.php?id={$_SESSION['id']}");
    }
?>
<?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
            <form id="player-form"
                  method = "POST"
                  action= ""
                  onsubmit = "" >
                <h2>Reset My Password</h2>
                    <p>
                        <!-- <span class="span">First Name:* &nbsp; </span> -->
                        <input type="text"
                               id = "username"
                               name= "username"
                               size = "25"
                               maxlength = "150"
                               placeholder = "Enter Your Username"
                               value=""
                               onclick="" />
                    </p>
                    <button type="submit" name="reset" class="btn-all-buttons" id="btn-reset">Reset</button>
            </form>
<?php include('assets/inc/footer.inc.php'); ?>

<?php 
    if(isset($_POST['reset'])){
        $username = $playerDB->sanitize($_POST['username']);
        $username = strtolower($username);
        $fieldname = "email";
        // $data = $playerDB->getPlayersByFindAthleteSearch($query);
        $playerDB->insertResetToken();
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
                            <a href=\"www.athleticprospects.com/changepassword.php?id=".$recipientId."reset=".$recipientCode."\">Click Here</a> to reset your password.";
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