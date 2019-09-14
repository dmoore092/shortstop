<?php 
    //reset the users password. From changepassword.php
    //goes in login.php
    $playerDB = new PlayerDB();
    if(isset($_POST['update-password'])){
        //check the user typed the same password both times
        if($_POST["password"] == $_POST['retypepassword']){
            if($_POST['password'] != ""){
                $newpassword = $_POST['password'];
                $result = $playerDB->checkTempPassExpire($_GET['email']);
                //everything is ready for password change
                if($result == 1){
                    //echo "ready to change password, call updatePassword()";
                    $player = new PlayerDB();
                    //password is hashed in updatePassword, not here
                    $player->updatePassword($_GET['email'], $newpassword);
                }
            }
            else{
                echo "<p style='color:red;margin-top:25px'>Password cannot be empty, try again</p>";
            }
        }
        else{
            echo "<p style='color:red;margin-top:25px'>Passwords do not match, try again</p>";
        }
    } 
?> 
