<!DOCTYPE html>
<?php $relpath= ""; $title="Login"; $page="login";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
      session_start();
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
                                   size = "28"
                                   maxlength = "150"
                                   placeholder = "Enter Your Username"
                                   value="dmoore"
                                   onclick="" />
                        </p>
                        <p>
                            <!-- <span class="span">First Name:* &nbsp; </span> -->
                            <input type="password"
                                   class = "password"
                                   name= "password"
                                   size = "28"
                                   maxlength = "150"
                                   placeholder = "Password"
                                   value="1234"
                                   onclick="" />
                        </p>
                        <input type="submit"
                               value="Login"
                               name = "login"
                               class="button"
                               id="btn-login"/>
                        <button class="button" id="btn-register" onclick="location.href = 'register.php';">Create Account</button>
                <?php 
                  $_SESSION["username"] = $_POST["username"]; 
                  $password = $_POST['password'];
                  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                  
                  $mysqli = mysqli_connect("localhost", "root", "root", "sports");
                 //CONNECT TO DATABASE
                  if(!$mysqli){
                    echo "connection error: " . mysqli_connect_error();
                    die();
                 }
                //QUERY THE DATABASE for login
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
                                echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
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
            <?php include('assets/inc/footer.inc.php'); ?>