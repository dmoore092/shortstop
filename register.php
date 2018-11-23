
<?php $relpath= ""; $title="Register"; $page="login";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
    //$page is labelled login for linking purposes for css
?>
<?php include("assets/inc/header.inc.php"); ?>
        <div id="body-main">
            <form id="player-form"
                         method = "POST"
                         action= ""
                         onsubmit = "" >
                        <h2>Create an Account</h2>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="text"
                                   id = "username"
                                   name= "username"
                                   size = "31"
                                   maxlength = "150"
                                   placeholder = "Choose a username"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="password"
                                   class = "password"
                                   name= "password"
                                   size = "31"
                                   maxlength = "150"
                                   placeholder = "password"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="password"
                                   class = "password"
                                   name= "retypepassword"
                                   size = "31"
                                   maxlength = "50"
                                   placeholder = "Retype Your Password"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <input type="submit"
                               value="Create Account"
                               name = "btnCreate"
                               class="button"
                               id="btn-create-account"/>
                <?php
                    $mysqli = mysqli_connect("localhost", "root", "root", "sports");
                    //CONNECT TO DATABASE
                    if(!$mysqli){
                        echo "connection error: " . mysqli_connect_error();
                        die();
                    }
                    else{
                        echo "Success connect!";
                    }
                
                    if(isset($_POST["btnCreate"])){
                        //block cross-site scripting, html entities(apersand etc), trim white space
                        $username  = htmlentities(strip_tags(trim($_POST["username"])));
                        $password  = htmlentities(strip_tags(trim($_POST["retypepassword"])));
                        
                        //block sql injections
                        $username  = mysqli_real_escape_string($mysqli, $username);
                        $password  = mysqli_real_escape_string($mysqli, $password);
                        
                        if($_POST["password"] == $password){
                            $hashed_password = password_hash($_POST["retypepassword"], PASSWORD_DEFAULT);
                            
                        $query   = "INSERT INTO players(username, pass)
                                    VALUES('$username','$hashed_password');";
                    
                        $result = mysqli_query($mysqli, $query);
                        $num_rows = mysqli_affected_rows($mysqli);
                        
                        echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
                        //echo "<p>$num_rows records created</p>"  
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