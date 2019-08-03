<?php
    if(isset($_POST["btnCreate"])){
        $uniqueUsername = true;
        $passwordsMatch = true;
        //block cross-site scripting, html entities(apersand etc), trim white space
        $username  = htmlentities(strip_tags(trim($_POST["username"])));
        $password  = htmlentities(strip_tags(trim($_POST["retypepassword"])));
        if($_POST["registrationcode"] == strtolower("elite prospects")){
            if($_POST["password"] == $password){
                $hashed_password = password_hash($_POST["retypepassword"], PASSWORD_DEFAULT);
                
                $player = new PlayerDB();
                var_dump($player);
                $persontype = 'player';
                $registered = $player->register($username, $hashed_password, $persontype);
                
                // if(!isset($_POST["persontype"])){
                //     echo "<p style='color:red';>Please select whether you are a player or coach.</p>";
                // }
                // else 
                if($registered){
                    echo "<script>window.location.href = 'myinfo.php';</script>";
                    
                }
                else{
                    $uniqueUsername = false;
                    echo "<script>
                            document.getElementById('username-error').style='color:red;display:block;';
                            document.getElementById('username').style='border:2px solid red;';
                          </script>";
                }
            }
        }       
    }
?>
