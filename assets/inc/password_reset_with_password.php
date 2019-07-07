<?php 
//goes into passwordreset.php
// used to reset password when person already knows their password, no email needed
    $player = new PlayerDB();
    if(isset($_POST["updatepassword"])){
        $username = $_SESSION["username"];
        
        if($_POST['newpassword'] == $_POST['newpasswordagain']){
            if($_POST['newpassword'] != ""){
                $currentpassword = $_POST["currentpassword"];
            
                if($player->checkPassword($username, $currentpassword)){
                    //echo "success!";
                    $newpassword = $_POST['newpassword'];
                    $player->updatePassword($username, $newpassword);
                }
            }
            else{
                echo "<p style='color:red;margin-top:25px'>Password cannot be empty, try again</p>";
            }
        }
        else{
            echo "<p style='color:red;margin-top:25px'>Passwords do not match, try again</p>";
        };
        //$success = $player->updatepassword($oldpassword, $newpassword);
    }
?>