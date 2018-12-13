<?php 
    //session_name("user");
    //session_start();
    $title = "My Information"; 
    $page = "myInfo";

    //include "assets/inc/header.inc.php";
    include_once "Player.PDO.class.php";
    //include_once 'assets/inc/nav.php';

    $playerDB = new PlayerDB();

    echo "<main>";
    echo "<p>test</p>";
    //echo $playerDB->getMyInfo(true, $_SESSION['id']);
    echo "</main>";
?>

