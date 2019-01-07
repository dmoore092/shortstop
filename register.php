
<?php 
        session_start();
        $relpath= ""; $title="Register"; $page="login";
        $imgpath="";
        $linkpath = "";
        $templinkpath = "";
    //$page is labelled login for linking purposes for css
     include("/assets/inc/header.inc.php");
?>
        <div id="body-main">
            <form id="player-form"
                         method = "POST"
                         action= ""
                         onsubmit = "" >
                        <h2>Create an Account</h2>
                        <p>
                            <span class="span">Username:* &nbsp; </span>
                            <input type="text"
                                   id = "username"
                                   name= "username"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = "Choose a username"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <p>
                        <span class="span">Password:* &nbsp; </span>
                            <input type="password"
                                   class = "password"
                                   name= "password"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = "password"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <p>
                        <span class="span">Retype Password:* &nbsp; </span> 
                            <input type="password"
                                   class = "password"
                                   name= "retypepassword"
                                   size = "25"
                                   maxlength = "50"
                                   placeholder = "Retype Your Password"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <p>
                            <select name="persontype" id="persontype">
                                <option value="" selected disabled>I am a...</option>
                                <option value="player">Player</option>
                                <option value="coach">Coach</option>
                            </select>
                        </p>
                        <input type="submit"
                               value="Create Account"
                               name = "btnCreate"
                               class="btn-all-buttons"
                               id="btn-create-account"/>
                <?php
                
                    if(isset($_POST["btnCreate"])){
                        //block cross-site scripting, html entities(apersand etc), trim white space
                        $username  = htmlentities(strip_tags(trim($_POST["username"])));
                        $password  = htmlentities(strip_tags(trim($_POST["retypepassword"])));
                        $persontype = $_POST['persontype']; 
                        
                        if($_POST["password"] == $password){
                            $hashed_password = password_hash($_POST["retypepassword"], PASSWORD_DEFAULT);
                            
                            $player = new PlayerDB();

                            $registered = $player->register($username, $hashed_password, $persontype);
                            if($registered){
                                //var_dump($_SESSION);
                                echo "<script>window.location.href = 'myinfo.php';</script>";
                            }
                            else{
                                echo "Username is taken, please choose another.";
                            }
                            
                        }
                        else{
                            echo "Passwords do not match";
                        }
                    
                    }
                ?>
            </form>      
        </div><!-- end #main-body -->
    </body>
</html>