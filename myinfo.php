<?php 
        session_start();
        $title="My Info"; $page="myinfo";

        include_once ("classes/Player.PDO.Class.php");
       // include "assets/inc/submit-profile.inc.php"; 

        include('assets/inc/header.inc.php'); 
        $playerDB = new PlayerDB();
        
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
          if (isset($_GET['logout'])) {
            $playerDB->logout();
          }
            /*
            * This line prints the entire html page. getMyInfo() is found in Player.PDO.Class.php
            * Rewrite this some day
            */
            echo $playerDB->getMyEditableInfo($_SESSION['id']); 
        } else {
            echo "<h2 id='nologin'>You must be logged in to see your info</h2>";
            echo "<a href='login.php' class='redirect-link'>Login</a>'";
          header("Location: login.php");
        }

       include('assets/inc/footer.inc.php');
?>