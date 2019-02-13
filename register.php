
<?php 
        error_reporting(0);
        session_start();
        $relpath= ""; $title="Register"; $page="login";
        $imgpath="";
        $linkpath = "";
        $templinkpath = "";
    //$page is labelled login for linking purposes for css
     include("assets/inc/header.inc.php");
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
                                   value=""
                                   required />
                        </p>
                        <p>
                        <span class="span">Password:* &nbsp; </span>
                            <input type="password"
                                   class = "password"
                                   name= "password"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = "password"
                                   value=""
                                   required />
                        </p>
                        <p>
                        <span class="span">Retype Password:* &nbsp; </span> 
                            <input type="password"
                                   class = "password"
                                   name= "retypepassword"
                                   size = "25"
                                   maxlength = "50"
                                   placeholder = "Retype Your Password"
                                   value=""
                                   required />
                        </p>
                        <div class="g-recaptcha" data-sitekey="6LfGGJEUAAAAAChOm6ZDVpoo3ZbjdUsfwfYT6Omj"></div>
                        <!-- <p>
                            <select name="persontype" id="persontype">
                                <option value="" selected disabled>I am a...</option>
                                <option value="player">Player</option>
                                <option value="coach">Coach</option>
                            </select>
                        </p> -->
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
                ?>
            </form>      
            <?php include("assets/inc/footer.inc.php"); ?>
        </div><!-- end #main-body -->
    </body>
</html>