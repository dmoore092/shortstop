<!DOCTYPE html>
<?php $relpath= ""; $title="signup"; $page="signup";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
      session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css" />
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />

        <title>Sign Up</title>
    </head>
    <body>
        <div id="header"><img src="https://cdn3.sportngin.com/attachments/banner_graphic/9705/8066/SiteHeader.png" alt="logo" id="logo"></div>
        <div id="main-body">
            <form id="player-form"
                         method = "POST"
                         action= ""
                         onsubmit = "" >
                        <h3>Login</h3>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="text"
                                   id = "username"
                                   name= "username"
                                   size = "50"
                                   maxlength = "50"
                                   placeholder = "Enter Your Username"
                                   value="dmoore"
                                   onclick="" />
                        </p>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="password"
                                   id = "password"
                                   name= "password"
                                   size = "50"
                                   maxlength = "50"
                                   placeholder = "Password"
                                   value="1234"
                                   onclick="" />
                        </p>
                        <input type="submit"
                               value="Login"
                               name = "login"
                               class="button"
                               id="btn-login"/>
                        <button class="button" onclick="location.href = 'createaccount.php';">Create Account</button>
                <?php 
                  $_SESSION["username"] = $_POST["username"]; 
                  $password = $_POST['password'];
                  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                  
                  $mysqli = mysqli_connect("127.0.0.1", "root", "", "sports");
                 //CONNECT TO DATABASE
                  if(!$mysqli){
                    echo "connection error: " . mysqli_connect_error();
                    die();
                  }
                //QUERY THE DATABASE for players to display
                if(isset($_POST["login"])){
                    $query = "SELECT username, pass
                             FROM players;";
                    $result = mysqli_query($mysqli, $query);
                    echo "<div id='display-players'>";
                    if($result > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            //$passwordCheck = $row["pass"];
                            echo "<div id='comments'><p>".$_SESSION["username"]."</p></div>";
                            
                            if($row["username"] == $_SESSION["username"] && password_verify($password, $hashed_password)){
                                //echo "<div id='comments'><p>Success!</p></div>";
                                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                            }
                            else{
                                echo "<div id='comments'><p>Nope</p></div>";
                                var_dump(password_verify("1234", $hashed_password));
                            }
                        }
                    }
                }
            ?> <!-- sets username in a session variable for use in other pages-->
            </form>
        </div><!-- end of #main-body -->        
    </body>
</html>