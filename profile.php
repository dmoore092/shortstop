<?php 
        session_start();
        $title="Profile"; $page="profile";
        include_once "classes/Player.PDO.class.php";

        $username = $_SESSION["username"];

        $playerDB = new PlayerDB();     

        include("assets/inc/header.inc.php");
        
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            if (isset($_GET['logout'])) {
                $playerDB->logout();
            }
        }
        else {
            echo "<h2 id='nologin'>You must be logged in to see your info</h2>";
            echo "<a href='login.php' class='redirect-link'>Login</a>'";
            header("Location: login.php");
        }
        echo $playerDB->getMyInfo($_SESSION['id']);
      

        include("assets/inc/footer.inc.php"); 

?>