<?php 
        session_start();
        $title="Profile"; $page="profile";
        include_once ("classes/Player.PDO.Class.php");

        $playerDB = new PlayerDB();     

        include ("assets/inc/header.inc.php");
        
        $id=$_GET['id'];
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            //echo "logged in set";
           // var_dump($_SESSION['id']);
            //var_dump($_GET);
            if ($_SESSION['id'] == $_GET['id']) {  
                echo $playerDB->getMyInfo($id);
                echo "<script>document.getElementById('edit-img').style.display='inline-block'</script>";
            }
            else{
                //echo "logged in, but username should be passed through from mathelete/fathelete";
                echo $playerDB->getMyInfo($id);
            } 
        }
        else {
            //echo "not logged in, username should be passed through";
            //$id = $_GET["id"];
            echo $playerDB->getMyInfo($id);
        //     echo "<h2 id='nologin'>You must be logged in to see your info</h2>";
        //     echo "<a href='login.php' class='redirect-link'>Login</a>'";
        //     header("Location: login.php");
        }
        include("assets/inc/footer.inc.php"); 
        
        if(isset($_POST['report'])){
            $id=$_POST["playerid"];
            $to = "dmoore092@gmail.com";
            $subject = "AthleticProspects.com Post Reported";
            $message = "<body><a href='www.dmwebdev.net/profile.php?id=".$id."'>A user has reported a post for inappropriate images, video, or content</body></a>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: webmaster@dmwebdev.net" . "\r\n" .
                        "Reply-To: dmoore092@gmail.com" . "\r\n" .
                        "X-Mailer: PHP/" . phpversion();

            // If you leave the $headers from field empty,then your server mail ID will be displayed 
            //and it may be moved to the spam section of the email
            mail($to,$subject,$message,$headers);
        }
?>