<?php 
      session_start();
      $relpath= ""; $title="Login"; $page="login";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
      
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
                        <h2>Login</h2>
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
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="password"
                                   class = "password"
                                   name= "password"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = "Password"
                                   value=""
                                   onclick="" />
                        </p>
                        <button type="submit" name="login" class="btn-all-buttons" id="btn-login">Login</button>
                        <!-- <input type="submit"
                               value="Login"
                               name="login"
                               class="btn-all-buttons"
                               id="btn-login"/> -->
                        <a href = "register.php" style="text-decoration:none"><input type="button" class="btn-all-buttons" id="btn-create-account" value="Register" /></a>
                        <br/>
                        <a href = "recover.php" style="text-decoration:none">Reset My Password..</a>
                <?php 

            ?> 
            </form>
<?php include('assets/inc/footer.inc.php'); 

    //reset the users password. From changepassword.php
    if(isset($_POST['update-password'])){
        //makes recaptcha work
        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
            //captcha failed
            if(!$captcha){
                echo "<p style='color:red';>Please check the ReCaptcha!</p>";
                exit;
            }
            $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfGGJEUAAAAAFAw4zjaPVM2rlP1HqtQBw05rCek&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            if($response['success'] == false){
                echo "<p style='color:red';>ReCaptcha Failed.</p>";
            }
            //captcha passed
            else{
                //check the user typed the same password both times
                if($_POST["password"] == $_POST['retypepassword']){
                    if($_POST['password'] != ""){
                        $newpassword = $_POST['password'];
                        $result = $playerDB->checkTempPassExpire($_GET['uname']);
                        //everything is ready for password change
                        if($result == 1){
                            echo "ready to change password, call updatePassword()";
                            $player = new PlayerDB();
                            //password is hashed in updatePassword, not here
                            $player->updatePassword($_GET['uname'], $newpassword);
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
        }  
    }


?>
