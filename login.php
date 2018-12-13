<?php 
      session_start();
      $relpath= ""; $title="Login"; $page="login";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
      
      include "classes/Player.PDO.class.php";
      $_SESSION['logged_in'] = 'false';
    if(isset($_POST["login"])){
        echo "login called";
        $username = $_POST["username"];
        $password = $_POST["password"];

        $player = new PlayerDB();
        //user will equals (0 || false) || (1 || true)
        $isLoggedIn = $player->login($username, $password);
    }
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        //echo "<h1>Logged in</h1>";
        header("Location: profile.php");
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
                                   value="dmoore"
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
                                   value="1234"
                                   onclick="" />
                        </p>
                        <input type="submit"
                               value="Login"
                               name = "login"
                               class="btn-all-buttons"
                               id="btn-login"/>
                        <button class="btn-all-buttons" id="btn-create-account" onclick="location.href = 'register.php';">Create Account</button>
                <?php 

            ?> 
            </form>
            <?php include('assets/inc/footer.inc.php'); ?>