<?php 
        session_start();
        $title="Profile"; $page="profile";
        include_once "../classes/Player.PDO.class.php";

        $playerDB = new PlayerDB();     

        include ("assets/inc/header.inc.php");
        
        $id=$_GET['id'];
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            //echo "logged in set";
           // var_dump($_SESSION['id']);
            //var_dump($_GET);
            if ($_SESSION['id'] == $_GET['id']) {  
                echo $playerDB->getMyInfo($id);
                echo "<script>document.getElementById('edit-img').style.display='inline-block'</script>";
            }
            else{
                //echo "logged in, but username should be passed through from mathelete/fathelete";
                echo $playerDB->getMyInfo($id);
            } 
        }
        else {
            //echo "not logged in, username should be passed through";
            //$id = $_GET["id"];
            echo $playerDB->getMyInfo($id);
        //     echo "<h2 id='nologin'>You must be logged in to see your info</h2>";
        //     echo "<a href='login.php' class='redirect-link'>Login</a>'";
        //     header("Location: login.php");
        }
        include("assets/inc/footer.inc.php"); 
        
?>