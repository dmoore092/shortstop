<?php 
//goes into myinfo.php
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
        echo "<div id='body-main'>";
        echo "<div id='cont' class='go-login'>";
        echo "<h2 id='nologin'>You must be logged in</h2>";
        echo "<a href='login.php' class='redirect-link'>Login</a>";
        echo "</div>";
    }
?>