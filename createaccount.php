<!DOCTYPE html>
<?php $relpath= ""; $title="createaccount"; $page="createaccount";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css" />
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />

        <title>Create your Account</title>
    </head>
    <body>
        <div id="header"><img src="https://cdn3.sportngin.com/attachments/banner_graphic/9705/8066/SiteHeader.png" alt="logo" id="logo"></div>
        <div id="main-body">
            <form id="player-form"
                         method = "POST"
                         action= ""
                         onsubmit = "" >
                        <h3>Create an Account</h3>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="text"
                                   id = "username"
                                   name= "username"
                                   size = "50"
                                   maxlength = "50"
                                   placeholder = "Choose a username"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="password"
                                   id = "password"
                                   name= "password"
                                   size = "50"
                                   maxlength = "50"
                                   placeholder = "password"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="password"
                                   id = "retypepassword"
                                   name= "retypepassword"
                                   size = "50"
                                   maxlength = "50"
                                   placeholder = "Retype Your Password"
                                   value="samiam"
                                   onclick="" />
                        </p>
                        <input type="submit"
                               value="Create Account"
                               name = "btnCreate"
                               class="button"
                               id="btnCreate"/>
                <?php
                    $mysqli = mysqli_connect("127.0.0.1", "root", "", "sports");
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