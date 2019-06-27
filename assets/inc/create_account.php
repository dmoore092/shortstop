<?php
    if(isset($_POST["btnCreate"])){
        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
            if(!$captcha){
                echo "<p style='color:red';>Please check the ReCaptcha!</p>";
                exit;
            }
            $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfGGJEUAAAAAFAw4zjaPVM2rlP1HqtQBw05rCek&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            if($response['success'] == false){
                echo "<p style='color:red';>ReCaptcha Failed.</p>";
            }
            else{
                //block cross-site scripting, html entities(apersand etc), trim white space
                $username  = htmlentities(strip_tags(trim($_POST["username"])));
                $password  = htmlentities(strip_tags(trim($_POST["retypepassword"])));
                //$persontype = $_POST['persontype'];

                if($_POST["password"] == $password){
                    $hashed_password = password_hash($_POST["retypepassword"], PASSWORD_DEFAULT);
                    
                    $player = new PlayerDB();
                    $persontype = 'player';
                    $registered = $player->register($username, $hashed_password, $persontype);
                    // if(!isset($_POST["persontype"])){
                    //     echo "<p style='color:red';>Please select whether you are a player or coach.</p>";
                    // }
                    // else 
                    if($registered){
                        //var_dump($_SESSION);
                        echo "<script>window.location.href = 'myinfo.php';</script>";
                    }
                    else{
                        echo "<p style='color:red';>Username is taken, please choose another</p>";
                    }
                    
                }
                else{
                    echo "Passwords do not match";
                }
            }
        }
    }
?>